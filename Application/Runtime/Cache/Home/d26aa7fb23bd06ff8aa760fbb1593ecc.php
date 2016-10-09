<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<script type="text/javascript" src="/sjswaimai/Public/js/uni_armorwidget_wrapper.js"></script>
    <meta charset="utf-8">

    <link rel="icon" href="https://static.waimai.baidu.com/static/forpc/favicon.ico" mce_href="https://static.waimai.baidu.com/static/forpc/favicon.ico" type="image/x-icon">

    <title>石景山外卖</title>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/main_5d1e2f0.css"/>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/common_12dc87d.css"/>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/landing_dc1f971.css"/>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/shoplist_a774a9c.css"/>
	<script type="text/javascript" src="/sjswaimai/Public/jquery-3.1.0.js"></script>
	<script type="text/javascript" src ="/sjswaimai/Public/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="/sjswaimai/Public/bootstrap-3.3.5-dist/css/bootstrap.min.css">

	<meta charset="utf-8">
	<style type="text/css">
	li:hover{
		border-left: #f6c solid 3px;
		}</style>
</head>
<body>
	 <div style="width:1170" class="container">
	 	<!-- 大边框 -->
	 	<div style="background-color:#ccc; width:200;float: left;">
	 		<!-- 竖排导航 -->
	 		 <ul class="nav  nav-stacked">
                <h3 style="margin:20 20 ">个人中心</h3>
                <hr>
                <li class="firstlist"><a style="margin:0 0;color:black" href=<?php echo U('User/index');?>>我的订单</a></li>
                <li style="margin:10 0"class="firstlist"><a  style="color:black"href=<?php echo U('User/address');?>>送餐地址</a></li>
                <li style="margin:10 0"class="firstlist"><a style="color:black"href=<?php echo U('User/collect');?>>收藏夹</a></li>
                <li style="margin:10 0"class="firstlist"><a style="color:black"href=<?php echo U('User/count');?>>我的金额</a></li> 
                <li style="margin:10 0"class="firstlist"><a style="color:black"href=<?php echo U('User/config');?>>用户设置</a></li>
            </ul>

	 	</div>
	 	<div style="width:640;margin:0 40;float: left;">
	 		<h3 style="margin:20 20 ">收藏夹</h3>
                <hr>

	 	</div>
	 </div>
</body>
</html>