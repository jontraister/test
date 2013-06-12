<?	
   ob_start();
  	session_start();
	 
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../inc/lib/style.css">
 <script type="text/javascript" src="../inc/lib/validate.js"></script>
  <script type="text/javascript" src="../inc/lib/Popup.js"></script>
  <!--[if lt IE 7]>
<script defer type="text/javascript" src="../inc/lib/pngfix.js"></script>
<![endif]-->
<title>Wells  :: Administrator</title>
</head>
<body bgcolor="#9f9f9f"><div align="center" style="margin-top:20px;">
  <table width="958" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" >
    <tr>
      <td  align="left" valign="middle">
        <table width="958" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td align="center" bgcolor="#ffffff"><img src="../images/Wells-Development-logo.jpg"  /></td>
        </tr>
      <tr>
        <td height="36px" align="center" bgcolor="#FFFFFF"  >
       <?php
	    if($_SESSION['ADMIN'] == 'TRUE')
		{
       ?> 
        <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" class="menu"    >
  <tr>
    <td width="11%" height="35" align="center" valign="middle"  ><a href="home.php">HOME</a></td>
    <td width="13%" align="center" valign="middle" bordercolor="#596EDB" ><a href="contents.php">CMS</a></td>
	    <td width="11%" align="center" valign="middle" bordercolor="#596EDB" ><a href="contactus.php">CONTACT</a></td>
   
       <td width="15%" align="center" valign="middle"  ><a href="images.php">MANAGE IMAGES</a></td> 
       <td width="13%" align="center" valign="middle"  ><a href="benners.php">MANAGE BANNERS</a></td> 
     <td width="16%" align="center" valign="middle"  ><a href="ch-pass.php">CHANGE PASSWORD</a></td>
    <td width="21%" align="center" valign="middle"  ><a href="../inc/Admin.php?sw=out">LOGOUT</a></td>
  </tr>
  
</table>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" class="menu"     style=" background:#fff;">
  
  <tr>
    <td height="20" colspan="5" bgcolor="#FFFFFF" ><?=$MSG?></td>
  </tr>
</table>
		<?
        }
        ?></td>
      </tr>
    </table></td>
    </tr>
    
    <tr>
      <td   valign="top" id="content-area"   height="500px"  bgcolor="#ffffff">