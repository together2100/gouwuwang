<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use App\Models\Homeuser;
use Str;
use Mail;
use DB;
use Hash;

class RegisterController extends Controller
{

    // 邮箱注册验证码
    public function code()
    {
       ob_clean();//清除操作
       $builder = new CaptchaBuilder;
       //可以设置图片宽高及字体
       $builder->build($width = 100, $height = 40, $font = null);
       //获取验证码的内容
       $phrase = $builder->getPhrase();

       //把内容存入session
       session(['vcode'=>$phrase]);
       //生成图片
       header("Cache-Control: no-cache, must-revalidate");
       header('Content-Type: image/jpeg');
       $builder->output();
       // die;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.register.index'); // 注册页面
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

    // 发送激活邮件
    public function sendMail($email,$id,$token)
    {
        Mail::send('home.register.email',['id'=>$id,'token'=>$token],
        function ($message)use($email){
            $message->to($email);
            $message->subject('激活用户');
        });
        return true;
    }

    // 邮箱激活
    public function changeStatus($id,$token)
    {
        $user = Homeuser::find($id);
        if($token == $user->token){
            $user->status = 1;
             $user->token = Str::random(50); 
            $res = $user->save();
            if($res){
                echo "用户激活成功";
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
        // 邮箱注册
        $pass = $request->input('upass');
        $repass = $request->input('repass');
        $code = $request->input('code');
        $vcode = session('vcode');
        if($vcode == $code){
            $data['email'] = $request->input('email');
            $data['pass'] = Hash::make($request->input('upass'));
            // $data['name'] = '用户'.rand('123456789','987654321');
            $data['status'] = 0;
            $data['token'] = Str::random(50); 
            $row = Homeuser::create($data);
            $id =$row->id;
            if($row){
                $res = $this->sendMail($data['email'],$id,$data['token']);
                if($res){
                    return redirect("https://mail.qq.com/"); // 重定向匹配邮箱没有做
                }else{
                    return back()->with('error','发送失败，请重新发送');
                }
            }else{
                return back()->with('error','注册失败！');
            }
        }else{
            return back()->with('error','输入的验证码有误，请重新输入');
        }
    }

    // 检测手机号是否被注册
    public function checkPhone(Request $request)
    {
        $phone = $request->input('phone');
        $arr = Homeuser::pluck("phone")->toArray();
        if(in_array($phone,$arr)){
            echo 1; // 手机号被注册
        }else{
            echo 0; // 手机号可以注册
        }
    }

    //  发送手机验证码
    public function sendp(Request $request)
    {
        $p = $request->input('p'); // 获取手机号码
        phone($p); // 调用短信函数，发送验证码
        
    }

    // 检测手机验证码
    public function checkCode(Request $request)
    {
        $code = $request->input('code');
        if(isset($_COOKIE['pcode']) && !empty($code)){
            $pcode = $request->cookie('pcode');
            if($code == $pcode){
                echo 1; // 验证码相同
            }else{
                echo 2; // 验证码不同
            }
        }else if(empty($code)){
            echo 3; // 验证码空
        }else{
            echo 4; // 验证码过期
        }
    }

     // 手机注册
     public function storePhone(Request $request)
     {
         dump($request->all());
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
