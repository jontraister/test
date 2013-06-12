<?php
 
	/*	define("DB", "wells");
	define("SR", "localhost");
	define("UN", "root");
	define("PW", ""); */
	
/*   define("DB", "C252203_microsolpaktec");
 define("SR", "mysql912.ixwebhosting.com");
 define("UN", "C252203_paki");
 define("PW", "Pjikebk25");*/
 
 
    define("DB", "wellsde1_holding");
 define("SR", "localhost");
 define("UN", "wellsde1_holding");
 define("PW", "Holding123");

	define("PRE", 'wels_');
	
	function Run($strSQL)
	{
		$conn = mysql_connect(SR, UN, PW) or die(mysql_error().": ".$strSQL);
		$dB = mysql_select_db(DB, $conn)  or die(mysql_error().": ".$strSQL);
		$RS =  mysql_query($strSQL)  or die('<div class="SQLError">
				MySQL Said: <div class="SQL">Error: '.mysql_error().'</div><div class="Qry">Query: '.$strSQL.'</div></div>');
		return $RS;
	}
	
	function Records($RS)
	{
		return mysql_num_rows($RS);
	}
	function GetRow($RS)
	{
		return mysql_fetch_array($RS, MYSQL_ASSOC);
	}
	function GetLastId()
	{
		return mysql_insert_id();
	}
	
?>