<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');});

Route::resource('/adminlogin','Admin\AdminloginController'); // 登录页面

Route::group(['middleware'=>'adminlogin'],function (){
    Route::get('/admin','Admin\IndexController@index'); // 后台首页
    Route::resource('/adminuser','Admin\AdminuserController'); // 管理员路由 
    Route::resource('/admincate','Admin\CateController'); // 分类模块
    Route::get('/role/{id}','Admin\AdminuserController@role'); // 角色分配模块
    Route::post('/saverole','Admin\AdminuserController@saverole'); // 角色分配模块
    Route::resource('/adminrole','Admin\RoleController'); // 角色列表
    Route::get('/roledel','Admin\RoleController@roledel'); // ajax 角色删除
    Route::get('/auth/{id}','Admin\RoleController@auth'); // 分配权限方法
    Route::post('/saveauth','Admin\RoleController@saveauth'); // 保存分配权限方法
    Route::resource('/adminnode','Admin\NodeController'); // 权限管理模块
    Route::resource('/article','Admin\ArticleController'); // 公告模块
    Route::get('/articledel','Admin\ArticleController@articledel'); // 公告批量删除
    // Route::get('/redis','Admin\ArticleController@rediss'); // 缓存测试
    Route::resource('/shops','Admin\ShopsController'); // 商品模块
    Route::resource('/users','Admin\UsersController'); // 前台用户模块
    Route::resource('/orders','Admin\OrdersController'); // 订单模块

    // Route::get('/inter','Admin\CateController@inter'); // 测试image组件

});

Route::resource('/home','Home\IndexController'); // 前台首页
Route::resource('/homeregister','Home\RegisterController'); // 注册模块
Route::get('/code','Home\RegisterController@code'); // 前台校验码
Route::get('/register/changeStatus/{id}/{token}','Home\RegisterController@changeStatus'); // 邮箱激活验证
Route::get("/checkPhone","Home\RegisterController@checkPhone"); // 检测手机号
Route::get("/sendp","Home\RegisterController@sendp"); // 发送验证码
Route::get("/checkCode","Home\RegisterController@checkCode"); // 检测手机验证码
Route::post("/storePhone","Home\RegisterController@storePhone"); // 检测手机验证码
Route::resource('/homelogin','Home\LoginController'); // 登录模块
Route::get('/logout','Home\LoginController@logout'); // 退出登录

Route::group(['middleware'=>'homelogin'],function (){
    Route::resource('/homecart','Home\CartController'); // 购物车模块
    Route::get('/alldel','Home\CartController@alldel'); // 全部删除
    // Route::get('/homecartdown','Home\CartController@homecartdown'); // 购物车减操作
    // Route::get('/homecartup','Home\CartController@homecartup'); // 购物车加操作
    Route::get('/homecartnum','Home\CartController@homecartnum'); // 购物车加减操作
    Route::get('/homecartdel','Home\CartController@homecartdel'); // 购物车删除单行商品
    Route::get('/tot','Home\CartController@tot'); // 购物车结算价格
    Route::get('/jiesuan','Home\OrderController@jiesuan'); // 购物车结算页面
    Route::get('/homeorder/insert','Home\OrderController@insert'); // 购物车结算页面
    Route::post('/homeorderbuy','Home\OrderController@buy'); // 商品结算页面
    Route::resource('/homeorder','Home\OrderController'); // 订单模块
    Route::post('/address/insert','Home\AddressController@insert'); // 收货地址
    Route::get('/address','Home\AddressController@address'); // 全国联动地址
    Route::get('/chooseaddress','Home\AddressController@chooseaddress'); // 切换收货地址
    Route::post('/order/create','Home\OrderController@orderinsert'); // 订单操作
    Route::get('/pay','Home\OrderController@pay'); // 订单支付测试
    Route::get('/returnurl','Home\OrderController@returnurl'); // 订单支付返回
    Route::resource('/homeusers','Home\UsersController'); // 个人中心模块
});