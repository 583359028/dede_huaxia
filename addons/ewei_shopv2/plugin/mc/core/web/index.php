<?php
//Ã×ÔÆÍøÂç¿Æ¼¼www.symiyun.com
@eval ('//www.phpjiami.com ä¸“å±žVIPä¼šå‘˜åŠ å¯†!');
global $phpjiami_decrypt;
$phpjiami_decrypt['ÁÖ®ÖÀýÃÃÃ®ˆŽ¾ˆÖ¯ÃÃ¾¯ˆÄ®¥ÃýÖ¥Ž”ýÄ'] = base64_decode('ZGVmaW5lZA==');
$phpjiami_decrypt['Ž¯¯”‹¯¯¾®¥Ã”®ÄýÁ¥¯”Ãˆ¥ŽÃ‹Ž”®¯¾ˆ®'] = base64_decode('aGVhZGVy');

if (!$GLOBALS['phpjiami_decrypt']['ÁÖ®ÖÀýÃÃÃ®ˆŽ¾ˆÖ¯ÃÃ¾¯ˆÄ®¥ÃýÖ¥Ž”ýÄ'](base64_decode('SU5fSUE='))) {
	exit(base64_decode('QWNjZXNzIERlbmllZA=='));
}

class Index_EweiShopV2Page extends PluginWebPage
{
	public function main()
	{
		$GLOBALS['phpjiami_decrypt']['Ž¯¯”‹¯¯¾®¥Ã”®ÄýÁ¥¯”Ãˆ¥ŽÃ‹Ž”®¯¾ˆ®'](base64_decode('bG9jYXRpb246IA==') . webUrl(base64_decode('bWMvaW5kZXgvaW5kZXg=')));
		exit();
	}

	public function index()
	{
		global $_W;
		include $this->template();
	}
}

?>
