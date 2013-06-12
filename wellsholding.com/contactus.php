<? 
ob_start(); 
session_start();
$PAGE='cu';
require_once('common.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wells Holdings :: <?=$TITLE?></title>
<meta name="keywords" content="<?=$MATA?>">
<meta name="description" content="<?=$DESCRIPTION?>">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="inc/lib/validate.js"></script>

</head>
<body>
<div id="wraper">
  <div id="header">
	<?php include 'header.php';?>
  </div>
  <!--header-->
  <!--======================================header Ends======================================-->
  <div class="cb"></div>
  <div id="Content">
	<?php $qry = Run("SELECT * FROM ".PRE."benners WHERE id='2'");
		  $picrow=GetRow($qry);
	?>
    <div class="banner1" style="background-image:url(pics/banner/<?php echo $picrow['image'];?>); width:960px; height:300px;"><div style="color: #FFFFFF;font-size: 22px;font-weight: bold;padding-left: 20px;padding-top: 250px;">Contact Us</div></div>      <!--banner-->
    
    <div id="bodycontentsub">
      <div class="welcomesubCover">
        <div class="welcomeh1">Contact Us</div>
        <div>&nbsp;</div>
        <div class="welcometxtsup"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="410" align="left" valign="top" class="body_text">
    <?php $qry1 = Run("SELECT * FROM ".PRE."contact");
		  $conrow=GetRow($qry1);
	?>
    <div style="float:left; width:400px; margin-left:10px;">
   <div style="float:left; width:400px; padding:2px;"><strong>Address:</strong> <?=$conrow['address'];?></div>
<div style="float:left; width:400px; padding:2px;"><strong>Phone: </strong> <?=$conrow['phone'];?></div>
<div style="float:left; width:400px; padding:2px;"><strong>Enquiries:</strong>
  <a href="mailto:mwells@wellsholdingsinc.com"><?=$conrow['enq'];?></a></div>
  <div style="float:left; width:400px; padding-top:10px;"><?=$Heading;?></div>
<div style="float:left; width:400px; padding-top:10px;"><?=$Contents;?></div>
      </div>    </td>
    <td width="20" align="left" valign="middle"><img src="images/box_bg.jpg" width="2" height="400" /></td>
    <td width="490" align="center" valign="top">
   
    <table width="100%" border="0" align="right" cellpadding="4" cellspacing="6" >
  
      <form id="form" name="form" action="inc/Email.php?sw=cont" method="post">
        <tr>
          <td colspan="2" align="left" valign="middle"  >  <?  if($_GET['msg'] == 'done')
		echo '<div class="messg">Your email has been sent successfully: </div>';
		else {
		?></td>
        </tr>
        <tr>
          <td align="left" valign="middle"   >First Name:</td>
          <td align="left" ><input name="fname" type="text" id="fname" value="<?=$_SESSION['contact']['fname']?>" size="33"
           class="text-box"/></td>
        </tr>
        <tr>
          <td width="27%" align="left" valign="middle"   >Last  Name: </td>
          <td width="73%" align="left" ><input name="lname" type="text" id="lname" value="<?=$_SESSION['contact']['lname']?>" size="33"
           class="text-box"/></td>
        </tr>
        <tr>
          <td align="left" valign="top"   >Email Address:</td>
          <td align="left" ><input name="email" type="text" id="email" value="<?=$_SESSION['contact']['email']?>" size="33"
           class="text-box"/></td>
        </tr>
        <!--<tr>
          <td align="left" valign="top"   >Company Name:</td>
          <td align="left" ><input name="company" type="text" id="company" value="<?=$_SESSION['contact']['company']?>" size="25"  style="border:1px solid #CCCCCC;"/></td>
        </tr>-->
        <tr>
          <td align="left" valign="top"   >Phone Number:</td>
          <td align="left" ><input name="phone" type="text" id="phone" value="<?=$_SESSION['contact']['phone']?>" size="33"
           class="text-box"/></td>
        </tr>
        <tr>
          <td align="left" valign="top"   >Comments/Feedback:</td>
          <td align="left" ><textarea name="comments" cols="25" rows="6" id="comments"class="text-box"/></textarea>
              </textarea></td>
        </tr>
        <tr>
          <td align="left"   >Security Image:&nbsp;</td>
          <td align="left" ><img src="img.php?size=6" alt="" /></td>
        </tr>
        <tr align="left" class="text">
          <td colspan="2"    >Type the code shown on the image above: (case  sensitive)</td>
        </tr>
        <tr>
          <td align="left" >&nbsp;</td>
          <td align="left" valign="top" >
          <input name="security" type="text" class="text-box" id="security" value="<?=$_SESSION['contact']['security']?>" size="33"/>
              <? if($_GET['id'] == "not")
						  			echo '<span class="error" style="color:#FF0000" >Invalid Code </span>';
								 $_SESSION['contact']="";?></td>
        </tr>
        <tr>
          <td height="41" align="left" >&nbsp;</td>
          <td align="left" valign="middle">
          
          <input type="submit" name="submit" value="Submit" class="button_search" onclick="return ValiDate2(form)" />          </td>
        </tr>
        <script type="text/javascript">
         function ValiDate2(form)
		    {
			if(isEmpty(form.fname, "Please Enter First Name")) {return false}
			if(isEmpty(form.lname, "Please Enter Last Name")) {return false}
	    	if(isNotValidEmail(form.email, "Please Enter Valid Email")) {return false}	
			if(isEmpty(form.comments, "Please Enter Comments")) {return false}
		    }
              </script>
      </form>
      <?php }?>
    </table></td>
  </tr>
  
  <tr>
    <td height="22" colspan="3">&nbsp;</td>
  </tr>
</table></div>
      </div>
      <!--welcomesubCover-->
    </div>
    <!--bodycontentsub-->
    
    <!--rightcolo-->
    <div class="cb"></div>
  </div>
  <!--Content-->
  <div class="contentbot"></div>
  <!--======================================Content Ends=============================-->
  <div class="cb"></div>
  <div id="footercover">
    <div class="footer"> Copyright ©  2011 Wells Development All Rights Reserved. Website Design By <a href="http://www.microsol.biz" target="_blank">Microsol</a> </div>
    <!--footer-->
    <div class="cb"></div>
  </div>
  <!--footercover-->
  <!--==================================Footer Ends=================================-->
</div>
<!--wraper-->
</body>
</html>
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-21176038-1']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>
<script type="text/javascript">
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

function jsddm_open()
{	jsddm_canceltimer();
	jsddm_close();
	ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');}

function jsddm_close()
{	if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

function jsddm_timer()
{	closetimer = window.setTimeout(jsddm_close, timeout);}

function jsddm_canceltimer()
{	if(closetimer)
	{	window.clearTimeout(closetimer);
		closetimer = null;}}

$(document).ready(function()
{	$('#jsddm > li').bind('mouseover', jsddm_open);
	$('#jsddm > li').bind('mouseout',  jsddm_timer);});

document.onclick = jsddm_close;
</script>