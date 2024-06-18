<?php
if(isset($_GET["service_id"])) {
    $service_id = $_GET["service_id"];

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

    // Prepare and bind
    $stmt = $connection->prepare("DELETE FROM appoint WHERE service_id = ?");
    $stmt->bind_param("i", $service_id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

    // Close statement and connection
    $stmt->close();
    $connection->close();
}
header("location:Appointment.php");
exit;
?>
