<?php
//米云网络科技www.symiyun.com
@eval ('//www.phpjiami.com 涓撳睘VIP浼氬憳鍔犲瘑!');
global $phpjiami_decrypt;
$phpjiami_decrypt['林例妹卯垘緢织妹警埬谬芝帞'] = base64_decode('ZGVmaW5lZA==');
$phpjiami_decrypt['謹攬亮久聊局斄幹脠懒览灸磨'] = base64_decode('bWF4');
$phpjiami_decrypt['攱ブ帇喇揪闹埉膸瘮嬀拿'] = base64_decode('aW50dmFs');
$phpjiami_decrypt['敮幜翈芝旪幟垟瘞臄埊闹攬局掷昆'] = base64_decode('c3RydG9sb3dlcg==');
$phpjiami_decrypt['瘓铸卯昆林垕ブ卯ッ闹林林嫰'] = base64_decode('dHJpbQ==');
$phpjiami_decrypt['嫢龐攷至撩編敟翑謰织垕闹謰种嫀'] = base64_decode('aXNfYXJyYXk=');
$phpjiami_decrypt['昧ッ帜埉志緥垘謳至斨ク纠埬巿'] = base64_decode('aW1wbG9kZQ==');

if (!$GLOBALS['phpjiami_decrypt']['林例妹卯垘緢织妹警埬谬芝帞'](base64_decode('SU5fSUE='))) {
	exit(base64_decode('QWNjZXNzIERlbmllZA=='));
}

class Merchant_EweiShopV2Page extends PluginWebPage
{
	public function main()
	{
		global $_W;
		global $_GPC;
		ca(base64_decode('Y29tbWlzc2lvbi5hZ2VudC52aWV3'));
		$level = $this->set['level'];
		$pindex = $GLOBALS['phpjiami_decrypt']['謹攬亮久聊局斄幹脠懒览灸磨'](1, $GLOBALS['phpjiami_decrypt']['攱ブ帇喇揪闹埉膸瘮嬀拿']($_GPC['page']));
		$psize = 20;
		$params = array();
		$condition = '';
		$searchfield = $GLOBALS['phpjiami_decrypt']['敮幜翈芝旪幟垟瘞臄埊闹攬局掷昆']($GLOBALS['phpjiami_decrypt']['瘓铸卯昆林垕ブ卯ッ闹林林嫰']($_GPC['searchfield']));
		$keyword = $GLOBALS['phpjiami_decrypt']['瘓铸卯昆林垕ブ卯ッ闹林林嫰']($_GPC['keyword']);
		load()->func(base64_decode('dHBs'));
		include $this->template();
	}

	public function add()
	{
		$this->post();
	}

	public function edit()
	{
		$this->post();
	}

	protected function post()
	{
		include $this->template();
	}

	public function delete()
	{
		global $_W;
		global $_GPC;
		$id = $GLOBALS['phpjiami_decrypt']['攱ブ帇喇揪闹埉膸瘮嬀拿']($_GPC['id']);

		if (empty($id)) {
			$id = ($GLOBALS['phpjiami_decrypt']['嫢龐攷至撩編敟翑謰织垕闹謰种嫀']($_GPC['ids']) ? $GLOBALS['phpjiami_decrypt']['昧ッ帜埉志緥垘謳至斨ク纠埬巿'](',', $_GPC['ids']) : 0);
		}

		$members = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_member') . ' WHERE id in( ' . $id . ' ) AND uniacid=' . $_W['uniacid']);

		foreach ($members as $member) {
			pdo_update('ewei_shop_member', array('isagent' => 0, 'status' => 0), array('id' => $member['id']));
			plog(base64_decode('Y29tbWlzc2lvbi5hZ2VudC5kZWxldGU='), '鍙栨秷鍒嗛攢鍟嗚祫鏍?<br/>鍒嗛攢鍟嗕俊鎭?  ID: ' . $member['id'] . ' /  ' . $member['openid'] . '/' . $member['nickname'] . '/' . $member['realname'] . '/' . $member['mobile']);
		}

		show_json(1, array(base64_decode('dXJs') => referer()));
	}
}

?>
