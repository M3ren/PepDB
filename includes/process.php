<?php
include 'config.php'; 
if (isset($_POST['submit'])) {
	$name = $_POST['fname'];               
	$lsname = $_POST['lname']; 
	$loca = $_POST['loc'];														
	$request = $bdd->prepare('INSERT INTO people(firstname, lastname, location) VALUES (:namee, :lname, :loc)');
	$request->execute(array(
		'namee' => $name,
		'lname' => $lsname,
		'loc' => $loca
	));
	header("Location: ../index.php");
}
else{
	echo "Got an error";
}
?>