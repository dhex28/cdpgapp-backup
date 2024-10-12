<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Codeigniter Auth User Registration Example</title>
<style>
body {
    color: #fff;
    background: #19aa8d;
    font-family: 'Roboto', sans-serif;
}
.container {
    width: 400px;
    margin: 0 auto;
    padding: 30px 0;
}
.card {
    color: #999;
    border-radius: 3px;
    margin-bottom: 15px;
    background: #fff;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.card h2 {
    color: #333;
    font-weight: bold;
    margin-top: 0;
}
.card hr {
    margin: 0 -30px 20px;
}
.card .form-group {
    margin-bottom: 20px;
}
.card label {
    font-weight: normal;
    font-size: 15px;
}
.card .form-control {
    min-height: 38px;
    box-shadow: none !important;
}   
.card .input-group-addon {
    max-width: 42px;
    text-align: center;
}   
.card .btn, .card .btn:active {        
    font-size: 16px;
    font-weight: bold;
    background: #19aa8d !important;
    border: none;
    min-width: 140px;
}
.card .btn:hover, .card .btn:focus {
    background: #179b81 !important;
}
.card a {
    color: #fff;    
    text-decoration: underline;
}
.card a:hover {
    text-decoration: none;
}
.card form a {
    color: #19aa8d;
    text-decoration: none;
}   
.card form a:hover {
    text-decoration: underline;
}
.card .fa {
    font-size: 21px;
}
.card .fa-paper-plane {
    font-size: 18px;
}
.card .fa-check {
    color: #fff;
    left: 17px;
    top: 18px;
    font-size: 7px;
    position: absolute;
}
</style>
</head>
<body>
<div class="container">
    <div class="card">
        <h2>Sign Up</h2>
        <p>Please fill in this form to create an account!</p>
        <hr>
        <?php if(isset($validation)):?>
            <div class="alert alert-warning">
               <?= $validation->listErrors() ?>
            </div>
        <?php endif;?>
        <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-user"></i>
                        </span>                    
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Username" value="<?= set_value('name') ?>" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-paper-plane"></i>
                        </span>                    
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?= set_value('email') ?>" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>                    
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                        </span>                    
                    </div>
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
        </form>
        <div class="text-center">Already have an account? <a href="/signin"  style="color: #19aa8d;">Login here</a></div>
    </div>
</div>
</body>
</html>
