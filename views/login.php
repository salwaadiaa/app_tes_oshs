<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLE CSS -->
    <link href="<?= base_url('sb-admin-2/') ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body style="background-color: #5997B8;">

<div class="wrapper">
    <div class="inner">
        <div class="image-holder">
            <img src="<?= base_url('sb-admin-2/') ?>/img/registration-form-4.png" alt="">
        </div>
        <?php if(checkSession('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= getSession('success', true) ?>
            </div>
        <?php elseif(checkSession('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= getSession('error', true) ?>
            </div>
        <?php endif ?>

        <form action="<?= base_url('auth/login') ?>" method="post" class="login-form">
            <h3>Login</h3>
            <div class="form-group">
                <div class="input-icon">
                    <input type="text" name="email" placeholder="Email" class="form-control">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <i class="fas fa-lock"></i>
            </div>
            <div class="form-group">
                <label class="checkbox">
                    <input type="checkbox" checked> Remember me
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn-login">Login</button>
            </div>
            <div class="form-group">
                <p>Don't have an account? <a href="<?= base_url('auth/register_form') ?>">Sign up</a></p>
            </div>
        </form>
    </div>
</div>


<script src="<?= base_url('sb-admin-2/') ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('sb-admin-2/') ?>/js/main.js"></script>
</body>
</html>
