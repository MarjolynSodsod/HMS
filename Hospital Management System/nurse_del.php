<?php
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myapp";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM nurses WHERE id = $id";
    $connection->query($sql);

}
header("location: Nurse.php");
exit;
?>
