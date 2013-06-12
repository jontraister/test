<?
ob_start();
session_start();

echo $SW = $_REQUEST['sw'];
require_once("lib/class.phpmailer.php");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$comments   = $_POST['comments'];
	switch($SW)
	{
		case "cont":
		$Code=$_POST['security'];
	    $Sec=$_SESSION['vImageCodS'];
	 
		if($Code==$Sec)
	    {
			$body ='<style type="text/css">
	.txt {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 11px; color:#000000;
	}
	</style>
	<table width="80%" border="0" cellpadding="3" cellspacing="2">
	  <tr>
		<td width="4%" class="txt">&nbsp;</td>
		<td width="26%"  class="txt"><strong>First Name: </strong></td>
		<td width="70%" class="txt">'.$fname.'</td>
	  </tr>
	  <tr>
		 <td class="txt">&nbsp;</td>
		 <td  class="txt"><strong>SurName:</strong></td>
		 <td class="txt">'.$lname.'</td>
	  </tr>
	  
	  <tr>
		 <td class="txt">&nbsp;</td>
		 <td  class="txt"><strong>Contact Number: </strong></td>
		 <td class="txt">'.$phone.'</td>
	  </tr>	 
	  	  
	  <tr>
		 <td class="txt">&nbsp;</td>
		 <td  class="txt"><strong>Email: </strong></td>
		 <td class="txt">'.$email.'</td>
	  </tr>	
	  
	  
	   <tr>
		 <td class="txt">&nbsp;</td>
		 <td  class="txt"><strong>Suburb: </strong></td>
		 <td class="txt">'.$comments.'</td>
	  </tr>	  
	</table>';
			 
			$Mail = new PHPMailer();
			$Mail -> ClearAllRecipients();
			$Mail -> AddAddress('mwells@wellsholdingsinc.com');
			$Mail -> AddBCC('jawad.arshad@mm.com.pk');
			
			$Mail -> From = $Email;
			$Mail -> FromName = $fname." - Wells Holdings";
			$Mail -> Subject = "Wells Development";
			$Mail -> Body = stripslashes($body);
			 
			$Mail -> IsHTML(true);
			
			//echo $Mail -> Body ;exit;
			 
			$Mail -> Send();
			
			header("Location:../thanks.php?id=d&cname=".$fname);
			}			
			else
			{
			$_SESSION['contact']=$_POST;
		header("Location:../contactus.php?id=not");
		}
		break;
	}
	
?>