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
    <!-- Modal CSS -->
    <style>
        .modal#statusSuccessModal .modal-content,
        .modal#statusErrorsModal .modal-content {
            border-radius: 30px;
        }

        .modal#statusSuccessModal .modal-content svg,
        .modal#statusErrorsModal .modal-content svg {
            width: 100px;
            display: block;
            margin: 0 auto;
        }

        .modal#statusSuccessModal .modal-content .path,
        .modal#statusErrorsModal .modal-content .path {
            stroke-dasharray: 1000;
            stroke-dashoffset: 0;
        }

        .modal#statusSuccessModal .modal-content .path.circle,
        .modal#statusErrorsModal .modal-content .path.circle {
            -webkit-animation: dash 0.9s ease-in-out;
            animation: dash 0.9s ease-in-out;
        }

        .modal#statusSuccessModal .modal-content .path.line,
        .modal#statusErrorsModal .modal-content .path.line {
            stroke-dashoffset: 1000;
            -webkit-animation: dash 0.95s 0.35s ease-in-out forwards;
            animation: dash 0.95s 0.35s ease-in-out forwards;
        }

        .modal#statusSuccessModal .modal-content .path.check,
        .modal#statusErrorsModal .modal-content .path.check {
            stroke-dashoffset: -100;
            -webkit-animation: dash-check 0.95s 0.35s ease-in-out forwards;
            animation: dash-check 0.95s 0.35s ease-in-out forwards;
        }

        @-webkit-keyframes dash {
            0% {
                stroke-dashoffset: 1000;
            }

            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes dash {
            0% {
                stroke-dashoffset: 1000;
            }

            100% {
                stroke-dashoffset: 0;
            }
        }

        @-webkit-keyframes dash-check {
            0% {
                stroke-dashoffset: -100;
            }

            100% {
                stroke-dashoffset: 900;
            }
        }

        @keyframes dash-check {
            0% {
                stroke-dashoffset: -100;
            }

            100% {
                stroke-dashoffset: 900;
            }
        }

        .box00 {
            width: 100px;
            height: 100px;
            border-radius: 50%;
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
                        <h3 class="page-title mt-5">Add News</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="addNewsForm" method="post" action="/newsinsert" enctype="multipart/form-data">
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" type="text" name="title" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date Published</label>
                                    <input type="date" class="form-control" name="date_published" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Author</label>
                                    <input type="text" class="form-control" name="author" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control" rows="5" name="content" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Add News</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="statusSuccessModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-lg-4">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                        <circle class="path circle" fill="none" stroke="#198754" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                        <polyline class="path check" fill="none" stroke="#198754" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                    </svg>
                    <h4 class="text-success mt-3">Success!</h4>
                    <p class="mt-3">News added successfully.</p>
                    <button type="button" class="btn btn-sm mt-3 btn-success" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="statusErrorsModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-lg-4">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                        <circle class="path circle" fill="none" stroke="#db3646" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                        <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3" />
                        <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" X2="34.4" y2="92.2" />
                    </svg>
                    <h4 class="text-danger mt-3">Error</h4>
                    <p class="mt-3">Failed to add news.</p>
                    <button type="button" class="btn btn-sm mt-3 btn-danger" data-bs-dismiss="modal">Ok</button>
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

        // AJAX Form Submission
        $(document).on('submit', '#addNewsForm', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#statusSuccessModal').modal('show');
                    setTimeout(function() {
                        $('#statusSuccessModal').modal('hide');
                    }, 2000); // hide modal after 2 seconds
                },
                error: function(xhr, status, error) {
                    $('#statusErrorsModal').modal('show');
                }
            });
        });

        // Reload the page after the success modal is closed
    $('#statusSuccessModal').on('hidden.bs.modal', function () {
        location.reload();
    });
    </script>
</body>

</html>
