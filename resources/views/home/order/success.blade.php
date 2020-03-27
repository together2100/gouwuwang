@extends('home.layout.index')

@section('main')

<!--悬浮搜索框-->

<div class="nav white">
	<div class="logo"><img src="/h/images/logo.png" /></div>
    <div class="logoBig">
      <li><img src="/h/images/logobig.png" /></li>
    </div>
    
    <div class="search-bar pr">
        <a name="index_none_header_sysc" href=""></a>       
        <form>
        <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
        <input id="ai-topsearch" class="submit" value="搜索" index="1" type="submit"></form>
    </div>     
</div>

<div class="clear"></div>



<div class="take-delivery">
 <div class="status">
   <h2>您已成功付款</h2>
   <div class="successInfo">
     <ul>
       <li>付款金额<em>¥{{ $data['total'] }}</em></li>
       <div class="user-info">
         <p>收货人：{{ $data['name'] }}</p>
         <p>联系电话：{{ $data['phone'] }}</p>
         <p>收货地址：{{ $data['huo'] }}</p>
       </div>
             请认真核对您的收货信息，如有错误请联系客服
                               
     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="/h/person/order.html" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        <a href="/h/person/orderinfo.html" class="J_MakePoint">查看<span>交易详情</span></a>
     </div>
    </div>
  </div>
</div>

@endsection