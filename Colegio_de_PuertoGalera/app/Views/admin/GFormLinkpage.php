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
        /* Modal styling for success and error */
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

        /* New section styling */
        .new-section {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
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
                        <h3 class="page-title mt-5">Upload Google Form Link</h3>
                    </div>
                </div>
            </div>

            <!-- Google Form Upload Section -->
            <div class="row">
                <div class="col-lg-12">
                    <form id="uploadGoogleForm" method="POST" action="/admin/uploadGoogleFormLink">
                        <div class="form-group">
                            <label for="googleFormLink">Google Form Link:</label>
                            <input type="url" name="googleFormLink" id="googleFormLink" class="form-control" placeholder="Enter Google Form Link" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Upload Link</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Uploaded Google Form Links Section -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3 class="page-title">Uploaded Google Form Links</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Link</th>
                                <th>Show Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($uploadedLinks as $link) : ?>
                            <tr>
                                <td><a href="<?= esc($link['form_link']) ?>"><?= esc($link['form_link']) ?></a></td>
                                <td>
                                    <input type="checkbox" class="toggle-visibility" data-id="<?= esc($link['id']) ?>" <?= $link['show_link'] ? 'checked' : '' ?> data-toggle="toggle">
                                </td>
                                <td>
                                    <button class="btn btn-danger delete-link" data-id="<?= esc($link['id']) ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- New Section for Additional Information -->
            <div class="new-section">
                <h4>Additional Information</h4>
                <p>Here you can add more details or instructions regarding the uploaded Google Form links.</p>
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
                    <h4 class="text-success mt-3">Done!</h4>
                    <p class="mt-3">Google Form link uploaded successfully.</p>
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
                        <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2" />
                    </svg>
                    <h4 class="text-danger mt-3">Error</h4>
                    <p class="mt-3">Failed to upload the Google Form link.</p>
                    <button type="button" class="btn btn-sm mt-3 btn-danger" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div id="notification" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
        Link visibility updated successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>


    <link rel="stylesheet" href="assets1/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css">
    <script src="assets1/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>

    <script src="assets1/js/jquery-3.5.1.min.js"></script>
    <script src="assets1/js/popper.min.js"></script>
    <script src="assets1/js/bootstrap.min.js"></script>
    <script src="assets1/js/moment.min.js"></script>
    <script src="assets1/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets1/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets1/js/script.js"></script>

    <script>
    // AJAX Form Submission for Google Form upload
    $(document).on('submit', '#uploadGoogleForm', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#notification').fadeIn().delay(2000).fadeOut(); // Show for 2 seconds
            },
            error: function(xhr, status, error) {
                $('#statusErrorsModal').modal('show');
            }
        });
    });

    // Reload page after success modal closes
    $('#statusSuccessModal').on('hidden.bs.modal', function() {
        location.reload();
    });

    $(document).ready(function() {
    // Toggle visibility for uploaded links
    $('.toggle-visibility').change(function() {
        var linkId = $(this).data('id');
        var showLink = $(this).is(':checked') ? 1 : 0;

        // Show confirmation dialog
        if (confirm("Are you sure you want to change the visibility of this link?")) {
            $.ajax({
                url: '/admin/toggleLinkVisibility',
                type: 'POST',
                data: { id: linkId, show_link: showLink },
                success: function(response) {
                    // Optionally handle success feedback
                    alert('Link visibility updated successfully.');
                },
                error: function(xhr, status, error) {
                    console.error('Error updating link visibility:', error);
                    // Revert the checkbox to its original state in case of error
                    $(this).prop('checked', !showLink);
                }
            });
        } else {
            // Revert the checkbox if the user cancels the confirmation
            $(this).prop('checked', !showLink);
        }
    });
});

    </script>



</body>
</html>
