<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS Login</title>
    <link href="../css/Login.css" rel="stylesheet">
</head>
<body>
    <form action="Log_U_P.php" method="post">
        
    <div class="header">
        <img src="../images/clinic.png" alt="logo">
        <h2>Hospital <br>Management System</h2>
    </div>

    <?php
        if (isset($_GET['error'])) {
            echo '<p style="color: red; text-align: center;">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>

    <label>Username</label>
    <input type="text" id="username" name="username"placeholder="Enter username"><br>

    <label>Password</label>
    <input type="password" id="password" name="password" placeholder="Enter password"><br>

    <div class="btnsubmit"><button type="submit"s>Log-in</button></div>
    </from>
</body>
</html>