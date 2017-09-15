<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $cfg_soft_lang; ?>" />
<!--<meta http-equiv="refresh" content="0;url=../index.php">-->
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title><?php echo $cfg_webname; ?>- 个人中心</title>
<link href="templets/style/login.css" rel="stylesheet" type="text/css" />
<link href="/templets/default/css/style.css" rel="stylesheet" type="text/css" />
<link href="/templets/default/css/reset.css" rel="stylesheet" type="text/css" />
<link href="/templets/default/css/mobile.css" rel="stylesheet" type="text/css" />
<script src="templets/js/j.js" language="javascript" type="text/javascript"></script>
  <script src="/templets/default/js/jquery.js"></script>
  <script src="/templets/default/js/menu.js"></script>
<script type="text/javascript">
function changeAuthCode() {
  var num =   new Date().getTime();
  var rand = Math.round(Math.random() * 10000);
  num = num + rand;
  $('#ver_code').css('visibility','visible');
  if ($("#vdimgck")[0]) {
    $("#vdimgck")[0].src = "../include/vdimgck.php?tag=" + num;
  }
  return false;
}

</script>
<style type="text/css">
<!--
.vermenu{
  background:#FFFFFF none repeat scroll 0 0;
  border:1px solid #EEEEEE;
  position:absolute;
  top: 208px;
}
-->
body{background: url(/templets/default/img/grzx.png)0 0 no-repeat;}
.infoot{background:none;}
#login {margin:50px auto 100px ;}
.zxbmlogo{margin-top: 50px;}
.tip1{display: none;}
.w200{width:300px;border:1px solid #e04649;border-radius: 30px;height:32px;}
#login .theme span{font-size: 20px;line-height: 40px;text-align: left}
.rank{margin:13px 0 0 5px;}
#_userid,#_userpwd{font-size: 16px;}
#_userpwdok b{font-size: 16px;}
#_email{font-size: 16px;}
.bor{width:92%;max-width: 800px;padding: 4% 4% 3% 4%;background:rgba(255,255,255,0.5);margin-bottom: 90px;border: 2px solid #e04649;border-radius: 30px;box-shadow: 5px 5px 5px rgba(0,0,0,0.5)}
#login .theme{width:100%;padding:0;}
#btnSignCheck{background: #a62727;font-size: 24px;border-radius: 30px;font-weight: normal;height: 45px;
    line-height: 45px;
    width: 137px;margin-left: 32px;}
.qx{background: transparent;font-size: 24px;border-radius: 30px;border:1px solid #a62727;height: 45px;
    line-height: 45px;
    width: 137px;}
    #login .theme li {
    margin-bottom:0;margin-top:40px;}
    .fLeft{float: none!important;margin:0 auto;}
.fLeft .text{    width: 300px;
    border: 1px solid #e04649;
    border-radius: 30px;
    height: 32px!important;}
.login_from{background:url(http://theme1320.leixunkj.com/member/templets/images/bg_button.png)no-repeat 0px -440px;}
.login_from2{background:url(http://theme1320.leixunkj.com/member/templets/images/bg_button.png)no-repeat 0px -467px;}
.login .main span{font-size: 20px;}
.login .main{font-size: 20px}
.login .main li{margin-bottom:35px;}
.login .main h3{padding-left:30px;font-size: 18px;}.login .main h3 em{font-size: 18px;}
.main{max-width: 440px;width:100%;}
.login .main form ul li a{color:#e04649;}
</style>
</head>
<body>
<!--内页头部部分-->
<header class="top top_peixun">
<section class="top_box">
    <div class="logo"><a href="index.html"><img src="/templets/default/img/logo.png" alt="华夏夫人官网"></a></div>
    <div class="top_right"><p>全国客服热线：400-</p>
    <ul id="quickMenu">
  <?php
//未登录显示的head
if(!$cfg_ml->IsLogin()) {
?>
        <li><a title="注册" href="../member/index_do.php?fmdo=user&dopost=regnew">注册</a> </li>
        <li><a title="登录" href="../member/login.php">登录</a> </li>
<?php
}
//登录后显示的head
else {
?> 

 <a href="#" class="userName" style="color:#fff;margin-left: 10px"><?php echo $cfg_ml->M_UserName?></a>
  &nbsp;&nbsp;<a href="../member/index_do.php?fmdo=login&dopost=exit#" style="color:#fff">[退出]</a>

<?php
}
?>      
      </ul>
    <nav class="menu">
  <ul>
    <li><a href="http://theme1320.leixunkj.com">首页</a></li>
<li><a href='/a/new/'>新闻资讯</a></li>
 <li><a href="/a/baoming/"> 夫人报名 </a></li>

 <li><a href="/a/toupiao/"> 投票注册 </a></li>

 <li><a href="/a/peixun/"> 培训系统 </a></li>

 <li><a href="/a/zhaoshang/"> 招商加盟 </a></li>

 <li><a href="/a/jiajiao/"> 家教传承 </a></li>

 <li><a href="/a/about/"> 关于我们 </a></li>

  </ul>
    </nav>
    </div>
</section>
<section class="mobile_menu"><a class="back" onclick="history.go(-1)"></a><h1>个人中心</h1>
<div class="menu">
   <span id="menu"></span>
   <div class="menu_li">
   <div id="menu_left"></div>
    <ul> 
     <li><a href="http://theme1320.leixunkj.com"> 首页</a></li>
<li><a href='/a/new/'>新闻资讯</a></li>
 <li><a href="/a/baoming/"> 夫人报名 </a></li>

 <li><a href="/a/toupiao/"> 投票注册 </a></li>

 <li><a href="/a/peixun/"> 培训系统 </a></li>

 <li><a href="/a/zhaoshang/"> 招商加盟 </a></li>

 <li><a href="/a/jiajiao/"> 家教传承 </a></li>

 <li><a href="/a/about/"> 关于我们 </a></li>
 <li><a href="../member/login.php"> 登录 </a></li>
 <li><a href="../member/index_do.php?fmdo=user&dopost=regnew"> 注册 </a></li>

    </ul>
   </div>
</div>
</section>
</header>
<style type="text/css">
.grzx{overflow: hidden;margin:120px auto;width: 300px;}
.grzx p{font-size: 24px;}
.grzx p span{display: inline-block;*zoom:1;*display: block;color:#d72625;font-size: 30px;margin:0 20px;}
.grzx a{display: block;margin:40px auto;width:120px;color:#fff;text-align: center;background-color:#d72625;height:40px;line-height: 40px;border-radius: 30px;font-size: 24px; }
.grzx_banner img{width:100%;}
a,a:hover{text-decoration:none;}
</style>
 <div class="grzx">
<p>欢迎您：<span><?php echo $cfg_ml->M_UserName?></span>用户</p>
<a href="/a/tpy">去投票</a>
<a href="/a/zxbm/">去报名</a>
</div>
<section class="infoot">
 <div class="infoot_process">
<ul><li><span></span><em>选拔流程<br/>Process</em></li>
<li><span>1</span><em>免费报名</em></li>
<li><span>2</span><em>第一轮海选</em></li>
<li><span>3</span><em>第二轮市选</em></li>
<li><span>4</span><em>第三轮省选</em></li>
<li><span>5</span><em>第四轮国选</em></li>
<li><span>6</span><em>第五轮丝路巡</em></li></ul>
 </div>
</section>
</body>
</html>