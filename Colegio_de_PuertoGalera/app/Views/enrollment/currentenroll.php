<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Colegio De Puerto Galera</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <!-- all css here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wCz5sflITx2au2+SS+OgPbifvzI/q0fMxzCGVoN6NsdEhQ9x5PVnIC1tgsz7O1f6PCiDjUr14GV2N8Z9BZZGyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--color css-->
    <link rel="stylesheet" id="triggerColor" href="assets/css/triggerplate/color-0.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0; /* Set a light background color */
        }

        .applicant-form {
            text-align: center;
        }

        .container {
            max-width: 600px;
        }

        h1 {
            margin-top: 0;
            color: purple;
        }

        .applicant-types {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: yellowgold;
            color: navy;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }

        .btn:hover {
            background-color: navy;
            color: yellowgold;
        }

        .modal-dialog {
            margin-top: 10%;
        }
    </style>
</head>
   
<body>

<!-- Modal -->
<div class="modal fade" id="examTakenModal" tabindex="-1" role="dialog" aria-labelledby="examTakenModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="examTakenModalLabel">Exam Already Taken</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Message to display that exam has already been taken -->
                <?php echo isset($message) ? $message : ''; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->include('include/enrollmentheader') ?>

<div class="applicant-form">
    <div class="container">
        <h1>Welcome to Colegio de Puerto Galera Admissions</h1>
        <div class="applicant-types">
            <h2>Select Your Applicant Type:</h2>
            <?php if ($examExists): ?>
                <button class="btn" data-toggle="modal" data-target="#examTakenModal">Freshmen</button>
            <?php else: ?>
                <a href="/sidenav" class="btn">Freshmen</a>
            <?php endif; ?>
            <a href="/profile" class="btn">Continuing</a>
            <a href="/profile" class="btn">Transferee</a>
            <a href="/profile" class="btn">Shifter</a>
        </div>
    </div>
</div>

<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- others plugins -->
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>
