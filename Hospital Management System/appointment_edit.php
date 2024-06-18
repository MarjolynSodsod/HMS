<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "myapp";

 // create
 $connection = new mysqli($servername, $username, $password, $database);

$patients_name = "";
$doctors_name = "";
$nurse_name = "";
$service_id = "";
$creat_at = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET
    if(!isset($_GET["service_id"])){
        header("location:Appointment.php");
        exit;
    }

    $service_id = $_GET["service_id"];

    //read
    $sql = "SELECT * FROM appoint WHERE service_id=$service_id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
 
    if (!$row) {
       header("location:Appointment.php");
       exit;
    }
    $patients_name = $row["patients_name"];
    $doctors_name = $row["doctors_name"];
    $nurse_name = $row["nurse_name"];
    $creat_at = $row["creat_at"];
}
else{
    //POST
    $patients_name = $_POST["patients_name"];
    $doctors_name = $_POST["doctors_name"];
    $nurse_name = $_POST["nurse_name"];
    $service_id = $_POST["service_id"];
    $creat_at = $_POST["creat_at"];
    
    do{
        if(empty($patients_name) || empty($doctors_name) || empty($nurse_name) || empty($service_id) || empty($creat_at) ) {
            $errorMessage = "All the fields are must be required";
            break;
        }
        $sql = "UPDATE appoint SET patients_name='$patients_name', 
        doctors_name='$doctors_name', nurse_name='$nurse_name', creat_at='$creat_at' WHERE service_id=$service_id";

        $result = $connection->query($sql);

        if (!$result){
            $errorMessage = "Invalid Query:" . $connection->error;
            break;
        }

        $successMessage = "Client added correctedly";
        header("location:Appointment.php");
        exit;


    }while (true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
   
</head>
<body>
    <div class="edit_box">
        <div class="edit_header">
           <img src="images/clinic.png" alt="">
           <h2>Hospital Management System</h2>
        </div>
        <h2> Appointment </h2>

        <?php
        if (!empty($errorMessage)) {
            echo"
            <div class='alert alert-warning alert_dismissible fade show' role='alert'>
               <strong>$errorMessage</strong>
               <button type='button' class='btn-close' data-bs-dismiss='alert' area-label='Close'></button>
            </div>
            ";
        }
        
        ?>
        
        <form method="post">
            <input type="hidden" name="service_id"value="<?php echo $service_id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Patients Name:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="patients_name" value="<?php echo $patients_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Doctors Name:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="doctors_name" value="<?php echo $doctors_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Nurse Name:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="nurse_name" value="<?php echo $nurse_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Date & Time: </label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="creat_at" value="<?php echo $creat_at; ?>">
                </div>
            </div>


            <?php
            if (!empty($successMessage)) {
                echo"
                <div class='row mb-3'>
                  <div class = 'offset-sm-3 col-sm-6'>
                    <div class'alert alert-success alert_dismissible fade show' role='alert'>
                      <strong>$successMessage</strong>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' area-label='Close'></button>
                    </div>
                  </div>
                </div>
                ";
               }
            
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                  <button type="submit" class="btn btn-primary" href="Appointment.php" role="button">Save Changes</button>
                </div>
                <div class="cancel_btn col-sm-3 d-grid">
                    <a class="btn btm-outline -primary" href=" Appointment.php" role="button">Cancel</a>
                </div>
           </div>
        </form>

    </div>
</body>
</html>