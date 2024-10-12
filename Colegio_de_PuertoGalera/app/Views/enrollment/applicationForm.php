
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    <!-- Assuming you have Bootstrap included for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Assuming you have Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="container mt-4">



        <!-- Form Column -->
        <div class="col-12 col-md-8">
            <!-- Personal Information -->
            <form action="<?= base_url('/submitApplication') ?>" method="post">




<div class="form-group">
    <h2 class="text-center mb-4">COLLEGE ADMISSIONS FORM</h2>
</div>

<div class="form-group">
    <label for="first_name">First Name:</label>
    <input type="text" class="form-control" name="first_name" required>
</div>

<div class="form-group">
    <label for="middle_initial">Middle Initial:</label>
    <input type="text" class="form-control" name="middle_initial">
</div>

<div class="form-group">
    <label for="last_name">Last Name:</label>
    <input type="text" class="form-control" name="last_name" required>
</div>

<div class="form-group">
    <label for="birth_date">Birth Date:</label>
    <div class="row">
        <div class="col">
    
            <select class="form-control" name="birth_month" required>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
    </select>
        
        </div>
        <div class="col">
        <select class="form-control" name="birth_day" required>
            <?php for ($day = 1; $day <= 31; $day++) : ?>
                <option value="<?= str_pad($day, 2, '0', STR_PAD_LEFT) ?>"><?= $day ?></option>
            <?php endfor; ?>
        </select>
        </div>
        <div class="col">
            <select class="form-control" name="birth_year" required>
                <?php
                $currentYear = date("Y");
                $startYear = $currentYear - 100; // Adjust the range as needed

                for ($year = $currentYear; $year >= $startYear; $year--) :
                ?>
                    <option value="<?= $year ?>"><?= $year ?></option>
                <?php endfor; ?>
        </select>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gender">Gender:</label>
    <select class="form-control" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>

<div class="form-group">
    <label for="citizenship">Citizenship:</label>
    <input type="text" class="form-control" name="citizenship" required>
</div>

<!-- Contact Information -->
<h3 class="mt-4">Contact Information</h3>

<div class="form-group">
    <label for="phone">Phone:</label>
    <input type="tel" class="form-control" name="phone"  placeholder="(000)000-0000" required>
</div>

<div class="form-group">
    <label for="email">E-mail Address:</label>
    <input type="email" class="form-control" name="email" placeholder="example@example.com" required>
</div>

<!-- Mailing Address -->
<h3 class="mt-4">Mailing Address</h3>

<div class="form-group">
    <label for="street_address">Street Address:</label>
    <input type="text" class="form-control" name="street_address" required>
</div>



<div class="form-group">
    <label for="city">City:</label>
    <input type="text" class="form-control" name="city" required>
</div>

<div class="form-group">
    <label for="state">State / Province:</label>
    <input type="text" class="form-control" name="state">
</div>

<div class="form-group">
    <label for="zip_code">Postal / Zip Code:</label>
    <input type="text" class="form-control" name="zip_code" required>
</div>

<!-- Emergency Contact -->
<h3 class="mt-4">Emergency Contact</h3>

<div class="form-group">
    <label for="emergency_first_name">First Name:</label>
    <input type="text" class="form-control" name="emergency_first_name" required>
</div>

<div class="form-group">
    <label for="emergency_relationship">Relationship:</label>
    <input type="text" class="form-control" name="emergency_relationship" required>
</div>

<div class="form-group">
    <label for="emergency_last_name">Last Name:</label>
    <input type="text" class="form-control" name="emergency_last_name" required>
</div>

<div class="form-group">
    <label for="emergency_email">Email:</label>
    <input type="email" class="form-control" name="emergency_email" placeholder="example@example.com" required>
</div>

<div class="form-group">
    <label for="emergency_phone">Phone Number:</label>
    <input type="tel" class="form-control" name="emergency_phone"  placeholder="(000)000-0000" required>
</div>

<button type="submit" class="btn btn-primary mt-4">Submit</button>

</div>
</form>
</div>


<!-- Optional: Add Bootstrap JS for enhanced functionality -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
