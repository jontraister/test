<?
ob_start();
	session_start();
	require_once("SQL.php");
	
	function GetAllBenners()
	{
		$strSQL = "SELECT * FROM ".PRE."benners order by id";
		
			return  Run($strSQL);
	}
	function CountBenners()
	{ 
	  $strSQL = "select count(*) as name  FROM ".PRE."benners ";
	  $RS = Run($strSQL);
		if(Records($RS))
		{
			$ROW = GetRow($RS);
			$total=$ROW['name'];
			return  $total;
		}
	
	}
	function GetBennersById($Id)
	{
		return Run("SELECT * FROM ".PRE."benners WHERE id = '$Id'");
	}
	
	function GetBennersNameById($Id)
	{
		$RS=Run("SELECT * FROM ".PRE."benners WHERE id = '$Id'");
		$ROW = GetRow($RS);
		$name=$ROW['name'];
		return  $name;
	
	}
	
	function DelBennersById($Id)
	{
	    $strSQL = "Delete  FROM ".PRE."benners where id='$Id'";
		return  Run($strSQL);
	}
	
	$SW = $_REQUEST['sw'];
		require_once("Upload.php");
		$UpLoader = new _Uploader('../pics/banner');
		$Exts = array("jpg", "gif", "bmp", "png");
		$UpLoader -> SetAllowedExts($Exts);
	switch($SW)
	{
		case "add":
		   $title = $_POST['title'];
			
			$Image = $_FILES['image'];
     		$UpLoader -> SetFile($Image);
	        $UpLoader -> SetName('-'.time());
			
			$UpLoader -> SetFile($Image);
				$UpLoader -> SetName(time());
				if($UpLoader ->GetWidth() > $UpLoader ->GetHeight() ||$UpLoader ->GetWidth() == $UpLoader ->GetHeight())
					$UpLoader ->RestrictToWidthUpload(970);
				else 
					if($UpLoader ->GetHeight() > $UpLoader ->GetWidth())
						$UpLoader ->RestrictToHeightUpload(300);
				 
				  $Pic = $UpLoader -> FileName; 
			 
			 	
			$strSQL = "INSERT INTO ".PRE."benners SET title = '$title', image='$Pic'";
			
			Run($strSQL);
			header('Location:../admin/benners.php?id=ad');exit();
			
		break;
		case "edit":
			$id = $_POST['id'];
			 
			$Oldpic	=$_POST['oldpic'];
			$Pic = $Oldpic;
			$title = $_POST['title'];
			$Image = $_FILES['image'];
		 
			if($Image['name']!='')
			{
				$UpLoader -> SetFile($Image);
				$UpLoader -> SetName(time());
				if($UpLoader ->GetWidth() > $UpLoader ->GetHeight() ||$UpLoader ->GetWidth() == $UpLoader ->GetHeight())
					$UpLoader ->RestrictToWidthUpload(960);
				else 
					if($UpLoader ->GetHeight() > $UpLoader ->GetWidth())
						$UpLoader ->RestrictToHeightUpload(300);
						$UpLoader -> SetPath("../pics/banner");
				 
				 
				  $Pic = $UpLoader -> FileName; 

			}
			  	
			
			$strSQL = "UPDATE ".PRE."benners SET title = '$title', image='$Pic' WHERE id = '$id'";
			Run($strSQL);
			header('Location:../admin/benners.php?id=up');
		break;
		case "del":
		 
			$id = $_GET['id'];
			  
			 
				DelBennersById($id);
				$id = "delt";
			  
			header("Location:../admin/benners.php?id=$id");exit();
		break;
	}

?>