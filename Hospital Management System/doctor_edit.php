<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "myapp";

 // create
 $connection = new mysqli($servername, $username, $password, $database);

$id = "";
$full_name = "";
$special = "";
$address = "";
$phone_num = "";
$fee = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET
    if(!isset($_GET["id"])){
        header("location: Doctors.php");
        exit;
    }

    $id = $_GET["id"];

    //read
    $sql = "SELECT * FROM doctor WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
 
    if (!$row) {
       header("location: Doctors.php");
       exit;
    }
    $full_name = $row["full_name"];
    $special = $row["special"];
    $address = $row["address"];
    $phone_num = $row["phone_num"];
}
else{
    //POST
    $id = $_POST["id"];
    $full_name = $_POST["full_name"];
    $special = $_POST["special"];
    $address = $_POST["address"];
    $phone_num = $_POST["phone_num"];
    $fee = $_POST["fee"];
    
    do{
        if(empty($id) || empty($full_name) || empty($special) || empty($address) || empty($phone_num) || empty($fee)  ) {
            $errorMessage = "All the fields are must be required";
            break;
        }
        $sql = "UPDATE doctor SET id='$id', full_name='$full_name', special='$special', address='$address',
         phone_num='$phone_num', fee='$fee' WHERE id=$id";

        $result = $connection->query($sql);

        if (!$result){
            $errorMessage = "Invalid Query:" . $connection->error;
            break;
        }

        $successMessage = "Client added correctedly";
        header("location: Doctors.php");
        exit;


    }while (true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
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
        <h2> Doctor </h2>

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
            <input type="hidden" name="id"value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Full Name:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="full_name" value="<?php echo $full_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Speciality:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="special" value="<?php echo $special; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Address:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Phone Number:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="phone_num" value="<?php echo $phone_num; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Fees: </label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="fee" value="<?php echo $fee; ?>">
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
                  <button type="submit" class="btn btn-primary" href=" Doctors.php" role="button">Save Changes</button>
                </div>
                <div class="cancel_btn col-sm-3 d-grid">
                    <a class="btn btm-outline -primary" href=" Doctors.php" role="button">Cancel</a>
                </div>
           </div>
        </form>

    </div>
    
</body>
</html>