<?php
	
	require_once"../include/common.inc.php";
		 
			if(isset($_POST['id'])   ){
				 
				$id=$_POST['id'];//被投人id
				 
				$uname = $_POST['uname'];//投票人userid
		 
				$mi=$dsql->getone("select mid,userid from dede_member where userid= '$uname' ");//查询member表中的mid和userid,条件是userid= $uname（投票人useid）
		       
			 
			    $mid    = $mi['mid'];
 
				$username = $mi['userid'];
			  
				$time2=$dsql->getone("select count(*)  from `dede_log_vote` where date_format(upload_time,'%Y-%m-%d')= date_format(now(),'%Y-%m-%d')  and mid=$mid");//查询vote表中的当天时间
	 
			if($time2['count(*)']==1){
				 
				echo  json_encode(array("message"=>2,
										"status"=>"投票失败！一天内不能重复投票！"));
					 		  exit;
				}else{
								 
				$time=date("Y-m-d H:i:s",time());//获取当前时间戳
				
				$to= "insert into dede_log_vote (mid,uname,t_name,t_id,upload_time,t_ps,l_id,l_price,l_name) values ($mid,'$username','0',$id,'$time', 0,0 , 0,'0')";
			 //投票记录表中记录当前的投票状态
	         if($db->ExecuteNoneQuery($to)){
				  $sql=  "update  `dede_addon17` as a set toupiao=a.toupiao+1  where aid = $id";//报名表17中被投人的票数+1
				$db->ExecuteNoneQuery($sql);
			 
					echo  json_encode(array("message"=>1,
									"status"=>"投票成功！"));	
					exit;
				 
			 }else{
				 
				 echo  json_encode(array("message"=>2,
										"status"=>"投票失败！一天内不能重复投票！",
										"sql"=>$to));
					 		  exit;
				 
				 
			 }	
				
	          
				}
				
				 
 
					
			}						
			 
				
		
		 
				
					
						
					
			
	
	
		
		
	
		
		
	
	
	
	
	