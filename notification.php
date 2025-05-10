<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="nots.css">
</head>
<body>

<div class="sidebar">
        <br>
        <div class="logo-container"><img src="logo_off.png" alt=""  class="logo"></div>
        <br><br>
        <br><br><br><br>
        <div class="nav">
            <ul>
            <li><a href="admin.php">Home</a></li>
            <br>
                <li><a href="stud.php">Students</a></li>
                <br>
                <li><a href="teach.php">Teachers</a></li>
                <br>
                <li><a href="club.php">Manage Clubs</a></li><br>
                <li><a href="notification.php" style="color: blue;">Notifications</a></li>
                <br>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="main">
        <h1>Send Notifications</h1>
    </div>

    <center>
        <div class="contain">
            <br>
            <h4>Compose A Notification</h4>
            <form action="" method="POST">
                <br>
                <input type="text" name="title" placeholder="Notification Title">
                <br><br>
                <textarea name="message" placeholder="Enter Message" cols="61" rows="8"></textarea>
                <br><br>
                <select name="role">
                    <option value="opt" selected disabled>Send To</option>
                    <option value="teacher">Teachers</option>
                    <option value="student">Students</option>
                    <option value="both">Both</option>
                </select>
                <br><br>
                <input type="text" name="created" placeholder="Created By">
                <br><br>
                <button type="submit" name="submit">Send</button>
            </form>
        </div>
        <br>
        <footer>
            <h3>All Rights Reserved | &copy; Group IV 2025</h3>
        </footer>
    </center>
</body>
</html>
<?php
include("conn.php");
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $message=$_POST['message'];
    $role=$_POST['role'];
    $created=$_POST['created'];
    $insert="INSERT INTO notifications (title, message, target_role, created_by) VALUES('$title','$message','$role','$created')";
    $sql=mysqli_query($conn,$insert);
    if ($sql) {
        echo "notification sent";
    }
    else{
        echo"not sent" . mysqli_error($conn);
    }
}
?>