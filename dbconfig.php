<?php
// 접속을 위한 설정 파일


$DBhost = "localhost";

$DBuser = "root";

$DBpassword = "XXXXX";

$DBname = "DBname";


	$con = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname);



	if ($con->connect_error) {

	die("Connection failed: " . $con->connect_error);

	}

?>


