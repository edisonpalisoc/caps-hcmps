<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>San Carlos Health Care Management System 2023</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "../images/hc.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<style>
        body {
            background-color: #9ADE7B; /* Set your desired background color */
        }

        /* You can customize other styles as needed */
        .navbar-default {
            background-color: #508D69; /* Set your desired navbar color */
            border-color: #9ADE7B;
        }

        .navbar-default .navbar-brand {
            color: #ffffff; /* Set your desired navbar brand color */
        }

        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
            color: #ffffff; /* Set your desired navbar brand color on hover/focus */
        }

        /* Add more styles as needed */
    </style>
	</head>
<body>
	<div class = "navbar navbar-default">
		<img src = "../images/hc.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">San Carlos Health Care Management System 2023</label>
	</div>
	<div id = "top" class = "login">
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<center><h1 class = "panel-title">Medical Technologist</h1></center>
			</div>
			<div class = "panel-body">
				<form enctype = "multipart/form-data" action = "login.php" role = "form" method = "POST">
					<div class = "form-group">
						<label for = "username">Username</label>
						<input class = "form-control" name = "username" placeholder = "Username" type = "text" required = "required" >
					</div>
					<div class = "form-group">
						<label for = "password">Password</label>
						<input class = "form-control" name = "password" placeholder = "Password" type = "password" required = "required" >
					</div>
					<div class = "form-group">
						<button class = "btn btn-block btn-success"  name = "login"><span class = "glyphicon glyphicon-log-in"></span> Login</button>
					</div>
				</form>
			</div>
		</div>	
	</div>
	<div id = "footer">
		<label class = "footer-title">San Carlos Health Care Management System 2023</label>
	</div>
</body>
<?php
	include("script.php");
?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>
</html>