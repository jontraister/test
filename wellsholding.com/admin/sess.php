<?	
   ob_start();
  	session_start();
	if($_SESSION['ADMIN'] != 'TRUE' && !strrpos($_SERVER['PHP_SELF'], "index.php"))
	{
		header("Location:index.php?er=3");
	}

	$ADMINPASS=$_SESSION['ADMINPASS'];
	$ADMINID = $_SESSION['ADMINID'];
	
	$Act = $_REQUEST['act'] == "" ? 'li' : $_REQUEST['act'];
	
	
	require_once('../inc/Contents.php');
	require_once('../inc/Image.php');
	require_once('../inc/Category.php');
	require_once('../inc/Benners.php');
	require_once('../inc/Contactus.php');
	require_once('../inc/lib/paging.class.php');
	
?>
