<!DOCTYPE html>
<html>
 <head lang="en"> 
  <meta charset="UTF-8" /> 
  <title>注册</title> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <link rel="stylesheet" href="/h/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
  <link rel="stylesheet" href="/h/bootstrap/css/bootstrap.min.css" />
  <link href="/h/css/dlstyle.css" rel="stylesheet" type="text/css" /> 
  <script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script> 
  <script src="/h/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script> 
  <style>
    .cur{
      border: 1px solid red;
    }

    .curs{
      border: 1px solid green;
    }
  </style>
 </head> 
 <body> 
  <div class="login-boxtitle"> 
   <a href="/h/home/demo.html"><img alt="" src="/h/images/logobig.png" /></a> 
  </div> 
  <div class="res-banner"> 
   <div class="res-main"> 
    <div class="login-banner-bg">
     <span></span>
     <img src="/h/images/big.jpg" />
    </div> 
    <div class="login-box"> 
     <div class="am-tabs" id="doc-my-tabs"> 
      <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify"> 
       <li class="am-active"><a href="#">邮箱注册</a></li> 
       <li><a href="#">手机号注册</a></li> 
      </ul> 
      <div class="am-tabs-bd"> 
       <div class="am-tab-panel am-active"> 
		<form method="post" action="/homeregister"> 
      {{ csrf_field() }}
      @if(session('error'))
      {{ session('error') }}
      @endif
			<div class="user-email"> 
			<label for="email"><i class="am-icon-envelope-o"></i></label> 
			<input type="email" name="email" placeholder="请输入邮箱账号" /> 
			</div> 
			<div class="user-pass"> 
			<label for="password"><i class="am-icon-lock"></i></label> 
			<input type="password" name="upass" placeholder="设置密码" /> 
			</div> 
			<div class="user-pass"> 
			<label for="passwordRepeat"><i class="am-icon-lock"></i></label> 
			<input type="password" name="repass" placeholder="确认密码" /> 
      </div> 
      <img src="/code" alt="" onclick="this.src=this.src+'?a=1'">
      <div class="verification"> 
        <label for=""><i class="am-icon-code-fork"></i></label> 
          <input type="text" name="code" placeholder="请输入验证码"> 
         </div>
			<div class="am-cf"> 
					<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl" /> 
			</div> 
		</form> 
			<div class="login-links"> 
				<label for="reader-me"> <input id="reader-me" type="checkbox" /> 点击表示您同意商城《服务协议》 </label> 
				</div> 
			</div> 
       <div class="am-tab-panel"> 
        <form method="post" action="/storePhone" id="ff"> 
        {{ csrf_field() }}
         <div class="user-phone"> 
          <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label> 
          <input type="tel" name="phone" id="phone" names="phone" reminder="请输入手机号" placeholder="请输入手机号" /> 
          <span></span>
        </div> 
         <div class="verification"> 
          <label for="code"><i class="am-icon-code-fork"></i></label> 
          <input type="tel" name="code" id="code" names="phone" reminder="请输入验证码" placeholder="请输入验证码" /> 
          <span></span>
          <i  class="btn btn-info" style="float:right" id="ss">获取</i> 
        </div> 
         <div class="user-pass"> 
          <label for="password"><i class="am-icon-lock"></i></label> 
          <input type="password" name="ppass" names="phone" reminder="请输入密码" placeholder="设置密码" /> 
          <span></span>
        </div> 
         <div class="user-pass"> 
          <label for="passwordRepeat"><i class="am-icon-lock"></i></label> 
          <input type="password" name="prepass" names="phone" reminder="请输入确认密码" placeholder="确认密码" /> 
          <span></span>
        </div> 
		 <div class="am-cf"> 
		  <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl" /> 
		 </div> 
        </form> 
        <div class="login-links"> 
         <label for="reader-me"> <input id="reader-me" type="checkbox" /> 点击表示您同意商城《服务协议》 </label> 
        </div> 
        <hr /> 
       </div> 
       <script>
				$(function() {
					$('#doc-my-tabs').tabs();
        	})
        
    </script>

		<script>
    PHONE1 = false; // 手机号
    CODE1 = false; // 验证码
    PASSWORD2 = false; // 密码
    REPASSWORD2 = false; // 确认密码
        $("input[names='phone']").focus(function (){
          var reminder = $(this).attr("reminder");
          $(this).next("span").css('color',"red").html(reminder);
          $(this).addClass("cur"); // 添加类的样式
          $(this).removeClass("curs"); // 清除样式
        });
        $("input[name='phone']").blur(function (){
            phone = $(this).val();
            o=$(this);
            if(phone.match(/^\d{11}$/) == null){
              $(this).next("span").css('color','red').html('手机格式不正确');
              $(this).addClass("cur");
              PHONE1 = false;
            }else{
              $.get("/checkPhone",{phone:phone},function (data){
                // alert(data); });
                 if(data == 1){
                   o.next("span").css('color','red').html('手机号已经被注册');
                   o.addClass("cur");
                   $('#ss').attr("disabled",true);
                   PHONE1 = false;
                 }else if(data == 0){
                   o.next("span").css('color','green').html('手机号OK');
                   o.addClass("curs");
                   $('#ss').attr("disabled",false);
                   PHONE1 = true;
                 }
              });
            }
        });
        // 手机验证码检测
      $("input[name='code']").blur(function (){
        code = $(this).val(); // 获取输入的验证码
        oo = $(this);
        $.get("/checkCode",{code:code},function (data){
             if(data == 1){
                   oo.next("span").css('color','green').html('验证码OK');
                   oo.addClass("curs");
                   CODE1 = true;
             }else if(data ==2){
                   oo.next("span").css('color','red').html('验证码有误');
                   oo.addClass("cur");
                   CODE1 = false;
             }else if(data == 3){
                  oo.next("span").css('color','red').html('验证码为空');
                  oo.addClass("cur");
                  CODE1 = false;
             }else if(data == 4){
                  oo.next("span").css('color','red').html('验证码过期');
                  oo.addClass("cur");
                  CODE1 = false;
             }
        });
      });

      b = $('#ss');
      b.click(function (){
        p = $("input[name='phone']").val();
          $.get("/sendp",{p:p},function (data){
            if(data.code == 000000){     
              var m = 60; // 按钮倒计时
          mytime = setInterval(function (){
              m -- ; 
              b.html(m + 's');
              b.attr("disabled",true);
               
                if(m == 0){
                  clearInterval(mytime); // 清除定时器
                  b.html('重新发送');
                  b.attr("disabled",false);
                }
              }, 100);
            }
          },'json');
        });

        // 密码检测
        $("input[name='ppass']").blur(function (){
          var ppass = $(this).val(); // 获取密码
          if(ppass.match(/^\w{6,18}$/) == null){
            $(this).next("span").css('color','red').html("密码必须6到18位");
            $(this).addClass("cur");
            PASSWORD2 = false;
          }else{
            $(this).next("span").css('color','green').html("密码OK");
            $(this).addClass("curs");
            PASSWORD2 = true;
          }
        });

        // 确认密码
        $("input[name='prepass']").blur(function (){
          var prepass = $(this).val(); // 获取密码
          var ppass = $("input[name='ppass']").val();
          if(prepass.match(/^\w{6,18}$/) == null){
            $(this).next("span").css('color','red').html("确认密码必须6到18位");
            $(this).addClass("cur");
            REPASSWORD2 = false;
          }else if(prepass == ppass){
            $(this).next("span").css('color','green').html("密码OK");
            $(this).addClass("curs");
            REPASSWORD2 = true;
          }else{
            $(this).next("span").css('color','red').html("密码不一致，请重新输入");
            $(this).addClass("cur");
            REPASSWORD2 = false;
          }
        });


        // 表单提交验证
        $('#ff').submit(function (){
          $("input[name='phone']").trigger("blur");
          if(PHONE1 && CODE1 && PASSWORD2 && REPASSWORD2){
            return true;
          }else{
            return false;
          }
          
        });
			
       </script> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="footer "> 
    <div class="footer-hd "> 
     <p> <a href="/h/# ">恒望科技</a> <b>|</b> <a href="/h/# ">商城首页</a> <b>|</b> <a href="/h/# ">支付宝</a> <b>|</b> <a href="/h/# ">物流</a> </p> 
    </div> 
    <div class="footer-bd "> 
     <p> <a href="/h/# ">关于恒望</a> <a href="/h/# ">合作伙伴</a> <a href="/h/# ">联系我们</a> <a href="/h/# ">网站地图</a> <em>&copy; 2015-2025 Hengwang.com 版权所有</em> </p> 
    </div> 
   </div>  
  </div>
 </body>
</html>