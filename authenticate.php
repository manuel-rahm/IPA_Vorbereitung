<?php
include("dbconnect.php");
     if( !isset($_POST['username'], $_POST['password']) ) {
          exit("Please fill in both username and password!");
          echo '<script type="text/javascript">setTimeout(function () {
               window.location.href = "login.php";}, 2000);</script>';
     } else {
     $username = $_POST['username'];
     $password = $_POST['password']; 

     $query = $connection->prepare("SELECT * FROM tbluser WHERE fldusername=:username");
     $query->bindParam(":username", $username, PDO::PARAM_STR);
     $query->execute();
     
     $result = $query->fetch(PDO::FETCH_ASSOC);
     
     if (!$result) {
          echo '<p class="error">Credentials are wrong!</p><style>p {font-weight:bold; font-size:20px;}</style>';
          echo '<script type="text/javascript">setTimeout(function () {
               window.location.href = "login.php";}, 2000);</script>';
     } else {
         if (password_verify($password, $result['fldPassword'])) {
             $_SESSION['username'] = $result['fldUsername'];
             echo '<p class="success">Login successful!</p><style>p {font-weight:bold; font-size:20px;}</style>';
             
             echo '<script type="text/javascript">setTimeout(function () {
               window.location.href = "index.php";}, 2000);</script>';
         } else {
             echo '<p class="error">Credentials are wrong!</p><style>p {font-weight:bold; font-size:20px;}</style>';
             echo '<script type="text/javascript">setTimeout(function () {
               window.location.href = "login.php";}, 2000);</script>';
         }
     }
 }
?>           