<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "myapp";

 // create
 $connection = new mysqli($servername, $username, $password, $database);

$id = "";
$username = "";
$full_name = "";
$phone_number = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET
    if(!isset($_GET["id"])){
        header("location: Admin_Staff.php");
        exit;
    }

    $id = $_GET["id"];

    //read
    $sql = "SELECT * FROM staff WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
 
    if (!$row) {
       header("location: Admin_Staff.php");
       exit;
    }
    $username = $row["username"];
    $full_name = $row["full_name"];
    $phone_number = $row["phone_number"];
    $address = $row["address"];
}
else{
    //POST
    $id = $_POST["id"];
    $username = $_POST["username"];
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    
    do{
        if(empty($id) || empty($username) || empty($full_name) || empty($phone_number) || empty($address) ) {
            $errorMessage = "All the fields are must be required";
            break;
        }
        $sql = "UPDATE staff SET username='$username', full_name='$full_name', phone_number='$phone_number', address='$address' WHERE id=$id";

        $result = $connection->query($sql);

        if (!$result){
            $errorMessage = "Invalid Query:" . $connection->error;
            break;
        }

        $successMessage = "Client added correctedly";
        header("location: Admin_Staff.php");
        exit;


    }while (true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Staff</title>
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
        <h2> Admin-Staff </h2>

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
                <label class="col-sm-3 col-form-label"> Username:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="username" value="<?php echo $username; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Full Name:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="full_name" value="<?php echo $full_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Phone Number:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="phone_number" value="<?php echo $phone_number; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Address: </label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="address" value="<?php echo $address; ?>">
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
                  <button type="submit" class="btn btn-primary" href="Admin_Staff.php" role="button">Save Changes</button>
                </div>
                <div class="cancel_btn col-sm-3 d-grid">
                    <a class="btn btm-outline -primary" href="Admin_Staff.php" role="button">Cancel</a>
                </div>
           </div>
        </form>

    </div>
    
</body>
</html>