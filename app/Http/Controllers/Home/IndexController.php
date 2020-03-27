<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shops;
use DB;

class IndexController extends Controller
{
    // 无限递归数据遍历
    public static function getCateByPid($pid)
    {
        $cate = DB::table('cate')->where('pid','=',$pid)->get();
        $data = [];
        foreach($cate as $key => $value){
            $value->suv = self::getCateByPid($value->id);
            $data[] = $value;
        }
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = self::getCateByPid(0); // 调用
        // dd($cate); // 测试
        $cates = DB::table('cate')->where('pid','=',0)->get();  // 获取一级分类
    
        foreach($cates as $k => $v){
            $shop[] = DB::table('shops')->join('cate','shops.cate_id','=','cate.id')->
            select('cate.id as cid','cate.name as cname','shops.id as sid','shops.name as sname',
            'shops.pic','shops.descr','shops.price','shops.num')->
            where('shops.cate_id','=',$v->id)->get();
           
        }
        // dd($shop); // 测试
        return view('home.index.index',['cate'=>$cate,'shop'=>$shop]); // 加载前台首页
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = DB::table('shops')->find($id);
        return view('home.index.info',['data'=>$info]); // 商品详情页面
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
