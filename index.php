<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>San Carlos Health Care Management System 2023</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "images/hc.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
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
	<div class = "navbar navbar-default navtop">
		<img src = "images/hc.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">San Carlos Health Care Management System 2023</label>
	</div>
		<div id = "sidelogin">
			<form action = "login.php" enctype = "multipart/form-data" method = "POST" style="" >
			<div style="text-align: center;">
			<label style="margin-left: 5%; color: black; background-color: " class = "lbllogin"><h1>LOGIN HERE</h1></label>

			</div>	
				<br />
				<hr /style = "border:4  solid black;">
				<br />
				<div class = "form-group">
					<label style="margin-left: 5%; margin-left: 26%;" for = "username">Username</label>
					<input style="width: 50%; margin-left: 25%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;" class = "form-control" type = "text" name = "username"  required = "required"/>
				</div>
				<br />
				<div class = "form-group">
					<label style="margin-left: 5%; margin-left: 26%;" for = "password">Password</label>
					<input style="width: 50%; margin-left: 25%; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;" class = "form-control" type = "password" name = "password" required = "required" />
				</div>
				<br />
				<br />
				<div class = "form-group">
					<button class  = "btn btn-success form-control" type = "submit" name = "login" ><span class = "glyphicon glyphicon-log-in"></span> Login</button>
				</div>
			</form>
		</div>	
		<img src = "images/scp.jpeg" class = "background">			
	<div id = "footer" style="backround:#12e856;">
		<label class = "footer-title">San Carlos Health Care Management System 2023</label>
	</div>
</body>
<?php
	include("admin/script.php");
?>
</html>