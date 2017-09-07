<?php
/**
 *
 * 自定义表单
 *
 * @version        $Id: diy.php 1 15:38 2010年7月8日Z tianya $
 * @package        DedeCMS.Site
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */
require_once(dirname(__FILE__)."/diy_config.php");
$diyid = isset($diyid) && is_numeric($diyid) ? $diyid : 0;
$action = isset($action) && in_array($action, array('post', 'list', 'view')) ? $action : 'post';
$id = isset($id) && is_numeric($id) ? $id : 0;



if(empty($diyid))
{
    showMsg('非法操作!', 'javascript:;');
    exit();
}

	if($diyid > 99)
	{
		//添加文章
		$diyid = 100;
		if($diyid == 100)	//在线报名
		{
			$channelid = 17; //内容模型
			$cid = 2; //栏目
			$typeid = 2; //栏目
		}else if($diyid == 101)	//在线投票
		{
		
		}else if($diyid == 102)	//在线培训
		{
		
		}else if($diyid == 103)	//招商加盟
		{
		
		}

require_once(DEDEINC.'/customfields.func.php');
require_once(DEDEADMIN.'/inc/inc_archives_functions.php');

if(empty($dopost)) $dopost = 'save';

if($dopost != 'save')
{

    require_once(DEDEINC.'/dedetag.class.php');
    require_once(DEDEADMIN.'/inc/inc_catalog_options.php');
    ClearMyAddon();
    $channelid = empty($channelid) ? 0 : intval($channelid);
    $cid = empty($cid) ? 0 : intval($cid);

    //获得频道模型ID
    if($cid > 0 && $channelid == 0)
    {
        $row = $dsql->GetOne("SELECT channeltype FROM `#@__arctype` WHERE id='$cid'; ");
        $channelid = $row['channeltype'];
    }
    else
    {
        if($channelid==0)
        {
            ShowMsg('无法识别模型信息，因此无法操作！', '-1');
            exit();
        }
    }

    //获得频道模型信息
    $cInfos = $dsql->GetOne(" SELECT * FROM  `#@__channeltype` WHERE id='$channelid' ");
    $channelid = $cInfos['id'];
    //获取文章最大id以确定当前权重
    $maxWright = $dsql->GetOne("SELECT COUNT(*) AS cc FROM #@__archives");
    include DedeInclude('templets/archives_add.htm');
    exit();
}
/*--------------------------------
function __save(){  }
-------------------------------*/
else if($dopost=='save')
{
    require_once(DEDEINC.'/image.func.php');
    require_once(DEDEINC.'/oxwindow.class.php');

    $flag = isset($flags) ? join(',',$flags) : '';
    $notpost = isset($notpost) && $notpost == 1 ? 1: 0;
    if(empty($click)) $click = ($cfg_arc_click=='-1' ? mt_rand(50, 200) : $cfg_arc_click);

    if(empty($typeid2)) $typeid2 = 0;
    if(!isset($autokey)) $autokey = 0;
    if(!isset($remote)) $remote = 0;
    if(!isset($dellink)) $dellink = 0;
    if(!isset($autolitpic)) $autolitpic = 0;
    if(empty($click)) $click = ($cfg_arc_click=='-1' ? mt_rand(50, 200) : $cfg_arc_click);

    if($typeid==0)
    {
        ShowMsg('请指定文档的栏目！', '-1');
        exit();
    }
    if(empty($channelid))
    {
        ShowMsg('文档为非指定的类型，请检查你发布内容的表单是否合法！', '-1');
        exit();
    }
    if(!CheckChannel($typeid,$channelid) )
    {
        ShowMsg('你所选择的栏目与当前模型不相符，请选择白色的选项！', '-1');
        exit();
    }
//    if(!TestPurview('a_New'))
//    {
//        CheckCatalog($typeid, "对不起，你没有操作栏目 {$typeid} 的权限！");
//    }

    //对保存的内容进行处理
    require_once(DEDEINC."/memberlogin.class.php");
    $member = new MemberLogin();
  //  $memberID = $member->M_LoginID;
     $mid =  $member->M_ID;
  //  echo $memberID;
  //  exit;

    if(empty($writer)) $writer =  $member->M_LoginID;

    if(empty($source)) $source = '未知';
    if(!isset($formhtml)) $formhtml = 0;
    $pubdate = time();//GetMkTime($pubdate);
    $senddate = time();
    $sortrank = AddDay($pubdate,$sortup);
    $ismake = $ishtml == 0 ? -1 : 0;
    $title = preg_replace("#\"#", '＂', $title);
    $title = cn_substrR($title,$cfg_title_maxlen);
    $shorttitle = cn_substrR($shorttitle,36);
    $color =  cn_substrR($color,7);
    $writer =  cn_substrR($writer,20);
    $source = cn_substrR($source,30);
    $description = cn_substrR($description,$cfg_auot_description);
    $keywords = cn_substrR($keywords,60);
    $filename = trim(cn_substrR($filename,40));
    $userip = GetIP();
    $isremote  = (empty($isremote)? 0  : $isremote);
    $voteid = (empty($voteid)? 0 : $voteid);
    $serviterm=empty($serviterm)? "" : $serviterm;

    if(!TestPurview('a_Check,a_AccCheck,a_MyCheck'))
    {
        $arcrank = -1;
    }
    $adminid = $cuserLogin->getUserID();

    //处理上传的缩略图
    if(empty($ddisremote))
    {
        $ddisremote = 0;
    }
    //$litpic = GetDDImage('none',$photo,$ddisremote);
	$litpic = GetDDImage('photo',$photo,$ddisremote);
	
	 //处理上传的视频
   
    //$litpic = GetDDImage('none',$photo,$ddisremote);
	$video = GetDDVideo('shipin',$shipin,0);
	

    //生成文档ID
    $arcID = GetIndexKey($arcrank,$typeid,$sortrank,$channelid,$senddate,$adminid);

    if(empty($arcID))
    {
        ShowMsg("无法获得主键，因此无法进行后续操作！","-1");
        exit();
    }

    //处理并保存从网上复制的图片
    /*---------------------
    function _getformhtml()
    ------------------*/
    if($formhtml==1)
    {
        $imagebody = stripslashes($imagebody);
        $imgurls .= GetCurContentAlbum($imagebody,$copysource,$litpicname);
        if($ddisfirst==1 && $litpic=='' && !empty($litpicname))
        {
            $litpic = $litpicname;
            $hasone = TRUE;
        }
    }
	
    //分析处理附加表数据
    $inadd_f = $inadd_v = '';
    if(!empty($dede_addonfields))
    {
        $addonfields = explode(';', $dede_addonfields);
        if(is_array($addonfields))
        {    
            foreach($addonfields as $v)
            {
                if($v=='') continue;
                $vs = explode(',', $v);
                if($vs[1]=='htmltext' || $vs[1]=='textdata')
                {
                    ${$vs[0]} = AnalyseHtmlBody(${$vs[0]}, $description, $litpic, $keywords, $vs[1]);
                }
                else
                {
                    if(!isset(${$vs[0]})) ${$vs[0]} = '';
                    ${$vs[0]} = GetFieldValueA(${$vs[0]}, $vs[1], $arcID);
                }
                //$inadd_f .= ','.$vs[0];
                //$inadd_v .= " ,'".${$vs[0]}."' ";

				if($vs[0] == 'csz')
				{
					$title = "".${$vs[0]}."";
				}
				
				if($vs[0] == 'photo')
				{					   
			      $inadd_f .= ',photo';
				  	$inadd_v .= " ,'".$litpic."' ";
				 
				}else{
					if($vs[0] == 'shipin')
					{
						
					 	$inadd_f .= ',shipin';
					 	$inadd_v .= " ,'".$video."' ";
					
					}else{
						if($vs[0] == 's_province')
						{
							
							$inadd_f .= ',s_province';
							$inadd_v .= " ,'".$_POST['s_province']."' ";
						
						}else{
							if($vs[0] == 's_city')
							{
								
								$inadd_f .= ',s_city';
								$inadd_v .= " ,'".$_POST['s_city']."' ";
							
							}else{
								if($vs[0] == 's_county')
								{
									
									$inadd_f .= ',s_county';
									$inadd_v .= " ,'".$_POST['s_county']."' ";
								
								}else{
									$inadd_f .= ','.$vs[0]; //字段名
									$inadd_v .= " ,'".${$vs[0]}."' ";  //这是接收来的form值

								}

							}

						}
						
						
					}
					
				}
				
				
            }
        }
    }
 
    //处理图片文档的自定义属性
    if($litpic!='' && !preg_match("#p#", $flag))
    {
        $flag = ($flag=='' ? 'p' : $flag.',p');
    }
    if($redirecturl!='' && !preg_match("#j#", $flag))
    {
        $flag = ($flag=='' ? 'j' : $flag.',j');
    }

    //跳转网址的文档强制为动态
    if(preg_match("#j#", $flag)) $ismake = -1;
	//echo($litpic);exit;
    //    $query = "INSERT INTO `{$addtable}`(aid,typeid,redirecturl,userip{$inadd_f}) Values('$arcID','$typeid','$redirecturl','$useip'{$inadd_v})";
	//	echo($query);exit;

    //保存到主表
    $query = "INSERT INTO `#@__archives`(id,typeid,typeid2,sortrank,flag,ismake,channel,arcrank,click,money,title,shorttitle,
color,writer,source,litpic,pubdate,senddate,mid,voteid,notpost,description,keywords,filename,dutyadmin,weight)
    VALUES ('$arcID','$typeid','$typeid2','$sortrank','$flag','$ismake','$channelid',-1,'$click','$money','$title','$shorttitle',
    '$color','$writer','$source','$litpic','$pubdate','$senddate','$mid','$voteid','$notpost','$description','$keywords','$filename','$adminid','$weight');";
//var_dump($query);
    if(!$dsql->ExecuteNoneQuery($query))
    {
        $gerr = $dsql->GetError();
        $dsql->ExecuteNoneQuery("DELETE FROM `#@__arctiny` WHERE id='$arcID'");
        ShowMsg("把数据保存到数据库主表 `#@__archives` 时出错，请把相关信息提交给华夏夫人官网。".str_replace('"','',$gerr),"javascript:;");
        exit();
    }

    //保存到附加表
    $cts = $dsql->GetOne("SELECT addtable FROM `#@__channeltype` WHERE id='$channelid' ");
    $addtable = trim($cts['addtable']);
    if(!empty($addtable))
    {    //// echo $_POST['s_province'].$_POST['s_city'].$_POST['s_county'];

        $useip = GetIP();
        $query = "INSERT INTO `{$addtable}`(aid,typeid,redirecturl,userip{$inadd_f}) Values('$arcID','$typeid','$redirecturl','$useip'{$inadd_v})";
	//	var_dump($query);exit;
        if(!$dsql->ExecuteNoneQuery($query))
        {
            $gerr = $dsql->GetError();
            $dsql->ExecuteNoneQuery("DELETE FROM `#@__archives` WHERE id='$arcID'");
            $dsql->ExecuteNoneQuery("DELETE FROM `#@__arctiny` WHERE id='$arcID'");
            ShowMsg("把数据保存到数据库附加表 `{$addtable}` 时出错，请把相关信息提交给华夏夫人官网。".str_replace('"','',$gerr),"javascript:;");
            exit();
        }
    }

    //生成HTML
    InsertTags($tags, $arcID);
    if($cfg_remote_site=='Y' && $isremote=="1")
    {    
        if($serviterm!="")
        {
            list($servurl,$servuser,$servpwd) = explode(',',$serviterm);
            $config=array( 'hostname' => $servurl, 'username' => $servuser, 
                                                 'password' => $servpwd,'debug' => 'TRUE');
        } else {
            $config=array();
        }
        if(!$ftp->connect($config)) exit('Error:None FTP Connection!');
    }
    $artUrl = MakeArt($arcID, true, true,$isremote);
    if($artUrl=='')
    {
        $artUrl = $cfg_phpurl."/view.php?aid=$arcID";
    }
    ClearMyAddon($arcID, $title);
    //返回成功信息
    $msg = "    　　请选择你的后续操作：
    <a href='archives_add.php?cid=$typeid'><u>继续华夏夫人报名</u></a>
    &nbsp;&nbsp;
    <a href='$artUrl' target='_blank'><u>查看文档</u></a>
    &nbsp;&nbsp;
    <a href='archives_do.php?aid=".$arcID."&dopost=editArchives'><u>更改华夏夫人报名</u></a>
    &nbsp;&nbsp;
    <a href='catalog_do.php?cid=$typeid&dopost=listArchives'><u>已华夏夫人报名管理</u></a>
    &nbsp;&nbsp;
    $backurl
  ";
    //$msg = "<div style=\"line-height:36px;height:36px\">{$msg}</div>".GetUpdateTest();
	//$msg = "<div style=\"line-height:36px;height:36px\">{$msg}</div>";
	$msg = "<div style=\"line-height:36px;height:36px\">我们会在十个工作日之内审核，请耐心等待...<a href='/'><u>返回首页</u></a></div>";

    $wintitle = '成功华夏夫人报名！';
    $wecome_info = '报名管理::华夏夫人报名';
    $win = new OxWindow();
    $win->AddTitle('成功华夏夫人报名：');
    $win->AddMsgItem($msg);
    $winform = $win->GetWindow('hand', '&nbsp;', false);
    $win->Display();
}

		exit;
	}

require_once DEDEINC.'/diyform.cls.php';
$diy = new diyform($diyid);

/*----------------------------
function Post(){ }
---------------------------*/
if($action == 'post')
{
    if(empty($do))
    {
        $postform = $diy->getForm(true);
        include DEDEROOT."/templets/plus/{$diy->postTemplate}";
        exit();
    }
    elseif($do == 2)
    {
        $dede_fields = empty($dede_fields) ? '' : trim($dede_fields);
        $dede_fieldshash = empty($dede_fieldshash) ? '' : trim($dede_fieldshash);
        if(!empty($dede_fields))
        {
            if($dede_fieldshash != md5($dede_fields.$cfg_cookie_encode))
            {
                showMsg('数据校验不对，程序返回', '-1');
                exit();
            }
        }
        $diyform = $dsql->getOne("select * from #@__diyforms where diyid='$diyid' ");
        if(!is_array($diyform))
        {
            showmsg('自定义表单不存在', '-1');
            exit();
        }

        $addvar = $addvalue = '';

        if(!empty($dede_fields))
        {

            $fieldarr = explode(';', $dede_fields);
            if(is_array($fieldarr))
            {
                foreach($fieldarr as $field)
                {
                    if($field == '') continue;
                    $fieldinfo = explode(',', $field);
                    if($fieldinfo[1] == 'textdata')
                    {
                        ${$fieldinfo[0]} = FilterSearch(stripslashes(${$fieldinfo[0]}));
                        ${$fieldinfo[0]} = addslashes(${$fieldinfo[0]});
                    }
                    else
                    {
                        ${$fieldinfo[0]} = GetFieldValue(${$fieldinfo[0]}, $fieldinfo[1],0,'add','','diy', $fieldinfo[0]);
                    }
                    $addvar .= ', `'.$fieldinfo[0].'`';
                    $addvalue .= ", '".${$fieldinfo[0]}."'";
                }
            }

        }

        $query = "INSERT INTO `{$diy->table}` (`id`, `ifcheck` $addvar)  VALUES (NULL, 0 $addvalue); ";

        if($dsql->ExecuteNoneQuery($query))
        {
            $id = $dsql->GetLastID();
            if($diy->public == 2)
            {
                //diy.php?action=view&diyid={$diy->diyid}&id=$id
                $goto = "diy.php?action=list&diyid={$diy->diyid}";
                $bkmsg = '发布成功，现在转向表单列表页...';
            }
            else
            {
                $goto = !empty($cfg_cmspath) ? $cfg_cmspath : '/';
                $bkmsg = '发布成功，请等待管理员处理...';
            }
            showmsg($bkmsg, $goto);
        }
    }
}
/*----------------------------
function list(){ }
---------------------------*/
else if($action == 'list')
{
    if(empty($diy->public))
    {
        showMsg('后台关闭前台浏览', 'javascript:;');
        exit();
    }
    include_once DEDEINC.'/datalistcp.class.php';
    if($diy->public == 2)
        $query = "SELECT * FROM `{$diy->table}` ORDER BY id DESC";
    else
        $query = "SELECT * FROM `{$diy->table}` WHERE ifcheck=1 ORDER BY id DESC";

    $datalist = new DataListCP();
    $datalist->pageSize = 10;
    $datalist->SetParameter('action', 'list');
    $datalist->SetParameter('diyid', $diyid);
    $datalist->SetTemplate(DEDEINC."/../templets/plus/{$diy->listTemplate}");
    $datalist->SetSource($query);
    $fieldlist = $diy->getFieldList();
    $datalist->Display();
}
else if($action == 'view')
{
    if(empty($diy->public))
    {
        showMsg('后台关闭前台浏览' , 'javascript:;');
        exit();
    }

    if(empty($id))
    {
        showMsg('非法操作！未指定id', 'javascript:;');
        exit();
    }
    if($diy->public == 2)
    {
        $query = "SELECT * FROM {$diy->table} WHERE id='$id' ";
    }
    else
    {
        $query = "SELECT * FROM {$diy->table} WHERE id='$id' AND ifcheck=1";
    }
    $row = $dsql->GetOne($query);

    if(!is_array($row))
    {
        showmsg('你访问的记录不存在或未经审核', '-1');
        exit();
    }

    $fieldlist = $diy->getFieldList();
    include DEDEROOT."/templets/plus/{$diy->viewTemplate}";
}