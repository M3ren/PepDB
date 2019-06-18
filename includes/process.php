<?php
include 'config.php';
if (isset($_POST['submit'])) {
	$pvalue = array_map ( 'htmlspecialchars' , $_POST ); // Setting all posts to htmlspecialchars, to avoid xss.

	$request = $bdd->prepare('INSERT INTO people(firstname, lastname, location, dob, info) VALUES (:namee, :lname, :loca, :dateofbirth, :infoo)');
	$request->execute(array(
		'namee' => $pvalue['fname'],
		'lname' => $pvalue['lname'],
		'loca' => $pvalue['loc'],
		'dateofbirth' => $pvalue['dateofb'],
		'infoo' => $pvalue['addinfo']
	));
	header("Location: ../index.php");
}
else{
	echo "Got an error";
}
?>