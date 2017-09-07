<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once '../lib/WxPay.Notify.php';
require_once 'log.php';
require_once(dirname(dirname(dirname(__FILE__)))."/member/config.php");
header('Content-Type: text/xml');



if(isset($_POST)){

    $time = date("Y-m-d H:i:s ",time());
    ////接收传送的数据
      $postStr = file_get_contents('php://input');
    ### 把xml转换为数组
//禁止引用外部xml实体
    libxml_disable_entity_loader(true);
   //先把xml转换为simplexml对象
         $postObj       = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
         $appid         = $postObj->appid;  // 微信分配的公众账号ID（企业号corpid即为此appId）
         $attach        = $postObj->attach;//是body
         $bank_type     = $postObj->bank_type;
         $cash_fee      = $postObj->cash_fee;  //现金支付金额
         $fee_type      = $postObj->fee_type;
         $is_subscribe  = $postObj->is_subscribe;
         $mch_id        = $postObj->mch_id;  //微信支付分配的商户号
         $nonce_str     = $postObj->nonce_str;//随机字符串，不长于32位
         $openid        = $postObj->openid; //用户标识
         $out_trade_no  = $postObj->out_trade_no;  //商户订单号
         $result_code   = $postObj->result_code; //SUCCESS/FAIL
         $return_code   = $postObj->return_code;  //SUCCESS/FAIL 此字段是通信标识，非交易标识，交易是否成功需要查看result_code来判断

         $sign          = $postObj->sign;  //签名验证

         $time_end      = $postObj->time_end; //订单生成时间
         $total_fee     = $postObj->total_fee;  //订单金额
         $trade_type    = $postObj->trade_type;//交易类型
         $transaction_id= $postObj->transaction_id; //微信支付订单号

      //   $device_info   = $postObj-device_info;//设备号

       $z_appid  = WxPayConfig::APPID;
       $z_mch_id = WxPayConfig::MCHID;
       $z_key    = WxPayConfig::KEY;
  //生成签名
   $stringa = "appid=$z_appid&attach=$attach&bank_type=$bank_type&cash_fee=$cash_fee&fee_type=$fee_type&is_subscribe=$is_subscribe&mch_id=$z_mch_id&nonce_str=$nonce_str&openid=$openid&out_trade_no=$out_trade_no&result_code=$result_code&return_code=$return_code&time_end=$time_end&total_fee=$total_fee&trade_type=$trade_type&transaction_id=$transaction_id";
  $strsign = $stringa."&key=$z_key";
  $z_sign    = strtoupper(md5($strsign));

    $s_total_fee = ($total_fee/100);
    $s_cash_fee = ($cash_fee/100);

    $ros = $dsql->getone("select * from `dede_pay`  where  out_trade_no='$out_trade_no'  and  vote_money=$s_total_fee");
    $row =  "update  `dede_pay` set  trade_no='$transaction_id',stamp='$time',open_id='{$openid}',trade_status=2    where out_trade_no='$out_trade_no'  and total_amount=$s_cash_fee and vote_money=$s_total_fee and trade_status=0 ";
    $number_votes = $ros['gift_number_votes'];
    $addon_id = $ros['vote_id'];
    $row2= "update `dede_addon17`  set `toupiao`=toupiao+$number_votes where aid=$addon_id";



    if($ros['type']==2){

        if($s_cash_fee!=$ros['vote_money']){

            $xml =  "<xml><return_code><![CDATA[FAIL]]</return_code><return_msg><![CDATA[金额不对]]></return_msg>";

            echo $xml;

        }else  if($sign!=$z_sign){

            $xml = "<xml><return_code><![CDATA[FAIL]]></return_code><return_msg><![CDATA[签名错误]]></return_msg></xml>";
            echo   $xml;
            exit;

        }else if($db->ExecNoneQuery($row) ){


            $xml = "<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[ok]]></return_msg></xml>";
            echo   $xml;
            exit;

        }else{

            $xml = "<xml><return_code><![CDATA[FAIL]]></return_code><return_mssg><![CDATA[数据失败$row]]></return_mssg>";


            echo $xml;
            exit;

        }

    }else  if($ros['type']==3){

        if($s_cash_fee!=$ros['vote_money']){

            $xml =  "<xml><return_code><![CDATA[FAIL]]</return_code><return_msg><![CDATA[金额不对]]></return_msg>";

            echo $xml;

        }else  if($sign!=$z_sign){

            $xml = "<xml><return_code><![CDATA[FAIL]]></return_code><return_msg><![CDATA[签名错误]]></return_msg></xml>";
            echo   $xml;
            exit;

        }else if($db->ExecNoneQuery($row) ){

            if($db->ExecNoneQuery($row2)){

                $xml = "<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[ok]]></return_msg></xml>";
                echo   $xml;
                exit;

            }else{
                $xml = "<xml><return_code><![CDATA[FAIL]]></return_code><return_msg><![CDATA[票数失败]]></return_msg></xml>";
                echo   $xml;
                exit;

            }




        }else{

            $xml = "<xml><return_code><![CDATA[FAIL]]></return_code><return_mssg><![CDATA[数据失败$row]]></return_mssg>";


            echo $xml;
            exit;

        }




    }






//     $wx = array("return_code"    =>$return_code,
//                 "appid"          =>$appid,
//                 'device_info'    =>$device_info,
//                 "mch_id"         =>$mch_id,
//                 "nonce_str"      =>$nonce_str,
//                 "sign"           =>$sign,
//                 "result_code"    =>$result_code,
//                 "openid"         =>$openid,
//                 "trade_type"     =>$trade_type,
//                 "bank_type"      =>$bank_type,
//                 "total_fee"      =>$total_fee,
//                 "cash_fee"       =>$cash_fee,
//                 "transaction_id" =>$transaction_id,
//                 "out_trade_no"   =>$out_trade_no,
//                 "attach"         =>$attach,
//                 "time_end"       =>$time_end
//                   );


   //  $wx = json_encode($postObj);
//    $row =  "update  `dede_pay` set  trade_no=$transaction_id,stamp=$time,open_id='{$wx}',trade_status=1    where out_trade_no=$out_trade_no  and total_amount=$cash_fee and vote_money=$total_fee and trade_status=0 ";


   // $roq = json_encode(array("row"=>$row));
//
//    $wx_sql = " INSERT INTO `dede_pay` ( `uid`, `out_trade_no`, `total_amount`, `trade_no`, `time_stamp`, `stamp`, `type`, `gift_id`, `gift_votes`, `receive_uid`, `vote_id`, `vote_name`, `lesson`, `teacher`, `phone`, `vote_money`, `open_id`, `source`, `trade_status`) VALUES
//(122, '$out_trade_no', $total_fee, '$transaction_id', '$time','$time', '2','0','0','0','0','基础课程','1天','张x','13958766721', 0.01, '$postStr','回调', 0)";







}


exit;




//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{




	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
            && array_key_exists("result_code", $result)
            && $result["return_code"] == "SUCCESS"
            && $result["result_code"] == "SUCCESS")
		{



			return true;
		}



		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}


		return true;
	}
}

Log::DEBUG("begin notify");
$notify = new PayNotifyCallBack();
$notify->Handle(false);
