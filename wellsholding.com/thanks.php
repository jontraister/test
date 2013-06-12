<? 
ob_start(); 
session_start();
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
    <div class="banner1"> <img src="images/aboutus.jpg" alt="Banner" /> </div>
    <!--banner-->
    <div id="rightcolo">
      <div class="aboutsubCover">
        <div class="aboutpic"><a href="services.php"><img src="images/02.jpg" alt="About" /></a></div>
      </div>
      <!--aboutCover-->
      <div class="aboutsubCover">
        <div class="aboutpic"><a href="#"><img src="images/03.jpg" alt="Sevices" /></a></div>
      </div>
      <!--aboutCover-->
      <div class="aboutsubCover">
        <div class="aboutpic"><a href="sustainability.php"><img src="images/04.jpg" alt="Recent Projects" /></a></div>
      </div>
      <!--aboutCover-->
    </div>
    <div id="bodycontentsub">
      <div class="welcomesubCover">
        <div class="welcomeh1">Thanks</div>
        <div class="welcometxtsup">
        <?php $name = $_REQUEST['cname'];
			  if($_GET['id']=='d'){?>
              <br />
              Dear, <?=$name?> We have Receieved Your Email, We will Contact You Soon !<br /><br />Team ! Wells Development
		<? } ?>
        </div>
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
    <div class="footer"> Copyright ©  2010 Wells Development All Rights Reserved. Website Design By <a href="#">Microsol</a> </div>
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