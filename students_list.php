<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
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
            <li><a href="teacher.php">Home</a></li><br>
            <li><a href="students_list.php" style="color: blue;">Students</a></li><br>
            <li><a href="perfomance.php">Performance</a></li><br>
            <li><a href="discipline.php">Discipline</a></li><br>
            <li><a href="tr_notification.php">Notifications</a></li><br>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="nav">
        <br>
        <h1>Students List</h1>
    </div>

    <table border='2' width="1000" style="margin-left: 270px;">
    <th height="45px" bgcolor="lightslategray" style="color: black;">Id</th>
        <th height="45px" bgcolor="lightslategray" style="color: black;">Name</th>
        <th height="45px" bgcolor="lightslategray" style="color: black;">Email</th>
        <th height="45px" bgcolor="lightslategray" style="color: black;">Role</th>
        <?php
        include('conn.php');
        $select="SELECT * FROM users WHERE role='student'";
        $query=mysqli_query($conn,$select);
        while ($row=mysqli_fetch_assoc($query)) {
            
        ?>
        <tr>
            <td style="border-collapse:none;"><?php echo $row['id'];?></td>
            <td height="38px"><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['role'];?></td>
        </tr>

        <?php
        }?> 

    </table>
</body>
</html>