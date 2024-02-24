<!DOCTYPE html>
<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<html lang = "en">
	<head>	
		<title>San Carlos Health Care Management System 2023</title>
		<meta charset = "UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shorcut icon" href = "images/hc.png" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
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
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "images/hc.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">San Carlos Health Care Management System 2023</label>
		<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php echo $fetch['firstname']." ".$fetch['lastname'] ?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<br />
	<br />
	<br />
	<div class = "well">
		<div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>DENTAL</label></center>
			</div>
		</div>
		
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<?php 
					$q = $conn->query("SELECT * FROM `dental` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `dental_no` = '$_GET[dental_no]'") or die(mysqli_error());
					$f = $q->fetch_array();
				?>
				<label>DENTAL RESULT FORM</label>	
				<a style = "float:right; margin-top:-4px;" href = "dental_record.php?itr_no=<?php echo $f['itr_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<div class = "panel-body">
				<div class = "alert alert-info">Basic Information</div>
					<div style = "width:30%; float:left;">
						<label style = "font-size:18px;">Name</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">Age</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">Gender</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">Blood Pressure</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['BP']?></label>
					</div>
					<br />
					<br />
					<br />
					<br style = "clear:both;"/>
					<div style = "float:left; width:50%;">
						<label style = "font-size:18px;">Address</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
					<div style = "float:left; width:20%;">
						<label style = "font-size:18px;">Teeth/Tooth</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['tooth']?></label>
					</div>	
					<div style = "float:left; width:25%;">
						<label style = "font-size:18px;">Dentist</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['dentist']?></label>
					</div>
					<br style = "clear:both;" />
					<br />
					<br />
			</div>
			<?php require'add_query.php'?>
			</form>
		</div>
		 
	</div>
	<div id = "footer">
		<label class = "footer-title">San Carlos Health Care Management System 2023</label>
	</div>
	</body>
		<?php require "script.php" ?>
</html>