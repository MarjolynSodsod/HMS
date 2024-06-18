<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "myapp";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = "";
$full_name = "";
$birthday = "";
$address = "";
$contact_num = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET
    if (!isset($_GET["id"])) {
        header("location: Patient.php");
        exit;
    }

    $id = $connection->real_escape_string($_GET["id"]);

    // Read data from database
    $sql = "SELECT * FROM patient WHERE id='$id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $full_name = $row["full_name"];
        $birthday = $row["birthday"];
        $address = $row["address"];
        $contact_num = $row["contact_num"];
    } else {
        header("location: Patient.php");
        exit;
    }
} else {
    // POST
    $id = $connection->real_escape_string($_POST["id"]);
    $full_name = $connection->real_escape_string($_POST["full_name"]);
    $birthday = $connection->real_escape_string($_POST["birthday"]);
    $address = $connection->real_escape_string($_POST["address"]);
    $contact_num = $connection->real_escape_string($_POST["contact_num"]);

    do {
        if (empty($id) || empty($full_name) || empty($birthday) || empty($address) || empty($contact_num)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE patient SET full_name='$full_name', birthday='$birthday', address='$address', contact_num='$contact_num' WHERE id='$id'";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }

        $successMessage = "Client updated successfully";
        header("location: Patient.php");
        exit;
    } while (false);
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2 style="text-align: center;">Edit Patient</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Full Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Birthday:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="birthday" value="<?php echo $birthday; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact Number:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="contact_num" value="<?php echo $contact_num; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" href="Patient.php" role="button">Save Changes</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="Patient.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
