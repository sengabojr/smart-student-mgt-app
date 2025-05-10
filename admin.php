<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
    <style>
        .card {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            text-align: center;
            width: 300px;
            transition: transform 0.3s ease;
            margin-left: 60px;
            display: flex;
            float: left;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-title {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .card-number {
            font-size: 60px;
            margin: 0;
        }

        .card-text {
            font-size: 16px;
            opacity: 0.85;
        }
        .all {
            margin-left: 370px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <br>
        <div class="logo-container">
            <img src="logo_off.png" alt=""  class="logo">
        </DIV>
        <br><br>
        <br><br>
        <div class="nav">
            <ul>
            <li><a href="admin.php" style="color: blue;">Home</a></li>
            <br>
                <li><a href="stud.php">Students</a></li>
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
        <h1 style="font-size: 40px;">Smart Student Activity & Performance Tracker</h1>
    </div>
    <br>
    <div class="text">
        <h3>Welcome, Admin!</h3><br>
        <?php 
        $now = new DateTime();
        echo $now->format("l, H:i:s  d-m-Y ");
        ?>
        <br><br>
        <span>System Is Running Smoothly!</span>
    </div>
    <br><br>
    <div class="all">
    <div class="card">
        <div class="card-title">Total Students</div>
        <?php
$conn = mysqli_connect("localhost", "root", "", "bridge");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT COUNT(*) AS student_count FROM users WHERE LOWER(role) = 'student'";
$result = mysqli_query($conn, $sql);

$studentCount = 0;

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $studentCount = $row['student_count'];
}

?> 

</head>
<body>
        <div class="card-number"><?php echo $studentCount; ?></div>
        <div class="card-text">Students</div>
    </div>

    <div class="card">
        <div class="card-title">Total Teachers</div>
        <?php
$sql = "SELECT COUNT(*) AS teacher_count FROM users WHERE LOWER(role) = 'teacher'";
$result = mysqli_query($conn, $sql);

$teacherCount = 0;

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $teacherCount = $row['teacher_count'];
}

mysqli_close($conn);
?> 

</head>
<body>
        <div class="card-number"><?php echo $teacherCount; ?></div>
        <div class="card-text">Teachers</div>
    </div>
    </div>
</body>
</html>