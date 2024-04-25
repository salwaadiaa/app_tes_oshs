<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLE CSS -->
    <link href="<?= base_url('sb-admin-2/') ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

<div class="wrapper">
    <div class="inner">
        <div class="image-holder">
            <img src="<?= base_url('sb-admin-2/') ?>/img/registration-form-4.png" alt="">
        </div>
        <form action="<?= base_url('auth/register') ?>" method="post">
            <h3>Sign Up</h3>
            <div class="input-icon">
                <input type="text" name="nama" placeholder="Name" class="form-control">
                <i class="fas fa-user"></i>
            </div>
            <div class="input-icon">
                <input type="text" name="email" placeholder="E-mail" class="form-control">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="input-icon">
                <input type="password" name="password" placeholder="Password" class="form-control" style="font-size: 15px;">
                <i class="fas fa-lock"></i>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" checked> I agree to all statements in <a href="#">Terms & Conditions</a>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="form-login">
                <button type="submit" name="register">Sign up</button>
                <p>Already have an account? <a href="<?= base_url('auth/index') ?>">Login</a></p>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url('sb-admin-2/') ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('sb-admin-2/') ?>/js/main.js"></script>
</body>
</html>
