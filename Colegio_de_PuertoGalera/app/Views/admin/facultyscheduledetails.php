<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin - Faculty Details</title>
    <link rel="stylesheet" href="assets1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets1/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets1/css/style.css">
    <style>
        .table-striped th, .table-striped td {
            border-right: 1px solid #ccc;
        }
        .table-striped th:last-child, .table-striped td:last-child {
            border-right: none;
        }
        h2 {
            font-family: 'Pacifico', cursive;
        }
        .custom-modal-dialog {
            max-width: 500px;
        }
        .modal-header, .modal-footer {
            border: none;
        }
        .modal-title {
            font-weight: 500;
        }
        .btn {
            border-radius: 20px;
        }
        .form-control {
            border-radius: 10px;
        }
        .modal-content {
            background-color: #f5f5f5;
        }
        .btn-primary {
            background-color: #4a90e2;
            border: none;
        }
        .btn-secondary {
            background-color: #aaa;
            border: none;
        }
        body {
            font-family: 'Georgia', serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .page-title {
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
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
                            <h2 class="card-title float-left mt-2">Faculty Details</h2>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-success float-right mr-2" data-toggle="modal" data-target="#confirmModal">Generate Report</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <?php if (!empty($faculty)): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-table">
                            <div class="card-body booking_card">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box">
                                            <h4 class="box-title">Personal Information</h4>
                                            <div class="box-content">
                                                <p><strong>ID No:</strong> <?= $faculty['id_no']; ?></p>
                                                <p><strong>Last Name:</strong> <?= $faculty['last_name']; ?></p>
                                                <p><strong>First Name:</strong> <?= $faculty['first_name']; ?></p>
                                                <p><strong>Middle Name:</strong> <?= $faculty['middle_name']; ?></p>
                                                <p><strong>Email:</strong> <?= $faculty['email']; ?></p>
                                                <p><strong>Contact:</strong> <?= $faculty['contact']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box">
                                            <h4 class="box-title">Contact Information</h4>
                                            <div class="box-content">
                                                <p><strong>Gender:</strong> <?= $faculty['gender']; ?></p>
                                                <p><strong>Address:</strong> <?= $faculty['address']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col">
                        <p>Faculty details not found.</p>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body booking_card">
                        <div class="table-responsive">
                            <table id="scheduleTable" class="datatable table table-striped table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Subjects</th>
                                        <th>Time</th>
                                        <th>Room</th>
                                        <th>Semester</th>
                                        <th>Course Year Section</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($schedules as $schedule): ?>
                                        <tr>
                                            <td><?= esc($schedule['days_of_week']) ?></td>
                                            <td><?= esc($schedule['title']) ?></td>
                                            <td><?= esc($schedule['time_from']) ?> - <?= esc($schedule['time_to']) ?></td>
                                            <td><?= esc($schedule['room']) ?></td>
                                            <td><?= esc($schedule['sem']) ?></td>
                                            <td><?= esc($schedule['schedule_type']) ?></td>
                                            <td><?= esc($schedule['description']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Confirmation Modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalLabel">Confirm Report Generation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Faculty Details</h4>
                            <p><strong>ID No:</strong> <?= $faculty['id_no']; ?></p>
                            <p><strong>Last Name:</strong> <?= $faculty['last_name']; ?></p>
                            <p><strong>First Name:</strong> <?= $faculty['first_name']; ?></p>
                            <p><strong>Middle Name:</strong> <?= $faculty['middle_name']; ?></p>
                            <p><strong>Email:</strong> <?= $faculty['email']; ?></p>
                            <p><strong>Contact:</strong> <?= $faculty['contact']; ?></p>
                            <p><strong>Gender:</strong> <?= $faculty['gender']; ?></p>
                            <p><strong>Address:</strong> <?= $faculty['address']; ?></p>
                            <h4>Schedule Details</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Subjects</th>
                                        <th>Time</th>
                                        <th>Room</th>
                                        <th>Semester</th>
                                        <th>Course Year Section</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($schedules as $schedule): ?>
                                        <tr>
                                            <td><?= esc($schedule['days_of_week']) ?></td>
                                            <td><?= esc($schedule['title']) ?></td>
                                            <td><?= esc($schedule['time_from']) ?> - <?= esc($schedule['time_to']) ?></td>
                                            <td><?= esc($schedule['room']) ?></td>
                                            <td><?= esc($schedule['sem']) ?></td>
                                            <td><?= esc($schedule['schedule_type']) ?></td>
                                            <td><?= esc($schedule['description']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a href="#" id="confirmGenerate" class="btn btn-primary">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets1/js/jquery-3.5.1.min.js"></script>
    <script src="assets1/js/popper.min.js"></script>
    <script src="assets1/js/bootstrap.min.js"></script>
    <script src="assets1/js/script.js"></script>
    <script>
        $(document).ready(function() {
            $('#confirmGenerate').on('click', function() {
                window.location.href = '/generate-report-sched<?= $faculty['id']; ?>';
            });
        });
    </script>
</body>
</html>
