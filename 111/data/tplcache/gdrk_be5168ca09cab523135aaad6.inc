<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!--pc新增滚动入口-->
<section class="gd_rk  pc">
  <div class="lk_wrap">
   <div class="rk_box">
    <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '9';
$atts['flag'] = 'c';
$atts['row'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
    <h2>[field:typename/]</h2><a href="[field:typeurl/]">更多>></a>
   <div class="clear"></div>
   <ul> 
     <li><a href="[field:arcurl/]"><img src="[field:litpic/]" alt="[field:title/]"><p><span>[field:title/]</span>[field:description function='cn_substr(@me,110)'/]......</p></a></li>
   <?php
}
}
?>   
   <li class="clear"></li>
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '9';
$atts['titlelen'] = '120';
$atts['limit'] = '1,6';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>  
    <li><a href="[field:arcurl/]">·[field:title/]</a></li>  
    <?php
}
}
?>   
   </ul>
   </div>
   <div class="rk_box">
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '10';
$atts['flag'] = 'c';
$atts['row'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
    <h2>[field:typename/]</h2><a href="[field:typeurl/]">更多>></a>
   <div class="clear"></div>
   <ul> 
     <li><a href="[field:arcurl/]"><img src="[field:litpic/]" alt="[field:title/]"><p><span>[field:title/]</span>[field:description function='cn_substr(@me,110)'/]......</p></a></li>
   <?php
}
}
?>   
   <li class="clear"></li>
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '10';
$atts['titlelen'] = '120';
$atts['limit'] = '1,6';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>  
    <li><a href="[field:arcurl/]">·[field:title/]</a></li>  
    <?php
}
}
?>   
   </ul>
   </div>
   <div class="rk_box">
     <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '11';
$atts['flag'] = 'c';
$atts['row'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
    <h2>[field:typename/]</h2><a href="[field:typeurl/]">更多>></a>
   <div class="clear"></div>
   <ul> 
     <li><a href="[field:arcurl/]"><img src="[field:litpic/]" alt="[field:title/]"><p><span>[field:title/]</span>[field:description function='cn_substr(@me,110)'/]......</p></a></li>
   <?php
}
}
?>   
   <li class="clear"></li>
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '11';
$atts['titlelen'] = '120';
$atts['limit'] = '1,6';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>  
    <li><a href="[field:arcurl/]">·[field:title/]</a></li>  
    <?php
}
}
?>  
   </ul>
   </div>
  <div class="rk_box">
    <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '9';
$atts['flag'] = 'c';
$atts['row'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
    <h2>[field:typename/]</h2><a href="[field:typeurl/]">更多>></a>
   <div class="clear"></div>
   <ul> 
     <li><a href="[field:arcurl/]"><img src="[field:litpic/]" alt="[field:title/]"><p><span>[field:title/]</span>[field:description function='cn_substr(@me,110)'/]......</p></a></li>
   <?php
}
}
?>   
   <li class="clear"></li>
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '9';
$atts['titlelen'] = '120';
$atts['limit'] = '1,6';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>  
    <li><a href="[field:arcurl/]">·[field:title/]</a></li>  
    <?php
}
}
?>   
   </ul>
   </div>
   <div class="rk_box">
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '10';
$atts['flag'] = 'c';
$atts['row'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
    <h2>[field:typename/]</h2><a href="[field:typeurl/]">更多>></a>
   <div class="clear"></div>
   <ul> 
     <li><a href="[field:arcurl/]"><img src="[field:litpic/]" alt="[field:title/]"><p><span>[field:title/]</span>[field:description function='cn_substr(@me,110)'/]......</p></a></li>
   <?php
}
}
?>   
   <li class="clear"></li>
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '10';
$atts['titlelen'] = '120';
$atts['limit'] = '1,6';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>  
    <li><a href="[field:arcurl/]">·[field:title/]</a></li>  
    <?php
}
}
?>   
   </ul>
   </div>
   <div class="rk_box">
     <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '11';
$atts['flag'] = 'c';
$atts['row'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
    <h2>[field:typename/]</h2><a href="[field:typeurl/]">更多>></a>
   <div class="clear"></div>
   <ul> 
     <li><a href="[field:arcurl/]"><img src="[field:litpic/]" alt="[field:title/]"><p><span>[field:title/]</span>[field:description function='cn_substr(@me,110)'/]......</p></a></li>
   <?php
}
}
?>   
   <li class="clear"></li>
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '11';
$atts['titlelen'] = '120';
$atts['limit'] = '1,6';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>  
    <li><a href="[field:arcurl/]">·[field:title/]</a></li>  
    <?php
}
}
?>  
   </ul>
   </div>
   </div>
    <div class="lk_hand pc">
      <div class="lk_hand_pre"><img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/next.png"></div>
       <div class="lk_hand_next"><img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/pre.png"></div>
    </div>
</section>
<!--手机版新增滚动入口-->
<section class="gd_rk mgd_rk mcss">
  <div class="lk_wrap">
   <div class="rk_box">
  <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '9';
$atts['flag'] = 'c';
$atts['row'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
    <h2>[field:typename/]</h2><a href="[field:typeurl/]">更多>></a>
   <div class="clear"></div>
   <ul> 
     <li><a href="[field:arcurl/]"><img src="[field:litpic/]" alt="[field:title/]"><p><span>[field:title/]</span>[field:description function='cn_substr(@me,110)'/]......</p></a></li>
   <?php
}
}
?>   
   <li class="clear"></li>
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '9';
$atts['titlelen'] = '120';
$atts['limit'] = '1,6';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>  
    <li><a href="[field:arcurl/]">·[field:title/]</a></li>  
    <?php
}
}
?>
   </ul>
   </div>
   <div class="rk_box">
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '10';
$atts['flag'] = 'c';
$atts['row'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
    <h2>[field:typename/]</h2><a href="[field:typeurl/]">更多>></a>
   <div class="clear"></div>
   <ul> 
     <li><a href="[field:arcurl/]"><img src="[field:litpic/]" alt="[field:title/]"><p><span>[field:title/]</span>[field:description function='cn_substr(@me,110)'/]......</p></a></li>
   <?php
}
}
?>   
   <li class="clear"></li>
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '10';
$atts['titlelen'] = '120';
$atts['limit'] = '1,6';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>  
    <li><a href="[field:arcurl/]">·[field:title/]</a></li>  
    <?php
}
}
?>
   </ul>
   </div>
   <div class="rk_box">
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '11';
$atts['flag'] = 'c';
$atts['row'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
    <h2>[field:typename/]</h2><a href="[field:typeurl/]">更多>></a>
   <div class="clear"></div>
   <ul> 
     <li><a href="[field:arcurl/]"><img src="[field:litpic/]" alt="[field:title/]"><p><span>[field:title/]</span>[field:description function='cn_substr(@me,110)'/]......</p></a></li>
   <?php
}
}
?>   
   <li class="clear"></li>
   <?php
$atts = array();
$atts['tagname'] = 'arclist';
$atts['typeid'] = '11';
$atts['titlelen'] = '120';
$atts['limit'] = '1,6';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>  
    <li><a href="[field:arcurl/]">·[field:title/]</a></li>  
    <?php
}
}
?>
   </ul>
   </div>