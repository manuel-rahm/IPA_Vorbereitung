<!DOCTYPE html>
<html>
    <?php
    session_start();
    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cilag IT Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean">
        <form action="authenticate.php" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <h1 style="color: rgb(0,0,0);">Login<br>Cilag IT MLL</h1>
            </div>
            <div class="form-group"><input class="form-control" type="username" name="username" placeholder="Username" autofocus=""></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(0,0,0);" value="login">Log In</button></div><a class="forgot" href="forgot.php">Forgot your password?</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>