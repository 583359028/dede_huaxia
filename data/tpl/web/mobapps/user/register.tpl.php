<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php  if(isset($title)) $_W['page']['title'] = $title?><?php  if(!empty($_W['page']['title'])) { ?><?php  echo $_W['page']['title'];?> - <?php  } ?><?php  if(empty($_W['page']['copyright']['sitename'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>米云微信公众号管理系统<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['sitename'];?><?php  } ?></title>
	<meta name="keywords" content="<?php  if(empty($_W['page']['copyright']['keywords'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微信号营销平台,微信,微信公众平台<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['keywords'];?><?php  } ?>" />
	<meta name="description" content="<?php  if(empty($_W['page']['copyright']['description'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>米云微信营销系统是国内最完善移动网站及移动互联网技术解决方案。<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['description'];?><?php  } ?>" />
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
	<link rel="stylesheet" href="./themes/mobapps/static/assets/css/register.css">
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
	<body>
<div class="container">
      <div class="logo" style="padding-top:18px; padding-bottom:25px;"><span style="color:#2e2e2e;">米云网络</span><span style="color:#FF6C60;">微信营销系统</span></div>
      <div class="clearfix" style="margin-bottom:5em;">
    <div class="panel panel-default container" style="width:50%; box-shadow: 0 0 6px 2px rgba(0, 0, 0, 0.1); border-radius: 5px; background: rgba(255, 255, 255, 0.65);">
          <div class="panel-body">
        <form action="" method="post" role="form" id="form1">
              <div class="form-group">
            <label>用户名:<span style="color:red">*</span></label>
            <input name="username" type="text" class="form-control" placeholder="请输入用户名">
          </div>
              <div class="form-group">
            <label>密码:<span style="color:red">*</span></label>
            <input name="password" type="password" id="password" class="form-control" placeholder="请输入不少于8位的密码">
          </div>
              <div class="form-group">
            <label>确认密码:<span style="color:red">*</span></label>
            <input name="password" type="password" id="repassword" class="form-control" placeholder="请再次输入不少于8位的密码">
          </div>
              <?php  if($extendfields) { ?>
              
              <?php  if(is_array($extendfields)) { foreach($extendfields as $item) { ?>
              <div class="form-group">
            <label><?php  echo $item['title'];?>：<?php  if($item['required']) { ?><span style="color:red">*</span><?php  } ?></label>
            <?php  echo tpl_fans_form($item['field'])?> </div>
              <?php  } } ?>
              
              <?php  } ?>
              
              <?php  if($setting['register']['code']) { ?>
              <div class="form-group">
            <label style="display:block;">验证码:<span style="color:red;">*</span></label>
            <input name="code" type="text" class="form-control" placeholder="请输入验证码" style="width:65%;display:inline;margin-right:17px">
            <img src="<?php  echo url('utility/code');?>" class="img-rounded" style="cursor:pointer;" onclick="this.src='<?php  echo url('utility/code');?>' + Math.random();" /> </div>
              <?php  } ?> 
              
              <!--div class="form-group">

						<label>邀请码:<span style="color:red">*</span></label>

						<input name="invitation" type="text" class="form-control" placeholder="请输入邀请码">

					</div-->
              
              <div class="pull-right"> <a href="<?php  echo url('user/login');?>" class="btn btn-link">登录</a>
            <input type="submit" name="submit" value="注册" class="btn btn-default" />
            <input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />
          </div>
            </form>
      </div>
        </div>
  </div>
      <div class="copyright">© CopyRight MiYun. All Rights Reserved.</div>
    </div>
<!-- Javascript --> 
<script src="./themes/mobapps/static/assets/js/supersized.3.2.7.min.js"></script> 
<script src="./themes/mobapps/static/assets/js/scripts.js"></script> 
<script type="text/livescript">

	$('#form1').submit(function(){

		if($.trim($(':text[name="username"]').val()) == '') {

			util.message('没有输入用户名.', '', 'error');

			return false;

		}

		if($('#password').val() == '') {

			util.message('没有输入密码.', '', 'error');

			return false;

		}

		if($('#password').val() != $('#repassword').val()) {

			util.message('两次输入的密码不一致.', '', 'error');

			return false;

		}

/* 		<?php  if(is_array($extendfields)) { foreach($extendfields as $item) { ?>

		<?php  if($item['required']) { ?>

			if (!$.trim($('[name="<?php  echo $item['field'];?>"]').val())) {

				util.message('<?php  echo $item['title'];?>为必填项，请返回修改！', '', 'error');

				return false;

			}

		<?php  } ?>

		<?php  } } ?>

 */		<?php  if($setting['register']['code']) { ?>

		if($.trim($(':text[name="code"]').val()) == '') {

			util.message('没有输入验证码.', '', 'error');

			return false;

		}

		<?php  } ?>

	});

	var h = document.documentElement.clientHeight;

	$(".login").css('min-height',h);

</script>
</body>
</html>
