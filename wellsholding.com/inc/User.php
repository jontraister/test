<? ob_start();
	session_start();
    
	require_once("SQL.php");
	require_once("DataFunc.php");
	require_once ("lib/class.phpmailer.php");
    $Mail = new PHPMailer();
	
	function GetUserList()
	{
		$strSQL = "SELECT * FROM ".PRE."user";
		return  Run($strSQL);
	}
	function GetUserById($Id)
	{
		return Run("SELECT * FROM ".PRE."user WHERE id = $Id");
	}
	
/*	function ValidateUserLogin($Uname, $Pass,$forum,$forumid)
	{
		$strSQL = "SELECT * FROM user WHERE uname ='$Uname' AND pass ='$Pass'";
		$RS = Run($strSQL);
		if(Records($RS))
		{
			$ROW = GetRow($RS);
		    $_SESSION['USER'] = 'TRUE';
			$_SESSION['USERPASS'] = $Pass;
		 	$_SESSION['USERNAME'] =$ROW['uname'];
			$_SESSION['FNAME'] =$ROW['fname'];
			$_SESSION['USERID'] =$ROW['id']; 
			if($forum=='forum')
			{
				header("Location:../forum.php");
				exit();
			}
			header("Location:../home.php");
			exit;
		}else
				return false;
	}
*/	function ChangeUserPassword($Userid, $NewPass)
	{
		$strSQL = "UPDATE ".PRE."user SET user_pass = '$NewPass' WHERE id= '$Userid'";
		if(Run($strSQL))
			return true;
		else
			return false;
	}
	function isExistUser($email)
	{
		$strSQL = "SELECT * FROM ".PRE."user WHERE user_email = '$email'";
		$RS = Run($strSQL);
		if(Records($RS))
			return true ;
		else
			return false;
	}
	function GetPassword($email)
	{
		$strSQL = "SELECT * FROM ".PRE."user WHERE user_email = '$email'";
	   
		$RS = Run($strSQL);	
		if(Records($RS))
			{
			$ROW = GetRow($RS);
			 
			return  $ROW['pass']; 
			}
			
		else
			return false;
	}
	function GetEmail($Username)
	{
		$strSQL = "SELECT * FROM ".PRE."user WHERE 	user_login  = '$Username'";
	   
		$RS = Run($strSQL);	
		if(Records($RS))
			{
			$ROW = GetRow($RS);
			 
			return  $ROW['user_email']; 
			}
			
		else
			return false;
	}
	function GetUserByActivationCod($Code)
	{
		$strSQL = "SELECT * FROM ".PRE."user WHERE activation = '$Code'";
		$RS = Run($strSQL);	
		if(Records($RS))
		{
			$ROW = GetRow($RS);
			UpdateStatus($ROW['id']);
			return  $ROW['id']; 
		}
			
		else
			return false;
	}
	function GetProfileById1($uid)
	{
		$strSQL = "SELECT * FROM ".PRE."user WHERE id = '$uid'";
		return Run($strSQL);
	}
	function ValidateUserLogin($email, $Pass, $return)
	{
		$strSQL = "SELECT * FROM ".PRE."user WHERE user_email ='$email' AND user_pass ='$Pass'" ;
		$RS = Run($strSQL);
		if(Records($RS))
		{
			$ROW = GetRow($RS);
		   // print_r ($ROW);
		//	exit;
			$_SESSION['USER'] = 'TRUE';
			$_SESSION['USERPASS'] = $Pass;
		 	//$_SESSION['USERNAME'] =$ROW['user_login'];
			$_SESSION['FNAME'] =$ROW['user_login'];
			$_SESSION['USERID'] =$ROW['id']; 
			
              if($return=='active')	
			  {
			  header("Location:home.php");exit;
			  }else if($return=="checkout")
				header("Location:../basket.php");
		    	else	
				header("Location:../home.php");
			  exit;
		}else
				return false;
	}
	function UpdateStatus($uid)
	{
		$strSQL = "UPDATE ".PRE."user SET status = 'enable' WHERE id = $uid";
		return Run($strSQL);
	}
	function Activationcode($Email)
	{
		$strSQL = "SELECT * FROM ".PRE."user WHERE user_email = '$Email'";
	   
		$RS = Run($strSQL);	
		if(Records($RS))
			{
			$ROW = GetRow($RS);
			 
			return  $ROW['activation']; 
			}
			
		else
			return false;
	}
	$SW = $_REQUEST['sw'];
	switch($SW)
	{
		case "add":
			$user_login = $_POST['user_login']; 
			$user_email = $_POST['user_email'];
			$contact_person = $_POST['contact_person'];
			$user_phone = $_POST['user_phone']; 
			$user_cell = $_POST['user_cell'];
			$user_fax = $_POST['user_fax'];
			$user_pass = $_POST['user_pass'];
			
			$date_time = date("Y-m-d",time());
			
			//$activation=get_rand_id(15);
						
			$strSQL = "insert into ".PRE."user set
			user_login='$user_login',
			 user_email='$user_email',
			 contact_person='$contact_person',
			 user_phone='$user_phone',
			 user_cell='$user_cell',
			 user_fax='$user_fax',
			user_pass='$user_pass',
			date_time='$date_time'";
			 
			Run($strSQL);
// e-mail code starts			
					
				$body ='<style type="text/css">
	.txt {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 11px; color:#000000;
	}
	</style>
	<span  class="txt"  style="padding:50px" >Thanks for taking your time and registering with Savage. </span>
	<table width="80%" border="0" cellpadding="3" cellspacing="2">
	 <tr>
		 <td class="txt">&nbsp;</td>
		 <td align="right" class="txt">&nbsp;</td>
		 <td class="txt">&nbsp;</td>
	  </tr>	
	  <tr>
		<td width="4%" class="txt">&nbsp;</td>
		<td width="26%" align="right" class="txt"><strong>First Name: </strong></td>
		<td width="70%" class="txt">'.$user_login.'</td>
	  </tr>  
	  <tr>
		 <td class="txt">&nbsp;</td>
		 <td align="right" class="txt"><strong>Email : </strong></td>
		 <td class="txt">'.$user_email.'</td>
	  </tr>	
	   <tr>
		 <td class="txt">&nbsp;</td>
		 <td align="right" class="txt"><strong>Password: </strong></td>
		 <td class="txt">'.$user_pass.'</td>
	  </tr>	
	  
	   	           
	   <tr>
		 <td class="txt">&nbsp;</td>
		 <td align="right" class="txt">&nbsp;</td>
		 <td class="txt">&nbsp;</td>
	  </tr>	  
	 	  
	</table>';
				$body .='<br><span  class="txt" style="padding:50px" >Savage - Welcome Your Account Has Been Created</span>'; 
			$body .='<br>&nbsp;';
			$Mail = new PHPMailer();
			$Mail -> ClearAllRecipients();
			$Mail -> AddAddress($user_email );
			$Mail -> From = 'zafir.ahmed@mm.com.pk';
			$Mail -> FromName = "Savage";
			$Mail -> Subject = "Savage - Welcome Your Account Has Been Created";
			$Mail -> Body = stripslashes($body);
			
			 
			$Mail -> IsHTML(true);
			$Mail -> Send();
					
				//$return = '../new-act.php';
				//$_SESSION['activename'] = $fname;
				header("Location:../login.php?id=ad");
			//	require_once('file:///C|/wamp/www/willyecom/emltemp/email.php');
						
		break;
		case "in":
			$email = $_POST['user_email'];
			$Pass = $_POST['user_pass'];
			$return=$_POST['return'];
			//$forumid=$_POST['formid'];
			if(!ValidateUserLogin($email,$Pass,$return))
			 {
				header("Location:../login.php?id=n");
		     }
		break;
		case "in2":
			$email = $_POST['nemail'];
			$Pass = $_POST['npass'];
			$return=$_POST['return'];
			$forumid=$_POST['formid'];
			if(!ValidateUserLogin($email,$Pass,$return))
			 {
				header("Location:../login.php?id=n");
		     }
		break;
		
	case "del":  
			 $id=$_REQUEST['uid'];
			$strSQL = "delete from ".PRE."user where id='$id'";
			Run($strSQL);
	header("Location:../admin/user.php?id=dl");
			 
		break;
		case "chp":
			$NewPass = $_POST['pass2'];
			$Userid = $_SESSION['USERID'];
			$fname=$_SESSION['FNAME'];
			if(ChangeUserPassword($Userid, $NewPass))
			{
				$_SESSION['USERPASS'] = $NewPass;
				/* $Mail -> ClearAllRecipients();
				$Mail -> AddAddress($email);
			
				$Mail -> FromName='LeSequin';
				$Mail -> Subject='LeSequin - Welcome Your Password Has Been Changed';
				$Mail -> From="support@lesequin.com";
				$Mail -> IsHTML(true);
				$heading = ' Dear '.$fname.',';
				$message = 'our request for password change has been processed you may login next time using your new password.
				</br>' ;
				$message.=StartBody('80%');
				$message .= '</br>';
				 
				$message .= AddEmailRow('New Password',$NewPass);
				$message .= EndBody();*/		
				 	
				 
			    $return = '../ch-pass.php?id=pasch';
		    	//require_once('file:///C|/wamp/www/savage/emltemp/email.php');
				header("Location:../ch-pass.php?id=pasch");exit;
	         }	
		break;
			case "out":  
			session_destroy();
			$_SESSION['USER'] = '';
			$_SESSION['USERPASS'] = '';
			$_SESSION['USERNAME'] = '';
			 header("Location:../login.php?id=out");
		break;
		case "edit":
			$fname = $_POST['fname']; 
			$lname = $_POST['lname'];
			$phone = $_POST['phone'];
			$email = $_POST['email']; 
			$pass = $_POST['pass'];
			$bfname = $_POST['bfname'];
			$blname = $_POST['blname'];
			$bphone = $_POST['bphone'];
			$bcompany = $_POST['bcompany'];
			$baddresstype = $_POST['baddresstype'];
			$badderss = $_POST['badderss'];
			$badddress2 = $_POST['badddress2'];
			$bsuit = $_POST['bsuit'];
			$bcity = $_POST['bcity'];
			
			$bcountry = $_POST['bcountry'];
			$bzip = $_POST['bzip'];
			
	    	$sfname = $_POST['sfname'];
		  	$slname = $_POST['slname'];
			$sphone = $_POST['sphone'];
			$scompany = $_POST['scompany'];
			$saddresstype = $_POST['saddresstype'];
			$sadderss = $_POST['sadderss'];
			$sadddress2 = $_POST['sadddress2'];
			$ssuit = $_POST['ssuit'];
			$scity = $_POST['scity'];
			$scountry = $_POST['scountry'];
			$szip = $_POST['szip'];
			$Userid=$_SESSION['USERID'] ;
			$strSQL = "update ".PRE."user set
			fname='$fname',
			lname='$lname',
			phone='$phone',	 
			bfname='$bfname',
			blname='$blname',
			bphone='$bphone',
			bcompany='$bcompany',
			baddresstype='$baddresstype',
			badderss='$badderss',
			badddress2='$badddress2',
			bsuit='$bsuit',
			bcountry='$bcountry',
			bcity='$bcity',
			bzip='$bzip',
			sfname='$sfname',
			slname='$slname',
			sphone='$sphone',
			scompany='$scompany',
			saddresstype='$saddresstype',
			sadderss='$sadderss',
			sadddress2='$sadddress2',
			ssuit='$ssuit',
			scity='$scity',
			scountry='$scountry',
			 
			szip='$szip' where id=$Userid ";
			Run($strSQL);
			
				 
			  //  $return = '../ch-profile.php?id=updat';
		    //	require_once('file:///C|/wamp/www/savage/emltemp/email.php');
			$_SESSION['FNAME']=$fname;
			 header('Location:../ch-profile.php?id=updat');
			
		break;
		 case "fgp":
	   	
			$email=$_POST["user_email"];
			if(isExistUser($email))
			{
			
			   
				$Pass=GetPassword($email);
		 
				$Mail -> ClearAllRecipients();
				$Mail -> AddAddress($email);
			
				$Mail -> FromName='Savage';
				$Mail -> Subject='Savage - Your New Password';
				$Mail -> From="zafir.ahmed@mm.com.pk";
				$Mail -> IsHTML(true);
				$heading = ' Dear '.$_POST["user_email"].',';
				$message = ' On your request we have are sending your password in e-mail for refrence.
				</br>' ;
				$message.=StartBody('60%');
				$message .= '</br>';
				$message .= AddEmailRow('New Password',$Pass);
				
				$message .= EndBody();		
				$Mail -> Body = stripslashes($message); 
				 //echo $Mail -> Body;exit;
				$Mail -> Send();
			  //  $return = '../forgot-pass.php?id=sent';
		    	//require_once('file:///C|/wamp/www/savage/emltemp/email.php');
				header("Location:../forgot-pass.php?id=sent"); 
				
			}
			else
			{
			header("Location:../forgot-pass.php?id=nfo");
			exit();
		    }
	break;
	case "enews":
	$email=$_POST['newsemail'];
	$strSQL = "insert ".PRE."newsletter set email='$email' ";
	Run($strSQL);
	header("Location:../thanks.php?id=enews"); 
	break;
	}
?>