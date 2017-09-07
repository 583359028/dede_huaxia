<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><div class="flink">友情链接：<?php
$atts = array();
$atts['tagname'] = 'flink';
$atts['row'] = '24';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{

}
}
?></div>
<footer>
   <nav class="foot_menu">
   <ul>
   <li><a href="/" rel="nofollow">华夏夫人首页</a></li>
    <?php
$atts = array();
$atts['tagname'] = 'channel';
$atts['type'] = 'top';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
 <li><a href="[field:typelink/]" rel="nofollow"> [field:typename/] </a></li>
<?php
}
}
?><li><a href="/data/sitemap.html" rel="nofollow">网站地图</a></li>
   </ul>
   </nav>
<div class="clear"></div>
<div class="footdec">
<div class="footdec_left">
  <a hef="/"><img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/flogo.png" alt="华夏夫人官网尾部logo"></a>
</div>
<div class="footdec_right">
    <p>华夏夫人通过组委海选、<a href="/" rel="nofollow">华夏夫人参选</a>、<a href="/" rel="nofollow">华夏夫人赛事</a>、<a href="/" rel="nofollow">华夏夫人培训</a>、华夏夫人丝路巡演等活动，呈现华夏夫人贤德、淑良、智慧、多元的上善若水的家教品质、弘扬中华传统文化的上善文明。</p>
    <p>联系电话：<a href="tel:<?php echo $GLOBALS['cfg_tel']; ?>"><?php echo $GLOBALS['cfg_tel']; ?></a></p>
    <p>地址：深圳市龙华新区皇嘉中心A座505室</p>
     <p>版权所有：<?php echo $GLOBALS['cfg_powerby']; ?>&nbsp;&nbsp;<a href="http://www.leixunkj.com/">技术支持：深圳市雷讯时代科技有限公司</a></p><p>备案号：<a href="http://www.miitbeian.gov.cn/"><?php echo $GLOBALS['cfg_beian']; ?></a></p>
</div>
</div>
</footer>