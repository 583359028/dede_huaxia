<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/5
 * Time: 19:32
 */

require_once"../include/common.inc.php";



if(isset($_POST['mobile'])){

    $mobile       =  preg_match("/^1[234578]{1}\d{9}$/",$_POST['mobile'])  ?   $_POST['mobile']  :  0  ;
    $verification =  floor($_POST['verification']) ?  $_POST['verification']    :   0  ;
    $password =  preg_match("/^(?![A-Z]+$)(?![a-z]+$)(?!\d+$)(?![\W_]+$)\S{6,16}$/",$_POST['pssword'])  ?    $_POST['pssword']  : 0;
    $password1 = preg_match("/^(?![A-Z]+$)(?![a-z]+$)(?!\d+$)(?![\W_]+$)\S{6,16}$/",$_POST['userpwdok']) ?    $_POST['userpwdok'] : 1;



    $row = $dsql->getone("select  mid  from  dede_member  where  userid=$mobile ");//验证是否注册过
    $verification = $dsql->getone("select id from dede_member_mobile where mobile=$mobile  and verification=$verification");  //验证传过来的验证码是否和手机匹配


   if($row['mid']==""  &&  $verification!=""  && $password==$password1){

       $password = md5($password);
       $u = "个人";
       $sql = "insert into `dede_member`(mtype,userid,pwd,uname) values('$u',$mobile,'$password',$mobile )";
       if($db->ExecuteNoneQuery($sql)){

          // header("Location:http://theme1320.leixunkj.com/member/login.php");
        //   echo   '<script>alert("恭喜您注册成为我们的会员")</script>';
           echo  json_encode(array("message"=>"恭喜您,注册成功为我们的会员",
                                    "status"=>1  ));

       }else{

          // header("Location:http://theme1320.leixunkj.com/member/index_do.php?fmdo=user&dopost=regnew");

     echo  json_encode(array("message"=>"注册失败",
                             "status"=>2));

       }



   }



}