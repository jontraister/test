<? ob_start(); session_start();?>
<? include('sess.php');?>
<? include('admin_header.php');?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        
        <tr>
          <td align="center" valign="top"></td>        
        </tr>
        <tr>
          <td height="40" align="left" valign="top" style="padding:0px 100px;">        
        </tr>
        <tr>
          <td height="350" align="left" valign="top" style="padding:0px 100px;">
		  <?
	switch($Act)
	{
		case "li":
?>
             <fieldset><legend class="lableheading">Change Password</legend>
            <form action="../inc/Admin.php?sw=chp" method="post" name="form1" id="form1">
              
              <table width="100%" border="0" cellpadding="3" cellspacing="0">
                
                <tr>
                  <td colspan="2" align="left"><?
            if($_GET['id'] == "ok")
				echo "<span class='ok'>Password Successfully Changed</span>";
			?>                  </td>
                </tr>
                <tr>
                  <td width="301" align="right" class="lable">Current Password</td>
                  <td align="left"><input name="pass1" type="password" class="normalinput" id="pass1" /></td>
                  </tr>
                <tr>
                  <td align="right" class="lable">New Password</td>
                  <td align="left"><input name="pass2" type="password" class="normalinput" id="pass2" /></td>
                  </tr>
                <tr>
                  <td align="right" class="lable"><label>Confirm New Password</label></td>
                  <td width="381" align="left"><input name="pass3" type="password" class="normalinput" id="pass3" /></td>
                  </tr>
                <tr>
                  <td colspan="2" align="right"><div align="center">
                      <input name="opass" type="hidden" id="opass" value="<?=$ADMINPASS?>" />
                      <input type="hidden" name="id" id="id" value="<?=$ADMINID?>"/>
                      <input name="button" type="submit" class="button" id="button" value="Change" onclick="return ValiDate(form1)"/>
                  </div></td>
                  </tr>
                <tr>
                  <td colspan="2" align="right">&nbsp;</td>
                  </tr>
              </table>
            </form></fieldset>
            <script type="text/javascript" src="../inc/lib/validate.js"></script>
            <script type="text/javascript">
          function ValiDate(form)
		  {
		  	if(isEmpty(form.pass1, "Please Enter Current Password")) return false
			if(isEmpty(form.pass2, "Please Enter New Password")) return false
			if(isEmpty(form.pass3, "Please Enter Confirm Password")) return false
			if(isNotSame(form.pass1, form.opass, "Invalid Current Password")) return false

			if(isNotSame(form.pass2, form.pass3, "New Password and Confirm Password are different")) return false
			
		  }
            </script>
            <?
		break;
		
	}
?>        </tr>
      </table>
      <?php include('footer.php')?>