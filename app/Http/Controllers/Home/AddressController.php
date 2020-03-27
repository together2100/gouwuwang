<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Address;

class AddressController extends Controller
{

    // 收货地址
    public function insert(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = session('user_id');
        preg_match_all('/[\x{4e00}-\x{9fff}]+/u',$data['huo'],$matchs); // 把除了汉字以外的字符都过滤
        $str=join('',$matchs[0]);
        $data['huo'] = $str;
        // dd($data);
        // DB::table('addresss')->insert($data); // 插入用户收货地址数据
        Address::create($data);
        return redirect('/homeorder/insert');
    }

    // 全国联动地址
    public function address(Request $request)
    {
        $upid = $request->input('upid');
        $address = DB::table('district')->where('upid','=',$upid)->get();
        return response()->json($address);
    }

    // 切换收货地址
    public function chooseaddress(Request $request)
    {
        $id = $request->input('id');
        $data = Address::find($id);
        echo json_encode($data);
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
