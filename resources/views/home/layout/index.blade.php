<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>首页</title>

		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/h/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/h/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/h/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/h/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

       
		<link type="text/css" href="/h/css/optstyle.css" rel="stylesheet" />
		<link type="text/css" href="/h/css/style.css" rel="stylesheet" />

		<link href="/h/css/cartstyle.css" rel="stylesheet" type="text/css" />
		
		 <!-- <link href="/h/css/jsstyle.css" rel="stylesheet" type="text/css" /> -->
		<script type="text/javascript" src="/h/js/address.js"></script> 

		<link href="/h/css/sustyle.css" rel="stylesheet" type="text/css" />
		<!-- <script type="text/javascript" src="/h/basic/js/jquery-1.7.min.js"></script> -->
		<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/h/css/infstyle.css" rel="stylesheet" type="text/css">

		<link href="/h/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/h/css/systyle.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div class="hmtop">
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
						@if(session('username'))
						<a href="" target="_top" class="h">Hello！{{ session('username') }}</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="/logout" target="_top">退出</a>
						@else
							<a href="/homelogin/create" target="_top" class="h">亲，请登录</a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="/homeregister" target="_top">免费注册</a>
						@endif
						</div>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="/home" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="/homeusers" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd"><a id="mc-menu-hd" href="/homecart" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
				</div>
        </div>

            @section('main')
            @show
				

   
                <div class="clear"></div>
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="/home ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>


		<!--引导 -->
		<div class="navCir">
			<li class="active"><a href="/home"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="/h/sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="/homecart"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="/h/person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>


		<!--菜单 -->
		<div class=tip>
			<div id="sidebar">
				<div id="wrap">
					<div id="prof" class="item ">
						<a href="# ">
							<span class="setting "></span>
						</a>
						<div class="ibar_login_box status_login ">
							<div class="avatar_box ">
								<p class="avatar_imgbox "><img src="/h/images/no-img_mid_.jpg " /></p>
								<ul class="user_info ">
									<li>用户名sl1903</li>
									<li>级&nbsp;别普通会员</li>
								</ul>
							</div>
							<div class="login_btnbox ">
								<a href="# " class="login_order ">我的订单</a>
								<a href="# " class="login_favorite ">我的收藏</a>
							</div>
							<i class="icon_arrow_white "></i>
						</div>

					</div>
					<div id="shopCart " class="item ">
						<a href="# ">
							<span class="message "></span>
						</a>
						<p>
							购物车
						</p>
						<p class="cart_num ">0</p>
					</div>
					<div id="asset " class="item ">
						<a href="# ">
							<span class="view "></span>
						</a>
						<div class="mp_tooltip ">
							我的资产
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="foot " class="item ">
						<a href="# ">
							<span class="zuji "></span>
						</a>
						<div class="mp_tooltip ">
							我的足迹
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="brand " class="item ">
						<a href="#">
							<span class="wdsc "><img src="/h/images/wdsc.png " /></span>
						</a>
						<div class="mp_tooltip ">
							我的收藏
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="broadcast " class="item ">
						<a href="# ">
							<span class="chongzhi "><img src="/h/images/chongzhi.png " /></span>
						</a>
						<div class="mp_tooltip ">
							我要充值
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div class="quick_toggle ">
						<li class="qtitem ">
							<a href="# "><span class="kfzx "></span></a>
							<div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
						</li>
						<!--二维码 -->
						<li class="qtitem ">
							<a href="#none "><span class="mpbtn_qrcode "></span></a>
							<div class="mp_qrcode " style="display:none; "><img src="/h/images/weixin_code_145.png " /><i class="icon_arrow_white "></i></div>
						</li>
						<li class="qtitem ">
							<a href="#top " class="return_top "><span class="top "></span></a>
						</li>
					</div>

					<!--回到顶部 -->
					<div id="quick_links_pop " class="quick_links_pop hide "></div>

				</div>

			</div>
			<div id="prof-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					我
				</div>
			</div>
			<div id="shopCart-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					购物车
				</div>
			</div>
			<div id="asset-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					资产
				</div>

				<div class="ia-head-list ">
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">优惠券</div>
					</a>
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">红包</div>
					</a>
					<a href="# " target="_blank " class="pl money ">
						<div class="num ">￥0</div>
						<div class="text ">余额</div>
					</a>
				</div>

			</div>
			<div id="foot-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					足迹
				</div>
			</div>
			<div id="brand-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					收藏
				</div>
			</div>
			<div id="broadcast-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					充值
				</div>
			</div>
		</div>
		<script>
			window.jQuery || document.write('<script src="/h/basic/js/jquery.min.js "><\/script>');
		</script>
		<script type="text/javascript " src="/h/basic/js/quick_links.js "></script>
	</body>

</html>