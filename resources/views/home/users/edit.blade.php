@extends('home.layout.index')

@section('main')

						<!--悬浮搜索框-->

						<div class="nav white">
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
					</div>
				</div>
			</article>
		</header>
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<input type="file" class="inputPic" name="pic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<img class="am-circle am-img-thumbnail" src="/h/images/getAvatar.do.jpg" alt="" />
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>小叮当</i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
						            </span>
								</div>
							</div>
						</div>

						<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal"action="/homeusers" method="post" ecntype="multipart/form-data">
								{{ csrf_field() }}
								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="nickname" value="{{ $data->nickname }}" placeholder="nickname">

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="username" value="{{ $data->username }}" placeholder="name">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="1"@if($data->sex == 1) checked @endif data-am-ucheck> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="2" @if($data->sex == 2) checked @endif data-am-ucheck> 女
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="0" @if($data->sex == 0) checked @endif data-am-ucheck> 保密
										</label>
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<div class="birth-select">
										<select class="sel_year" name="YYYY">
												<option value=""></option>
											</select>
											<em>年</em>
										</div>
										<div class="birth-select2">
										<select class="sel_month" name="MM">
												<option value="10"></option>
											</select>
											<em>月</em></div>
										<div class="birth-select2">
										<select class="sel_day" name="DD">
												<option value=""></option>
											</select>
											<em>日</em></div>
									</div>
							
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" name="phone" value="{{ $data->phone }}" placeholder="telephonenumber" type="tel">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" placeholder="Email" value="{{ $data->email }}" name="email" type="email">

									</div>
								</div>
								<div class="info-btn">
								<button>
									<div class="am-btn am-btn-danger">保存修改</div>
								</button>
								</div>

							</form>
						</div>

					</div>

				</div>
				<!--底部-->
				
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="/homeusers">个人中心</a>
					</li>
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li class="active"> <a href="information.html">个人信息</a></li>
							<li> <a href="safety.html">安全设置</a></li>
							<li> <a href="address.html">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="order.html">订单管理</a></li>
							<li> <a href="change.html">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="coupon.html">优惠券 </a></li>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="collection.html">收藏</a></li>
							<li> <a href="foot.html">足迹</a></li>
							<li> <a href="comment.html">评价</a></li>
							<li> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>

<script>
$(function () {
	$.ms_DatePicker({
            YearSelector: ".sel_year",
            MonthSelector: ".sel_month",
            DaySelector: ".sel_day"
    });
});

(function($){
$.extend({
ms_DatePicker: function (options) {
   var defaults = {
         YearSelector: "#sel_year",
         MonthSelector: "#sel_month",
         DaySelector: "#sel_day",
         FirstText: "--",
         FirstValue: 0
   };
   var opts = $.extend({}, defaults, options);
   var $YearSelector = $(opts.YearSelector);
   var $MonthSelector = $(opts.MonthSelector);
   var $DaySelector = $(opts.DaySelector);
   var FirstText = opts.FirstText;
   var FirstValue = opts.FirstValue;

   // 初始化
   var str = "<option value=\"" + FirstValue + "\">"+FirstText+"</option>";
   $YearSelector.html(str);
   $MonthSelector.html(str);
   $DaySelector.html(str);

   // 年份列表
   var yearNow = new Date().getFullYear();
   var yearSel = $YearSelector.attr("rel");
   for (var i = yearNow; i >= 1900; i--) {
		var sed = yearSel==i?"selected":"";
		var yearStr = "<option value=\"" + i + "\" " + sed+">"+i+"</option>";
        $YearSelector.append(yearStr);
   }

    // 月份列表
	var monthSel = $MonthSelector.attr("rel");
    for (var i = 1; i <= 12; i++) {
		var sed = monthSel==i?"selected":"";
        var monthStr = "<option value=\"" + i + "\" "+sed+">"+i+"</option>";
        $MonthSelector.append(monthStr);
    }

    // 日列表(仅当选择了年月)
    function BuildDay() {
        if ($YearSelector.val() == 0 || $MonthSelector.val() == 0) {
            // 未选择年份或者月份
            $DaySelector.html(str);
        } else {
            $DaySelector.html(str);
            var year = parseInt($YearSelector.val());
            var month = parseInt($MonthSelector.val());
            var dayCount = 0;
            switch (month) {
                 case 1:
                 case 3:
                 case 5:
                 case 7:
                 case 8:
                 case 10:
                 case 12:
                      dayCount = 31;
                      break;
                 case 4:
                 case 6:
                 case 9:
                 case 11:
                      dayCount = 30;
                      break;
                 case 2:
                      dayCount = 28;
                      if ((year % 4 == 0) && (year % 100 != 0) || (year % 400 == 0)) {
                          dayCount = 29;
                      }
                      break;
                 default:
                      break;
            }
					
			var daySel = $DaySelector.attr("rel");
            for (var i = 1; i <= dayCount; i++) {
				var sed = daySel==i?"selected":"";
				var dayStr = "<option value=\"" + i + "\" "+sed+">" + i + "</option>";
                $DaySelector.append(dayStr);
             }
         }
      }
      $MonthSelector.change(function () {
         BuildDay();
      });
      $YearSelector.change(function () {
         BuildDay();
      });
	  if($DaySelector.attr("rel")!=""){
		 BuildDay();
	  }
   } // End ms_DatePicker
});
})(jQuery);
</script>
@endsection
