<?
 
    require_once("inc/Contents.php");
	require_once("inc/Image.php");
    require_once("inc/Category.php");
	require_once("inc/Contactus.php");
	$RS_Cont = GetPageContent($PAGE);
	if(Records($RS_Cont))
	{ 
	    //echo "true";exit;
		$ROW_Cont = GetRow($RS_Cont);
		$Heading = $ROW_Cont['heading'];
		$Contents = stripslashes($ROW_Cont['contents']);
		$TITLE= $ROW_Cont['title'];
		$MATA = $ROW_Cont['meta'];
		$DESCRIPTION= $ROW_Cont['description'];
	}
	else
	{
		$Heading = "Page Not Found";
		$CONTENTS = 'You are trying to access invalid page';
	}
	

?>
