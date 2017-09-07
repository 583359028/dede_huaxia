<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!--内页头部部分-->
<script>

 $(function(){

var nav=$(".menu_nav"); //得到导航对象

var win=$(window); //得到窗口对象

var sc=$(document);//得到document文档对象。

win.scroll(function(){

  if(sc.scrollTop()>=60){

    nav.addClass("fixednav"); 

   $(".top_tel_top").fadeIn(); 

  }else{

   nav.removeClass("fixednav");

  }
})  
 })
</script>
<header class="top">
<div class="top_tel top_box">
  <div class="top_tel_top">
  <nav>
    <div class="top_tel_l">全国客服热线：<span><?php echo $GLOBALS['cfg_tel']; ?></span></div>
    <div class="top_tel_r">
    <ul id="quickMenu">
    <?php
//未登录显示的head

  require_once(DEDEINC."/memberlogin.class.php");
  $member = new MemberLogin();
  $memberID = $member->M_LoginID;

          //登录后显示的head
  if($memberID) {

          $a =   '<SPAN style="color:#fff;line-height: 28px">会员:</SPAN><a href="#" class="userName" style="color:#fff;line-height: 28px">'.$memberID.'</a>'.'   <a href="/member/index_do.php?fmdo=login&dopost=exit#" style="color:#fff;line-height: 28px">[退出]</a>';
          echo $a;
  }
  else {

          echo    '
          <li><a title="登录" rel="nofollow" href="/member/login.php">登录</a> </li>
          <li></li>
          <li><a title="注册" rel="nofollow" href="/member/index_do.php?fmdo=user&dopost=regnew">注册</a> </li>';
  }
?>
    </ul></div>
    </nav>
  </div>
  <div class="menu_nav">
     <section>
     <div class="pc_logo"><a href="/"><img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/logo.png" alt="华夏夫人官网"></a></div>
     <div class="nav"><ul>
     <li><a href="/"><span></span><em>华夏夫人首页</em></a></li>
     <?php
$atts = array();
$atts['tagname'] = 'channel';
$atts['type'] = 'top';
$atts['currentstyle'] = '<li class=\'on\'><a href=\'~typelink~\'><span></span><em>~typename~</em></a></li>';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
  <li><a href="[field:typelink/]"><span></span><em>[field:typename/] </em></a></li><?php
}
}
?>
     </ul></div>
     </section>
  </div>
</div>
<section class="mobile_menu"><a class="back" onclick="history.go(-1)"></a><h1><?php echo $fields['typename']; ?></h1>
<div class="menu">
   <span id="menu"></span>
   <div class="menu_li">
   <div id="menu_left"></div>
    <ul>
     <li><a href="/"> 华夏夫人首页</a></li>
<?php
$atts = array();
$atts['tagname'] = 'channel';
$atts['type'] = 'top';
$atts['currentstyle'] = '<li><a href=\'~typelink~\'>~typename~</a></li>';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
 <li><a href="[field:typelink/]"> [field:typename/] </a></li>
<?php
}
}
?>
<li><a title="注册" rel="nofollow"  href="/member/index_do.php?fmdo=user&dopost=regnew">注册</a> </li>
        <li><a title="登录" rel="nofollow" href="/member/login.php">登录</a> </li>
    </ul>
   </div>
</div>
</section>
</header>
<!--top is over-->
<?php include $this->CompilerInclude("left.htm");
 ?>