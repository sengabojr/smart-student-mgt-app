<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
    <style>
        table {
            border-collapse: collapse;
        }
    </style>
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
            <li><a href="clubs.php">Clubs</a></li><br>
            <li><a href="journals.php">Journals</a></li><br>
            <li><a href="st_notification.php">Notifications</a></li><br>
            <li><a href="records.php" style="color: blue;">Records</a></li><br>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="nav">
        <br>
        <h1>Students Records</h1>
    </div>
    <div class="php">
        <table border="2" width="994.5px" style="margin-left: 270px;">
            <th bgcolor="lightslategray" height="45px">Student Id</th>
            <th bgcolor="lightslategray">Subject</th>
            <th bgcolor="lightslategray">Score</th>
            <th bgcolor="lightslategray">Term</th>
            <?php
            include("conn.php");
            $select="SELECT * FROM performances";
            $sql=mysqli_query($conn,$select);
            while ($row=mysqli_fetch_assoc($sql)) {
                ?>
                <tr>
                    <td height="37px"><?php echo $row['student_id']?></td>
                    <td height="37px"><?php echo $row['subject']?></td>
                    <td height="37px"><?php echo $row['score']?></td>
                    <td height="37px"><?php echo $row['term']?></td>
                </tr>

                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>