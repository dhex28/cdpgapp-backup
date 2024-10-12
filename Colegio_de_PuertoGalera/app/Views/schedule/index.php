<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Faculty List</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/icon/colegiologo.png">
    <link rel="stylesheet" href="assets1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets1/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets1/css/feathericon.min.css">
    <link rel="stylesheet" href="assets1/plugins/morris/morris.css">
    <link rel="stylesheet" type="text/css" href="assets1/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets1/css/style.css">
    <!-- Load Bootstrap and FontAwesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Georgia:wght@400;700&display=swap"> -->
    
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
        h1 {
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

        <?php if (session()->has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success'); ?>
        </div>
        <?php endif; ?>

        <div class="page-wrapper">
        <div class="content container-fluid">
    <div class="container mt-4">
        <h1 class="mb-4">Class Schedule</h1>
   
        <!-- Button to open modal for creating a new schedule -->
        <button class="btn btn-light mb-4" data-toggle="modal" data-target="#addScheduleModal">
            <i class="fas fa-plus"></i> Add New Schedule
        </button>
        <div class="button-container mb-4" style="text-align: right;">
      <button class="btn btn-light filter-btn" data-filter="all">
      <a href="/history" style="color: white;"> 
  <i class="fas fa-history"></i> History Log
</a>

      </button>
        </div>


        <div>
        <hr style="margin-top: 20px; border: 1px solid #ccc;">
        </div>
        
        <!-- Modal for creating a new schedule -->
 <!-- Modal for creating a new schedule -->
<div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addScheduleModalLabel">Create a New Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for creating a new schedule -->
                <form action="/schedule/create" method="post">
                <div class="form-group">
                    <label for="faculty_select">Faculty</label>
                    <select name="faculty_select" id="faculty_select" class="form-control" required>
                        <option value="" disabled selected>Select a Faculty Member</option>
                        <?php foreach ($faculty as $member): ?>
                            <option value="<?= esc($member['last_name']) . ', ' . esc($member['first_name']) . ' ' . esc($member['middle_name']); ?>">
                                <?= esc($member['last_name']); ?>, <?= esc($member['first_name']); ?> <?= esc($member['middle_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="faculty_name" id="faculty_name" value="">
                </div>
                    <div class="form-group">
                        <label for="days_of_week">Days of Week</label>
                        <input type="text" name="days_of_week" id="days_of_week" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Subjects</label>
                        <select name="title" id="title" class="form-control" required>
                            <option value="">Select Subject</option>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?= $subject['id'] ?>"><?= $subject['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time_from">Time From</label>
                        <input type="time" name="time_from" id="time_from" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="time_to">Time To</label>
                        <input type="time" name="time_to" id="time_to" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sem">Semester</label>
                        <select name="sem" id="sem" class="form-control" required>
                            <option value="">Select Semester</option>
                            <option value="1st Semester">1st Semester</option>
                            <option value="2nd Semester">2nd Semester</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="schedule_type">Course Year Section</label>
                        <select name="schedule_type" id="schedule_type" class="form-control" required>
                            <option value="" disabled selected>Select</option>
                            <option value="bstm">BSTM</option>
                            <option value="bsoa">BSOA</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="room">Room</label>
                    <select name="room" id="room" class="form-control" required>
                        <option value="">Select Room</option>
                        <?php for ($i = 1; $i <= 10; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Schedule</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

         <!-- Filter buttons -->
         <div class="button-container mb-4">
            <button class="btn btn-light filter-btn" data-filter="all">ALL</button>
            <button class="btn btn-light filter-btn" data-filter="bstm">BSTM</button>
            <button class="btn btn-light filter-btn" data-filter="bsoa">BSOA</button>
        </div>
        
        <!-- Search bar for filtering schedules -->
        <input type="text" id="searchFaculty" placeholder="Search by Faculty" class="form-control mb-4" style="width: 200px; height: 35px;">
        
        <!-- Table displaying class schedules -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body booking_card">
                    <div class="table-responsive">
                        <table id="scheduleTable" class="datatable table table-striped table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Teachers</th>
                                    <th>Subjects</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th>Semester</th>
                                    <th>Course Year Section</th>
                                    <th>Description</th>
                                    <th class="text-right">Actions</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP loop to populate table rows -->
                                <?php foreach ($schedules as $schedule): ?>
                                    <!-- PHP logic to handle filtering based on schedule type -->
                                    <?php $days = explode(",", $schedule['days_of_week']); ?>
                                    <?php foreach ($days as $day): ?>
                                        <tr data-id="<?= esc($schedule['id']) ?>" data-schedule-type="<?= esc($schedule['schedule_type']) ?>">
                                            <td><?= esc(trim($day)) ?></td>
                                            <td>
                                                <?php if (!empty($schedule['faculty_name'])): ?>
                                                    <?= esc($schedule['faculty_name']) ?>
                                                <?php else: ?>
                                                    <span class="text-danger">No Faculty Assigned</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= esc($schedule['title']) ?></td>
                                            <td><?= esc($schedule['time_from']) ?> - <?= esc($schedule['time_to']) ?></td>
                                            <td><?= esc($schedule['room']) ?></td>
                                            <td><?= esc($schedule['sem']) ?></td>
                                            <td><?= esc($schedule['schedule_type']) ?></td>
                                            <td><?= esc($schedule['description']) ?></td>
                                            <td>
                                                <button class="btn btn-light" data-toggle="modal" data-target="#editScheduleModal-<?= esc($schedule['id']) ?>">Edit</button>
                                            </td>
                                            <td>
                                            <a class="btn btn-light btn-delete" href="<?= base_url('/scheduledelete/' . $schedule['id']) ?>" onclick="return confirm('Are you sure you want to delete this schedule?');">Delete</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    </div>
    <?php foreach ($schedules as $schedule): ?>
            <div class="modal fade" id="editScheduleModal-<?= esc($schedule['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="editScheduleModalLabel-<?= esc($schedule['id']) ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Schedule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form to edit the schedule -->
                            <form action="/schedule/update/<?= esc($schedule['id']) ?>" method="post">
                                <div class="form-group">
                                    <label for="faculty_name">Faculty</label>
                                    <input type="text" name="faculty_name" value="<?= esc($schedule['faculty_name']) ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="days_of_week">Days of Week</label>
                                    <input type="text" name="days_of_week" value="<?= esc($schedule['days_of_week']) ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Subjects</label>
                                    <input type="text" name="title" value="<?= esc($schedule['title']) ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="time_from">Time From</label>
                                    <input type="time" name="time_from" value="<?= esc($schedule['time_from']) ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="time_to">Time To</label>
                                    <input type="time" name="time_to" value="<?= esc($schedule['time_to']) ?>" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label for="sem">Semester</label>
                                    <input type="text" name="sem" value="<?= esc($schedule['sem']) ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="schedule_type">Course Year Section</label>
                                    <select name="schedule_type" class="form-control" required>
                                        <option value="bstm" <?= ($schedule['schedule_type'] === "bstm") ? 'selected' : '' ?>>BSTM</option>
                                        <option value="bsoa" <?= ($schedule['schedule_type'] === "bsoa") ? 'selected' : '' ?>>BSOA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="room">Room</label>
                                    <input type="text" name="room" value="<?= esc($schedule['room']) ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" value="<?= esc($schedule['description']) ?>" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Schedule</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Update Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Schedule updated successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>

  


 
   <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   
    <script>
        document.getElementById('faculty_select').addEventListener('change', function() {
        document.getElementById('faculty_name').value = this.value;
    });
    </script>
    
    <script>
   $(document).ready(function() {
    // Function to filter the table based on the selected schedule type
    function filterTable(filterType) {
        $('#scheduleTable tbody tr').each(function() {
            var scheduleType = $(this).data('schedule-type').toLowerCase();
            if (filterType === 'all' || scheduleType === filterType) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    // Handle filter button clicks
    $('.filter-btn').click(function() {
        var filterType = $(this).data('filter').toLowerCase();
        filterTable(filterType);
    });

    // Search functionality
    $('#searchFaculty').on('input', function() {
        var searchQuery = $(this).val().toLowerCase();
        $('#scheduleTable tbody tr').each(function() {
            var facultyName = $(this).find('td:nth-child(2)').text().toLowerCase();
            if (facultyName.includes(searchQuery)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

});


        </script>

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