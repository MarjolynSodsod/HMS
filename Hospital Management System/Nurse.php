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
            <!--List item with link to Dashboard.php-->
            <li><a href="Dashboard.php">Dashboard</a></li>
            <!--List item with link to Appointment.php-->
            <li><a href="Appointment.php">Appointment</a></li>

            <li>
                <!--List item with a dropdown for user management-->
              <input type="checkbox" id="dropdown" class="dropdown">
              <label class="Dropdown_name" for="dropdown">User Management
              </label>
              <div class="dropdown-container">
                <a href="Admin_Staff.php"><span>Admin-Staff</span></a>
                <a href="User_Role.php"><span>User-Roles</span></a>
              </div>

            </li>

          <li>
             <!--List item with a dropdown for Medical Staff-->
              <input type="checkbox" id="dropdown-toggle" class="dropdown-toggle">
              <label class="Dropdown_name" for="dropdown-toggle">Medical Staff </label>
              <div class="dropdown-container">
                <a href="Doctors.php"><span>Doctors</span></a>
                <a href="Nurse.php"><span>Nurses</span></a>
                <a href="Patient.php"><span>Patients</span></a>
              </div>
        
            </li>
            <!--link to Services.php-->
            <li><a href="Services.php">Services</a></li>
        </ul> 

        <!--logo and title of the sidebar-->
        <div class="Logo">
          <img src="images/clinic.png" alt="HMS_Logo"></a>
          <h2>Hospital<br>Management System</h2>
        </div>
    </div>
    
    <div class="main_content">
        <div class="header">
             <!--link to log out from the system-->
            <a href="Login/Login.php" >Log-out</a>
        </div>

        <div class="info">
        <div class="Table_container">
        <h2>Nurse</h2>
        <a class="add" href="nurse_add.php">Add</a>
        <br>

        <!--table to display the Nurse data-->
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Speciality</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
             //PHP code to connect to the database and retrieve doctors data
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "myapp";

           //create a connection to database
            $connection = new mysqli($servername, $username, $password, $database);

            //check if the connection is successful
            if ($connection->connect_error) {
                die("Connection Failed: " . $connection->connect_error);
            }

            //read the sql query to the nurses data
            $sql = "SELECT * FROM nurses";
            $result = $connection->query($sql);

            if(!$result) {
                die("Invalid Query: " . $connection->error);
            }

            // loop through the retrieved data and display it in the table
            while($row =$result->fetch_assoc()) {      
                echo "
                <tr>
                 <td>". $row["id"] ."</td>
                 <td>". $row["full_name"] ."</td>
                 <td>". $row["special"] ."</td>
                 <td>". $row["address"] ."</td>
                    <td class='Edit_view_btn'>
                     <a class='editbtn' href='nurse_edit.php?id=$row[id]'>Edit</a>
                     <a class='deletebtn' href='nurse_del.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
        </table>
      </div>
        </div>
    </div>
</div>
</body>
</html>