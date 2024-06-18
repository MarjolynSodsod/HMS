<?php
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myapp";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM roles WHERE id = $id";
    $connection->query($sql);

}
header("location: User_Role.php");
exit;
?>
