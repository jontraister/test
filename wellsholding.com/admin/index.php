<?php include('admin_header.php')?>

      <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
        <tr>
          <td height="400" align="left" style="padding-left:100px;padding-right:100px;">
          
          <?php
	    if($_GET['er'] == 1)
		{
		 echo "<span style='color:red;' >Invalid User or Password</span>";
		}
       ?> 
          
          <fieldset ><legend class="lableheading">Administrator Login</legend>
            <form id="form1" name="form1" method="post" action="../inc/Admin.php?sw=in" onsubmit="return validateReg(this)">
            <table width="100%" border="0" cellpadding="3" cellspacing="0">
              
              <tr>
                <td colspan="2"><?=$MSG?></td>
              </tr>
              <tr>
                <td width="246" align="right" class="lable" >User Name</td>
                <td width="459"><input name="uname" type="text" class="normalinput" id="uname" /></td>
              </tr>
              
              <tr>
                <td align="right" class="lable">Password</td>
                <td><input name="pass" type="password" class="normalinput" id="pass" /></td>
                </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td align="left"><div align="left">
                  <input name="button" type="submit" class="button" id="button" value="  Login  " />
                </div></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
            </table>
            <script type="text/javascript" src="../inc/lib/validate.js"></script>
            <script type="text/javascript">
	  
function validateReg(form)
{
	if(isEmpty(form.uname,'Please Enter User Name')) return false
    if(isEmpty(form.pass,'Please Enter Password'))     return false
	form.submit()
}
          </script>
          </form></fieldset></td>
        </tr>
      </table>
      <?php require_once('footer.php')?>