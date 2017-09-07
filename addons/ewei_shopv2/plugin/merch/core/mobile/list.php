<?php
//米云网络科技www.symiyun.com
class List_EweiShopV2Page extends PluginMobilePage
{
	public function main()
	{
		global $_W;
		global $_GPC;
		$category = $this->model->getCategory(array(
	'isrecommand' => 1,
	'status'      => 1,
	'orderby'     => array('displayorder' => 'desc', 'id' => 'asc')
	));
		$merchuser = $this->model->getMerch(array(
	'isrecommand' => 1,
	'status'      => 1,
	'field'       => 'id,uniacid,merchname,desc,logo,groupid,cateid',
	'orderby'     => array('id' => 'asc')
	));
		$category_swipe = $this->model->getCategorySwipe(array(
	'status'  => 1,
	'orderby' => array('displayorder' => 'desc', 'id' => 'asc')
	));
		include $this->template();
	}

	public function category()
	{
		global $_W;
		global $_GPC;
		$data = array();

		if (!empty($_GPC['keyword'])) {
			$data['likecatename'] = $_GPC['keyword'];
		}

		$data = array_merge($data, array(
	'status'  => 1,
	'orderby' => array('displayorder' => 'desc', 'id' => 'asc')
	));
		$category = $this->model->getCategory($data);
		include $this->template();
	}

	public function merchuser()
	{
		global $_W;
		global $_GPC;
		$data = array();
		$data = array_merge($data, array(
	'status'  => 1,
	'orderby' => array('displayorder' => 'desc', 'id' => 'asc')
	));
		$category = $this->model->getCategory($data);

		foreach ($category as &$value) {
			$value['thumb'] = tomedia($value['thumb']);
		}

		unset($value);
		include $this->template();
	}

	public function ajaxmerchuser()
	{
		global $_W;
		global $_GPC;
		$data = array();
		$pindex = max(1, intval($_GPC['page']));
		$psize = 30;
		$lat = floatval($_GPC['lat']);
		$lng = floatval($_GPC['lng']);
		$sorttype = $_GPC['sorttype'];
		$range = $_GPC['range'];

		if (empty($range)) {
			$range = 10;
		}

		if (!empty($_GPC['keyword'])) {
			$data['like'] = array('merchname' => $_GPC['keyword']);
		}

		if (!empty($_GPC['cateid'])) {
			$data['cateid'] = $_GPC['cateid'];
		}

		$data = array_merge($data, array('status' => 1, 'field' => 'id,uniacid,merchname,desc,logo,groupid,cateid,address,tel,lng,lat'));

		if (!empty($sorttype)) {
			$data['orderby'] = array('id' => 'desc');
		}

		$merchuser = $this->model->getMerch($data);

		if (!empty($merchuser)) {
			$data = array();
			$data = array_merge($data, array(
	'status'  => 1,
	'orderby' => array('displayorder' => 'desc', 'id' => 'asc')
	));
			$category = $this->model->getCategory($data);
			$cate_list = array();

			if (!empty($category)) {
				foreach ($category as $k => $v) {
					$cate_list[$v['id']] = $v;
				}
			}

			foreach ($merchuser as $k => $v) {
				if (($lat != 0) && ($lng != 0) && !empty($v['lat']) && !empty($v['lng'])) {
					$distance = m('util')->GetDistance($lat, $lng, $v['lat'], $v['lng'], 2);
					if ((0 < $range) && ($range < $distance)) {
						unset($merchuser[$k]);
						continue;
					}

					$merchuser[$k]['distance'] = $distance;
				}
				else {
					$merchuser[$k]['distance'] = 100000;
				}

				$merchuser[$k]['catename'] = $cate_list[$v['cateid']]['catename'];
				$merchuser[$k]['url'] = mobileUrl('merch/map', array('merchid' => $v['id']));
				$merchuser[$k]['merch_url'] = mobileUrl('merch', array('merchid' => $v['id']));
				$merchuser[$k]['logo'] = tomedia($v['logo']);
			}
		}

		$total = count($merchuser);

		if ($sorttype == 0) {
			$merchuser = m('util')->multi_array_sort($merchuser, 'distance');
		}

		$start = ($pindex - 1) * $psize;

		if (!empty($merchuser)) {
			$merchuser = array_slice($merchuser, $start, $psize);
		}

		show_json(1, array('list' => $merchuser, 'total' => $total, 'pagesize' => $psize));
	}
}

?>
