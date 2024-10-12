<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }
        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .card {
            border-top: 3px solid darkgreen;
            width: 70%;
            max-width: 350px; /* Wider card */
            padding: 6px;    /* Larger padding */
        }
        .error {
            color: red;
            font-size: 1rem;
            text-align: center;
            margin-bottom: 15px;
        }
        .form-control {
            padding: 5px;  /* Larger padding for input fields */
            font-size: 1.1rem;  /* Larger font size for input fields */
        }
        .btn {
            padding: 7px;  /* Larger padding for buttons */
            font-size: 1.1rem;  /* Larger font size for buttons */
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0a58ca;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-center">Verification Code</h5>
            
            <?php if(session()->getFlashdata('error')): ?>
                <div class="error"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            
            <form action="/forgot_password/check_code" method="POST">
                <div class="mb-4">  <!-- More space between form elements -->
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-4">  <!-- More space between form elements -->
                    <label for="verification_code" class="form-label">Verification Code</label>
                    <input type="text" class="form-control" name="verification_code" placeholder="Enter verification code" required>
                </div>
                <div class="d-grid">  <!-- Using Bootstrap d-grid for button -->
                    <button type="submit" class="btn btn-success">Verify</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
