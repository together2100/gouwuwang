<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users_info; // 个人中心表
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.users.index'); // 个人中心首页
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = session('user_id');
        $data = Users_info::where('user_id','=',$id)->first(); // 查找用户信息
        // $time= explode('-',$data->birthday); // 时间设置无效
        return view('home.users.edit',['data'=>$data]); // 个人信息页面
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 头像上传，没做
        $id = session('user_id'); // 获取用户登录的ID
        $data['nickname'] = $request->input('nickname'); // 昵称
        $data['username'] = $request->input('username'); // 用户名
        $data['user_id'] = $id; // 用户ID
        $data['sex'] = $request->input('sex'); // 性别
        $data['birthday'] = $request->input('YYYY').'-'.
        $request->input('MM').'-'.$request->input('DD'); // 生日
        $data['phone'] = $request->input('phone'); // 电话
        $data['email'] = $request->input('email'); // 邮箱
        // dd($data);
        $row = Users_info::create($data); 
        if($row){
            return redirect('/homeusers')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败，请稍后再试');
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
