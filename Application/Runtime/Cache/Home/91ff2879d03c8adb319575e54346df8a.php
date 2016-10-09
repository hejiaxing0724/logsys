<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="/sjswaimai/Public/js/uni_armorwidget_wrapper.js"></script>
    <meta charset="utf-8">
    <title>石景山外卖</title>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/main_5d1e2f0.css"/>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/common_12dc87d.css"/>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/landing_dc1f971.css"/>
    <link rel="stylesheet" type="text/css" href="/sjswaimai/Public/css/shoplist_a774a9c.css"/>

    <script type="text/javascript" src="/sjswaimai/Public/js/main_d338062.js"></script>
    <script type="text/javascript" src="/sjswaimai/Public/js/lib_fcbc5e7.js"></script>
    <script type="text/javascript" src="/sjswaimai/Public/js/landing_cb95d02.js"></script>
    <script type="text/javascript" src="/sjswaimai/Public/js/shoplist_03c450c.js"></script>
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
                <a href="<?php echo U('Index/index');?>" class="nav-item-link">外卖</a>
                </li>
                <li class="nav-item " id="order">
                <a href="<?php echo U('User/address');?>" class="nav-item-link">我的订单</a>
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

<!DOCTYPE html>
<!-- saved from url=(0053)http://waimai.baidu.com/waimai?qt=orderlist&type=wait -->
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="/sjswaimai/Public/user/hm.js"></script>

<script type="text/javascript" src="/sjswaimai/Public/user/uni_armorwidget_wrapper.js"></script>





<title>石景山外卖</title>

<link rel="stylesheet" type="text/css" href="/sjswaimai/Public/user/main_5d1e2f0.css">
<link rel="stylesheet" type="text/css" href="/sjswaimai/Public/user/common_12dc87d.css">
<link rel="stylesheet" type="text/css" href="/sjswaimai/Public/user/landing_dc1f971.css">
<link rel="stylesheet" type="text/css" href="/sjswaimai/Public/user/menu_4e4a7c2.css">
<link rel="stylesheet" type="text/css" href="/sjswaimai/Public/user/order_23df2f5.css">
<link rel="stylesheet" type="text/css" href="/sjswaimai/Public/user/usercenter_1e040d1.css">
</head>
<body>


<header class="header">
<div class="ui-width header-wrap">
<figure>
<a href="http://waimai.baidu.com/waimai" class="wm-logo">石景山外卖</a>
</figure>
<div id="nav-search-section" class="nav-search-section">
<div class="s-first">
<i class="addr-icon"></i>
<input type="text" placeholder="请输入送餐地址" class="s-con">
</div>
<div class="s-second s-shoplist">
<div class="s-citybar"><div class="city-dropdown">    <div class="city-locate dropdown-toggle">        <a class="current-city" data-name="北京" data-code="131">北京</a>        <b class="arrow"></b>    </div>    <div class="dropdown-menu hide">        <!-- <div class="city-disabled">已开通城市</div>        <ul class="city-list">                    </ul> -->    </div></div></div>
<div class="s-input">
<input type="text" placeholder="请输入送餐地址" id="s-con" class="s-con">
<img src="/sjswaimai/Public/user/loading_min_b0eaadb.gif" class="s-loading mod-search-hide">
</div>
<div class="s-search-container1 mod-search-hide mod-search-container"></div>
</div>
<div id="muti-aois">
</div>
</div>
<div class="filter-search">
<input type="text" id="f-input" class="f-input placeholder-con" placeholder="搜索商户或商品" value="">
<a href="http://waimai.baidu.com/waimai/shoplist/" id="f-close-btn" title="重新搜索" class="f-close-btn hide">×</a>
<button id="f-search" class="f-search"></button>
<div class="f-search-list"></div>
</div>
<nav>
<ul class="nav">
<li class="nav-item " id="find">
<a href="<?php echo U('Index/index');?>" class="nav-item-link">外卖</a>
</li>
<li class="nav-item nav-item-active" id="order">
<a href="<?php echo U('User/address');?>" class="nav-item-link">我的订单</a>
</li>
<li class="nav-item " id="contact">
<a href="http://waimai.baidu.com/waimai?qt=contact" class="nav-item-link">联系我们</a>
</li>
<li style="display:none;" class="nav-item " id="medicine">
<a href="http://waimai.baidu.com/waimai?qt=medicine" class="nav-item-link">药品信息</a>
</li>
</ul>
</nav>
<div id="user_info" class="user-info-widget" style="1px solid blue;">
<div id="login_user_info" style="">
  <ul class="login_info">
    <li id="usernameInfo" class="uname mn-lk-w"><a id="username" class="mn-lk" href="http://waimai.baidu.com/waimai/trade/orderlist">你好，136*****433</a>
      <div id="popUserInfoId" class="mn-tip" style="visibility: hidden;"><div class="top-arrow"></div><ul class="mn"><li><a class="my-info" href="http://waimai.baidu.com/waimai?qt=orderlist&amp;type=wait"><span class="icon order-icon"></span>我的订单</a></li><li><a class="my-info" href="http://waimai.baidu.com/waimai?qt=addressmanage&amp;type=select"><span class="icon address-icon"></span>送餐地址</a></li><li><a class="my-info" href="http://waimai.baidu.com/waimai?qt=myfavorite"><span class="icon favorite-icon"></span>收藏夹</a></li><li><a class="my-info" href="http://waimai.baidu.com/waimai?qt=couponinfo"><span class="icon coupon-icon"></span>代金券</a></li><li><a class="my-info" href="http://waimai.baidu.com/pay?qt=getuserleft"><span class="icon left-icon"></span>我的余额</a></li><li><a class="my-info" href="http://waimai.baidu.com/trade/refundlist"><span class="icon refund-icon"></span>我的退款</a></li><li><a id="logout" class="logout" href="javascript:void(0)"><span class="icon account-icon"></span>退出</a></li></ul></div></li></ul></div>
<div id="logout_user_info" style="display: none;">
<ul class="logout_info">
<li>
<a id="login" href="javascript:void(0);">&nbsp;登录</a>
</li>
<li>
<a id="logout_user_register" href="https://passport.baidu.com/v2/?reg&amp;regType=1&amp;tpl=ma" target="_blank">注册</a>
</li>
</ul>
</div>
</div>

<script type="text/javascript" src="/sjswaimai/Public/user/jsapi"></script>
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
<a href="" class="menu-title order"><span>我的订单</span></a>
</div>
</div>
<div class="menu-item">
<div id="menu-address">
<span class="menu-icon address-icon"></span>
<a href="<?php echo U('User/address');?>" class="menu-title address"><span>送餐地址</span></a>
</div>
</div>
<div class="menu-item">
<div id="menu-favorite">
<span class="menu-icon favorite-icon"></span>
<a href="" class="menu-title favorite"><span>收藏夹</span></a>
</div>
</div>

<div class="menu-item">
<div id="menu-left">
<span class="menu-icon left-icon"></span>
<a href="" class="menu-title left"><span>我的余额</span></a>
</div>
</div>
<div class="menu-item">
<div id="menu-account">
<span class="menu-icon account-icon"></span>
<a href="" class="menu-title account"><span>账户设置</span></a>
</div>
</div>
</div>
</div>
</section>

<section class="usercenter-detail" id="user-order">
<div class="summary">
<h3 class="summary-header">全部订单</h3>
<div class="summary-info">
<a class="ft-blk ft-medium header-selected" href="javascript:void(0);" data-type="list" data-node="summary-anchor">全部订单(0)</a>
<span>|</span>
<a class="ft-blk ft-medium" href="javascript:void(0);" data-type="uncommented" data-node="summary-anchor">待评价(0)</a>
</div>
</div>
<div><a class="cms-charlink" data-node="summary-txtLinkExpand" href="javascript:void(0);"></a></div>
<div class="order-cards" data-node="order-cards"><div class="no-result">    <div class="no-result-image" style="padding:80px 0 20px;">        <img src="/sjswaimai/Public/user/noresult_b2672ee.png" alt="无结果" style="display:block;margin:auto;">    </div>    <div class="no-result-notice" style="text-align:center;padding-bottom: 50px;"><div class="order-notice">暂无订单, <a href="http://waimai.baidu.com/" class="ft-red">马上来一份</a></div></div></div></div>
<div class="pagination"></div>
<div class="callCenter" data-node="callCenter">
</div>
</section>

<div class="clearfix" style="_height:0px;_overflow:hidden;"></div>
</div>
<div class="knightCover hide" data-node="knightCover"></div>
<div class="knightDisplay hide" data-node="knightDisplay" style="left: 161.5px; top: -109px;">
<div class="knightTitle">
<p>查看骑士位置</p>
<span data-node="knightClose">×</span>
</div>
<div class="knightLocationBig">
<a class="knightRefresh" data-node="knightRefresh" orderid="">刷新</a>
<div class="knightBigMap" id="knightBigMap"></div>
</div>
</div>
<!--[if IE]>
<style type="text/css">
	#my_addr .my_addr_edit .addr_edit_item input {
		line-height: 30px;
	}
</style>
<![endif]-->
<input type="hidden" id="bdstoken" name="bdstoken" value="2ecfaeee3e0b8290d57434e1189554c4">
<input type="hidden" id="bindstoken" name="bindstoken" value="6a38KT72IEzpFpikE+wlUatGbWqgK75oF69s0QWk19NeGikVUCb3orNV1JaeepecvPk8qEC/9JopELQXtRJyovJFvxEbTXkkrVdX9sUGS+tZ5C7jkHSjB481j4WUKtUpT5cjF65iyGtKRaDfjv0yr72xMPUZfoRzE9tkE3wx9lbBlhpgzOJ84O3tFv7AEqAP0O1cfz5txNoEbCzg3jAPnckGDKeSWHNOQ7mNCUZxQm9mvTp5Mc81UAF5yZOlMVIx">
</div>
<footer id="baiducopy">
<div class="footer-items">
<div class="footer-items-snippet footer-item help">
<h3>帮助</h3>
<div class="text">
<a href="https://waimai.baidu.com/waimai?qt=contact">建议与反馈</a>
<a href="https://waimai.baidu.com/waimai?qt=helpusage">使用帮助</a>
<a href="https://waimai.baidu.com/waimai?qt=helpqa">常见问题</a>
<a href="https://waimai.baidu.com/waimai?qt=agreement">用户协议</a>
<a href="http://waimai.baidu.com/waimai?qt=agreement&amp;right=1">权利声明</a>
</div>
</div>
<div class="footer-items-snippet footer-item followus">
<h3>关注我们</h3>
<div class="text">
<a href="http://tieba.baidu.com/f?kw=%B0%D9%B6%C8%CD%E2%C2%F4&amp;fr=ala0" target="_blank">官方论坛</a>
<a href="http://weibo.com/waimai" target="_blank">新浪微博</a>
<a href="https://waimai.baidu.com/waimai?qt=about" target="_blank">关于我们</a>
<a data-node="wechat" href="javascript:void(0);" class="wechat">微信公众号</a>
<a href="http://waimai.baidu.com/waimai?qt=agreement&amp;right=2" target="_blank">平台制度</a>
</div>
</div>
<div class="footer-items-snippet footer-item">
<h3>商务合作</h3>
<div class="text">
<a href="http://waimai.baidu.com/biz" target="_blank">商户入驻</a>
<a href="https://waimai.baidu.com/waimai?qt=agent" target="_blank">代理商合作</a>
</div>
</div>
<div class="footer-items-contact footer-item">
<h3>
<img src="/sjswaimai/Public/user/contact_25be17c.png" alt="图标">
客服热线</h3>
<em>400-011-7777</em>
<div class="text no-hover">
<span>周一至周日9:00-22:00</span>
</div>
</div>
</div>
<p class="footer-copy">
小度生活（北京）科技有限公司，北京小度信息科技有限公司<a href="http://www.miibeian.gov.cn/state/outPortal/loginPortal.action" target="_blank" style="margin-left:15px;">京ICP备16008577-1号</a>
<span>合作伙伴&nbsp;:&nbsp;</span>
<img src="/sjswaimai/Public/user/nuomi_logo.png" class="footer_nuomi_logo" onclick="javascript:window.location=&#39;http://www.nuomi.com/?cid=bdwm&#39;;addNStat({da_trd:&#39;waimai&#39;,da_src:&#39;nuomilogoBk.click&#39;,da_act:&#39;click&#39;});">
<img src="/sjswaimai/Public/user/qianbao_logo.png" class="footer_qianbao_logo" onclick="javascript:window.location=&#39;https://www.baifubao.com?from=waimai&#39;;addNStat({da_trd:&#39;waimai&#39;,da_src:&#39;qianbaologoBk.click&#39;,da_act:&#39;click&#39;});">
</p>
</footer>
<div class="mask"></div>


<script>
    var Hunter = window.Hunter || {};
    Hunter.userConfig = Hunter.userConfig || [];
    Hunter.userConfig.push({ hid: 63163 });
</script>
<script type="text/javascript" src="/sjswaimai/Public/user/main_d338062.js"></script>
<!-- <script type="text/javascript" src="/sjswaimai/Public/user/lib_fcbc5e7.js"></script> -->
<script type="text/javascript" src="/sjswaimai/Public/user/landing_cb95d02.js"></script>
<script type="text/javascript" src="/sjswaimai/Public/user/menu_e669814.js"></script>
<script type="text/javascript" src="/sjswaimai/Public/user/commonDialog_4f5d8bf.js"></script>
<script type="text/javascript" src="/sjswaimai/Public/user/completeDialog_cad21c3.js"></script>
<script type="text/javascript" src="/sjswaimai/Public/user/commentDialog_6ef1148.js"></script>
<script type="text/javascript" src="/sjswaimai/Public/user/txtLinkExpand_91a8f27.js"></script>
<script type="text/javascript" src="/sjswaimai/Public/user/order_d05513d.js"></script>


</body></html>