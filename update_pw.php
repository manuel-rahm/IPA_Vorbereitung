<?php
include("dbconnect.php");
     if( !isset($_POST['up_username'], $_POST['new_password']) ) {
          exit("Please fill in both username and password!");
          echo '<script type="text/javascript">setTimeout(function () {
               window.location.href = "forgot.php";}, 2000);</script>';
     } else {
     $username = $_POST['up_username'];
     $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT); 
     $query = $connection->prepare("UPDATE tbluser SET fldPassword = ? WHERE fldUsername= ?");
     if (!$query->execute([$new_password, $username])) {
          echo '<p class="error">User not found!</p><style>p {font-weight:bold; font-size:20px;}</style>';
          echo '<script type="text/javascript">setTimeout(function () {
               window.location.href = "login.php";}, 2000);</script>';
     } else {
             echo '<p class="success">Password updated successfully!</p><style>p {font-weight:bold; font-size:20px;}</style>';
             echo '<script type="text/javascript">setTimeout(function () {
                window.location.href = "login.php";}, 2000);</script>';
     }
 } 
?>           