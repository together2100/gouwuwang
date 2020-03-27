<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use App\Models\Article;
use App\Services\OSS; // 导入阿里云库
use Storage; //导入七牛云库
use Illuminate\Support\Facades\Redis; // 引入

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arts = []; // 存储数据
        $listkey = 'PHP19LIST:php19ARTICLE'; // 链表名字 储存id
        $hashkey = 'PHP19HASH:php19ARTICLE'; //嘻哈表名 title editor thumb descr
        if(Redis::exists($listkey)){ // 判断链表是否有id
            // redis 有数据
            $id = Redis::lrange($listkey,0,-1); // 把存在id的数据取出来
            foreach($id as $k => $v){
                $arts[] = Redis::hgetall($hashkey.$v); // 遍历数据
            }

        }else{
            // redis 没有数据 就去数据库取数据
            $arts = Article::get()->toArray();
            foreach($arts as $key => $value){
                Redis::rpush($listkey,$value['id']); // 储存ID
                Redis::hmset($hashkey.$value['id'],$value); // 储存id对应的数据
            }
        }
        return view('admin.article.index',['data'=>$arts]);

        // $data = Article::get(); // 获取所有数据
        // return view('admin.article.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.add'); // 添加公告页面
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     if($request->hasFile('thumb')){
    //         $name = time()+rand(); // 初始化图片名字
    //         $ext = $request->file('thumb')->getClientOriginalextension(); //获取图片的后缀
    //         // 移动图片到制定目录下
    //         $request->file('thumb')->move("./uploads/".date('Y-m-d'),$name.'.'.$ext);
    //         // $Image = new ImageManager(); // 实例化 ImageManager
    //         // $Image->make("./uploads/".date('Y-m-d'),$name.'.'.$ext)->resize(100,100)->
    //         // save("./uploads/".date('Y-m-d'),"r_".$name.'.'.$ext); // 修改图片大小为100*100 

    //         $data['title'] = $request->input('title'); // 获取标题
    //         $data['editor'] = $request->input('editor'); // 获取作者
    //         $data['thumb'] = trim("./uploads/".date('Y-m-d')."/".$name.".".$ext,"."); // 图片路径 trim去掉两边的。
    //         $data['descr'] = $request->input('descr'); // 获取内容
            
    //         if(Article::create($data)){
    //             return redirect('/article')->with('success','添加成功');
    //         }else{
    //             return back()->with('error','添加失败');
    //         }
    //     }
    // }

    // 阿里云上传图片文件
    // public function store(Request $request)
    // {
    //     // newfile 上传图片名字
    //     // filepath 上传临时目录
    //     if($request->hasFile('thumb')){
    //         $res = $request->file('thumb'); // 获取上传的图片
    //         $filepath = $res->getRealPath(); //获取上传图片的临时目录
    //         $name = time()+rand(); // 给图片取名
    //         $ext = $request->file('thumb')->getClientOriginalExtension(); // 获取图片后缀
    //         $newfile = $name.".".$ext; 
            
    //         OSS::upload($newfile,$filepath); // 存到阿里云
            
    //         $data['title'] = $request->input('title'); // 获取标题
    //         $data['editor'] = $request->input('editor'); // 获取作者
    //         $data['thumb'] = env('ALIOSSURL').$newfile; // 获取上传的图片路径
    //         $data['descr'] = $request->input('descr'); // 获取内容
            
    //         if(Article::create($data)){
    //             return redirect('/article')->with('success','添加成功');
    //         }else{
    //             return back()->with('error','添加失败');
    //         }
    //     }

    // }

    // 七牛云上传图片文件
    public function store(Request $request)
    {
        // newfile 上传图片名字
        // filepath 上传临时目录
        if($request->hasFile('thumb')){
            $res = $request->file('thumb'); // 获取上传的图片
            $filepath = $res->getRealPath(); //获取上传图片的临时目录
            $name = time()+rand(); // 给图片取名
            $ext = $request->file('thumb')->getClientOriginalExtension(); // 获取图片后缀
            $newfile = $name.".".$ext; 
            
            // 上传图片到七牛
            \Storage::disk('qiniu')->writeStream($newfile, fopen($filepath, 'r'));
            
            $data['title'] = $request->input('title'); // 获取标题
            $data['editor'] = $request->input('editor'); // 获取作者
            $data['thumb'] = env('QINIU_DOMAIN').$newfile; // 获取上传的图片路径
            $data['descr'] = $request->input('descr'); // 获取内容
            $data1 = Article::create($data); 
            $id = $data1->id;
            $data['id'] = $id;
            if($id){
                $listkey = 'PHP19LIST:php19ARTICLE'; // 链表名字 储存id
                $hashkey = 'PHP19HASH:php19ARTICLE'; //嘻哈表名 title editor thumb descr
                Redis::rpush($listkey,$id); // 
                Redis::hmset($hashkey.$id,$data);
                return redirect('/article')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = Article::where('id','=',$id)->first(); // 获取修改的数据

       return view('admin.article.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('thumb')){
            $res = $request->file('thumb'); // 获取上传的图片
            $filepath = $res->getRealPath(); //获取上传图片的临时目录
            $name = time()+rand(); // 给图片取名
            $ext = $request->file('thumb')->getClientOriginalExtension(); // 获取图片后缀
            $newfile = $name.".".$ext; 
            // 上传图片到七牛
            Storage::disk('qiniu')->writeStream($newfile, fopen($filepath, 'r'));
            $thumb = env('QINIU_DOMAIN').$newfile; // 获取上传的图片路径
            // 删除id下的七牛云库里的图片
            $info = Article::find($id); // 查询数据
            $img = $info->thumb; // 获取图片路径
            $imgurl = str_replace("http://q0ngaiml2.bkt.clouddn.com/","",$img);
            Storage::disk('qiniu')->delete($imgurl); // 删除七牛云库的图片
        }else{
            $thumb = $request->input('old_thumb'); // 获取原来的图片路径
        }

        $data['title'] = $request->input('title'); // 获取标题
        $data['editor'] = $request->input('editor'); // 获取作者
        $data['thumb'] = $thumb; // 获取上传的图片路径
        $data['descr'] = $request->input('descr'); // 获取内容
        
        $data1 = Article::where('id','=',$id)->update($data); // 更新数据
        
        if($data1){
            $hashkey = 'PHP19HASH:php19ARTICLE'; //嘻哈表名 title editor thumb descr
            Redis::hmset($hashkey.$id,$data);
            return redirect('/article')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Article::find($id); // 查找数据
        $img = $info->thumb; // 获取图片路径
        $imgurl = str_replace("http://q0ngaiml2.bkt.clouddn.com/","",$img);
        $row = Article::find($id)->delete(); // 删除数据
        if($row){
            Storage::disk('qiniu')->delete($imgurl); // 删除七牛云库的图片
            $listkey = 'PHP19LIST:php19ARTICLE'; // 链表名
            $hashkey ='PHP19HASH:php19ARTICLE'; // 哈西表名
            Redis::lrem($listkey,0,$id); // 删除链表里的id
            Redis::del($hashkey.$id); // 删除哈西表里的数据
            return redirect('/article')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    public function articledel(Request $request)
    {
        $id = $request->input('id'); // 获取删除的id
        // echo json_encode($id);
        if($id == ""){
            echo "请至少选择一条数据";
            die;
        }
        foreach($id as $key => $value){
            // $info = Article::where("id","=",$value)->first(); // 获取删除的数据
            // $smallimgurl = $info->thumb; // 小图的相对路径
            // $bigimgurl = str_replace("r_","",$smallimgurl); // 获取大图的相对路径
            // unlink(".".$smallimgurl); // 删除小图，要用绝对路径，前面加个点
            // unlink(".".$bigimgurl); // 删除小图，要用绝对路径，前面加个点
            // echo $smallimgurl;
            // echo $bigimgurl;
            // 暂时无权限

            // // 删除阿里云oss下的图片
            // $info = Article::where('id','=',$value)->first(); // 查询数据
            // $img = $info->thumb; // 获取图片路径
            // $imgurl = str_replace("https://phpp19.oss-cn-shenzhen.aliyuncs.com/","",$img);
            // OSS::deleteObject($imgurl); // 删除阿里云下的对应的图片名称

            // 删除缓存服务器的数据 
            $listkey = 'PHP19LIST:php19ARTICLE'; // 链表名字
            $hashkey = 'PHP19HASH:php19ARTICLE'; //嘻哈表名
            Redis::lrem($listkey,0,$value); // 删除链表的id
            Redis::del($hashkey.$value); // 删除嘻哈表的数据

            // 删除七牛云库里的图片
            $info = Article::where('id','=',$value)->first(); // 查询数据
            $img = $info->thumb; // 获取图片路径
            $imgurl = str_replace("http://q0ngaiml2.bkt.clouddn.com/","",$img);
            Storage::disk('qiniu')->delete($imgurl); // 删除七牛云库的图片
            Article::where('id','=',$value)->delete(); // 删除数据

        }
        echo 1;
    }

    // 缓存 redis 测试
    public function rediss()
    {
        Redis::set('user', 'guwenjie');
    }
    
}
