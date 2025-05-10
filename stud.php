<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
</head>
<body>
<div class="sidebar">
        <br>
        <span><img src="logo_off.png" alt=""  class="logo"></span>
        <br><br>
        <br><br><br><br>
        <div class="nav">
            <ul>
            <li><a href="admin.php">Home</a></li>
            <br>
                <li><a href="stud.php" style="color: blue;">Students</a></li>
                <br>
                <li><a href="teach.php">Teachers</a></li>
                <br>
                <li><a href="club.php">Manage Clubs</a></li><br>
                <li><a href="notification.php">Notifications</a></li>
                <br>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="main">
        <h1>Student's List </h1>
    </div>
    <div class="php">
    <table border='2' width="1019" style="margin-left: 250px; border-collapse: collapse;">
    <th height="45px" bgcolor="lightslategray" style="color: black;">Id</th>
        <th height="45px" bgcolor="lightslategray" style="color: black;">Name</th>
        <th height="45px" bgcolor="lightslategray" style="color: black;">Email</th>
        <th height="45px" bgcolor="lightslategray" style="color: black;">Role</th>
        <th colspan='2'  height="45px" bgcolor="lightslategray" style="color: black;">Operation</th>
        <?php
        include('conn.php');
        $select="SELECT * FROM users WHERE role='student'";
        $query=mysqli_query($conn,$select);
        while ($row=mysqli_fetch_assoc($query)) {
            
        ?>
        <tr>
            <td style="border-collapse:none;">&nbsp;<?php echo $row['id'];?></td>
            <td height="38px"><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['role'];?></td>
            <?php echo "<td><a href='edit.php?id= ".$row['id']."'>Update</a></td>"?>
             <?php echo"<td><a href='delete.php?id= ".$row['id']."'>Delete</a></td>"?>
        </tr>

        <?php
        }?> 

    </table>
    </div>
</body>
</html