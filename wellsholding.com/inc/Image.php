<?
	require_once("SQL.php");
	
	function GetAllImages()
	{
		$strSQL = "SELECT * FROM ".PRE."image";
			return  Run($strSQL);
	}
	
	function GetImagesByCat($cat)
	{
		$strSQL = "SELECT * FROM ".PRE."image where category='$cat' ";
			return  Run($strSQL);
	}

	function GetAllPortImages()
	{
		$strSQL = "SELECT * FROM ".PRE."image where catid='56'";
			return  Run($strSQL);
	}
	function GetAllHomeImages()
	{
		$strSQL = "SELECT * FROM ".PRE."image where catid='59'";
			return  Run($strSQL);
	}
	function GetimageById($Id)
	{
		return Run("SELECT * FROM ".PRE."image WHERE id = $Id");
	}
	function GetimagesByCatId($CatId)
	{
		return Run("SELECT * FROM ".PRE."image WHERE catid = $CatId  order by id " );
	}
	function nSubCatsByCatId($CatId)
	{
		$RS = Run("SELECT count(*) as count from ".PRE."image WHERE catid = $CatId");
		$ROW = GetRow($RS); 
		return $ROW['count'];
	}
	
	function GetimageNameById($Id)
	{
		$RS=Run("SELECT * FROM ".PRE."image WHERE id = $Id");
		$ROW = GetRow($RS);
		$name=$ROW['name'];
		return  $name;
	
	}
	
	function DelSubCatById($Id)
	{
	    $strSQL = "Delete  FROM ".PRE."image where id=$Id";
		return  Run($strSQL);
	}

	$SW = $_REQUEST['sw'];
	if($SW!=""){
		require_once("Upload.php");
		$UpLoader = new _Uploader('../pics/images/thumb/');
		$Exts = array("jpg", "gif", "bmp", "png");
		$UpLoader -> SetAllowedExts($Exts);
	}
	switch($SW)
	{
		case "add":
			$Name = $_POST['name']; 
			$category = $_POST['category']; 
			$Image = $_FILES['image'];

			$UpLoader -> SetFile($Image);
	        $UpLoader -> SetName('-'.time());
			
			$UpLoader -> SetFile($Image);
		$UpLoader -> SetName(time());
		if($UpLoader ->GetWidth() > $UpLoader ->GetHeight() ||$UpLoader ->GetWidth() == $UpLoader ->GetHeight())
		$UpLoader ->RestrictToWidthUpload(180);
		else 
		if($UpLoader ->GetHeight() > $UpLoader ->GetWidth())
		$UpLoader ->RestrictToHeightUpload(100);
		$UpLoader -> SetPath("../pics/images/");
		 $UpLoader -> Upload();
			if($UpLoader ->GetWidth() > $UpLoader ->GetHeight() ||$UpLoader ->GetWidth() == $UpLoader ->GetHeight())
				$UpLoader ->RestrictToWidthUpload(750);
			else 
				if($UpLoader ->GetHeight() > $UpLoader ->GetWidth())
					$UpLoader ->RestrictToHeightUpload(450);
					
		$Pic = $UpLoader -> FileName; 


			$strSQL = "INSERT INTO ".PRE."image SET 
			category = '$category', name='$Name',  pic='$Pic' ";  
			Run($strSQL);
			header('Location:../admin/images.php?id=ad');
			
		break;
		case "edit":
			
			
		
			$id = $_POST['id'];
			$category = $_POST['category']; 
			$Name = $_POST['name']; 
			$Oldpic	=$_POST['oldpic'];
			$cdate = date('Y-m-d');
			$Pic = $Oldpic;
			$UpLoader -> SetAllowedExts($Exts);
			$Image = $_FILES['image'];
			if($Image['name'] != '')
			{
				$UpLoader -> DeleteFile('../pics/images/'.$Pic);
			$UpLoader -> DeleteFile('../pics/images/thumb/'.$Pic);
		
		$UpLoader -> SetFile($Image);
		$UpLoader -> SetName(time());
		if($UpLoader ->GetWidth() > $UpLoader ->GetHeight() ||$UpLoader ->GetWidth() == $UpLoader ->GetHeight())
		$UpLoader ->RestrictToWidthUpload(180);
		else 
		if($UpLoader ->GetHeight() > $UpLoader ->GetWidth())
		$UpLoader ->RestrictToHeightUpload(100);
		$UpLoader -> SetPath("../pics/images/");
		 $UpLoader -> Upload();
			if($UpLoader ->GetWidth() > $UpLoader ->GetHeight() ||$UpLoader ->GetWidth() == $UpLoader ->GetHeight())
				$UpLoader ->RestrictToWidthUpload(750);
			else 
				if($UpLoader ->GetHeight() > $UpLoader ->GetWidth())
					$UpLoader ->RestrictToHeightUpload(450);
		$Pic = $UpLoader -> FileName; 
			}
			
			$strSQL = "UPDATE ".PRE."image SET 
				       category = '$category', name='$Name', pic='$Pic' WHERE id ='$id'";
			Run($strSQL);
			header('Location:../admin/images.php?id=up');exit();
		break;
		case "del":
			$id = $_GET['id'];
			DelSubCatById($id);
			$id = "delt";
			header("Location:../admin/images.php?id=$id");
		break;
		
		

		
	}
?>