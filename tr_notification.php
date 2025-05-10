<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
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
            <li><a href="perfomance.php">Performance</a></li><br>
            <li><a href="discipline.php">Displine</a></li><br>
            <li><a href="tr_notification.php" style="color: blue;">Notifications</a></li><br>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="nav">
        <br>
        <h1>View Notifications</h1>
    </div>

    <table border="1" style="margin-left: 270px;" width="995px">
        <th height="45px" bgcolor="lightslategray" width="40px">Id</th>
        <th height="45px" bgcolor="lightslategray">Title</th>
        <th height="45px" bgcolor="lightslategray">Message</th>
        <th height="45px" bgcolor="lightslategray">Sent By</th>
        <th height="45px" bgcolor="lightslategray">Operation</th>
        <?php
        include("conn.php");
        $select="SELECT * FROM notifications WHERE target_role='teacher' ";
        $sql=mysqli_query($conn,$select);
        while ($row=mysqli_fetch_array($sql)) {
            ?>
            <tr>
            <td height="38px"><?php echo $row['id']?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['message']?></td>
            <td><?php echo $row['created_by']?></td>
            <?php echo "<td bgcolor='red' style='text-align: center;'><a href='deleteNot.php?id=".$row['id']."' style='color: white; text-decoration: none;'>Delete</a></td>"?>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html> 