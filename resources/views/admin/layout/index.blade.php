<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>BRILLIANT Free Bootstrap Admin Template</title>
    <!-- Bootstrap Styles-->
    <link href="/d/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="/d/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="/d/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="/d/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/d/assets/js/Lightweight-Chart/cssCharts.css"> 
    <script type="text/javascript" charset="utf-8" src="/b/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/b/ueditor.all.min.js">
    </script>
    <!--建议手动加在语言,避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型,比如你在配置项目里配置的是英文,这里加
    载的中文,那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/b/lang/zh-cn/zh-cn.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/d/index.html"><strong><i class="icon fa fa-plane"></i> BRILLIANT</strong></a>
				
		<div id="sideNav" href="/d/">
		<i class="fa fa-bars icon"></i> 
		</div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                  
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                   
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> 个人中心</a>
                        </li>
                        <li><a href=""><i class="fa fa-gear fa-fw"></i> 设置</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/adminlogin"><i class="fa fa-sign-out fa-fw"></i> 退出 </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
     
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li>
                        <a href=""><i class="fa fa-sitemap"></i>前台用户<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/users">前台用户列表</a>
                            </li>
                            <li>
                                <a href="/users">前台用户XX</a>
                            </li>
							</ul>
                        </li>	
					 <li>
                        <a href=""><i class="fa fa-sitemap"></i> 管理员<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/adminuser">管理员列表</a>
                            </li>
                            <li>
                                <a href="/adminuser/create">添加管理员</a>
                            </li>
                            <li>
                                <a href="/adminrole">角色列表</a>
                            </li>
                            <li>
                                <a href="/adminrole/create">添加角色</a>
                            </li>
                            <li>
                                <a href="/adminnode">权限列表</a>
                            </li>
                            <li>
                                <a href="/adminnode/create">添加权限</a>
                            </li>
							</ul>
                        </li>	
                        <li>
                        <a href=""><i class="fa fa-sitemap"></i>商品分类<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admincate">分类列表</a>
                            </li>
                            <li>
                                <a href="/admincate/create">分类添加</a>
                            </li>
							</ul>
                        </li>
                        <li>
                        <a href=""><i class="fa fa-sitemap"></i>公告<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/article/">公告列表</a>
                            </li>
                            <li>
                                <a href="/article/create">公告添加</a>
                            </li>
							</ul>
						</li>	
                        <li>
                        <a href=""><i class="fa fa-sitemap"></i>商品信息<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/shops">商品列表</a>
                            </li>
                            <li>
                                <a href="/shops/create">商品添加</a>
                            </li>
							</ul>
                        </li>
                        <li>
                        <a href=""><i class="fa fa-sitemap"></i>订单管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/orders">订单列表</a>
                            </li>
                            <li>
                                <a href="/orders">已发货订单</a>
                            </li>
                            <li>
                                <a href="/orders">待处理订单</a>
                            </li>
                            <li>
                                <a href="/orders">已收货订单</a>
                            </li>
							</ul>
                        </li>
                        <li>
                        <a href=""><i class="fa fa-sitemap"></i>评价模块<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="">评价列表</a>
                            </li>
                            <li>
                                <a href="">好评</a>
                            </li>
                            <li>
                                <a href="">中评</a>
                            </li>
                            <li>
                                <a href="">差评</a>
                            </li>
							</ul>
                        </li>
                        <li>
                        <a href=""><i class="fa fa-sitemap"></i>轮播图管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="">轮播图列表</a>
                            </li>
                            <li>
                                <a href="">轮播图添加</a>
                            </li>
							</ul>
                        </li>
                        <li>
                        <a href=""><i class="fa fa-sitemap"></i>友情链接<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="">链接管理</a>
                            </li>
                            <li>
                                <a href="">链接添加</a>
                            </li>
							</ul>
                        </li>
                </ul>
                       

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
        <div class="header"> 						
            @if (session('error'))
            <div class="alert alert-danger">
                    {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                        {{ session('success') }}
                </div>
            @endif
		</div>
            @section('content')
            @show

            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    
    <!-- jQuery Js -->
    <script src="/d/assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="/d/assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="/d/assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="/d/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="/d/assets/js/morris/morris.js"></script>
	
	
	<script src="/d/assets/js/easypiechart.js"></script>
	<script src="/d/assets/js/easypiechart-data.js"></script>
	
	 <script src="/d/assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="/d/assets/js/custom-scripts.js"></script>

      
    <!-- Chart Js -->
    <script type="text/javascript" src="/d/assets/js/chart.min.js"></script>  
    <script type="text/javascript" src="/d/assets/js/chartjs.js"></script> 

</body>
@section('ajax')
@show
</html>