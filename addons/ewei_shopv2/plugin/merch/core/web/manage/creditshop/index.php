<?php
//微 橙 微 信商 城系统
?>
<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
require EWEI_SHOPV2_PLUGIN . 'merch/core/inc/page_merch.php';
class Index_EweiShopV2Page extends MerchWebPage 
{
	public function main() 
	{
		global $_W;
		$this->model->CheckPlugin('taobao');
		if (mcv('creditshop')) 
		{
			header('location: ' . webUrl('creditshop/goods'));
		}
		include $this->template('creditshop/goods');
	}
}
?>