<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adminusers;
use Hash;
use App\Models\Role;
use DB;

class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $k = $request->input('keywords');
        $data = Adminusers::where('name','like','%'.$k.'%')->paginate(3);
        // $role = DB::table('admin_users')
        //     ->join('user_role','admin_users.id', '=', 'user_role.uid')
        //     ->join('role','role.id','=','user_role.rid')
        //     ->select('role.name')
        //     ->get();
        // dd($role);
        return view('admin.adminuser.index',['data'=>$data,
        'request'=>$request->all(),'k'=>$k]); // 管理员列表页面
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminuser.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']); // 去掉获取数据的_token值
        $data['password'] = Hash::make($data['password']); // 给密码加密
        if(Adminusers::create($data)){
            return redirect('/adminuser')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        echo 'a';
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
        if(Adminusers::where('id','=',$id)->delete()){
            return redirect('/adminuser')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    // 分配角色
    public function role($id)
    {
        $user = Adminusers::find($id);  // 获取用户的信息
        $role = Role::get(); // 获取角色的全部信息
        $data = DB::table('user_role')->where('uid','=',$id)->get();  // 获取用户已有的角色
        $rids = []; 
        if(count($data)){ // 如果有角色就遍历
            foreach($data as $key =>$value){
                $rids[] = $value->rid;
            }
        }
        return view('admin.adminuser.role',['user'=>$user,'role'=>$role,'rids'=>$rids]); // 加载角色分配页面
    }

    // 保存角色
    public function saverole(Request $request)
    {
       $role = $request->input('rids'); // 获取角色的属性
       DB::table('user_role')->where('uid','=',$request->input('uid'))->delete(); // 删除用户已有的角色属性
       foreach($role as $key => $value){
           $data['uid'] = $request->input('uid'); // 获取用户ID
           $data['rid'] = $value;
           DB::table('user_role')->insert($data); // 更新用户的角色属性
       }
       return redirect('/adminuser')->with('success','添加角色成功');
    }


}
