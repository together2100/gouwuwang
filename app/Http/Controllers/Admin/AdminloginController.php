<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;

class AdminloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->pull('isadmin'); // 清除session
        return redirect('/adminlogin/create'); // 退出
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminlogin.login'); // 加载登录页面
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name =  $request->input('name');
        $password = $request->input('password');
        $row = DB::table('admin_users')->where('name','=',$name)->first();
        if($row){
            if(Hash::check($password,$row->password)){
                session(['isadmin'=>$name]); // 把用户名存进session
                $list = DB::select("select * from user_role as ur, role_node as rn, node as n
                where ur.rid = rn.rid and rn.nid = n.id and uid={$row->id}"); // 把用户的权限都查询出来
                // dd($list);
                $nodelist['IndexController'][] = 'index'; // 后去后台首页的权限
                foreach($list as $key => $value){
                    $nodelist[$value->mname][] = $value->aname; 
                    if($value->aname == 'create'){
                        $nodelist[$value->mname][] = 'store'; 
                    }
                    if($value->aname == 'edit'){
                        $nodelist[$value->mname][] = 'update'; 
                    }
                }
                // dd($nodelist);
                if($value->aname == 'create'){
                        $nodelist[$value->mname][] = 'store'; 
                    }
                session(['nodelist'=>$nodelist]); // 把权限方法存在session里

                return redirect('/admin')->with('success','登录成功');
            }else{
                return back()->with('error','用户或密码有误');
            }
        }else{
            return back()->with('error','用户名或密码有误');
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
