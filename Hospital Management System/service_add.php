<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "myapp";

  // create
  $connection = new mysqli($servername, $username, $password, $database);

$id = "";
$title = "";
$desc1 = "";
$hour = "";
$fee = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id=$_POST["id"];
    $title=$_POST["title"];
    $desc1=$_POST["desc1"];
    $hour=$_POST["hour"];
    $fee=$_POST["fee"];

    do{
    if(empty($id) || empty($title) || empty($desc1) || empty($hour) || empty($fee) ) {
      $errorMessage = "All the fields are must be required";
      break;
    }

    //insert

    $sql = "INSERT INTO services(id, title, desc1, hour, fee) " .
           "VALUES ('$id', '$title', '$desc1', '$hour', '$fee')";
           $result = $connection->query($sql);


    if (!$result) {
      $errorMessage = "Invalid Query:" . $connection->error;
      break;
    }
    $id = "";
    $title = "";
    $desc1 = "";
    $hour = "";
    $fee = "";

    $successMessage = "Client added correctedly";

    header("location: Services.php");
    exit;

  }while(false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
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
        <h2> Service </h2>

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
                <label class="col-sm-3 col-form-label"> Title:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="title" value="<?php echo $title; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Desc:</label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="desc1" value="<?php echo $desc1; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label"> Hour: </label>
                <div class="col-sm-6">
                  <input type="text" class= "form-control" name="hour" value="<?php echo $hour; ?>">
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
                  <button type="submit" class="btn btn-primary" href="Services.php" role="button">Submit</button>
                </div>
                <div class="cancel_btn col-sm-3 d-grid">
                  <a class="btn btm-outline -primary" href=" Services.php" role="button">Cancel</a>
                </div>
           </div>
        </form>

    </div>
    
</body>
</html>