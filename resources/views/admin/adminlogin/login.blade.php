<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="/d/login/css/bootstrap.min.css" rel="stylesheet">
	<link href="/d/login/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="/d/login/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="/d/login/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="/d/login/http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="/d/login/css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="/d/login/css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="/d/login/img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(img/bg-login.jpg) !important; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="/d/login/index.html"><i class="halflings-icon home"></i></a>
						<a href="/d/login/#"><i class="halflings-icon cog"></i></a>
					</div>
					<h2>后台管理系统</h2>
					@if(session('error'))
					<h4 style="color:red;">{{ session('error') }}</h4>
					@endif
					<form class="form-horizontal" action="/adminlogin" method="post">
					{{csrf_field() }}
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="name" id="username" type="text" placeholder="请输入用户名"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="密码">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="请输入密码"/>
							</div>
							<div class="clearfix"></div>
							
							<label class="remember" for="remember"><input type="checkbox" id="remember" />记住我</label>

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">登录</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3>忘记密码</h3>
					<p>
						No problem, <a href="/d/login/#">click here</a> to get a new password.
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="/d/login/#">Admin templates</a></li>
					<li><a href="/d/login/http://themescloud.org">Bootstrap themes</a></li>
				</ul>
			</div>
		</div>
	<!-- start: JavaScript-->

		<script src="/d/login/js/jquery-1.9.1.min.js"></script>
	<script src="/d/login/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="/d/login/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="/d/login/js/jquery.ui.touch-punch.js"></script>
	
		<script src="/d/login/js/modernizr.js"></script>
	
		<script src="/d/login/js/bootstrap.min.js"></script>
	
		<script src="/d/login/js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="/d/login/js/excanvas.js"></script>
	<script src="/d/login/js/jquery.flot.js"></script>
	<script src="/d/login/js/jquery.flot.pie.js"></script>
	<script src="/d/login/js/jquery.flot.stack.js"></script>
	<script src="/d/login/js/jquery.flot.resize.min.js"></script>
	
		<script src="/d/login/js/jquery.chosen.min.js"></script>
	
		<script src="/d/login/js/jquery.uniform.min.js"></script>
		
		<script src="/d/login/js/jquery.cleditor.min.js"></script>
	
		<script src="/d/login/js/jquery.noty.js"></script>
	
		<script src="/d/login/js/jquery.elfinder.min.js"></script>
	
		<script src="/d/login/js/jquery.raty.min.js"></script>
	
		<script src="/d/login/js/jquery.iphone.toggle.js"></script>
	
		<script src="/d/login/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="/d/login/js/jquery.gritter.min.js"></script>
	
		<script src="/d/login/js/jquery.imagesloaded.js"></script>
	
		<script src="/d/login/js/jquery.masonry.min.js"></script>
	
		<script src="/d/login/js/jquery.knob.modified.js"></script>
	
		<script src="/d/login/js/jquery.sparkline.min.js"></script>
	
		<script src="/d/login/js/counter.js"></script>
	
		<script src="/d/login/js/retina.js"></script>

		<script src="/d/login/js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
