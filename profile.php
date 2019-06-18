<?php
if (isset($_GET['id'])) {
	include 'includes/config.php';
	$ask = $bdd->prepare('SELECT * FROM people WHERE id = ?');
	$ask->execute(array($_GET['id']));
	$row = $ask->fetch();
}
if ($row['id'] == $_GET['id']) {
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row['lastname'] . ' ' . $row['firstname']; ?></title>

<link rel="stylesheet" href="styles/ionicons.min.css">
<link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="styles/font-awesome.min.css">
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/style.css">
<link rel="stylesheet" href="styles/responsive.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<script src="js/vendors/modernizr.js"></script>

</head>
<body>

	   <!-- ABOUT ME -->
                <div role="tabpanel" class="tab-pane fade in active" id="about-me">
                  <div class="inside-sec"> 
                    <!-- BIO AND SKILLS -->
                    <h5 class="tittle">About <?php echo $row['firstname'] . ' ' . $row['lastname']; ?></h5>
                    
                    <!-- Blog -->
                    <section class="about-me padding-top-10"> 
                      
                      <!-- Personal Info -->
                      <ul class="personal-info">
                        <li>
                          <p> <span> Name</span> <?php echo $row['firstname'] . ' ' . $row['lastname']; ?> </p>
                        </li>
                        <li>
                          <p> <span> Location</span> <?php echo $row['location']; ?> </p>
                        </li>
                        <li>
                          <p> <span> Date of birth</span> <?php echo $row['dob']; ?> </p>
                        </li>
                      </ul>
                      
                      <!-- I’m Web Designer -->
                      <h5 class="tittle">Additional Information</h5>
                      <div class="padding-20">
                        <p><?php echo $row['info']; ?><br></p>
                      </div>

</body>
</html>

<?php	
}
else{
	header("Location:includes/notfound.php");
}
?>