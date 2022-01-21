<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="font-weight: bold;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: rgb(81,141,198);">
        <div class="container-fluid"><a class="navbar-brand" href="#">Cilag IT - Tasks</a>
            <div class="collapse navbar-collapse text-center" id="navcol-1"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="dropdown d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center"
                    style="width: 139px;height: 40px;padding: 8px 18px;color: rgb(0,0,0);"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(0,0,0);">Tasks</a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="index.php">Tasks - Open</a><a class="dropdown-item" role="presentation" href="tasks_closed.php">Tasks - Closed</a></div>
                </div><a href="decommission.php" style="color: rgb(0,0,0);">Decommission</a>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"></li>
                    <p class="greeting" style="margin: auto; margin-right: 20px;">Logged in as: <?php echo  $_SESSION['username']?></p>
                </ul><a href="logout.php"><button class="btn btn-primary border rounded border-dark" type="button" style="background-color: rgb(0,0,0);">Log out</button></a></div>
        </div>
    </nav>