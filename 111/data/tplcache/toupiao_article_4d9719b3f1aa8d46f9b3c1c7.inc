<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>华夏夫人-<?php echo $GLOBALS['_vars']['fxhr']['typename']; ?></title>
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
    <style>#my-video{width: 100%;height:540px;background:url(/templets/default/img/1.jpg)0 0 no-repeat;background-size:cover;z-index: 1}
      .fr_dec span{display: inline-block;*display: block;*zoom:1;}
    </style></head>
  <body>
    <section class="peixun_content newxq_content">
      <div class="toupiao">
        <h1>佳人简介</h1>
        <div class="tp_box mtp_box jrjj">
          <p>
            <img src="<?php echo $GLOBALS['_vars']['fxhr']['litpic']; ?>" class="furen" alt="<?php echo $GLOBALS['_vars']['fxhr']['title']; ?>">
            <img src="<?php echo $GLOBALS['cfg_templets_skin']; ?>/img/tpfr.png" class="furenbg" alt="华夏夫人框"></p>
        </div>
        <div class="fr_dec">
          <p>
            <span>姓名：<?php echo $GLOBALS['_vars']['fxhr']['csz']; ?></span>
            <span>民族：<?php echo $GLOBALS['_vars']['fxhr']['mz']; ?></span>
            <span>报名编号：<?php echo $GLOBALS['_vars']['fxhr']['aid']; ?></span>
            <span>政治面貌：<?php echo $GLOBALS['_vars']['fxhr']['zzmm']; ?></span>
			<span style="width:100%!important">身份证：<?php echo $GLOBALS['_vars']['fxhr']['sfzhm']; ?></span>
		   <span>电话：<?php echo $GLOBALS['_vars']['fxhr']['yddh']; ?></span>
		   <span style="width:100%!important">E-mail：<?php echo $GLOBALS['_vars']['fxhr']['email']; ?></span>
		   <span style="width:50%!important">报名省：<?php echo $GLOBALS['_vars']['fxhr']['s_province']; ?></span>
		   <span style="width:50%!important;">报名市：<?php echo $GLOBALS['_vars']['fxhr']['s_city']; ?></span>
		   <span style="width:50%!important;">报名县：<?php echo $GLOBALS['_vars']['fxhr']['s_county']; ?></span></p>
          <p id="caiyi">才艺：<?php echo $GLOBALS['_vars']['fxhr']['caiyi']; ?></p>
          <p>自我评价：<?php echo $GLOBALS['_vars']['fxhr']['zwpj']; ?></p>
        <div class="clear"></div>
      </div>
      <div class="video">
        <h1>佳人展示视频</h1>
        <div class="m">
          <video id="my-video" class="video-js" controls preload="auto" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
            <source src="<?php echo $GLOBALS['_vars']['fxhr']['shipin']; ?>" type="video/mp4">
              <source src="<?php echo $GLOBALS['_vars']['fxhr']['shipin']; ?>" type="video/webm">
                <source src="<?php echo $GLOBALS['_vars']['fxhr']['shipin']; ?>" type="video/ogv">
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
    </section>
  </body>
</html>