<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSAPT | Clubs</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
</head>
<body>
    <div class="side">
        <br><br>
        <div class="logo-container">
        <img src="logo_off.png" class="logo">
    </div>
    <br><br>
        <ul>
            <li><a href="student.php">Home</a></li>
            <br>
            <li><a href="clubs.php" style="color: blue;">Clubs</a></li><br>
            <li><a href="journals.php">Journals</a></li><br>
            <li><a href="st_notification.php">Notifications</a></li><br>
            <li><a href="records.php">Records</a></li><br>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="nav">
        <h1 style="font-size: 30px;">Smart Student Activity & Performance Tracker</h1><br>
        <h4>Clubs List</h4>
    </div>
    <table border='2' width="995" style="margin-left: 270px; border-collapse: collapse;">
    <th height="45px" bgcolor="lightslategray" style="color: black;">Id</th>
        <th height="45px" bgcolor="lightslategray" style="color: black;">Name</th>
        <th height="45px" bgcolor="lightslategray" style="color: black;">Description</th>
        <?php
        include('conn.php');
        $select="SELECT * FROM clubs";
        $query=mysqli_query($conn,$select);
        while ($row=mysqli_fetch_assoc($query)) {
            
        ?>
        <tr>
            <td style="border-collapse:none;">&nbsp;<?php echo $row['id'];?></td>
            <td height="38px"><?php echo $row['name'];?></td>
            <td><?php echo $row['description'];?></td>
        </tr>

        <?php
        }?> 

</body>
</html>