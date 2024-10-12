<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title> Login Form</title>
<style>
body {
    background: #19aa8d;
    font-family: 'Roboto', sans-serif;
}
.container {
    margin-top: 80px;
}
.card {
    color: #999;
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 30px;
    background-color: #fff;
}
.card h2 {
    color: #333;
    font-weight: bold;
    margin-top: 0;
}
.card hr {
    margin: 0 -30px 20px;
}
.card p{
    font-weight: normal;
}
.card .form-group {
    margin-bottom: 20px;
}
.card .form-control {
    border: 1px solid #dddfe2;
    border-radius: 5px;
    margin-bottom: 15px;
    font-size: 15px;
}
.card .btn {
    border: none;
    border-radius: 3px;
    padding: 10px 0;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background-color: #19aa8d; /* Teal */
    min-width: 140px;
}
.card .btn:hover {
    background-color: #218c7d; /* Darker Teal */
}
.card a {
    color: #19aa8d;
    text-decoration: underline;
}
.card a:hover {
    text-decoration: none;
}
/* Custom CSS to adjust icon size and alignment */
.card .input-group-addon {
  
   text-align: center; /* Align items vertically within input group */
}
.card .input-group .input-group-text {
    font-size: 1rem; /* Adjust the font size of the icon */
    padding: 0.560rem 0.80rem; /* Adjust the padding around the icon */
}
</style>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-5">
            <div class="card">
                <h2>Login</h2>
                <p>Please fill in this form to login your account!</p>
                <hr>
                <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
                
                </div>
                <?php endif; ?>

                <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                <div class="form-group mb-3">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control">
                    
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </div>
                </form>
                <div class="text-center">Don't have an account? <a href="/signup">Sign Up here</a></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>