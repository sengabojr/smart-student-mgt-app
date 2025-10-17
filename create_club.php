<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSAPT | Manage Clubs</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
</head>
<body>
<body>
    <div class="sidebar">
        <br>
        <div class="logo-container">
        <img src="logo_off.png"  class="logo">
        </div>
        <br><br>
        <br><br><br><br>
        <div class="nav">
            <ul>
            <li><a href="admin.php">Home</a></li><br>
                <li><a href="stud.php">Students</a></li><br>
                <li><a href="teach.php">Teachers</a></li><br>
                <li><a href="club.php" style="color: blue;">Manage Clubs</a></li><br>
                <li><a href="notification.php">Notifications</a></li><br>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="main">
        <h1 style="font-size: 30px;">Smart Student Activity & Performance Tracker</h1>
        <span>Add New Club</span>
    </div>
<div class="form-club">
<form action="create_club.php" method="POST">
    <input type="text" name="name" placeholder="Club Name">
    <br>
    <textarea name="description" cols="50" rows="7"></textarea><br>
    <button type="submit" name="submit">Create</button>
</form>
<?php
include("conn.php");
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $create = "INSERT INTO clubs (name, description) VALUES ('$name', '$description')";

    $sql = mysqli_query($conn, $create);

    if (mysqli_query($conn, $create )) {
        echo "Club Created";
    }
    else {
        echo "Query Failed: " . mysqli_error($conn);
    }
}
?>
</div>
</body>
</html>