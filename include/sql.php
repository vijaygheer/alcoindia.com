<?php

@session_start();

ob_start();

//database connection here

	$server_name="localhost";

	$db_username="root";

	$db_password="";

	$db_name="alco_india";

$connection=mysqli_connect($server_name,$db_username,$db_password);

mysqli_select_db($connection,"$db_name");

error_reporting(0);

?>
