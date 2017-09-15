<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14
 * Time: 16:58
 */
 
require_once("./AopSdk.php");
//构造参数
$aop = new AopClient ();
$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
$aop->appId = '2017080408033524';
$aop->rsaPrivateKey = 'MIIEowIBAAKCAQEAn3Yig9zYNLLe1odEu8w6x8TkHx6Yxzl2stxcq7r3GHWryI/NyB67bFsR04+jy3zGiK6+k6PlAjUqjN6LKjcMsGaUjFit5mWnAhAwjbSJk0Y6f24QVoTdrO8egxirlVgqU+kP0KjSyQf08zh+PSfQOZ6YoptIH+7ies8p4LvekO6ACjzqHnfv7cZjS9Jv97HNMXeU4tWFwArFBUUR1MJDGFIFXQvOYioHwgSDIJG259U9gCOwAO64or3XHB1tQDbRiMiOH4JeNlADQh4WSkMky6o2lC45qNDGV7BF17KesOlUkTBtk6gZ1gZm928Aj6XB+iW0IkhJA/heC0mcXi/V1wIDAQABAoIBAH6SkssAHU2XPXIjZNd8QJwZGMnqy3I3lpRafeSCP2hW3sgP/VN/sV1M3FWFiooWvK/5pKQkT7703JV8gBI+KABNLFRKf56FyY7FswSH7TvNXtmPT8CdLif6lcmRZ4DfvplkQX1qxAV2H2R/zxRT6eASly1a/GD8iSDaF2+fMAbxSBmVJM2JVV4ZlEaLhtnQo0Rs4c/gSZqRtkViP19bS3wc2mOHqd6qUxzDznmgI93y5WWFnNHQZGOOw0o2m00nL5haIUDbO4ZD003dIdd6oQBJQsy+ARltIJkYkEiTNnGOCxCnD5UYGdDbAN4a4t5KqSLOSeZRXLxCwaVkv0M9uAECgYEA0P6YKw/U2DJjXumwB8czwdo0jjLhBkef7SwOfvxWxVO03YpaPQxn6p60YDxl6vGOly0HoF5X47TV+Vi2jLguBId2s5qZHpElWiPqk2fzrUc7EJK3aesXPtOh7haKlSGzoTehqlhwnfTRreqWR10QVmr4Qz9sLWIvEO9kkkK2FtcCgYEAw1OLtxxs8gTQ58LYs1HIId/pm2ba9aS7JxqLVRYjWjhl2Ux5FddXiCsYBNNd/Ecbixk9yghffLPcD6O9TigoT/hQuUHIphjMSMXGdZL6hl1tdccxfhJqzNWkv0BSgIzENwwRbcJpvpEf2Tqxi8dzqeTFAozcXlXnd/E01pKfWQECgYAVbGOw1lidKN0i15Wh1nupvXJxuSlz+VedekyqG7fRVnlN1GbXpzPnywj2bHqOEODrAkSr3b/oqZrdioh7+E1PTYuPcaOMjJhlmxTqs1c5Rfn6AvAmPWEOoacRvuHJ08CUIB3EVniE2Jm92DQ7cIDCOwjj69Zs+ImWlNOcYpZD1QKBgHcCoX85P5wamRqNGrHvo2wYXOLFwaWn8Cw8PSbjrTicYloLAT/wjDG4aBMQohRDUyHmiEJf5aY6hFu3HXHQf/dxyeWGknW5aEby0h/zJNfXdwkrDBnPqOkTRyUMUPhoTGlp3fitWva0v94AqAsNxIiAjhUmtGJ6HuVyvwn6HkMBAoGBAIP1cfQZ/fJmak6mwSSnM6us8r3harK802dMXHtB7BwAS7dE2I6aW2BKJCQt0gK3W60uDf5pqiAS4AJxXZzj3team3jaOuD7ywtzE/oVtl9tmPX61GVyQ1u/DVfT6cl0sopOQfJcihl1WCP3IJRqYN/qVNJWP+mB+MsP4XUiK4b1';
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset= 'utf-8';
$aop->format='json';
$request = new AlipayTradePagePayRequest ();
$request->setReturnUrl('http://theme1320.leixunkj.com/alipay/return_url.php');
$request->setNotifyUrl('http://theme1320.leixunkj.com/alipay/notify_url.php');
$request->setBizContent('{"product_code":"FAST_INSTANT_TRADE_PAY","out_trade_no":"20150320010101002","subject":"Iphone6 16G","total_amount":"0.01","body":"Iphone6 16G"}');

//请求
//$result = $aop->pageExecute ($request);
echo $aop->pageExecute ($request);
//输出
//echo $result;
