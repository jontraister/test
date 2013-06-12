<?
	ob_start();
	session_start();
	require_once("SQL.php");
	function GetAllPageContents()
	{
		$strSQL = "SELECT * FROM ".PRE."contents";
		return Run($strSQL);
	}
	
	function UpdatePageContents($Contents,$Heading, $title, $description, $LastDate, $Meta, $Id)
	{
		$strSQL = "UPDATE ".PRE."contents SET contents = '$Contents', heading = '$Heading', title = '$title', description = '$description', date = '$LastDate',  meta = '$Meta'
					WHERE id = $Id";
					
		Run($strSQL);
	}
	
	function isExistId($Id)
	{
		$strSQL = "SELECT * FROM ".PRE."contents WHERE id = $Id";
		$RS = Run($strSQL);
		if(Records($RS))
			return true;
		else
			return false;
	}
	
	function GetPageContentsById($Id)
	{
		$strSQL = "SELECT * FROM ".PRE."contents WHERE id = $Id";
		return Run($strSQL);
	}
	
	
	function GetPageContent($Page)
	{
		$strSQL = "SELECT * FROM ".PRE."contents WHERE page = '$Page'";
		$RS = Run($strSQL);
		return $RS;
		
	}
	
	$SW = $_REQUEST['sw'];
	
	switch($SW)
	{
				
		case "edit":
			
			$Heading = $_POST['heading'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$Meta = $_POST['meta'];
			$Contents =addslashes($_POST['contents']);
			
			$Id = $_POST['id'];
			if(isExistId($Id))
			{
				$LastDate =time();
				UpdatePageContents($Contents, $Heading, $title, $description, $LastDate, $Meta, $Id);
				header("Location:../admin/contents.php?msg=5");
			}
			else
				header("Location:../admin/contents.php?er=6");
		break;
	}
?>