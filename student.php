<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSAPT | Student</title>
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="side">
        <br><br>
        <div class="logo-container">
        <img src="logo_off.png" class="logo">
    </div>
    <br><br>
        <ul>
            <li><a href="student.php" style="color: blue;">Home</a></li>
            <br>
            <li><a href="clubs.php">Clubs</a></li><br>
            <li><a href="journals.php">Journals</a></li><br>
            <li><a href="st_notification.php">Notifications</a></li><br>
            <li><a href="records.php">Records</a></li><br>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="nav">
        <br>
        <h1 style="font-size: 30px">Smart Student Activity & Performance Tracker</h1>
        <br>
        <h3>Students Dashboard</h3>
    </div>

   <br>
<div style="position: relative; left: 300px;"> 
<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['id'])) {
    header('Location: form.php');
    exit();
}

$student_id = $_SESSION['id'];

$sql = "SELECT name, id FROM users WHERE id = $student_id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if ($row = mysqli_fetch_assoc($result)) {
    $name = htmlspecialchars($row['name']);
    $id = $row['id'];
    echo "<h3>Welcome, $name! <br> Your ID is: $id</h2>";
} else {
    echo "<p>Error: Student not found.</p>";
}

mysqli_close($conn);
?>
<br><br>

</body>
</html> 

<div
    <h4>🎓 Academic Encouragement</h4><br>
    <ul>
        <li list-style-type: disc;>Every small step counts — keep moving forward, and success will follow.</li>
        <li>Believe in your ability to learn. You are capable of amazing things!</li>
        <li>Don’t watch the clock; do what it does — keep going.</li>
        <li>Success isn’t about being the best. It’s about always getting better.</li>
    </ul><br>
    <h4>💡 Growth Mindset</h4><br>
    <ul>
        <li>Mistakes mean you're trying. Keep learning, keep growing.</li>
        <li>Progress, not perfection — that’s the goal.</li>
        <li>Your future is created by what you do today, not tomorrow.</li>
    </ul>
    <br>
    <h4>💪 Motivation & Strength</h4><br>
    <ul>
        <li>Tough times don’t last. Tough students do</li>
        <li>Push yourself — no one else is going to do it for you.</li>
        <li>You’ve made it this far — don’t give up now.</li>
    </ul>
</div>
</div>