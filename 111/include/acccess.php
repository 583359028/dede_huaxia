<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/11
 * Time: 18:01
 */



$appid="wxb5e3b7eacdee3bf5";
$appsecret = "14504880f0f55baae5bed89179284bb3";


$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";

$output = https_request($url);
$jsoninfo = json_decode($output, true);

$access_token = $jsoninfo["access_token"];


$jsonmenu = '{
      "button":[
      
      
      {
            "name":"华夏夫人",
           "sub_button":[
            {
               "type":"view",
               "name":"新闻资讯",
               "url":"http://www.huaxiafuren.com/plus/list.php?tid=9"
            },
            {
               "type":"view",
               "name":"培训报名",
               "url":"http://www.huaxiafuren.com/plus/list.php?tid=4"
            },
            {
               "type":"view",
               "name":"招商加盟",
               "url":"http://www.huaxiafuren.com/plus/list.php?tid=5"
            },
            {
               "type":"view",
               "name":"家教传承",
               "url":"http://www.huaxiafuren.com/plus/list.php?tid=6"
            },
            {
                "type":"view",
                "name":"关于我们",
                "url":"http://www.huaxiafuren.com/plus/list.php?tid=7"
            }]
      

       },
       
       
       {
           "name":"夫人报名",
           "type":"view",
           "url":"http://www.huaxiafuren.com/plus/list.php?tid=2"},
            
            
            
            {
            "name":"投票注册",
            "type": "view", 
            "url":"http://www.huaxiafuren.com/plus/list.php?tid=3"
          
      

       }
            
            
            
            ]
 }';


$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
$result = https_request($url, $jsonmenu);
var_dump($result);

function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

?>