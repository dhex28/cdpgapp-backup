<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Admin</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/icon/colegiologo.png">
	<link rel="stylesheet" href="assets1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets1/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets1/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets1/css/feathericon.min.css">
	<link rel="stylesheet" href="assets1/plugins/morris/morris.css">
	<link rel="stylesheet" type="text/css" href="assets1/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="assets1/css/style.css"> </head>

<body>
	<!-- topbar -->
<?= $this->include('include/topbar.php') ?>


<!-- sidebar -->
<?= $this->include('include/sidebar.php') ?>


<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">Freshmen Entrance Exam Data</h4> 
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body booking_card">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Date of Birth</th>
                                        <th>Gender</th>
                                        <th>Nationality</th>
                                        <th>Religion</th>
                                        <th>Email</th>
                                        <th>Place of Birth</th>
                                        <th>Civil Status</th>
                                        <th>Contact Number</th>
                                        <th>Exam Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data as $row): ?>
                                    <tr>
                                        <td><?= $row['LastName'] ?></td>
                                        <td><?= $row['FirstName'] ?></td>
                                        <td><?= $row['DateOfBirth'] ?></td>
                                        <td><?= $row['Gender'] ?></td>
                                        <td><?= $row['Nationality'] ?></td>
                                        <td><?= $row['Religion'] ?></td>
                                        <td><?= $row['Email'] ?></td>
                                        <td><?= $row['PlaceOfBirth'] ?></td>
                                        <td><?= $row['CivilStatus'] ?></td>
                                        <td><?= $row['ContactNumber'] ?></td>
                                        <td><?= ($row['result'] >= $passingScore) ? 'Pass' : 'Fail' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<script src="assets1/js/jquery-3.5.1.min.js"></script>
	<script src="assets1/js/popper.min.js"></script>
	<script src="assets1/js/bootstrap.min.js"></script>
	<script src="assets1/js/moment.min.js"></script>
	<script src="assets1/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets1/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets1/js/script.js"></script>
	<script>S
	$(function() {
		$('#datetimepicker3').datetimepicker({
			format: 'LT'
		});
	});
	</script>
</body>

</html>