<?php
include 'includes/config.php'; // Include of the db connect
$reponse = $bdd->query('SELECT * FROM people'); // Selecting everything from table, cuz will need it down.
?>

<!DOCTYPE html>
<html>
<head>
	<title>People DB</title>

    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

     <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</head>
<body>

	 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            People DB V0.2
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<!-- Showing the results from database. -->
                                    <?php while ($row = $reponse->fetch()) { ?>
                                        <tr class="odd gradeX">
                                            <td><a href="profile.php?id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
                                            <td><?php echo $row['firstname']; ?></td>
                                            <td><?php echo $row['lastname']; ?></td>
                                        	<td class="center"><?php echo $row['location']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
<form method="POST" action="includes/process.php">


  <div class="form-group">
    <label for="formGroupExampleInput">First Name</label>
    <input name="fname" placeholder="Family name" maxlength="30" type="text" class="form-control">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Last Name</label>
    <input name="lname" placeholder="Person name" type="text" maxlength="30" class="form-control">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput3">Location</label>
    <input name="loc" type="text" maxlength="40" class="form-control">
  </div>

   <div class="form-group">
    <label for="formGroupExampleInput4">Date of birth</label>
    <input name="dateofb" type="text" maxlength="10" placeholder="01/12/2000" class="form-control">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Additional Information</label>
    <textarea style="resize: none !important;" class="form-control" maxlength="500" name="addinfo" rows="3"></textarea>
  </div>

  <button type="submit" name="submit" class="btn btn-warning">Submit</button>


</form>
<script type="text/javascript">
    var form = document.querySelector('form');
form.addEventListener('submit', function() {
    this.querySelector('input[type="submit"]')
        .setAttribute('disabled', 'disabled');
}, false);

</script>
</body>
</html>
