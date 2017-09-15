<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!--内页头部部分-->
<style></style>
<header class="top top_peixun">
<section class="top_box">
    <div class="logo"><a href="index.html"><img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/logo.png" alt="华夏夫人官网"></a></div>
    <div class="top_right"><p>全国客服热线：<?php echo $GLOBALS['cfg_tel']; ?></p>
    <ul id="quickMenu">

  <?php
//未登录显示的head
if(!$cfg_ml->IsLogin()) {
?>
        <li><a title="注册" href="/member/index_do.php?fmdo=user&dopost=regnew">注册</a> </li>
        <li><a title="登录" href="/member/login.php">登录</a> </li>
<?php
}
//登录后显示的head
else {
?>

 <a href="#" class="userName"><?php
echo $cfg_ml->M_UserName
?></a>
  &nbsp;&nbsp;<a href="/member/index_do.php?fmdo=login&dopost=exit#" style="color:#fff">[退出]</a>

<?php
}
?>   
      </ul>
    <nav class="menu">
   <ul>
    <li><a href="<?php echo $GLOBALS['cfg_basehost']; ?>">首页</a></li>
<?php
$atts = array();
$atts['tagname'] = 'channel';
$atts['type'] = 'top';
$atts['currentstyle'] = '<li><a href=\'~typelink~\' class=\'on\'>~typename~</a></li>';
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
  </ul>
    </nav>
    </div>
</section>
<section class="mobile_menu"><a class="back" onclick="history.go(-1)"></a><h1>首页</h1>
<div class="menu">
   <span id="menu"></span>
   <div class="menu_li">
   <div id="menu_left"></div>
    <ul> 
     <li><a href="<?php echo $GLOBALS['cfg_basehost']; ?>"> 首页</a></li>
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
<li><a title="注册" href="/member/index_do.php?fmdo=user&dopost=regnew">注册</a> </li>
        <li><a title="登录" href="/member/login.php">登录</a> </li>
    </ul>
   </div>
</div>
</section>
</header>
<!--top is over-->