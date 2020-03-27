<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order; // 订单表
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $k = $request->input('keywords');
        $data = Order::where('order_num','like','%'.$k.'%')->paginate(3);
        // foreach($data as $key => $value){
        //     $user = DB::table('users_info')->where('user_id','=',$value['user_id'])->first();
        //     $address = DB::table('addresss')->where('id','=',$value['address_id'])->first();
        //     $shop = DB::table('shops')->where('id','=',$value['shop_id'])->first();
        //     $value['user_id'] = $user->username;
        //     $value['shop_id'] = $shop->name;
        //     $value['address_id'] = '收货人：'.$address->name.'电话：'.$address->phone.
        //     '收货地址：'.$address->huo.$address->xhuo;
        // }
        // dump($data);
        return view('admin.order.index',['data'=>$data,'request'=>$request->all(),'k'=>$k]); // 前台用户列表页面
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $data = Order::where('id','=',$id)->first();
        return view('admin.order.edit',['data'=>$data]); // 修改订单页面
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
        $data['status'] = $request->input('status'); // 获取订单状态
        $res = Order::find($id)->update($data); // 更新订单
        if($res){
            return redirect('/orders')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败，请等会再试');
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
        $row = Order::find($id)->delete();
        if($row){
            return redirect('/orders')->with('success','删除成功'); // 删除数据
        }else{
          return back()->with('error','删除失败');  
        }
    }
}
