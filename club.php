<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
    <title>Manage Clubs</title>
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
        <span>Clubs Management</span>
    </div>
<div class="links">
<a href="club.php" style="text-align: center; color: black; text-decoration: none; border-bottom: none;">Clubs</a>
<a href="create_club.php">Add</a>
</div>
<table border="1" width="1016" style="margin-left: 250px; border-collapse: collapse;">
    <th height="40px" bgcolor="lightslategray" style="color: #000;">name</th>
    <th bgcolor="lightslategray" style="color: #000;">description</th>
    <th  bgcolor="lightslategray" style="color: #000;">operation</th>
    <?php
include("conn.php");
$select="SELECT * FROM clubs";
$sql=mysqli_query($conn,$select);
while ($row=mysqli_fetch_assoc($sql )) {
    ?>
    <tr>
    <td height="38px"><?php echo $row['name']?></td>
    <td height="38px"><?php echo $row['description']?></td>
   
             <?php echo"<td><a href='delete_club.php?id= ".$row['id']."'>Delete</a></td>"?>
    </tr>
    <?php
}
?>
</table>


</body>
</html>
<style>
    .links {
        margin-left: 250px;
    }
    .links a{
        display: block;
        width: 509px;
        height: 40px;
        background: #ccc;
        float: left;
        border: 1px solid rgba(0, 0, 0, 1);
    }
</style>