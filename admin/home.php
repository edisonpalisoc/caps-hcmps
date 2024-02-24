<!DOCTYPE html>
<?php
    require_once 'logincheck.php';
    $date = date("Y", strtotime("+ 8 HOURS"));
    $conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
    $qfecalysis = $conn->query("SELECT COUNT(*) as total FROM `fecalisys` WHERE `year` = '$date'");
    $ffecalysis = $qfecalysis->fetch_array();
    $qmaternity = $conn->query("SELECT COUNT(*) as total FROM `birthing` WHERE `year` = '$date'");
    $fmaternity = $qmaternity->fetch_array();
    $qhematology = $conn->query("SELECT COUNT(*) as total FROM `hematology` WHERE `year` = '$date'");
    $fhematology = $qhematology->fetch_array();
    $qdental = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `year` = '$date'");
    $fdental = $qdental->fetch_array();
    $qxray = $conn->query("SELECT COUNT(*) as total FROM `radiological` WHERE `year` = '$date'");
    $fxray = $qxray->fetch_array();
    $qrehab = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `year` = '$date'");
    $frehab = $qrehab->fetch_array();
    $qsputum = $conn->query("SELECT COUNT(*) as total FROM `sputum` WHERE `year` = '$date'");
    $fsputum = $qsputum->fetch_array();
    $qurinalysis = $conn->query("SELECT COUNT(*) as total FROM `urinalysis` WHERE `year` = '$date'");
    $furinalysis = $qurinalysis->fetch_array();
?>
<html lang="eng">
<head>
    <title>San Carlos Health Care Management System 2023</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/hc.png" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="../css/customize.css" />
    <?php require 'script.php'?>
    <script src="../js/jquery.canvasjs.min.js"></script>
    <style>
        body {
            background-color: #9ADE7B;
        }

        .navbar-default {
            background-color: #508D69;
            border-color: #9ADE7B;
        }

        .navbar-default .navbar-brand {
            color: #ffffff;
        }

        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
            color: #ffffff;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            $("#chartContainer").CanvasJSChart({
                title: {
                    text: "Total Patient Population <?php echo $date?>",
                    fontSize: 24
                },
                axisY: {
                    title: "Count"
                },
                legend: {
                    verticalAlign: "center",
                    horizontalAlign: "left"
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{label} <br/> {y}",
                        indexLabel: "{y}",
                        dataPoints: [
                            { label: "Fecalysis", y: <?php echo ($ffecalysis ? $ffecalysis['total'] : 0); ?>, legendText: "Fecalysis" },
                            // { label: "Maternity", y: <?php echo ($fmaternity ? $fmaternity['total'] : 0); ?>, legendText: "Maternity" },
                            { label: "Hematology", y: <?php echo ($fhematology ? $fhematology['total'] : 0); ?>, legendText: "Hematology" },
                            { label: "Dental", y: <?php echo ($fdental ? $fdental['total'] : 0); ?>, legendText: "Dental" },
                            // { label: "Xray", y: <?php echo ($fxray ? $fxray['total'] : 0); ?>, legendText: "Xray" },
                            // { label: "Rehabilitation", y: <?php echo ($frehab ? $frehab['total'] : 0); ?>, legendText: "Rehabilitation" },
                            { label: "Sputum", y: <?php echo ($fsputum ? $fsputum['total'] : 0); ?>, legendText: "Sputum" },
                            { label: "Urinalysis", y: <?php echo ($furinalysis ? $furinalysis['total'] : 0); ?>, legendText: "Urinalysis" }
                        ]
                    }
                ]
            });
        }
    </script>
</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/hc.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">San Carlos Health Care Management System 2023</label>
		<?php 
			$q = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = $_SESSION[admin_id]") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php 
							echo $f['firstname']." ".$f['lastname'];
						?>
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
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> Accounts</a>
					<ul>
						<li><a href = "admin.php"><i class = "glyphicon glyphicon-cog"></i> Medical Technologist</a></li>
						<li><a href = "user.php"><i class = "glyphicon glyphicon-cog"></i> Chief Laboratory</a></li>
					</ul>
				</li>
				<li><a href="appointment.php"><i class="glyphicon glyphicon-calendar"></i> Appointment</a></li>
				<li><li><a href = "patient.php"><i class = "glyphicon glyphicon-user"></i> Patient</a></li></li>
				<li><li><a href = "med.php"><i class = "glyphicon glyphicon-user"></i> Medical certificate</a></li></li>

				<li><a href = ""><i class = "glyphicon glyphicon-folder-close"></i> Sections</a>
					<ul>
						<li><a href = "fecalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Fecalysis</a></li>
						<!-- <li><a href = "maternity.php"><i class = "glyphicon glyphicon-folder-open"></i> Maternity</a></li> -->
						<li><a href = "hematology.php"><i class = "glyphicon glyphicon-folder-open"></i> Hematology</a></li>
						<li><a href = "dental.php"><i class = "glyphicon glyphicon-folder-open"></i> Dental</a></li>
						<!-- <li><a href = "xray.php"><i class = "glyphicon glyphicon-folder-open"></i> Xray</a></li> -->
						<!-- <li><a href = "rehabilitation.php"><i class = "glyphicon glyphicon-folder-open"></i> Rehabilitation</a></li> -->
						<li><a href = "sputum.php"><i class = "glyphicon glyphicon-folder-open"></i> Sputum</a></li>
						<li><a href = "urinalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Urinalysis</a></li>

					</ul>
				</li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "well">
			<div id="chartContainer" style="width: 100%; height: 400px"></div> 
		</div>
	</div>
	<div id = "footer">
		<label class = "footer-title">San Carlos Health Care Management System 2023</label>
	</div>
		
</body>
</html>