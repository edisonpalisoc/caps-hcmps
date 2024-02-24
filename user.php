<!DOCTYPE html>
<?php
	require'connect.php';
	require_once('logincheck.php');
?>
<html lang = "eng">
	<head>
		<title>Patient San Carlos Health Care Management System 2023 Healthcare San Carlos Healthcare Management System 2023 System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
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
	<div class = "navbar navbar-default navbar-fixed-top">
		<label class = "navbar-brand">San Carlos Health Care Management System 2023 Patient Healthcare San Carlos HealthcareSan Carlos Health Care Management System 2023</label>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						Medical Technologist
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php">Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><center>Menu</center></li>
				<li><a href = "#" class = "glyphicon glyphicon-user"> Accounts</a>
					<ul>
						<li><a href = "home.php" class = "glyphicon glyphicon-user"> Medical Technologist</a></li>
						<li><a href = "#" class = "glyphicon glyphicon-user"> User</a></li>
					</ul>
				<li>
				<li><a href = "#" class = "glyphicon glyphicon-folder-close"> Sections</a>
					<ul>
						<li><a href = "#" class = "glyphicon glyphicon-folder-open"> Laboratory</a></li>
						<li><a href = "#" class = "glyphicon glyphicon-folder-open"> Rehabilitation</a></li>
					</ul>
				</li>
				<li><a href = "#" class = "glyphicon glyphicon-book"> Reports</a><li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
		<div id = "add" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>ADD Medical Technologist</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CLOSE</button>
			</div>
			<div class = "panel-body">
				<form method = "POST" enctype = "multi-part/form-data">
					<div class = "form-inline">
						<label for = "username">Username: </label>
						<input class = "form-control" type = "text" name = "username" required = "required">
						&nbsp;
						<label for = "password">Password: </label>
						<input class = "form-control" type = "password" name = "password" required = "required">
						&nbsp;
						<label for = "name">Name: </label>
						<input class = "form-control" type = "text" name = "name" required = "required">
						&nbsp;
						<label for = "section">Section: </label>
						<select class = "form-control"name = "section">
							<option>--Please select an option--</option>
							<option value = "Laboratory">Laboratory</option>
							<option value = "Dental">Dental</option>
							<option value = "Maternity">Maternity</option>
							<option value = "Xray">Xray</option>
						</select>
						<br />
						<br />
						<br />
						<button class = "btn btn-primary" type = "submit"  name = "save"><span class = "glyphicon glyphicon-save"></span> SAVE</button>
					</div>
				</form>
			</div>	
		</div>	
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>ACCOUNTS / Medical Technologist</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> ADD</button>
				<br />
				<br />
				<table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
							<th>Username</th>
							<th>Password</th>
							<th>Name</th>
							<th>Section</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$q = mysqli_query($conn, "SELECT * FROM `user`") or die(mysqli_error());
						while($f = mysqli_fetch_array($q)){
					?>
						<tr>
							<td><?php echo $f['username']?></td>
							<td><?php echo $f['password']?></td>
							<td><?php echo $f['name']?></td>
							<td><?php echo $f['section']?></td>
							<td><center><a class = "btn btn-warning">Edit</a> |
							<a class = "btn btn-danger">Delete</a></center>
							</td>
						</tr>
					<?php
						}
					?>	
					</table>
			</div>
		</div>
	</div>
	<div id = "footer">
		<label class = "footer-title">San Carlos San Carlos Health Care Management System 2023 Care Healthcare San Carlos Healthcare Management System 2023 System 2023</label>
	</div>
<?php
	include("script.php");
?>	
</body>
</html>