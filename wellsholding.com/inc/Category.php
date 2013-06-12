<?
ob_start();
session_start();
require_once("SQL.php");
	
	function GetAllCategories()
	{
		$strSQL = "SELECT * FROM ".PRE."category  order by id Asc";
		
			return  Run($strSQL);
	}
	
	function GetCategoryById($Id)
	{
		return Run("SELECT * FROM ".PRE."category WHERE id = '$Id'");
	}
	function DelCatById($Id)
	{
	    $strSQL = "Delete  FROM ".PRE."category where id='$Id'";
		return  Run($strSQL);
	}
	$SW = $_REQUEST['sw'];
	switch($SW)
	{
		case "add":
			$Name = $_POST['name']; 	 
					
			$strSQL = "INSERT INTO ".PRE."category SET 
			name = '$Name'";
			
			Run($strSQL);
			header('Location:../admin/category.php?id=ad');exit();
			
		break;
		case "edit":
			$id = $_POST['id'];
			$Name = $_POST['name']; 
			 
			$strSQL = "UPDATE ".PRE."category SET 
				 name = '$Name' WHERE id = $id";
			Run($strSQL);
			header('Location:../admin/category.php?id=up');
		break;
		case "del":
			$id=$_REQUEST['id'];
			DelCatById($id);
			$id = "delt";  			
			header("Location:../admin/category.php?id=$id");exit();
		break;
	}

?>