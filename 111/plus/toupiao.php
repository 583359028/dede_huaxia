<?php
/**
 *
 * 审核资料
 *
 */
require(dirname(__FILE__)."/../include/common.inc.php");

	$row = $dsql->GetOne("SELECT `b`.`id` as `id`,`b`.`title`,`b`.`typeid`,`b`.`litpic`,`b`.`description`,`a`.* FROM `dede_archives` as `b` left join `dede_addon17` as `a` on `b`.`id`=`a`.`aid` 
WHERE `b`.`id` ='$id' ORDER BY `b`.`id` DESC");
    require_once(DEDEINC.'/dedetemplate.class.php');
    $tpl = new DedeTemplate();
	$tplfile = DEDETEMPLATE.'/plus/toupiao_article.htm';
	$tpl->Assign('fxhr',$row);
    $tpl->LoadTemplate($tplfile);
    $tpl->Display();
    exit();	
?>