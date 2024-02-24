
<!-- print_patient.php -->
<?php
    if(isset($_GET['id']) && isset($_GET['lastname'])){
        $id = $_GET['id'];
        $lastname = $_GET['lastname'];

        // Fetch patient information from the database using $id

        $conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
        $query = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$id'") or die(mysqli_error());
        $fetch = $query->fetch_array();
        $conn->close();

        // Include the patient information in the medical certificate
        $patientName = $fetch['firstname'] . ' ' . $fetch['middlename'] . ' ' . $fetch['lastname'];
        $birthdate = $fetch['birthdate'];
        $age = $fetch['age'];
        $address = $fetch['address'];
        $civilStatus = $fetch['civil_status'];

        // Rest of the HTML content for the medical certificate
        // You can customize this part based on your needs
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Certificate</title>
    <!-- Add any additional styling or meta tags as needed -->
    <style>
    body {
        font-family: 'Arial', sans-serif;
        line-height: 1.6;
        margin: 20px;
    }

    h1 {
        text-align: center;
        text-transform: uppercase;
        font-size: 24px;
        margin-bottom: 20px;
    }

    p {
        margin-bottom: 10px;
        text-align: center;
    }

    strong {
        font-weight: bold;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    /* Add any additional styles as needed */

    /* Style to hide the button */
    #saveButton {
        display: block;
    }

    /* Additional styles */
    #certificateContent {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    /* Customize the appearance of the printed document */
    @media print {
        body {
            background-color: #fff;
        }

        #certificateContent {
            border: none;
            background-color: #fff;
        }
    }
</style>

</head>
<body>
<div id="certificateContent">
    <center>Republic of the Philippines</center>
    <center>Province of Pangasinan</center>
    <center>City Of San Carlos</center>
    <center>City Health Office</center>
    <br>
    <br>
    <hr>
    
    <h1>Medical Certificate</h1>
    <p>This is to certify that</p>
    <p><strong><?php echo $patientName; ?></strong></p>
    <p>born on <strong><?php echo $birthdate; ?></strong>, aged <strong><?php echo $age; ?></strong>, residing at <strong><?php echo $address; ?></strong>,</p>
    <p>is examined and found to be in good health condition.</p>
    <p>Civil Status: <strong><?php echo $civilStatus; ?></strong></p>
    <p>This certificate is issued upon the request of the above-named person for whatever legal purpose it may serve.</p>
    <hr>
    <!-- Doctor's Information and Signature -->
    <div style="margin-top: 30px;">
        <p>Issued by:</p>
        <p>Dr. [Doctor's Full Name]</p>
        <p>License No: [Doctor's License Number]</p>
        <!-- Add any additional information about the doctor -->
        <img src="[URL to doctor's signature]" alt="Doctor's Signature" style="max-width: 150px; margin-top: 10px; float: right;">
    </div>

    <!-- You can customize the appearance of the printed document using CSS -->

    <button id="saveButton" onclick="saveCertificate()">Save Certificate</button>
</div>

<!-- JavaScript function to save the certificate and hide the button -->
<script>
    function saveCertificate() {
        // Hide the button before printing
        var saveButton = document.getElementById('saveButton');
        if (saveButton) {
            saveButton.style.display = 'none';
        }

        // Print the content
        window.print();

        // Show the button again after printing
        if (saveButton) {
            saveButton.style.display = 'block';
        }
    }
</script>

</body>
</html>

<?php
    } else {
        // Handle the case when parameters are not set
        echo "Invalid request!";
    }
?>


