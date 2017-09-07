<?php



if(isset($_GET['aid'])){

   $aid = $_GET['aid'];
    echo '<meta http-equiv="refresh"
content="1;url=/plus/view.php?aid='.$aid.'">';



}else{


  echo '<meta http-equiv="refresh"
content="1;url=http://theme1320.leixunkj.com/">';


}