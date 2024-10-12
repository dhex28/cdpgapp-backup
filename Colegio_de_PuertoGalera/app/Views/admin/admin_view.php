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
	<link rel="stylesheet" href="assets1/css/style.css"> 
</head>

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
                            <h2 class="card-title float-left mt-2">Freshmen Entrance Exam Data</h2>
                        </div>
                    </div>
                </div>
            </div>

			<!-- Upload Excel Section -->
			<div class="row">
				<div class="col-sm-12">
					<div class="card card-table">
						<div class="card-body">
							<!-- Form to upload Excel -->
							<form method="post" enctype="multipart/form-data" action="/admin/uploadExcel">
								<div class="form-group">
									<label for="excelFile">Upload Excel File</label>
									<input type="file" name="excelFile" class="form-control" required>
								</div>
								<button type="submit" class="btn btn-primary">Upload</button>
							</form>
						</div>
					</div>
				</div>
			</div>



			<!-- Student Data Table -->
			<div class="row">
				<div class="col-sm-12">
					<div class="card card-table">
						<div class="card-body">
							<div class="table-responsive">
								<table class="datatable table table-stripped table-hover table-center mb-0">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($students as $student): ?>
											<tr>
												<td><?= $student['name'] ?></td>
												<td><?= $student['email'] ?></td>
												<td>
													<button class="btn btn-success" onclick="updateStatus(<?= $student['id'] ?>, 'passed')">Passed</button>
													<button class="btn btn-danger" onclick="updateStatus(<?= $student['id'] ?>, 'failed')">Failed</button>
												</td>
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

	<script>
	function updateStatus(id, status) {
    fetch(`/admin/updateStatus/${id}/${status}`, {
        method: 'POST',
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`Student has been marked as ${status}`);
            location.reload(); // Reload the page to reflect the status change
        } else {
            alert(data.message || 'Failed to update status');
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert('An error occurred while updating the status.');
    });
    }

	</script>
</body>

</html>
