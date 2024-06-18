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


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id=$_POST["id"];
    $title=$_POST["title"];
    $desc1=$_POST["desc1"];


    do{
    if(empty($id) || empty($title) || empty($desc1) ) {
      $errorMessage = "All the fields are must be required";
      break;
    }

    //insert

    $sql = "INSERT INTO roles(id, title, desc1) " .
           "VALUES ('$id', '$title', '$desc1')";
           $result = $connection->query($sql);


    if (!$result) {
      $errorMessage = "Invalid Query:" . $connection->error;
      break;
    }
    $id = "";
    $title = "";
    $desc1 = "";

    $successMessage = "Client added correctedly";

    header("location: User_Role.php");
    exit;

  }while(false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Roles</title>
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
        <h2> User Roles </h2>

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
                  <button type="submit" class="btn btn-primary" href="User_Role.php" role="button">Submit</button>
                </div>
                <div class="cancel_btn col-sm-3 d-grid">
                    <a class="btn btm-outline -primary" href=" User_Role.php" role="button">Cancel</a>
                </div>
           </div>
        </form>

    </div>
    
</body>
</html>