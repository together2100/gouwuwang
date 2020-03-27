<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Node;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::get(); //获取角色信息
        return view('admin.adminrole.index',['role'=>$role]); // 加载角色列表页面
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminrole.add'); // 添加角色页面
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $row = Role::create($data);
        if($row){
            return redirect('/adminrole')->with('success','添加角色成功');
        }else{
            return back()->with('error','添加角色失败');
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

    // ajax 删除方法
    public function roledel(Request $request)
    {
        $id = $request->input('id'); // 获取角色id
        // echo $id;
        if(Role::where('id','=',$id)->delete()){
            echo 1; // 删除角色的数据
        }
    }

    // 权限分配
    public function auth($id)
    {
        $role = Role::where('id','=',$id)->first(); // 获取角色
        $node = Node::get(); // 获取所有的权限
        // 获取当前角色已经有的权限
        $data = DB::table('role_node')->where('rid','=',$id)->get();
        // dd($data); // 测试打印
        $nids = []; // 用来接收权限值
        if(count($data)){
            foreach($data as $key =>$value){
                $nids[] = $value->nid;
            }
            return view('admin.adminrole.auth',['role'=>$role,'node'=>$node,'nids'=>$nids]); // 加载页面
        }
        return view('admin.adminrole.auth',['role'=>$role,'node'=>$node,'nids'=>array()]); // 加载角色权限页面
    }

    // 保存权限分配方法
    public function saveauth(Request $request)
    {
       $nids = $request->input('nids'); // 获取权限的值
        DB::table('role_node')->where('rid','=',$request->input('rid'))->delete(); // 删除之前的权限
       foreach($nids as $key =>$value){
           $data['rid'] = $request->input('rid'); // 把用户的ID 放进data
           $data['nid'] = $value; // 把权限值放进data
           $row = DB::table('role_node')->insert($data); // 更新权限
       }
       return redirect('/adminrole')->with('success','权限分配成功');
    }

}
