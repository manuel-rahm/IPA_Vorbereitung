<?php
session_start();
session_destroy();
// Redirect to the login page:
echo "<p class='success'>Logout successful!</p><style>p {font-weight:bold; font-size:20px;}</style>";
echo '<script type="text/javascript">setTimeout(function () {
    window.location.href = "login.php";}, 2000);</script>';
?>