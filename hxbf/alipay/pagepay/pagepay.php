<?php
require_once dirname(dirname(__FILE__)).'/config.php';
require_once dirname(__FILE__).'/service/AlipayTradeService.php';
require_once dirname(__FILE__).'/buildermodel/AlipayTradePagePayContentBuilder.php';


require_once dirname(dirname(dirname(__FILE__))).'/include/common.inc.php';



$mid =  $_POST['mid'] !=''  ?    trim($_POST['mid'])  :    0       ;   //用户唯一id

$gift_id = $_POST['aid'] != ''  ? trim($_POST['aid'])   :  0  ;  //产品id


   $row = $dsql->getone(" select price from dede_addon20  where aid = $gift_id");
   $ros = $dsql->getone(" select mid from dede_member where mid = $mid");
  $z_money = $row['price'];

   if($ros['mid'] == 0  && empty($ros['mid'])  ){

       echo  '<script>alert("请先登录");</script>';

       echo '<meta http-equiv="refresh"
content="2;url=/member/login.php">';
exit;

   }else{

       if($z_money!=$_POST['WIDtotal_amount']){


           //  header('Location:/plus/list.php?tid=4');
           echo  '<script>alert("价格不对，请联系商家");</script>';
           echo '<meta http-equiv="refresh"
content="2;url=/plus/list.php?tid=4">';
           exit;

       }else{



        //   $subject = trim($_GET['WIDsubject']);
      //     $out_trade_no = trim($_GET['WIDout_trade_no']);
      //     $total_amount = trim($_GET['WIDtotal_amount']);


           $id  = $ros['mid'];
           //商户订单号，商户网站订单系统中唯一订单号，必填
           $out_trade_no = trim($_POST['WIDout_trade_no']);

           //订单名称，必填
           $subject = trim($_POST['WIDsubject']);

           //付款金额，必填
           $total_amount = trim($_POST['WIDtotal_amount']);

           //商品描述，可空
           $body = trim($_POST['WIDbody']);

           $lesson = trim($_POST['time']);

           $teacher = trim($_POST['teacher']);

           $phone = trim($_POST['phone']);

           $time = date('Y-m-d H:i:s');

           $out_sql = $dsql->getone("select  out_trade_no from  `dede_pay` where out_trade_no= $out_trade_no ");

           if($out_sql['out_trade_no']!=''){

               $out_trade_no =   $out_sql['out_trade_no'];
               $man = 1;
               $out_trade_no.=$man;
               $pay = " INSERT INTO `dede_pay` ( `uid`, `out_trade_no`, `total_amount`, `trade_no`, `time_stamp`, `stamp`, `type`, `gift_id`, `gift_votes`, `receive_uid`, `vote_id`, `vote_name`, `lesson`, `teacher`, `phone`, `vote_money`, `open_id`, `source`, `trade_status`) VALUES
($id, '$out_trade_no', $total_amount, '', '$time','', '2','','','','','$subject','$lesson','$teacher','$phone', $z_money, '','支付宝', 0) ";

               if($db->ExecuteNoneQuery($pay)){

                   //构造参数
                   $payRequestBuilder = new AlipayTradePagePayContentBuilder();
                   $payRequestBuilder->setBody($body);
                   $payRequestBuilder->setSubject($subject);
                   $payRequestBuilder->setTotalAmount($total_amount);
                   $payRequestBuilder->setOutTradeNo($out_trade_no);

                   $aop = new AlipayTradeService($config);

                   /**
                    * pagePay 电脑网站支付请求
                    * @param $builder 业务参数，使用buildmodel中的对象生成。
                    * @param $return_url 同步跳转地址，公网可以访问
                    * @param $notify_url 异步通知地址，公网可以访问
                    * @return $response 支付宝返回的信息
                    */
                   $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

                   //输出表单
                   var_dump($response);

               }else{

                   echo  '错误1';
              exit;

               }





           }else{



               $pay = " INSERT INTO `dede_pay` ( `uid`, `out_trade_no`, `total_amount`, `trade_no`, `time_stamp`, `stamp`, `type`, `gift_id`, `gift_votes`, `receive_uid`, `vote_id`, `vote_name`, `lesson`, `teacher`, `phone`, `vote_money`, `open_id`, `source`, `trade_status`) VALUES
($id, '$out_trade_no', $total_amount, '', '$time','', '2','','','','','$subject','$lesson','$teacher','$phone', $z_money, '','支付宝', 0) ";

               if($db->ExecuteNoneQuery($pay)){

                   //构造参数
                   $payRequestBuilder = new AlipayTradePagePayContentBuilder();
                   $payRequestBuilder->setBody($body);
                   $payRequestBuilder->setSubject($subject);
                   $payRequestBuilder->setTotalAmount($total_amount);
                   $payRequestBuilder->setOutTradeNo($out_trade_no);

                   $aop = new AlipayTradeService($config);

                   /**
                    * pagePay 电脑网站支付请求
                    * @param $builder 业务参数，使用buildmodel中的对象生成。
                    * @param $return_url 同步跳转地址，公网可以访问
                    * @param $notify_url 异步通知地址，公网可以访问
                    * @return $response 支付宝返回的信息
                    */
                   $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

                   //输出表单
                   var_dump($response);

               }else{


                   echo  '错误2';
                   exit;

               }









             echo 'game over';


           }







       }

   }

















?>
