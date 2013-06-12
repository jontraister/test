<? 
ob_start(); 
session_start();
$PAGE='detail';
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
<link rel="stylesheet" href="main.css" type="text/css">
<script type="text/javascript" src="jquery.js"></script>
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
    <!--banner-->
    
    <div id="bodycontentsub">
      <div class="welcomesubCover">
      <div class="welcometxtsup1">
      	<div id='wrapper1'>
		<div id='body'>
			<div id="bigPic">
            <?php $g = Run("SELECT * FROM ".PRE."image");
				  while($rowg = GetRow($g)){
				  ?>
				<img src="pics/images/<?=$rowg['pic'];?>" alt="" width="748" height="500" />
				<? } ?>
            </div>
					
			<ul id="thumbs">
                 <?php  $i=0;
			      $q1 = Run("SELECT * FROM ".PRE."image");
				  while($row1 = GetRow($q1)){ $i++;
				  ?>
				<li rel='<?=$i?>' class='active'><img src="pics/images/thumb/<?=$row1['pic'];?>" alt="" height="50" width="50" /></li>
				<? } ?>
                
			</ul>
		
		</div>
		<div class='clearfix'></div>
		<div id='push'></div>
	</div>

	<div style="font-size:16px; color:#3366FF; font-weight:bold;"><?=$Heading;?></div>
            <div class="welcometxtsup"><?=$Contents;?></div>

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
	var currentImage;
    var currentIndex = -1;
    var interval;
    function showImage(index){
        if(index < $('#bigPic img').length){
        	var indexImage = $('#bigPic img')[index]
            if(currentImage){   
            	if(currentImage != indexImage ){
                    $(currentImage).css('z-index',2);
                    clearTimeout(myTimer);
                    $(currentImage).fadeOut(250, function() {
					    myTimer = setTimeout("showNext()", 3000);
					    $(this).css({'display':'none','z-index':1})
					});
                }
            }
            $(indexImage).css({'display':'block', 'opacity':1});
            currentImage = indexImage;
            currentIndex = index;
            $('#thumbs li').removeClass('active');
            $($('#thumbs li')[index]).addClass('active');
        }
    }
    
    function showNext(){
        var len = $('#bigPic img').length;
        var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
        showImage(next);
    }
    
    var myTimer;
    
    $(document).ready(function() {
	    myTimer = setTimeout("showNext()", 3000);
		showNext(); //loads first image
        $('#thumbs li').bind('click',function(e){
        	var count = $(this).attr('rel');
        	showImage(parseInt(count)-1);
        });
	});
    
	
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