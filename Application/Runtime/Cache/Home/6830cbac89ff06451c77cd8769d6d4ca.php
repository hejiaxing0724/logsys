<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<script type="text/javascript" src="/sjswaimai/Public/js/uni_armorwidget_wrapper.js"></script>
    <meta charset="utf-8">

    

    <title>石景山外卖</title>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/main_5d1e2f0.css"/>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/common_12dc87d.css"/>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/landing_dc1f971.css"/>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/shoplist_a774a9c.css"/>

	

 
	<style type="text/css">
	li:hover{
		border-left: #f6c solid 3px;
		}</style>
</head>
<body>
	<header class="header">
        <div class="ui-width header-wrap">
            <figure>
                <a href="/waimai" class="wm-logo">石景山外卖</a>
            </figure>
            <div id="nav-search-section" class="nav-search-section">
                <div class="s-first">
                <i class="addr-icon"></i>
                <input type="text" placeholder="请输入送餐地址" class="s-con"/>
                </div>
                <div class="s-second s-shoplist">
                <div class="s-citybar"></div>
                <div class="s-input">
                <input type="text" placeholder="请输入送餐地址" id="s-con" class="s-con"/>
                <img src="/sjswaimai/Public/picture/loading_min_b0eaadb.gif" class="s-loading mod-search-hide" />
                </div>
                <div class="s-search-container1"></div>
                </div>
                <div id="muti-aois">
                </div>
            </div>
            <div class="filter-search">
                <input type="text" id="f-input" class="f-input placeholder-con" placeholder="搜索商户或商品" value="">
                <a href="/waimai/shoplist/c63ab3051c9a6892" id="f-close-btn" title="重新搜索" class="f-close-btn hide">×</a>
                <button id="f-search" class="f-search"></button>
                <div class="f-search-list"></div>
            </div>
            <nav>
                <ul class="nav">
                <li class="nav-item nav-item-active" id="find">
                <a href="/waimai" class="nav-item-link">外卖</a>
                </li>
                <li class="nav-item " id="order">
                <a href="/waimai?qt=orderlist&type=wait" class="nav-item-link">我的订单</a>
                </li>
                <li class="nav-item " id="contact">
                <a href="/waimai?qt=contact" class="nav-item-link">联系我们</a>
                </li>
                <li style="display:none;" class="nav-item " id="medicine">
                <a href="/waimai?qt=medicine" class="nav-item-link">药品信息</a>
                </li>
                </ul>
            </nav>
            <div id="user_info" class="user-info-widget" style="1px solid blue;">
                <div id="login_user_info" style="display:none;"></div>
                <div id="logout_user_info">
                    <ul class="logout_info">
                        <li>
                            <a id="login" href="javascript:void(0);" >&nbsp;登录</a>
                        </li>
                        <li>
                            <a id="logout_user_register" href="https://passport.baidu.com/v2/?reg&amp;regType=1&amp;tpl=ma" target="_blank">注册</a>
                        </li>
                    </ul>
                </div>
            </div>
            <script type="text/javascript" src="/sjswaimai/Public/js/d72620c3622f409cbbaf5128c91f3772.js"></script>
        </div>
    </header>

    
  	 <div id="content" class="clearfix" style="min-height: 36px;">
<div class="main">
<section class="order-menu">
<div class="order-menu-pos">
<div class="order-menu-header">
<span>个人中心</span>
</div>
<div class="splitter"></div>
<div class="order-menu-body">
<div class="menu-item">
<div id="menu-order" class="selected">
<span class="menu-icon order-icon"></span>
<a href="http://waimai.baidu.com/waimai/trade/orderlist" class="menu-title order"><span>我的订单</span></a>
</div>
</div>
<div class="menu-item">
<div id="menu-address">
<span class="menu-icon address-icon"></span>
<a href="http://waimai.baidu.com/waimai/user/address/select" class="menu-title address"><span>送餐地址</span></a>
</div>
</div>
<div class="menu-item">
<div id="menu-favorite">
<span class="menu-icon favorite-icon"></span>
<a href="http://waimai.baidu.com/waimai?qt=myfavorite" class="menu-title favorite"><span>收藏夹</span></a>
</div>
</div>
<div class="menu-item">
<div id="menu-coupon">
<span class="menu-icon coupon-icon"></span>
<a href="http://waimai.baidu.com/waimai?qt=couponinfo" class="menu-title coupon"><span>代金券</span></a>
</div>
</div>
<div class="menu-item">
<div id="menu-left">
<span class="menu-icon left-icon"></span>
<a href="http://waimai.baidu.com/pay?qt=getuserleft" class="menu-title left"><span>我的余额</span></a>
</div>
</div>
<div class="menu-item">
<div id="menu-refund">
<span class="menu-icon refund-icon"></span>
<a href="http://waimai.baidu.com/trade/refundlist" class="menu-title refund"><span>我的退款</span></a>
</div>
</div>
<div class="menu-item">
<div id="menu-account">
<span class="menu-icon account-icon"></span>
<a href="http://waimai.baidu.com/waimai/user/account" class="menu-title account"><span>账户设置</span></a>
</div>
</div>
</div>
</div>
</section>

</body>
</html>