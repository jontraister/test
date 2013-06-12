<?
ob_start();
session_start();
require_once("SQL.php");
	
	function GetallContact()
	{
		$strSQL = "SELECT * FROM ".PRE."contact  order by id Asc";
		
			return  Run($strSQL);
	}
	
	function GetContact($Id)
	{
		return Run("SELECT * FROM ".PRE."contact WHERE id = '$Id'");
	}
	function DelContactId($Id)
	{
	    $strSQL = "Delete  FROM ".PRE."contact where id='$Id'";
		return  Run($strSQL);
	}
	$SW = $_REQUEST['sw'];
	switch($SW)
	{
		case "add":
			$Name = $_POST['name']; 	 
					
			$strSQL = "INSERT INTO ".PRE."contact SET 
			name = '$Name'";
			
			Run($strSQL);
			header('Location:../admin/contactus.php?id=ad');exit();
			
		break;
		case "edit":
			$id = $_POST['id'];
			$address = $_POST['address']; 
			$phone = $_POST['phone']; 
			$enq = $_POST['enq']; 
			 $strSQL = "UPDATE ".PRE."contact SET 
				 address = '$address',phone = '$phone',enq = '$enq' WHERE id = $id";
			Run($strSQL);
			header('Location:../admin/contactus.php?id=up');
		break;
		case "del":
			$id=$_REQUEST['id'];
			DelContactId($id);
			$id = "delt";  			
			header("Location:../admin/contactus.php?id=$id");exit();
		break;
	}

?>