<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center min-vh-100 g-0">
        <div class="col-12 col-md-8 col-lg-4 border-top border-3 border-success">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="mb-4">
                        <h5>Reset Password</h5>
                        <p class="mb-2">Enter a new password to reset your account.</p>
                    </div>

                    <!-- Display error message if any -->
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <form action="/forgot_password/update" method="POST">
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="Enter new password" required="">
                        </div>
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-success">Update Password</button>
                        </div>
                        <span>Remembered your password? <a href="/signin" class="signin-link">Sign in</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .signin-link {
        color: darkgreen;
        text-decoration: underline;
    }

    .signin-link:hover {
        color: #0056b3; /* Hover color for the sign-in link */
    }
</style>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
