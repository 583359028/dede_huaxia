<?php
/*
    ***聚合数据（JUHE.CN）短信API服务接口PHP请求示例源码
    ***DATE:2015-05-25
*/

require_once"../include/common.inc.php";

    $mobile =   $_GET['mobile'];

    $row = $dsql->getone("select mid from dede_member  where  userid=$mobile ");

    $message = $row['mid'];

if(empty($message)){

    $ros = $dsql->getone("select id from dede_member_mobile where mobile=$mobile");

    $message = 1;  //表示这个账号没有注册过

    $verification = getrand(6);

    $upload_time = time();
    $update_time = time();
    if(empty($ros['id'])){

        $sql = "insert  into `dede_member_mobile`
(mobile,verification,upload_time,update_time,status)  values($mobile,$verification,$upload_time,$update_time,1)";
        $db->ExecuteNoneQuery($sql);

        $gid = $dsql->GetLastID(mobile); //获取刚插入的id

        $verification1  = $dsql->getone("select verification from dede_member_mobile  where id=$gid");

        $ew = $verification1['verification'];

    }else{

        $sql = "Update  `dede_member_mobile` set  verification=$verification where mobile=$mobile ";
        $rs = $dsql->ExecuteNoneQuery($sql);
        $ew = $verification;

        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL

        $smsConf = array(
            'key'   => '9fa9e870e01fe5fcfca5a5d5e82787fe', //您申请的APPKEY
            'mobile'    => $mobile, //接受短信的用户手机号码
            'tpl_id'    => '41747', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$ew //您设置的模板变量，根据实际情况修改
        );

        $content = juhecurl($sendUrl,$smsConf,1); //请求发送短信

        if($content){
            $result = json_decode($content,true);
            $error_code = $result['error_code'];
            if($error_code == 0){
                //状态为0，说明短信发送成功
                //echo "短信发送成功,短信ID：".$result['result']['sid'];
                echo json_encode(array('verification'=>$verification,
                    'status'=>1,
                    'message'=>1
                ));
                exit;
            }else{
                //状态非0，说明失败
                // $msg = $result['reason'];
                // echo "短信发送失败(".$error_code.")：".$msg;
                echo  json_encode(array('verification'=>2,

                    'message'=>$result['reason']

                ));

                exit;

            }
        }else{
            //返回内容异常，以下可根据业务逻辑自行修改
            //echo "请求发送短信失败";

            echo  json_encode(array('status'=>2,
                'message'=>$msg));
            exit;
        }


    }


    if($gid!=0){

        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL

        $smsConf = array(
            'key'   => '9fa9e870e01fe5fcfca5a5d5e82787fe', //您申请的APPKEY
            'mobile'    => $mobile, //接受短信的用户手机号码
            'tpl_id'    => '32836', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$ew //您设置的模板变量，根据实际情况修改
        );

        $content = juhecurl($sendUrl,$smsConf,1); //请求发送短信

        if($content){
            $result = json_decode($content,true);
            $error_code = $result['error_code'];
            if($error_code == 0){
                //状态为0，说明短信发送成功
                //echo "短信发送成功,短信ID：".$result['result']['sid'];
                echo json_encode(array('verification'=>$verification,
                                       'status'=>1,
                                       'message'=>1
                                       ));
                exit;
            }else{
                //状态非0，说明失败
               // $msg = $result['reason'];
               // echo "短信发送失败(".$error_code.")：".$msg;
                echo  json_encode(array('verification'=>2,
                                        'message'=>$result['reason']
                                         ));
            exit;
            }
        }else{
            //返回内容异常，以下可根据业务逻辑自行修改
            //echo "请求发送短信失败";

           echo  json_encode(array('status'=>2,
                                   'message'=>$msg));
           exit;
        }
    }

}else{

    echo  json_encode(array('status'=>2,
                            'message'=>"该账号已经注册过"));
   exit;

}



/*
    $shuju = array();
while($arr = $dsql->GetArray('id'))
{
   $shuju[$arr['id']] =$arr;
}
print_r($shuju);   打印出所有数据
exit;
*/


function    getrand($len){

    $chars = array("0","1","2","3","4","5","6","7","8","9");
    $charsLen = count($chars) - 1 ; //统计数组的数量 循环一次减一不然会报错
    shuffle($chars);   //打乱数组的顺序性
    $output = "";   //定义一个空变量
    for ($i=0;$i<$len;$i++){

        $output .=$chars[mt_rand(0, $charsLen)];  //产生随机数


    }
    return $output;
}



/**
 * 请求接口返回内容
 * @param  string $url [请求的URL地址]
 * @param  string $params [请求的参数]
 * @param  int $ipost [是否采用POST形式]
 * @return  string
 */
function juhecurl($url,$params=false,$ispost=0){
    $httpInfo = array();
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
    curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
    curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
    if( $ispost )
    {
        curl_setopt( $ch , CURLOPT_POST , true );
        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
        curl_setopt( $ch , CURLOPT_URL , $url );
    }
    else
    {
        if($params){
            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
        }else{
            curl_setopt( $ch , CURLOPT_URL , $url);
        }
    }
    $response = curl_exec( $ch );
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
    curl_close( $ch );
    return $response;
}