<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once 'log.php';
require_once(dirname(dirname(dirname(__FILE__)))."/member/config.php");




if(   $cfg_ml->IsLogin()!="" &&  isset($_POST['price'])){


    $uid           =  $cfg_ml->M_ID; //用户唯一id

    $out_trade_no= WxPayConfig::MCHID.date("YmdHis"); //商户唯一订单号

    $date_time   = date("YmdHis");

    $amount      = isset($_POST['amount'])                                   ?  $_POST['amount']         :  ''   ; //礼物数量
    //$money         = isset($_GET['w_amount'])  && floor($_GET['w_amount'])==$_GET['w_amount']          ?  trim($_GET['w_amount'])  :  ''   ;
    $money       = isset($_POST['price'])                                    ?  trim($_POST['price'])    :  ''   ; //商品总价
    $gift_id     = isset($_POST['gift_id'])   && floor($_POST['gift_id'])==$_POST['gift_id']        ?   $_POST['gift_id']     :  '';//礼物id
    $gift_name   = isset($_POST['gift_name'])                                ?  $_POST['gift_name']      :  ''   ;//礼物名称
    $univalent   = isset($_POST['univalent'])                                ?  $_POST['univalent']      :  ''   ;//礼物单价
    $a_id        = isset($_POST['a_id'])      && floor($_POST['a_id'])==$_POST['a_id']              ?   $_POST['a_id']        :  ''; //夫人id
    $number_votes= isset($_POST['number_votes'])&&floor($_POST['number_votes'])==$_POST['number_votes']?   $_POST['number_votes'] :  ''; //礼物票数

    $gift_sql       = $dsql->getone("select id,name,price,number_votes from `dede_gift`  where id=$gift_id");


    $s_out_trade_no= $dsql->getone("select out_trade_no from `dede_pay` where out_trade_no='$out_trade_no'");
    $lady_m_id       = $dsql->getone("SELECT  a.mid  FROM  `dede_archives` AS a  where a.id=$a_id and a.arcrank=0  and a.typeid=2 order by a.id desc");



    $true_money         = $gift_sql['price']; //单价
    $true_id            = $gift_sql['id'];  //gift  id  ？？？？？
    $true_number_votes  = $gift_sql['number_votes']; //表的 gift number votes
    $true_name          = $gift_sql['name'];//表的 gift name
    $q_out_trade_no     = $s_out_trade_no['out_trade_no'];  //订单号？？、
    $z_money            = ($amount*$true_money);  //总金额
    $z_number_votes     = ($amount*$number_votes); //总票数
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




        $wx_sql = " INSERT INTO `dede_pay` ( `uid`, `out_trade_no`, `total_amount`, `trade_no`, `time_stamp`, `stamp`, `type`, `gift_id`, `gift_votes`, `gift_number`,`gift_number_votes`,`receive_uid`, `vote_id`, `vote_name`, `lesson`, `teacher`, `phone`, `vote_money`, `open_id`, `source`, `trade_status`) VALUES($uid, '$out_trade_no', $money, '', '$date_time','', '3','$gift_id','$gift_name','$amount','$z_number_votes','{$lady_m_id["mid"]}','$a_id','','','','', $money, '','微信', 0)";

        if($db->ExecNoneQuery($wx_sql)){
            //  if(isset($wx_sql)){
            $wx_money = $money * 100;
            $notify = new NativePay();
            $input = new WxPayUnifiedOrder();
            $input->SetBody($gift_name);//商品名称
            $input->SetAttach("华夏夫人");//自己设置 body
            $input->SetOut_trade_no($out_trade_no);//商户唯一订单号
            $input->SetTotal_fee($wx_money);//因为是已分计算的 所以是1分  草泥马的腾讯文档
            $input->SetTime_start($date_time);//订单生成时间
            $input->SetTime_expire(date("YmdHis", time() + 600)); //订单失效时间
            $input->SetGoods_tag("test"); //单优惠标记，使用代金券或立减优惠功能时需要的参数，说明详见代金券或立减优惠
            $input->SetNotify_url("http://theme1320.leixunkj.com/payment/example/notify.php");//异步接收微信支付结果通知的回调地址，通知url必须为外网可访问的url，不能携带参数。
            $input->SetTrade_type("NATIVE"); //交易类型
            $input->SetProduct_id($gift_id);//商品 id
            $result = $notify->GetPayUrl($input);//最终的信息，可以打印了进行调试
//            echo $wx_sql;
//       print_r($input);
//       exit;
            $url2 = $result["code_url"];
            //   $ss = urlencode($url2);

            // echo '<img alt="" src="http://paysdk.weixin.qq.com/example/qrcode.php?data='.$ss.'" style="width:150px;height:150px;"/>';

            echo json_encode(array(
                    "message"=>1,
                    "code"=>urlencode($url2),
                    "out_trade_no"=>$out_trade_no,

                )
            );

            exit;
        }else{

            echo json_encode(array(
                    "message"=>'insert  error',
                    "status"=>9999

                )
            );

            exit;

        }
    }














}