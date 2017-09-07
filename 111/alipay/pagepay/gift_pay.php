<?php
require_once dirname(dirname(__FILE__)).'/config.php';
require_once dirname(__FILE__).'/service/AlipayTradeService.php';
require_once dirname(__FILE__).'/buildermodel/AlipayTradePagePayContentBuilder.php';
ini_set('date.timezone','Asia/Shanghai');
require_once(dirname(dirname(dirname(__FILE__)))."/member/config.php");

if(   $cfg_ml->IsLogin()!="" &&  isset($_POST['price'])) {

    $uid = $cfg_ml->M_ID; //用户唯一id
    $date_time = date("YmdHis");
    $out_trade_no = date('YmdHis') . get_shuffle(4); //商户唯一订单号

    $amount = isset($_POST['number']) ? $_POST['number'] : ''; //礼物数量
//$money         = isset($_GET['w_amount'])  && floor($_GET['w_amount'])==$_GET['w_amount']          ?  trim($_GET['w_amount'])  :  ''   ;
    $money = isset($_POST['price']) ? trim($_POST['price']) : ''; //商品总价
    $gift_id = isset($_POST['gift_id']) && floor($_POST['gift_id']) == $_POST['gift_id'] ? $_POST['gift_id'] : '';//礼物id
    $gift_name = isset($_POST['b_name']) ? $_POST['b_name'] : '';//礼物名称
    $univalent = isset($_POST['univalent']) ? $_POST['univalent'] : '';//礼物单价
    $a_id = isset($_POST['ali_aid']) && floor($_POST['ali_aid']) == $_POST['ali_aid'] ? $_POST['ali_aid'] : ''; //夫人id
    $number_votes = isset($_POST['gift_vote']) && floor($_POST['gift_vote']) == $_POST['gift_vote'] ? $_POST['gift_vote'] : ''; //礼物票数


    $gift_sql = $dsql->getone("select id,name,price,number_votes from `dede_gift`  where id=$gift_id");



    $s_out_trade_no = $dsql->getone("select out_trade_no from `dede_pay` where out_trade_no='$out_trade_no'");
    $lady_m_id = $dsql->getone("SELECT  a.mid  FROM  `dede_archives` AS a  where a.id=$a_id and a.arcrank=0  and a.typeid=2 order by a.id desc");


    $true_money = $gift_sql['price']; //单价
    $true_id = $gift_sql['id'];  //gift  id  ？？？？？
    $true_number_votes = $gift_sql['number_votes']; //表的 gift number votes
    $true_name = $gift_sql['name'];//表的 gift name
    $q_out_trade_no = $s_out_trade_no['out_trade_no'];  //订单号？？、
    $z_money = ($amount * $true_money);  //总金额
    $z_number_votes = ($amount * $number_votes); //总票数

    if($uid==''){

        echo json_encode(array("message"=>'请登录',
            "status"=>0
        ));
        exit;
    }else if($univalent!=$true_money){

        echo json_encode(array("message"=>'商品单价不对,请联系卖家',
            "status"=>2,
            "mon"=>$money,
            "s"=>$true_money
        ));
        exit;
    }else if($gift_name!=$true_name){

        echo  json_encode(array("message"=>'礼物名称不对,请联系卖家',
            "status"=>3
        ));
        exit;
    }else if($number_votes!=$true_number_votes){

        echo json_encode(array("message"=>'礼物单个票数不对,请联系卖家',
            "status"=>4
        ));
        exit;
    }else  if($money!=$z_money){

        echo json_encode(array("message"=>'总价格不对,请联系卖家',
            "status"=>4
        ));
        exit;
    }else if($s_out_trade_no!="") {

        echo json_encode(array("message"=>"订单号重复，请联系卖家",
            "status"=>10000));

        exit;


    }else{


        $wx_sql = " INSERT INTO `dede_pay` ( `uid`, `out_trade_no`, `total_amount`, `trade_no`, `time_stamp`, `stamp`, `type`, `gift_id`, `gift_votes`, `gift_number`,`gift_number_votes`,`receive_uid`, `vote_id`, `vote_name`, `lesson`, `teacher`, `phone`, `vote_money`, `open_id`, `source`, `trade_status`) VALUES($uid, '$out_trade_no', $money, '', '$date_time','', '3','$gift_id','$gift_name','$amount','$z_number_votes','{$lady_m_id["mid"]}','$a_id','','','','', $money, '','支付宝', 0)";

        if($db->ExecNoneQuery($wx_sql)) {


//构造参数
            $payRequestBuilder = new AlipayTradePagePayContentBuilder();
            $payRequestBuilder->setBody($body); //描述
            $payRequestBuilder->setSubject($gift_name);  //订单标题
            $payRequestBuilder->setTotalAmount($money);//订单金额
            $payRequestBuilder->setOutTradeNo($out_trade_no);//商户订单号

            $aop = new AlipayTradeService($config);

            $config['return_url'] =  "http://theme1320.leixunkj.com/alipay/view.php?aid=".$a_id;
            $config['notify_url'] =  "http://theme1320.leixunkj.com/alipay/gift_notify.php";
            /**
             * pagePay 电脑网站支付请求
             * @param $builder 业务参数，使用buildmodel中的对象生成。
             * @param $return_url 同步跳转地址，公网可以访问
             * @param $notify_url 异步通知地址，公网可以访问
             * @return $response 支付宝返回的信息
             */
            $response = $aop->pagePay($payRequestBuilder, $config['return_url'], $config['notify_url']);

//输出表单
            var_dump($response);







        }


    }




}else{

    echo  '内部错误,请联系卖家';


}


function get_shuffle($len){

    $chars = array( "0", "1", "2",
        "3", "4", "5", "6", "7", "8", "9"
    );
    $charsLen = count($chars) - 1;
    shuffle($chars);
    $output = "";
    for ($i=0; $i<$len; $i++)
    {
        $output .= $chars[mt_rand(0, $charsLen)];
    }
    return $output;

}