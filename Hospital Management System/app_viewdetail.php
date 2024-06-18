<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointment Detail</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="view_box">
    <div class="edit_header">
        <img src="images/clinic.png" alt="">
        <h2>Hospital Management System</h2>
      </div>
        <h2>View Detail</h2>
        <br>
        <div class="info_area">
        <?php
        // Check if service_id is provided in the URL
        if(isset($_GET['service_id'])) {
            // Get the service_id from the URL
            $service_id = $_GET['service_id'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "myapp";

            // Create connection
            $connection = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Prepare and execute SQL query to fetch appointment details
            $sql = "SELECT * FROM appoint WHERE service_id = $service_id";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                // Display appointment details
                $row = $result->fetch_assoc();
                echo "<p>Patient Name: " . $row["patients_name"] . "</p>";
                echo "<p>Doctor Name: " . $row["doctors_name"] . "</p>";
                echo "<p>Nurse Name: " . $row["nurse_name"] . "</p>";
                echo "<p>Service ID: " . $row["service_id"] . "</p>";
                echo "<p>Date & Time: " . $row["creat_at"] . "</p>";
            } else {
                echo "No appointment found with the provided service ID.";
            }

            // Close connection
            $connection->close();
        } else {
            echo "Service ID not provided.";
        }
        ?>
        </div>

        <div class="exit_btn"><a href=" Appointment.php">Exit</a></div>
    </div>
</body>
</html>
