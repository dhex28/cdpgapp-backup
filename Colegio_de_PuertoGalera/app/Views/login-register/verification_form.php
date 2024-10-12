<!-- verification_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Email Verification</title>
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
            <h2>Email Verification</h2>
            <p>Please enter the verification code sent to your email.</p>
            <hr>
            <form action="<?php echo base_url('verify'); ?>" method="post"> <!-- Update form action -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" name="verification_code" placeholder="Verification Code" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Verify</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>