<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shops; // 商品数据库
use App\Models\Order; // 新订单库
use App\Models\Orders; // 订单库
use App\Models\Orders_shop; // 订单详情库
use DB;

class OrderController extends Controller
{

    // 单个商品结算页面
    public function buy(Request $request)
    {
        // dump($request->all());
        $d = Shops::find($request->input('id')); // 查找商品数据
        $d->num = $request->input('num'); // 购买数量
        $tot = $request->input('num') * $d->price; // 总价
        // dd($d);
        $address = DB::table('addresss')->where('user_id','=',session('user_id'))->get();
        $addressfirst = DB::table('addresss')->where('user_id','=',session('user_id'))->first();
        return view('home.order.buy',['data'=>$d,'address'=>$address,
        'addressfirst'=>$addressfirst,'tot'=>$tot]); // 加载结算页面
    }

    // 结算？
    public function jiesuan(Request $request)
    {
        $request->session()->pull('shops');
        $arr = $_GET['arr']; //获取选中的商品ID
        $data3 = array();
        foreach($arr as $key => $value){
            $cart = session('shopcart'); // 获取购物车的所有信息
            foreach($cart as $k => $v){
                if($v['id'] == $value){
                    $data3[$k]['num'] = $cart[$k]['num'];
                    $data3[$k]['id'] = $value;
                }
            }
        }
        $request->session()->push('shops',$data3); // 把选中的商品数据存在session
        echo json_encode($data3);
    }

    // 结算页面
    public function insert()
    {
        $shops = session('shops'); // 取出session的商品数量和ID
        // dd($shops);
        $tot = "0";
        foreach($shops[0] as $key => $value){
            $id = $value['id']; // 获取商品Id
            $info = Shops::where('id','=',$id)->first();
            $temp['num'] = $value['num'];  //数量
            $temp['pic'] = $info->pic; // 图片
            $temp['name'] = $info->name; // 名称
            $temp['price'] = $info->price; //单价
            $tot += $temp['num']*$temp['price'];
            $d[] = $temp;
        }
        // dd($d);
        // dd($tot);
        $address = DB::table('addresss')->where('user_id','=',session('user_id'))->get();
        $addressfirst = DB::table('addresss')->where('user_id','=',session('user_id'))->first();
        return view('home.order.index',['data'=>$d,'address'=>$address,
        'addressfirst'=>$addressfirst,'tot'=>$tot]); // 加载结算页面
    }

    // 订单操作
    public function orderinsert(Request $request)
    {
        DB::beginTransaction(); // 开启事务
        $data['address_id'] = $request->input('address_id'); // 地址id
        $data['order_num'] = time()+rand(1,10000); // 订单号
        $data['user_id'] = session('user_id'); // 用户id
        $data['status'] = "0"; // 订单状态
        $id = DB::table('orders')->insertGetId($data); // 插入数据获取id
        
        
        $tot = 0;
        $shops = session('shops'); // 获取商品信息
            foreach($shops[0] as $key => $value){
                $order['order_id'] = $id; // 获取订单id
                $order['shops_id'] = $value['id']; // 每个商品的id
                $order['num'] = $value['num']; // 商品数量
                $info = Shops::find($value['id']); // 查找商品
                $order['name'] = $info->name; // 商品名称
                $order['pic'] = $info->pic; // 图片
                $tot += $order['num']*$info->price; // 总价格
                // Orders_shop::create($order); // 添加订单详情
                $d[] = $order;
            }
            // dd($d); // 测试
            // dd($tot);
            $res = Orders_shop::insert($d); // 添加订单详情
            if($id && $res){
                DB::commit(); // 事务提交
                session(['tot'=>$tot]); // 把价格放进session
                session(['address_id'=>$data['address_id']]); // 收货地址id
                session(['order_id'=>$id]); // 订单id
                pay($data['order_num'],"支付商品","0.01","商品支付"); // 支付页面
            }else{
                DB::rollBack(); // 事务回滚
                return back()->with('error','系统繁忙，请稍后再试');
            }
        
    }

    // 支付测试
    public function pay(){
        pay(time(),"支付商品","0.01","付款金额");
    }

    // // 支付成功返回通知
    // public function returnurl()
    // {
    //     $tot = session('tot');
    //     $address_id = session('address_id');
    //     $address = DB::table('addresss')->where('id','=',$address_id)->first();
    //     $order_id = session('order_id');
    //     $data['status'] = "1";
    //     DB::table('orders')->where('id','=',$order_id)->update($data); // 更新订单状态 
    //     // dump($tot);
    //     // dump($address);
    //     // dump($order_id);
    //      return view('home.order.success',['tot'=>$tot,'address'=>$address]); // 返回订单完成页面
    // }

    // 新订单支付成功返回通知
    public function returnurl(Request $request)
    {
        dump($request->all());
        dump(session('order_num'));
        $num = session('order_num'); // 获得订单号
        $status['status'] = 1; // 付款成功，1
        $res = Order::where('order_num','=',$num)->update($status); // 更新订单状态，还没验证
        $info = Order::where('order_num','=',$num)->first(); // 查找订单数据
        if($info){
            $address = DB::table('addresss')->where('id','=',$info->address_id)->first(); // 用户地址
            $data['total'] = $info->total; // 付款金额
            $data['name'] = $address->name; // 收货人
            $data['phone'] = $address->phone; // 电话
            $data['huo'] = $address->huo.$address->xhuo; // 收货地址
        }
        return view('home.order.success',['data'=>$data]); // 付款成功页面
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dump($request->all());
        $data['order_num'] = time()+rand(1,10000); // 生成订单号
        $data['address_id'] = $request->input('address_id'); // 地址ID
        $data['user_id'] = session('user_id'); // 用户ID
        $data['shop_id'] = $request->input('shop_id'); //商品ID
        $data['num'] = $request->input('num'); // 商品数量
        $data['total'] = $request->input('total'); // 商品数量
        $data['status'] = "0"; // 订单状态
        // dd($data);
        $row = Order::create($data);
        if($row){
            session(['order_num'=>$data['order_num']]); // 把订单号存进session
            pay($data['order_num'],"支付商品","0.01","商品支付"); // 支付页面
        }else{
            return back()->with('error','系统繁忙，请稍后再试');
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
