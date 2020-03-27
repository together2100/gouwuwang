<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
use App\Models\Shops;
use DB;
use Markdown;

class ShopsController extends Controller
{

    // 共用函数
    public function getCate()
    {
        $cate = Cate::all();
        foreach($cate as $key => $value){
            $n = substr_count($value->path,','); // 查看path下有几个分类
            $cate[$key]->name = str_repeat('|---',$n).$value->name; // 给分类前面添加 |---
        }
        return $cate; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  // 方法一
        //  $shop = DB::table('cate')->join('shops','cate.id','=','shops.cate_id')
        //  ->select('cate.name as cname','shops.id','shops.name',
        //  'shops.pic','shops.descr','shops.num','shops.price')->get();
        // 需要使用箭头 {{ $row->id }}
        
        // 方法二
        $shop = Shops::all();
        $catename = DB::table('cate')->select('cate.name')->join('shops','cate.id','=','shops.cate_id')->get();
        foreach($catename as $k => $v){
            $shop[$k]['cate_id']= $v->name;
        }

        return view('admin.shops.index',['data'=>$shop]); // 加载商品首页
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shops.add',['cate'=>self::getCate()]); // 加载商品添加页面
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // newfile 上传图片名字
        // filepath 上传临时目录
        if($request->hasFile('pic')){
            $res = $request->file('pic'); // 获取上传的图片
            $filepath = $res->getRealPath(); //获取上传图片的临时目录
            $name = time()+rand(); // 给图片取名
            $ext = $request->file('pic')->getClientOriginalExtension(); // 获取图片后缀
            $newfile = $name.".".$ext; 
            
            // 上传图片到七牛
            \Storage::disk('qiniu')->writeStream($newfile, fopen($filepath, 'r'));
            
            $data['name'] = $request->input('name'); // 获取商品名称
            $data['cate_id'] = $request->input('cate_id'); // 获取类别
            $data['pic'] = env('QINIU_DOMAIN').$newfile; // 获取上传的图片路径
            $data['descr'] = Markdown::convertToHtml($request->input('descr')); // 获取描述内容
            $data['num'] = $request->input('num'); // 获取数量
            $data['price'] = $request->input('price'); // 获取价格
            $data1 = Shops::create($data); // 添加商品数据
            $id = $data1->id;
            $data['id'] = $id;
            if($id){
                // $listkey = 'PHP19LIST:php19ARTICLE'; // 链表名字 储存id
                // $hashkey = 'PHP19HASH:php19ARTICLE'; //嘻哈表名 title editor thumb descr
                // Redis::rpush($listkey,$id); // 
                // Redis::hmset($hashkey.$id,$data);
                return redirect('/shops')->with('success','添加商品成功');
            }else{
                return back()->with('error','添加商品失败');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
