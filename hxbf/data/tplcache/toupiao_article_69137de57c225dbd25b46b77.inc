<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>华夏夫人-<?php echo $fields['typename']; ?></title>
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['cfg_templets_skin']; ?>/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['cfg_templets_skin']; ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['cfg_templets_skin']; ?>/css/mobile.css">
    <link href="<?php echo $GLOBALS['cfg_templets_skin']; ?>/css/video-js.css" rel="stylesheet">
    <script src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/js/jquery.js"></script>
    <!-- If you'd like to support IE8 -->
    <script src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/js/videojs-ie8.min.js"></script>
    <style>#my-video{width: 100%;height:540px;background:url(/templets/default/img/1.jpg)0 0 no-repeat;background-size:cover;z-index: 1}</style></head>
  <body>
    <!--内页头部部分--><?php include $this->CompilerInclude("inhead.htm");
 ?>
    <!--top is over-->
    <section class="peixun_content newxq_content">
      <span class="position">当前位置：<?php echo $fields['position']; ?></span>
      <div class="toupiao">
        <h1>佳人简介</h1>
        <div class="tp_box mtp_box jrjj">
          <p>
            <img src="<?php echo $fields['litpic']; ?>" class="furen" alt="<?php echo $fields['title']; ?>">
            <img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/tpfr.png" class="furenbg" alt="华夏夫人框"></p>
        </div>
        <div class="fr_dec">
          <p>
            <span>姓名：<?php echo $fields['frxm']; ?></span>
            <span>民族：<?php echo $fields['mz']; ?></span>
            <span>编号：<?php echo $fields['bianhao']; ?></span>
            <span>政治面貌：<?php echo $fields['zzmm']; ?></span></p>
          <p id="caiyi">才艺：<?php echo $fields['caiyi']; ?></p>
          <p>当前投票数：<?php echo $fields['dqps']; ?></p>
          <p>自我评价：<?php echo $fields['zwpj']; ?></p>
          <a class="tou_box" style="cursor: pointer;">投票</a>
          <a class="gift" style="cursor: pointer;">送礼</a></div>
        <div class="clear"></div>
      </div>
      <div class="video">
        <h1>佳人展示视频</h1>
        <div class="m">
          <video id="my-video" class="video-js" controls preload="auto" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
            <source src="<?php echo $fields['shipin']; ?>" type="video/mp4">
              <source src="<?php echo $fields['shipin']; ?>" type="video/webm">
                <source src="<?php echo $fields['shipin']; ?>" type="video/ogv">
                  <p class="vjs-no-js">
                    <a href="http://videojs.com/html5-video-support/" target="_blank"></a>
                  </p>
          </video>
          <script src="http://vjs.zencdn.net/5.18.4/video.min.js"></script>
          <script type="text/javascript">var myPlayer = videojs('my-video');
            videojs("my-video").ready(function() {
              var myPlayer = this;
              myPlayer.play();
            });</script>
        </div>
      </div>
      <p class="frone">
        <a href="<?php
$atts = array();
$atts['tagname'] = 'prenext';
$atts['get'] = 'pro';
$atts['runphp'] = 'yes';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>preg_match_all('/<a.*?(?: |\\t|\\r|\\n)?href=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>(.+?)<\/a.*?>/sim', @me, $strResult, PREG_PATTERN_ORDER);@me=$strResult[1][0];<?php
}
}
?> " class="on ">上一位夫人</a><a href="<?php
$atts = array();
$atts['tagname'] = 'prenext';
$atts['get'] = 'next';
$atts['runphp'] = 'yes';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>preg_match_all('/<a.*?(?: |\\t|\\r|\\n)?href=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>(.+?)<\/a.*?>/sim', @me, $strResult, PREG_PATTERN_ORDER);@me=$strResult[1][0];<?php
}
}
?>">下一位夫人</a>
      </p>
    </section>
    <section class="infoot">
      <!--pc新增滚动入口--><?php include $this->CompilerInclude("gdrk.htm");
 ?></div></section>
    <a href="/a/new" class="jzmore jzmore2 mcss">查看更多</a>
    <div class="clear"></div>
    <div class="infoot_process">
      <ul>
        <li>
          <span></span>
          <em>选拔流程Process</em></li>
        <li>
          <span>1</span>
          <em>免费报名</em></li>
        <li>
          <span>2</span>
          <em>第一轮海选</em></li>
        <li>
          <span>3</span>
          <em>第二轮市选</em></li>
        <li>
          <span>4</span>
          <em>第三轮省选</em></li>
        <li>
          <span>5</span>
          <em>第四轮国选</em></li>
        <li>
          <span>6</span>
          <em>第五轮丝路巡</em></li>
      </ul>
    </div>
    </section>
    <section class="hid_box">
      <div class="show_box">
        <span class="close"></span>
        <p>抱歉，您还没有登录，登录后才能投票哦~
          <br/>赶快去登录吧！</p>
        <div class="show_btn">
          <a href="/member/login.php">去登录</a>
          <a href="/member/index_do.php?fmdo=user&dopost=regnew">去注册</a></div>
      </div>
    </section>
    <section class="hid_box2">
      <div class="show_box2">
        <h2>送礼</h2>
        <p>
          <a href="#" id="gift1" class="gift2 gift_on">
            <img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/gift9.png">
            <em>
              <i>烈焰红唇</i>
              <span class="bjprace">1</span>元
              <span class="addps">1</span>票</em></a>
          <a href="#" id="gift2" class="gift2">
            <img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/gift8.png">
            <em>
              <i>喜欢你</i>
              <span class="bjprace2">2</span>元
              <span class="addps">2</span>票</em></a>
          <a href="#" id="gift3" class="gift2">
            <img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/gift7.png">
            <em>
              <i>鲜花</i>
              <span class="bjprace3">5</span>元
              <span class="addps">5</span>票</em></a>
          <a href="#" id="gift4" class="gift2">
            <img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/gift6.png">
            <em>
              <i>女神</i>
              <span class="bjprace4">10</span>元
              <span class="addps">10</span>票</em></a>
          <a href="#" id="gift5" class="gift2">
            <img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/gift5.png">
            <em>
              <i>旋转木马</i>
              <span class="bjprace5">20</span>元
              <span class="addps">20</span>票</em></a>
          <a href="#" id="gift6" class="gift2">
            <img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/gift4.png">
            <em>
              <i>冰淇淋</i>
              <span class="bjprace6">30</span>元
              <span class="addps">30</span>票</em></a>
          <a href="#" id="gift7" class="gift2">
            <img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/gift3.png">
            <em>
              <i>游轮</i>
              <span class="bjprace7">50</span>元
              <span class="addps">52</span>票</em></a>
          <a href="#" id="gift8" class="gift2">
            <img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/gift2.png">
            <em>
              <i>跑车</i>
              <span class="bjprace8">100</span>元
              <span class="addps">110</span>票</em></a>
          <a href="#" id="gift9" class="gift2">
            <img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/gift1.png">
            <em>
              <i>梦幻城堡</i>
              <span class="bjprace9">200</span>元
              <span class="addps">225</span>票</em></a>
        </p>
        <div class="clear"></div>
        <div class="count_jg">
          <div class="count_left">
            <span>数量</span>
            <input type="number" min="0" value='0' class="count" /></div>
          <div class="count_right">支付：￥
            <span class="price" id="price">0</span></div>
        </div>
        <div class="count_jg2">
          <div class="count_left">
            <span>数量</span>
            <input type="number" min="0" value='0' class="count2" /></div>
          <div class="count_right">支付：￥
            <span class="price2" id="price">0</span></div>
        </div>
        <div class="count_jg3">
          <div class="count_left">
            <span>数量</span>
            <input type="number" min="0" value='0' class="count3" /></div>
          <div class="count_right">支付：￥
            <span class="price3" id="price">0</span></div>
        </div>
        <div class="count_jg4">
          <div class="count_left">
            <span>数量</span>
            <input type="number" min="0" value='0' class="count4" /></div>
          <div class="count_right">支付：￥
            <span class="price4" id="price">0</span></div>
        </div>
        <div class="count_jg5">
          <div class="count_left">
            <span>数量</span>
            <input type="number" min="0" value='0' class="count5" /></div>
          <div class="count_right">支付：￥
            <span class="price5" id="price">0</span></div>
        </div>
        <div class="count_jg6">
          <div class="count_left">
            <span>数量</span>
            <input type="number" min="0" value='0' class="count6" /></div>
          <div class="count_right">支付：￥
            <span class="price6" id="price">0</span></div>
        </div>
        <div class="count_jg7">
          <div class="count_left">
            <span>数量</span>
            <input type="number" min="0" value='0' class="count7" /></div>
          <div class="count_right">支付：￥
            <span class="price7" id="price">0</span></div>
        </div>
        <div class="count_jg8">
          <div class="count_left">
            <span>数量</span>
            <input type="number" min="0" value='0' class="count8" /></div>
          <div class="count_right">支付：￥
            <span class="price8" id="price">0</span></div>
        </div>
        <div class="count_jg9">
          <div class="count_left">
            <span>数量</span>
            <input type="number" min="0" value='0' class="count9" /></div>
          <div class="count_right">支付：￥
            <span class="price9" id="price">0</span></div>
        </div>
        <div class="clear"></div>
        <div class="show_btn2">
          <a href="#">微信支付</a>
          <a href="#" class="close2">关闭</a></div>
      </div>
    </section><?php include $this->CompilerInclude("foot.htm");
 ?>
    <script type="text/javascript" src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/js/box.js"></script>
    <script src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/js/menu.js"></script>
    <script src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/js/lk.js"></script>
    <script src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/js/tp.js"></script>
    <script src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/js/gift.js"></script>
  </body>
</html>