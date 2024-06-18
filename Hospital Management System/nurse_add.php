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

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id=$_POST["id"];
    $full_name=$_POST["full_name"];
    $special=$_POST["special"];
    $address=$_POST["address"];

    do{
    if(empty($id) || empty($full_name) || empty($special) || empty($address) ) {
      $errorMessage = "All the fields are must be required";
      break;
    }

    //insert

    $sql = "INSERT INTO nurses(id, full_name, special, address ) " .
           "VALUES ('$id', '$full_name', '$special', '$address')";
           $result = $connection->query($sql);


    if (!$result) {
      $errorMessage = "Invalid Query:" . $connection->error;
      break;
    }

    $id = "";
    $full_name = "";
    $special = "";
    $address = "";
    $successMessage = "Client added correctedly";

    header("location: Nurse.php");
    exit;

  }while(false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse</title>
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
        <h2> Nurse </h2>

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
                <label class="col-sm-3 col-form-label"> ID:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
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
                  <button type="submit" class="btn btn-primary" href="Nurse.php" role="button">Submit</button>
                </div>
                <div class="cancel_btn col-sm-3 d-grid">
                    <a class="btn btm-outline -primary" href=" Nurse.php" role="button">Cancel</a>
                </div>
           </div>
        </form>

    </div>
    
</body>
</html>