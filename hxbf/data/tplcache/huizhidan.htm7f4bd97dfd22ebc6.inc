<?php
$z[0]=Array("field","",89,111);
$z[0][4]=array();
$z[0][4]['name']="typename";
$z[1]=Array("global","",354,386);
$z[1][4]=array();
$z[1][4]['name']="cfg_templets_skin";
$z[2]=Array("global","",451,483);
$z[2][4]=array();
$z[2][4]['name']="cfg_templets_skin";
$z[3]=Array("global","",547,579);
$z[3][4]=array();
$z[3][4]['name']="cfg_templets_skin";
$z[4]=Array("include","",754,791);
$z[4][4]=array();
$z[4][4]['filename']="inhead.htm";
$z[5]=Array("php","\r\n      \$out_no =  \$_GET['out_no'];\r\n  \$sql = \$dsql->getone(\" select * from dede_pay where out_trade_no=\$out_no \");\r\n\r\n   \$name = \$dsql->getone(\"select uname from dede_member where  mid=\".\$sql['uid']);\r\n\r\n      echo  \"\r\n      <p><i>姓名：</i><span>\".\$name['uname'].\"</span></p>\r\n      <p><i>编号：</i><span>\".\$sql['id'].\"</span></p>\r\n      <p><i>下单日期：</i><span>\".\$sql['time_stamp'].\"</span></p>\r\n      <p><i>订单号：</i><span>\".\$sql['out_trade_no'].\"</span></p>\r\n      <p><i>课程：</i><span>\".\$sql['vote_name'].\"</span></p>\r\n      <p><i>课时：</i><span>\".\$sql['lesson'].\"</span></p>\r\n      <p><i>导师：</i><span>\".\$sql['teacher'].\"</span></p>\r\n      <p><i>客服电话：</i><span>\".\$sql['phone'].\"</span></p> \";\r\n\r\n      ",903,1675);
$z[5][4]=array();
$z[6]=Array("include","",3763,3798);
$z[6][4]=array();
$z[6][4]['filename']="gdrk.htm";
$z[7]=Array("type","[field:typeurl/]",4752,4803);
$z[7][4]=array();
$z[7][4]['typeid']="18";
$z[8]=Array("include","",5417,5452);
$z[8][4]=array();
$z[8][4]['filename']="foot.htm";
$z[9]=Array("php","\r\n         require_once(DEDEINC.\"/memberlogin.class.php\");\r\n         \$member = new  MemberLogin();\r\n         \$memberID = \$member->M_ID;\r\n         echo \$memberID;\r\n         ",6697,6890);
$z[9][4]=array();
$z[10]=Array("global","",7300,7332);
$z[10][4]=array();
$z[10][4]['name']="cfg_templets_skin";
$z[11]=Array("global","",7416,7448);
$z[11][4]=array();
$z[11][4]['name']="cfg_templets_skin";
$z[12]=Array("global","",8436,8468);
$z[12][4]=array();
$z[12][4]['name']="cfg_templets_skin";
$z[13]=Array("global","",8504,8536);
$z[13][4]=array();
$z[13][4]['name']="cfg_templets_skin";

?>