<!DOCTYPE html>
<html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
// If the user is not logged in redirect to the login page...
include("dbconnect.php");
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit;
}
?>
<head>
<title>Cilag IT Tasks</title>
</head>
    <?php include("header.php"); ?>
	<h2 style="text-align:center; margin-top:20px;">Enter the specific task with the RITM number:</h2>
	<form action="edit.php" method="POST">
		<tbody>
                <tr>
                    <td><input style="margin: auto; display: block; margin-top: 20px;" type="text" name="inputRITM"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-xl-flex justify-content-xl-end"><button class="btn btn-primary border rounded border-dark d-xl-flex"
            type="submit" style="margin: 0 auto; margin-top: 20px; background-color: rgb(0,0,0);color: rgb(255,255,255);font-weight: bold;">Submit</button>
          </div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>