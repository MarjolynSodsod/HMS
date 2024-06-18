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

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET
    if(!isset($_GET["id"])){
        header("location: User_Role.php");
        exit;
    }

    $id = $_GET["id"];

    //read
    $sql = "SELECT * FROM roles WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
 
    if (!$row) {
       header("location: User_Role.php");
       exit;
    }
    $title = $row["title"];
    $desc1 = $row["desc1"];

}
else{
    //POST
    $id = $_POST["id"];
    $title = $_POST["title"];
    $desc1 = $_POST["desc1"];
    
    do{
        if(empty($id) || empty($title) || empty($desc1) ) {
            $errorMessage = "All the fields are must be required";
            break;
        }
        $sql = "UPDATE services SET title='$title', desc1='$desc1' WHERE id=$id";

        $result = $connection->query($sql);

        if (!$result){
            $errorMessage = "Invalid Query:" . $connection->error;
            break;
        }

        $successMessage = "Client added correctedly";
        header("location: User_Role.php");
        exit;


    }while (true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Roles </title>
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
            <input type="hidden" name="id"value="<?php echo $id; ?>">
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
                  <button type="submit" class="btn btn-primary" href="User_Role.php" role="button">Save Changes</button>
                </div>
                <div class="cancel_btn col-sm-3 d-grid">
                    <a class="btn btm-outline -primary" href="User_Role.php" role="button">Cancel</a>
                </div>
           </div>
        </form>

    </div>
    
</body>
</html>