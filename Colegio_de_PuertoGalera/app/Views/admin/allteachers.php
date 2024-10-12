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

    <style>
        .small-button {
            width: 80px;
            height: 35px;
        }
        .large-button {
            width: 100px;
            height: 45px;
        }
        .table-striped th,
        .table-striped td {
            border-right: 1px solid #ccc; /* Create vertical lines between columns */
        }
        /* To remove the last border-right */
        .table-striped th:last-child,
        .table-striped td:last-child {
            border-right: none;
        }
        h2{
            font-family: 'Pacifico', cursive; /* Use script font */
        }
        .custom-modal-dialog {
            max-width: 500px; /* Restricting the width for a minimalist look */
        }

        .modal-header,
        .modal-footer {
            border: none; /* Removing border for a clean look */
        }

        .modal-title {
            font-weight: 500; /* Slightly less bold title */
        }

        .btn {
            border-radius: 20px; /* Soft rounded corners */
        }

        .form-control {
            border-radius: 10px; /* Softer input field borders */
        }

        /* Minimalist color scheme */
        .modal-content {
            background-color: #f5f5f5; /* Soft background color */
        }

        .btn-primary {
            background-color: #4a90e2; /* Soft blue color for primary buttons */
            border: none; /* No border for a minimalist look */
        }

        .btn-secondary {
            background-color: #aaa; /* Gray color for secondary buttons */
            border: none; /* No border */
        }
            /* Apply the slab font to the entire body, or specifically to the table */
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
                            <h4 class="card-title float-left mt-2">Teacher Details</h4>
                            <button class="btn btn-light mb-4 float-right veiwbutton" onclick="window.location.href='/teacherform'">
                                <i class="fas fa-plus"></i> Add Teacher
                            </button>
                            <!-- <a href="/teacherform" class="btn btn-primary float-right veiwbutton">Add Teacher</a> -->
                            <!-- Add the report generation button here -->
                            <a href="/generate-report" class="btn btn-success float-right mr-2">Generate Report</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="datatable table table-striped table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($teachers as $teacher) : ?>
                                            <tr>
                                                <td><?= $teacher['name'] ?></td>
                                                <td><?= $teacher['designation'] ?></td>
                                                <td><?= $teacher['description'] ?></td>
                                                <td>
                                                    <img src="<?= base_url('uploads/' . $teacher['image']) ?>" alt="Teacher Image" style="max-width: 100px; max-height: 100px;">
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="edit-customer.html"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="<?= base_url('/deleteteachers' . $teacher['id']) ?>" onclick="return confirm('Are you sure you want to delete this teacher?');"><i class="fas fa-trash-alt m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
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
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });
    </script>
</body>

</html>
