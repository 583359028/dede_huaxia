<div class="kecheng_box"><h3><span>[field:title/]</span></h3><p><span>时长：</span><span>[field:time/]</span></p>
     <p><span>内容：</span><span>[field:neir/]</span></p>
      <p><span>费用：</span><span>[field:feiy/]</span></p><span class="zxpx"   onclick="lai('[field:title/]','[field:time/]','[field:feiy/]')">参与培训</span>
     <input  type="text"  name="mid" value='
         {dede:php}
         require_once(DEDEINC."/memberlogin.class.php");
         $member = new  MemberLogin();
         $memberID = $member->M_ID;
         echo $memberID;
         {/dede:php}' />
     </div>