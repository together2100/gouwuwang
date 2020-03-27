<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shops;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dump(session('shopcart'));
        $arr = [];
        $cart = session('shopcart');
        $total = ['num'=>'0','sum'=>'0'];
        if($cart){
            $a = 0;
            $b = 0;
            foreach($cart as $key => $value){
                $info = Shops::where('id','=',$value['id'])->first();
                $data['pic'] = $info->pic;
                $data['name'] = $info->name;
                $data['price'] = $info->price;
                $data['num'] = $value['num'];
                $data['descr'] = $info->descr;
                $data['id'] = $value['id'];
                $arr[] = $data;
                $a += $value['num'];
                $b += $value['total'];
                $total['num']  = $a;
                $total['sum']  = $b;
            }
        }
        // dd($a);
        // dump($total);
        return view('home.cart.index',['data'=>$arr,'total'=>$total]);
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

    // 去掉重复数据
    public static function checkExists($id)
    {
        $shopcart = session('shopcart'); // 获取购买的商品
        if(empty($shopcart)){
            return false;
        }
        foreach($shopcart as $key =>$value){
            if($value['id'] == $id){
                return true; // 表示已经购买
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 指导方法一
        // $data['id'] = $request->input('id');
        // $data['num'] = $request->input('num');

        // if(!$this->checkExists($data['id'])){
        //     $request->session()->push('shopcart',$data);
        // }
        // return redirect('/homecart');

        $id = $request->input('id');
        $shop = Shops::find($id);
        $data['id'] = $id;
        $data['num'] = $request->input('num');
        $data['price'] = $shop->price;
        $data['total'] = $request->input('num')*$shop->price;
        if(!$this->checkExists($data['id'])){
                $request->session()->push('shopcart',$data);
            }
            return redirect('/homecart');
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

    // 全部删除
    public function alldel(Request $request)
    {
        $request->session()->pull('shopcart'); // 删除session的购物车数据
        return redirect('/homecart');
    }

    // // 购物车减操作
    // public function homecartdown(Request $request)
    // {
    //     $id = $request->input('id'); // 获取商品ID
    //     $info = Shops::find($id); // 获取商品数据
    //     $cart = session('shopcart'); // 获取商品在购物车的信息
    //     foreach($cart as $key => $value){
    //         if($value['id'] == $id){
    //             $cart[$key]['num'] -= 1;
    //             if($cart[$key]['num'] <= 1){
    //                 $cart[$key]['num'] = 1;
    //             } 
    //             session(['shopcart'=>$cart]); // 重新赋值给session
    //             $data['num'] = $cart[$key]['num'];
    //             $data['tot'] = $cart[$key]['num']*$info->price; // 获取数量乘单价的价格
    //             echo json_encode($data);
    //         }
    //     } 
    // }

    public function homecartnum(Request $request)
    {
        $id = $request->input('id'); // 商品ID
        $num = $request->input('num'); // 商品数量 
        // $info = Shops::find($id); // 获取商品数据
        $cart = session('shopcart');
        foreach($cart as $key => $value){
            if($value['id'] == $id){
                $cart[$key]['num'] = $num; // 数量
                $cart[$key]['total'] = $num*$value['price']; // 总计
                $price = $value['price']; // 单价
            }
        }
        session(['shopcart'=>$cart]); // 重新赋值给session
        $data['tot'] = $num*$price; // 获取数量乘单价的价格
        echo json_encode($data);
    }

    // // 购物车加操作
    // public function homecartup(Request $request)
    // {
    //     $id = $request->input('id'); // 获取商品ID
    //     $num = $request->input('num'); // 商品数量
    //     $info = Shops::find($id); // 获取商品数据
    //     $cart = session('shopcart'); // 获取商品在购物车的信息
    //     foreach($cart as $key => $value){
    //         if($value['id'] == $id){
    //             $cart[$key]['num'] = $num;
    //         }
    //     } 
    //     session(['shopcart'=>$cart]); // 重新赋值给session
    //     $data['tot'] = $num*$info->price; // 获取数量乘单价的价格
    //     echo json_encode($data);
    // }


    // 购物车删除单行商品
    public function homecartdel(Request $request)
    {
        $id = $request->input('id'); // 商品ID
        $cart = session('shopcart'); // 购物车商品信息
        foreach($cart as $key => $value){
            if($value['id'] == $id ){
                unset($cart[$key]);
            }
        }
        session(['shopcart'=>$cart]); // 重新赋值
        if(empty(session('shopcart'))){
            return response()->json(['msg'=>'empty']);
        }else{
            return response()->json(['msg'=>'ok']);
        }
    }

    //  结算价格
    public function tot(Request $request)
    {
        // $arr = $request->input('arr');
        // echo json_encode($arr);
        if(isset($_GET['arr'])){
            $sum = 0; // 全部选中商品的总计价格
            $nums = 0; // 全部选中商品的数量
            foreach($_GET['arr'] as $row){
                $data = session('shopcart'); // 获取购物信息
                foreach($data as $key => $value){
                    if($value['id'] == $row){
                        $num = $data[$key]['num']; // 获取数量
                        $info = Shops::where('id','=',$row)->first();
                        $tot = $num*$info->price; // 每条商品总价格
                        $nums += $num; 
                        $sum += $tot;
                    }
                }
            }
            $data2['nums'] = $nums;
            $data2['sum'] = $sum;
            echo json_encode($data2);
        }else{
            $data2['nums'] = 0;
            $data2['sum'] = 0;
            echo json_encode($data2);
        }
    }

}
