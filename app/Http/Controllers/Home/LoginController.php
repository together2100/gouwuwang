<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homeuser; // 用户注册表
use App\Models\Users_info; // 用户信息表
use Hash;
use Mail;
use Str;

class LoginController extends Controller
{
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
        return view('home.login.login'); // 加载登录页面
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('password');
        $row = Homeuser::where("email","=",$email)->first(); // 查找邮箱
        $user = Users_info::where('user_id','=',$row->id)->first(); // 查找用户信息
        if($user){
            session(['username'=>$user->nickname]); // 存储用户昵称
        }else{
            session(['username'=>$email]); // 用户没有昵称就用邮箱代替
        }
        if($row){
             if(Hash::check($pass,$row->pass)){
                if($row->status == 1){
                    session(['email'=>$email]);
                    session(['user_id'=>$row->id]);
                    return redirect('/home');
                }else{
                    return back()->with('error','用户尚未激活，请先激活');
                }
             }else{
                return back()->with('error','邮箱或密码错误');
             }
        }else{
            return back()->with('error','邮箱或密码错误');
        }
    }

    // 退出登录
    public function logout(Request $request)
    {
        $request->session()->flush(); // 清除session 数据
        return redirect('/home');
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
