<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container d-flex flex-column">
  <div class="row align-items-center justify-content-center
      min-vh-100 g-0">
    <div class="col-12 col-md-8 col-lg-4 border-top border-3 border-success">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="mb-4">
            <h5>Forgot Password?</h5>
            <p class="mb-2">Enter your registered email ID to reset the password</p>
         </div>
        
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="/forgot_password/send" method="POST">
        <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email"
                required="">
            </div>
            <div class="mb-3 d-grid">
              <button type="submit" class="btn btn-success">
                Reset Password
              </button>
            </div>
            <span>Don't have an account? <a href="signin" class="signin-link">sign in</a></span>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
    .href{
    color: yellow;
    }
    .signin-link {
    color: darkgreen; /* Change the color as desired */
}


</style>
  </body>
  </html>
