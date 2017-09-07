<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once 'log.php';
require_once(dirname(dirname(dirname(__FILE__)))."/member/config.php");



if(   $cfg_ml->IsLogin()!="" ){


 $uid           =  $cfg_ml->M_ID; //用户唯一id
 $out_trade_no  = WxPayConfig::MCHID.date("YmdHis"); //商户唯一订单号
 $date_time     = date("YmdHis");
 $w_title       = isset($_POST['w_title'])                                   ?  $_POST['w_title']         :  ''   ;
 //$money         = isset($_GET['w_amount'])  && floor($_GET['w_amount'])==$_GET['w_amount']          ?  trim($_GET['w_amount'])  :  ''   ;
 $money         = isset($_POST['w_amount'])         ?  trim($_POST['w_amount'])  :  ''   ;
 $lid           = isset($_POST['lid'])       && floor($_POST['lid'])==$_POST['lid']                    ?   $_POST['lid']       :  '';
 $time_out      = isset($_POST['time_out'])                                  ?  $_POST['time_out']        :  ''   ;
 $w_phone       = isset($_POST['w_phone'])   && preg_match("/^1[234578]{1}\d{9}$/",$_POST['w_phone'])  ?   $_POST['w_phone']  :  '';
 $w_teacher     = isset($_POST['w_teacher'])                                 ?  $_POST['w_teacher']       :  ''   ;
 $type          = isset($_POST['type'])      && floor($_POST['type'])==$_POST['type']                  ?   $_POST['type']     :  '';
 $z_money       = $dsql->getone("select price,time,phone,teacher from `dede_addon20`  where aid=$lid");
 $s_out_trade_no= $dsql->getone("select out_trade_no from `dede_pay` where out_trade_no='$out_trade_no'");
 $vote_id       = $dsql->getone("SELECT  b.aid  FROM  `dede_addon17` AS b  left JOIN  `dede_archives` AS a ON b.aid=a.id where a.mid=$uid and a.arcrank=0  and a.typeid=2 order by b.aid desc ");
 $vote_id       = $vote_id['aid'];


         $true_money    = $z_money['price'];
         $kc_out        = $z_money['time'];
         $phone         = $z_money['phone'];
         $teacher       = $z_money['teacher'];
         $q_out_trade_no= $s_out_trade_no['out_trade_no'];

    if($uid==''){

        echo json_encode(array("message"=>'请登录',
                          "status"=>0
            ));
        exit;
    }else if($money!=$true_money){

        echo json_encode(array("message"=>'商品价格不对,请联系卖家',
                               "status"=>2,
                               "mon"=>$money,
                                "s"=>$true_money
        ));
        exit;
    }else if($time_out!=$kc_out){

        echo  json_encode(array("message"=>'课程时间不对,请联系卖家',
                                 "status"=>3
                                    ));
        exit;
    }else if($phone!=$w_phone){

        echo json_encode(array("message"=>'老师电话不对,请联系卖家',
                               "status"=>4
             ));
        exit;
    }else if($teacher!=$w_teacher){

       echo json_encode(array("message"=>'老师姓名不对,请联系卖家',
                              "status"=>5
           ));
        exit;

    }else if($type==''){

        echo json_encode(array("message"=>'type类型不能为空',
                               "status"=>6
        ));
        exit;
    }else if($s_out_trade_no!="") {

        echo json_encode(array("message"=>"订单号重复，请联系卖家",
                               "status"=>10000));

    exit;


    }else{

        $wx_sql = " INSERT INTO `dede_pay` ( `uid`, `out_trade_no`, `total_amount`, `trade_no`, `time_stamp`, `stamp`, `type`, `gift_id`, `gift_votes`, `receive_uid`, `vote_id`, `vote_name`, `lesson`, `teacher`, `phone`, `vote_money`, `open_id`, `source`, `trade_status`) VALUES
($uid, '$out_trade_no', $money, '', '$date_time','', '2','','','','$vote_id','$w_title','$time_out','$w_teacher','$w_phone', $true_money, '','微信', 0)";
        if($db->ExecNoneQuery($wx_sql)){
        //  if(isset($wx_sql)){
            $wx_money = $money * 100;
            $notify = new NativePay();
            $input = new WxPayUnifiedOrder();
            $input->SetBody("培训");//商品名称
            $input->SetAttach("华夏夫人");//自己设置 body
            $input->SetOut_trade_no($out_trade_no);//商户唯一订单号
            $input->SetTotal_fee($wx_money);//因为是已分计算的 所以是1分  草泥马的腾讯文档
            $input->SetTime_start($date_time);//订单生成时间
            $input->SetTime_expire(date("YmdHis", time() + 600)); //订单失效时间
            $input->SetGoods_tag("test"); //单优惠标记，使用代金券或立减优惠功能时需要的参数，说明详见代金券或立减优惠
            $input->SetNotify_url("http://theme1320.leixunkj.com/payment/example/notify.php");//异步接收微信支付结果通知的回调地址，通知url必须为外网可访问的url，不能携带参数。
            $input->SetTrade_type("NATIVE"); //交易类型
            $input->SetProduct_id($lid);//商品 id
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
        }
    }














}
/*
      //alert(w_title); //标题
    //alert(neir); //内容
    //alert(price); //money
    //alert(lid); //标题表的唯一id
  //  alert(time_out); //课程的时间
  //  alert(w_phone);//电话
  //  alert(w_teacher); //老师名称
    wx_title:w_title,
            wx_amount:price,
            lid:lid,
            time_out:time_out,
            w_phone:w_phone,
            w_teacher:w_teacher,
            type:type







//模式一
/**
 * 流程：
 * 1、组装包含支付信息的url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
 * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
 * 5、支付完成之后，微信服务器会通知支付成功
 * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
//$url1 = $notify->GetPrePayUrl("12");


//模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）


/*

$out_trade_no = WxPayConfig::MCHID.date("YmdHis"); //商户唯一订单号





echo json_encode(array(
        "message"=>1,
        "code"=>urlencode($url2),
        "out_trade_no"=>$out_trade_no,

       )
 );


exit;


/*

echo $out_trade_no;



<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>微信支付</title>
</head>
<body>
<!---
	<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">扫描支付模式一</div><br/>
	<img alt="模式一扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url1);?>" style="width:150px;height:150px;"/>
	<br/><br/><br/>
	<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">扫描支付模式二</div><br/>-->
	<img alt="模式二扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url2);?>" style="width:150px;height:150px;"/>

</body>
</html>

*/








?>
<!--
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>微信支付样例</title>
</head>
<body>
<div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">扫描支付模式二</div><br/>
<img alt="||<?php echo $num?>||" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url2);?>" style="width:150px;height:150px;"/>
<div id="myDiv"></div><div id="timer">0</div>
</body>
<script>
    //设置每隔1000毫秒执行一次load() 方法
    var myIntval=setInterval(function(){load()},1000);
    function load(){
        document.getElementById("timer").innerHTML=parseInt(document.getElementById("timer").innerHTML)+1;
        var xmlhttp;
        if (window.XMLHttpRequest){
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }else{
            // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                trade_state=JSON.parse(xmlhttp.responseText);
               // alert(trade_state.code);
                if(trade_state.code=='SUCCESS'){
                    document.getElementById("myDiv").innerHTML='支付成功';
                    //alert(transaction_id);
                    //延迟3000毫秒执行tz() 方法
                    clearInterval(myIntval);
                  //  setTimeout("location.href='success.php'",3000);

                }else if(trade_state.code=='REFUND'){
                    document.getElementById("myDiv").innerHTML='转入退款';
                    clearInterval(myIntval);
                }else if(trade_state.code=='NOTPAY'){
                    document.getElementById("myDiv").innerHTML='请扫码支付';

                }else if(trade_state.code=='CLOSED'){
                    document.getElementById("myDiv").innerHTML='已关闭';
                    clearInterval(myIntval);
                }else if(trade_state.code=='REVOKED'){
                    document.getElementById("myDiv").innerHTML='已撤销';
                    clearInterval(myIntval);
                }else if(trade_state.code=='USERPAYING'){
                    document.getElementById("myDiv").innerHTML='用户支付中';
                }else if(trade_state.code=='PAYERROR'){
                    document.getElementById("myDiv").innerHTML='支付失败';
                    clearInterval(myIntval);
                }

            }
        }

        //orderquery.php 文件返回订单状态，通过订单状态确定支付状态
        xmlhttp.open("POST","orderquery.php",false);
        //下面这句话必须有
        //把标签/值对添加到要发送的头文件。
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("out_trade_no=<?php echo $out_trade_no ?>");

    }
</script>
</html>

