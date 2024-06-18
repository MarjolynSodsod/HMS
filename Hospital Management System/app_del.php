<?php
if(isset($_GET["service_id"])) {
    $service_id = $_GET["service_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myapp";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM appoint WHERE service_id = $service_id";
    $connection->query($sql);

}
header("location: Appointment.php");
exit;
?>
