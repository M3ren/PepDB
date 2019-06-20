<?php
if (isset($_POST['submit'])) {
	include '../includes/config.php';
	$pvalue = array_map ( 'htmlspecialchars' , $_POST ); // Setting all posts to htmlspecialchars, to avoid xss.

	$request = $bdd->prepare('INSERT INTO people(firstname, lastname, location, nat, gend, height, dob, info) VALUES (:namee, :lname, :loca, :natio, :gende, :heigh, :dateofbirth, :infoo)');
	$request->execute(array(
		'namee' => $pvalue['fname'],
		'lname' => $pvalue['lname'],
		'loca' => $pvalue['loc'],
		'dateofbirth' => $pvalue['dateofb'],
		'infoo' => $pvalue['addinfo'],
		'natio' => $pvalue['nation'],
		'gende' => $pvalue['gender'],
		'heigh' => $pvalue['heightt']
	));
	header("Location: ../index.php");
}
else{
	echo "Error";
}
?>