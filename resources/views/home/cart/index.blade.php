
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/h/css/optstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/h/js/jquery.js"></script>

	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
						@if(session('username'))
						<a href="" target="_top" class="h">Hello！{{ session('username') }}</a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="/logout" target="_top">退出</a>
						@else
							<a href="/homelogin/create" target="_top" class="h">亲，请登录</a>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
						<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd"><a id="mc-menu-hd" href="/homecart" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
				</div>
			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/h/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/h/images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
                    <div class="clear"></div>
                @if(count($data))
               
				<!-- 购物车开始 -->
				<div id="bbs">
                @foreach($data as $row)
					<tr class="item-list">
						<div class="bundle  bundle-last">
							<div class="bundle-main">
								<ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check" id="J_CheckBox_170037950254" name="items" value="{{ $row['id'] }}" type="checkbox" checked>
											<label for="J_CheckBox_170037950254"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" target="_blank" class="J_MakePoint" data-point="tbcart.8.12">
												<img src="{{ $row['pic'] }}" width="80px" height="80px" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
                                                <a href="#" target="_blank" title="" class="item-title J_MakePoint" data-point="tbcart.8.11">
                                                 {{ $row['name'] }}</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
                                        {!!$row['descr']!!}
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="price-original">{{ $row['price'] }}</em>
												</div>
												<div class="price-line">
												￥<em class="J_Price price-now" tabindex="0">{{ $row['price'] }}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="min am-btn numdown" name="{{ $row['id'] }}" type="button" value="-" />
													<input class="texshopt_box number shops_num" name="" type="text" value="{{ $row['num'] }}" style="width:30px;" />
													<input class="add am-btn numup" name="{{ $row['id'] }}" type="button" value="+" />
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">总计：
											<em tabindex="0" class="J_ItemSum number">{{ $row['price']*$row['num'] }}</em>元
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<a title="移入收藏夹" class="btn-fav" href="#">移入收藏夹</a>
											<a href="javascript:void(0)" data-point-url="#" name="{{ $row['id'] }}" class="cartdel">删除</a>
										</div>
									</li>
								</ul>
													
							</div>
						</div>
					</tr>
					<div class="clear"></div>
				@endforeach
				</div>
                @else
				购物车空空如也
                @endif
                    <!-- 购物车结束  -->


				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<input class="check-all check" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox" checked>
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span>全选</span>
					</div>
					<div class="operations">
						<a href="/alldel" hidefocus="true" class="deleteAll">全部删除</a>
						<a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
						<a href="/home"  class="">继续购物</a>
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">{{ $total['num'] }}</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">{{ $total['sum'] }}</em></strong>
						</div>
						<div class="btn-area">
							<a href="" id="J_GO" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

				</div>

				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有</em>
						</p>
					</div>
				</div>

			</div>


		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li class="active"><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
	</body>

</html>

<script>

</script>

<!-- <script>
	// 商品减一
	$('.numdown').click(function (){
		o = $(this);
		numdowm = $(this).next('input').val();
		a = numdowm - 1;
		if(a <= 1){
			a = 1;
		}
		$(this).next('input').val(a); // 减一
		id = $(this).attr('name');
		$.get('/homecartnum',{id:id,num:a},function (data){
			// alert(data);
			o.parents('li').next('li').find('em').html(data.tot);
		},'json');
	});

	// 商品加一
	$('.numup').click(function (){
		oo = $(this);
		numup = $(this).prev('input').val(); 
		b = Number(numup) + 1;
		$(this).prev('input').val(b); // 加一
		id = $(this).attr('name');
		$.get('/homecartnum',{id:id,num:b},function (data){
			// alert(data);
			oo.parents('li').next('li').find('em').html(data.tot);
		},'json');
	});

	// // 总价
	// arr = [];
	// $('.J_ItemSum').each(function (){
	// 	num = Number($(this).html());
	// 	arr.push(num);
	// });
	// 	sum = 0;
	// 	for(var i = 0; i < arr.length; i++){
	// 		sum +=arr[i];
	// 	}
	// 	console.log(sum);

	// 删除单行商品
	$('.cartdel').click(function (){
		d = $(this);
		id = $(this).attr('name'); // 获取商品ID
		// alert(id);
		$.get('/homecartdel',{id:id},function (data){
			if(data.msg == 'ok'){
				d.parents('ul').remove();
			}else{
				$('#bbs').html('购物车空空如也');
			}
		},'json');
	});

	// 结算
	$('#J_GO').click(function (){
	if($("input[name='items']").is(':checked')){
		$.get('/jiesuan',{arr:arr},function (data){
			if(data){
				window.location = '/homeorder/insert'; // 跳转结算页面
			}
		});
	}else{
		alert('请至少选择一条');
	}
	});

	// 铨选
	$(".check-all").change(function (){
	$("input[name='items']").attr('checked',this.checked);
	a = $('#J_Total').html();
	b = $('#J_SelectedItemsCount').html();

	});
</script> -->

<!-- <script>
	// numdown 减  numup 加
	$('.numdown').click(function (){
		o = $(this);
		id=$(this).attr('name'); // 获取商品id
		$.get('/homecartdown',{id:id},function (data){
			o.next('input').val(data.num); // 返回减去的数量
			o.parents('li').next('li').find('em').html('总计：' + data.tot + '元'); 
			if($("input[name='items']").is('checked',true)){
				$('#J_SelectedItemsCount').html(data.num);
				$('#J_Total').html('总计：'+data.tot+'元');
			}
		},'json');
	});

	$('.numup').click(function (){
		oo = $(this);
		id=$(this).attr('name'); // 获取商品id
		$.get('/homecartup',{id:id},function (data){
			// alert(data);
			oo.prev('input').val(data.num); // 返回加1的数量
			oo.parents('li').next('li').find('em').html('总计：' + data.tot + '元'); //  
		},'json');
	});

	// 删除单行商品
	$('.cartdel').click(function (){
		d = $(this);
		id = $(this).attr('name'); // 获取商品ID
		// alert(id);
		$.get('/homecartdel',{id:id},function (data){
			if(data.msg == 'ok'){
				d.parents('ul').remove();
			}else{
				$('#bbs').html('购物车空空如也');
			}
		},'json');
	});

	// 删除多行
	arr = [];
	$("input[name='items']").change(function (){
		if($(this).attr("checked")){
			id = $(this).val();
			arr.push(id);
		}else{
			id1 = $(this).val();
			Array.prototype.indexOf = function (val){
				for(var i = 0; i < this.length; i++){
					if(this[i] == val) return i;
				}
				return -1;
			};
			Array.prototype.remove = function (val){
				var index = this.indexOf(val);
				if(index >-1){
					this.splice(index,1);
				}
			};
			arr.remove(id1);
		}
		
		$.get('/tot',{arr:arr},function (data){
			$('#J_SelectedItemsCount').html(data.nums);
			$('#J_Total').html(data.sum);
		},'json');
	});

	// 结算
	$('#J_GO').click(function (){
		if($("input[name='items']").is(':checked')){
			$.get('/jiesuan',{arr:arr},function (data){
				if(data){
					window.location = '/homeorder/insert'; // 跳转结算页面
				}
			});
		}else{
			alert('请至少选择一条');
		}
	});

	// 铨选
	$(".check-all").change(function (){
		$("input[name='items']").attr('checked',this.checked);

	})
</script> -->
