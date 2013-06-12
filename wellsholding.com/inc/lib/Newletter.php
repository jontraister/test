<?php
ob_start();
	session_start();
	require_once("SQL.php");
    $SW = $_REQUEST['sw'];
		
	switch($SW)
	{
		case "add":
		$nfname=$_POST['name'];
		$nlname=$_POST['pass'];
		
		
		$strSQL = "INSERT INTO ".PRE."newsleter SET 
			nemail = '$nlname', nfname = '$nfname'";
			
		     Run($strSQL);
		header('../index.php?id=enews');
	break;
	}
?>