<?php
include 'config.php';
if (isset($_POST['submit'])) {
	$name = $_POST['fname'];
	$lsname = $_POST['lname'];
	$loca = $_POST['loc'];
	$request = mysql_query("INSERT INTO people(`firstname`,`lastname`,`location`) VALUES ('$name','$lsname','$loca')");
	header("Location:../index.php");
}
else{
	echo "Got an error";
}
?>