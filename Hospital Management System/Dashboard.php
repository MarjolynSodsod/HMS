<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not, redirect to the login page
    header("Location: Login/Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment_Page</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <ul>
            <li><a href="Dashboard.php">Dashboard</a></li>
            <li><a href="Appointment.php">Appointment</a></li>
            <li>
              
              <input type="checkbox" id="dropdown" class="dropdown">
              <label class="Dropdown_name" for="dropdown">User Management
              </label>
              <div class="dropdown-container">
                <a href="Admin_Staff.php"><span>Admin-Staff</span></a>
                <a href="User_Role.php"><span>User-Roles</span></a>
              </div>

            </li>
            <li>
              
              <input type="checkbox" id="dropdown-toggle" class="dropdown-toggle">
              <label class="Dropdown_name" for="dropdown-toggle">Medical Staff </label>
              <div class="dropdown-container">
                <a href="Doctors.php">Doctors</a>
                <a href="Nurse.php">Nurses</a>
                <a href="Patient.php">Patients</a>
              </div>
        
            </li>
            <li><a href="Services.php">Services</a></li>
        </ul> 

        <div class="Logo">
          <img src="images/clinic.png" alt="HMS_Logo"></a>
          <h2>Hospital<br>Management System</h2>
        </div>
    </div>
    
    <div class="main_content">
        <div class="header">
            <a href="Login/Login.php" >Log-out</a>
        </div>

        <div class="info">


        </div>
    </div>
</div>
</body>
</html>