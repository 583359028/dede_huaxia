<?php
$z[0]=Array("global","",118,145);
$z[0][4]=array();
$z[0][4]['name']="cfg_basehost";
$z[1]=Array("global","",157,189);
$z[1][4]=array();
$z[1][4]['name']="cfg_templets_skin";
$z[2]=Array("global","",351,373);
$z[2][4]=array();
$z[2][4]['name']="cfg_tel";
$z[3]=Array("php","\r\n//未登录显示的head\r\n\r\nrequire_once(DEDEINC.\"/memberlogin.class.php\");\r\n\$member = new MemberLogin();\r\n\$memberID = \$member->M_LoginID;\r\n\r\n        //登录后显示的head\r\nif(\$memberID) {\r\n\r\n        \$a =   '会员:<a href=\"#\" class=\"userName\">'.\$memberID.'</a>'.'   <a href=\"/member/index_do.php?fmdo=login&dopost=exit#\" style=\"color:#fff\">[退出]</a>';\r\n        echo \$a;\r\n}\r\n\r\nelse {\r\n\r\n        echo    '<li><a title=\"注册\" rel=\"nofollow\" href=\"/member/index_do.php?fmdo=user&dopost=regnew\">注册</a> </li>\r\n        <li><a title=\"登录\" rel=\"nofollow\" href=\"/member/login.php\">登录</a> </li>';\r\n\r\n}\r\n\r\n",421,1058);
$z[3][4]=array();
$z[4]=Array("channel","\r\n <li><a href=\"[field:typelink/]\"> [field:typename/] </a></li>\r\n",1161,1339);
$z[4][4]=array();
$z[4][4]['type']="top";
$z[4][4]['currentstyle']="<li><a href='~typelink~' class='on'>~typename~</a></li>";
$z[5]=Array("field","",1464,1486);
$z[5][4]=array();
$z[5][4]['name']="typename";
$z[6]=Array("channel","\r\n <li><a href=\"[field:typelink/]\"> [field:typename/] </a></li>\r\n",1659,1826);
$z[6][4]=array();
$z[6][4]['type']="top";
$z[6][4]['currentstyle']="<li><a href='~typelink~'>~typename~</a></li>";
$z[7]=Array("include","",2097,2132);
$z[7][4]=array();
$z[7][4]['filename']="left.htm";

?>