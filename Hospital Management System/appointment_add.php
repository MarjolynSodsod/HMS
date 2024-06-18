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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patients_name=$_POST["patients_name"];
    $doctors_name=$_POST["doctors_name"];
    $nurse_name=$_POST["nurse_name"];
    $service_id=$_POST["service_id"];
    $creat_at=$_POST["creat_at"];

    do{
    if(empty($patients_name) || empty($doctors_name) || empty($nurse_name) || empty($service_id) || empty($creat_at) ) {
      $errorMessage = "All the fields are must be required";
      break;
    }

    //insert

    $sql = "INSERT INTO appoint(patients_name, doctors_name, nurse_name, service_id, creat_at) " .
           "VALUES ('$patients_name', '$doctors_name', '$nurse_name', '$service_id', '$creat_at')";
           $result = $connection->query($sql);


    if (!$result) {
      $errorMessage = "Invalid Query:" . $connection->error;
      break;
    }

    $patients_name = "";
    $doctors_name = "";
    $nurse_name = "";
    $service_id = "";
    $creat_at = "";

    $successMessage = "Client added correctedly";

    header("location: Appointment.php");
    exit;

  }while(false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>

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
        <h2> Appointments </h2>

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
                <label class="col-sm-3 col-form-label"> Service ID: </label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="service_id" value="<?php echo $service_id; ?>">
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
                  <button type="submit" class="btn btn-primary" href=" Appointment.php" role="button">Submit</button>
                </div>
                <div class="cancel_btn col-sm-3 d-grid">
                    <a class="btn btm-outline -primary" href=" Appointment.php" role="button">Cancel</a>
                </div>
           </div>
        </form>

    </div>
    
</body>
</html>