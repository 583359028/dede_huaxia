<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php  if(isset($title)) $_W['page']['title'] = $title?><?php  if(!empty($_W['page']['title'])) { ?><?php  echo $_W['page']['title'];?> - <?php  } ?><?php  if(empty($_W['page']['copyright']['sitename'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微信公众号管理系统<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['sitename'];?><?php  } ?></title>
	<meta name="keywords" content="<?php  if(empty($_W['page']['copyright']['keywords'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>米云网络微信号营销平台,微信,微信公众平台<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['keywords'];?><?php  } ?>" />
	<meta name="description" content="<?php  if(empty($_W['page']['copyright']['description'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>米云微营销系统是国内最完善移动网站及移动互联网技术解决方案。<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['description'];?><?php  } ?>" />
	<link rel="shortcut icon" href="<?php  echo $_W['siteroot'];?><?php  echo $_W['config']['upload']['attachdir'];?>/<?php  if(!empty($_W['setting']['copyright']['icon'])) { ?><?php  echo $_W['setting']['copyright']['icon'];?><?php  } else { ?>images/global/wechat.jpg<?php  } ?>" />
	<!---默认-->
	<link href="./resource/css/bootstrap.min.css" rel="stylesheet">
	<link href="./resource/css/font-awesome.min.css" rel="stylesheet">
	<link href="./resource/css/common.css" rel="stylesheet">
	<script>var require = { urlArgs: 'v=<?php  echo date('YmdH');?>' };</script>
	<script src="./resource/js/lib/jquery-1.11.1.min.js"></script>
	<script src="./resource/js/app/util.js"></script>
	<script src="./resource/js/require.js"></script>
	<script src="./resource/js/app/config.js"></script>
	<!-- CSS -->
	<link rel="stylesheet" href="./themes/mobapps/static/assets/css/login.css">
	<!--[if lt IE 9]>
		<script src="./resource/js/html5shiv.min.js"></script>
		<script src="./resource/js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
	if(navigator.appName == 'Microsoft Internet Explorer'){
		if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
			alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
		}
	}
	
	window.sysinfo = {
		<?php  if(!empty($_W['uniacid'])) { ?>
				'uniacid': '<?php  echo $_W['uniacid'];?>',
		<?php  } ?>
		<?php  if(!empty($_W['acid'])) { ?>
				'acid': '<?php  echo $_W['acid'];?>',
		<?php  } ?>
		<?php  if(!empty($_W['openid'])) { ?>
				'openid': '<?php  echo $_W['openid'];?>',
		<?php  } ?>
		<?php  if(!empty($_W['uid'])) { ?>
				'uid': '<?php  echo $_W['uid'];?>',
		<?php  } ?>
				'siteroot': '<?php  echo $_W['siteroot'];?>',
				'siteurl': '<?php  echo $_W['siteurl'];?>',
				'attachurl': '<?php  echo $_W['attachurl'];?>',
				'attachurl_local': '<?php  echo $_W['attachurl_local'];?>',
				'attachurl_remote': '<?php  echo $_W['attachurl_remote'];?>',
		<?php  if(defined('MODULE_URL')) { ?>
				'MODULE_URL': '<?php echo MODULE_URL;?>',
		<?php  } ?>
				'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'}
		};
	</script>
	</head>
	<body style="overflow-y:auto;">
<div class="container">
      <div class="content_warp">
    <div style="height:70px; overflow:hidden; zoom:1;">
          <div class="logo"><span style="color:#2e2e2e;">米云网络</span><span style="color:#FF6C60;">微信营销系统</span></div>
          <div style="float:right;"> <a target="_blank"<a href="http://www.miyunidc.com/" class="home-link"><i class="fa fa-home"></i>&nbsp;进入官方网站</a></div>
        </div>
  </div>
    </div>
<div class="contentwarp">
<div class="imgbg"> </div>
<div class="textwarp">
      <div class="text">
    <div class="loginwarp">
          <p class="loginp">账号登陆</p>
          <form action="" method="post" role="form" id="form1" onsubmit="return formcheck();">
        <div >
              <input name="username" type="text" class="username" placeholder="请输入用户名登录">
            </div>
        <div>
              <input name="password" type="password" class="password" placeholder="请输入登录密码">
            </div>
        <?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>
        <div>
              <input name="verify" type="text" placeholder="请输入验证码" class="verify" >
              <a href="javascript:;" id="toggle" class="verifyimg"><img id="imgverify" src="<?php  echo url('utility/code')?>" title="点击图片更换验证码"/><span> 换一张</span></a> </div>
        <?php  } ?>
        <div>
              <input type="submit" id="submit"  name="submit" class="submit"  value="登录"/>
              <input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />
            </div>
        <div class="error"><span>+</span></div>
        <a href="<?php  echo url('user/register');?>" class="btn btn-link btn-lg regbtn">免费注册</a>
      </form>
        </div>
  </div>
    </div>
<div class="copyright">
      <p class="link"> <a target="_blank" href="http://www.miyunidc.com/" >米云网络</a> <b>|</b> <a target="_blank" href="http://www.qizhanbao.net/" >免费建站</a> <b>|</b> <a target="_blank" href="http://weixin.symiyun.com/" >米云微信开发</a> <b>|</b> <a target="_blank" href="https://mp.weixin.qq.com/" >微信公众号</a> <b>|</b> <a target="_blank" href="https://open.weixin.qq.com/" >微信开发平台</a> <b>|</b> <a target="_blank" href="https://pay.weixin.qq.com/" >微信支付</a> <b>|</b> <a target="_blank" href="https://www.alipay.com/" >支付宝</a> </p>
      <p style="padding-top:6px;"> <span>网站备案号<a href="#nogo" >鄂ICP备16022868号</a></span> <em>© 2016 米云网络 版权所有</em> </p>
    </div>
<!-- Javascript --> 
<script type="text/javascript">
$('#toggle').click(function() {

	$('#imgverify').prop('src', '<?php  echo url('utility/code')?>r='+Math.round(new Date().getTime()));

	return false;

});

<?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>


	$('#form1').submit(function() {

		var verify = $(':text[name="verify"]').val();

		if (verify == '') {

			alert('请填写验证码');

			return false;

		}

	});

<?php  } ?>

</script>
</body>
</html>
