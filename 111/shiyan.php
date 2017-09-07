<?php

require_once '/include/common.inc.php';

$sql = "select a.uname,b.id,b.time_stamp,b.out_trade_no,b.vote_name,b.lesson,b.teacher,b.phone from dede_member as a right join dede_pay 
as b on a.mid=b.uid";

     $dsql->SetQuery("select a.uname,b.id,b.time_stamp,b.out_trade_no,b.vote_name,b.lesson,b.teacher,b.phone from dede_member as a right join dede_pay
as b on a.mid=b.uid");

  $dsql->Execute();


  // $row = $dsql->GetObject(); 获取总记录数



while($row=$dsql->GetObject())
{

    echo '<br>'. $row->id.'<br>'.$row->uname;

}
