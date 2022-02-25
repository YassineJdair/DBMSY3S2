<?php
    $var = mysqli_connect("localhost", "root", "");
    mysqli_select_db($var, "dentaldb") or die(mysqli_error());
	$image_ppsn = $_GET['ppsn'];
    $sql = "Select dentXray from patient where ppsn=$image_ppsn" ;
    $resultset = mysqli_query($var, "$sql") or die("Invalid query: " . mysqli_error($var));
	$row = mysqli_fetch_array($resultset);
	header('Content-type: image/jpeg');
	echo $row[0];
   	mysqli_close($var);
?>