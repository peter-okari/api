<?php
$DB_host = "localhost";
$DB_user = "";
$DB_pass = "";
$DB_name = "hotel_site";

	try
	{
		$DBcon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);	
		$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo "ERROR : ".$e->getMessage();
	}
