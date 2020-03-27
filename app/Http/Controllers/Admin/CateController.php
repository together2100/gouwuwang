<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use App\Models\Cate;

class CateController extends Controller
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
        return view('admin.admincate.index',['cate'=>self::getCate()]); // 分类首页
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input('id',0);
        return view('admin.admincate.add',['id'=>$id,'cate'=>self::getCate()]); // 分类添加页面
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pid = $request->input('pid','0');
        if($pid == 0){
            $path = 0;
        }else{
            $parent_data = Cate::find($pid); // 查找父级pid
            $path = $parent_data->path.','.$parent_data->id; // 添加下一级的分类id
        }

        $cate['name'] = $request->input('name');  // 分类名称
        $cate['pid'] = $pid; // 获取父级id
        $cate['path'] = $path; // 获取分级id
        $cate['status'] = $request->input('status'); // 获取状态
        $res = Cate::create($cate); // 添加数据
        if($res){
            return redirect('/admincate')->with('success','添加分类成功');
        }else{
            return back()->with('error','添加分类失败');
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

    // 测试image组件
    public function inter()
    {
        $image = new ImageManager(); // 实例化ImageManager
        // $image->make('./uploads/2.jpg')->resize(100,100)->save('./img/2.jpg'); // 裁剪
        // $image->make('./uploads/2.jpg')->insert('./uploads/3.jpg','bottom-rigth',15,10)
        // ->save('./img/3.jpg'); // 图片水印
    }

}
