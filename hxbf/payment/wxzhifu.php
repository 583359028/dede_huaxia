<?php

require_once "lib/WxPay.Api.php";
require_once "lib/WxPay.Config.php";

$zhifu = new WxPayConfig();

$unifiedOrder =  new WxPayConfig();

$this->parameters["appid"] = WxPayConf_pub::APPID;//公众账号ID
$this->parameters["mch_id"] = WxPayConf_pub::MCHID;//商户号
$this->parameters["spbill_create_ip"] = $_SERVER['REMOTE_ADDR'];//终端ip
$this->parameters["nonce_str"] = $this->createNoncestr();//随机字符串
$this->parameters["sign"] = $this->getSign($this->parameters);//签名




//使用native通知接口
$nativeCall = new NativeCall_pub();
//接收微信请求
$xml = $GLOBALS['HTTP_RAW_POST_DATA'];


$product_id = $nativeCall->getProductId();

$unifiedOrder->setParameter("body","贡献一分钱");//商品描述
//自定义订单号，此处仅作举例
$timeStamp = time();
$out_trade_no = WxPayConf_pub::APPID."$timeStamp";
$unifiedOrder->setParameter("out_trade_no","$out_trade_no");//商户订单号
$unifiedOrder->setParameter("total_fee","1");//总金额
$unifiedOrder->setParameter("notify_url",WxPayConf_pub::NOTIFY_URL);//通知地址
$unifiedOrder->setParameter("trade_type","NATIVE");//交易类型
$unifiedOrder->setParameter("product_id","$product_id");//用户标识
//非必填参数，商户可根据实际情况选填
//$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号
//$unifiedOrder->setParameter("device_info","XXXX");//设备号
//$unifiedOrder->setParameter("attach","XXXX");//附加数据
//$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
//$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间
//$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记
//$unifiedOrder->setParameter("openid","XXXX");//用户标识


$prepay_id = $unifiedOrder->getPrepayId();


$nativeCall->setReturnParameter("return_code","SUCCESS");//返回状态码
$nativeCall->setReturnParameter("result_code","SUCCESS");//业务结果
$nativeCall->setReturnParameter("prepay_id","$prepay_id");//预支付ID

//将结果返回微信
$returnXml = $nativeCall->returnXml();
echo $returnXml;

















