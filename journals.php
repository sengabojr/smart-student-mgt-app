<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Entry</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
    <style>
.container {
    text-align: center;
    margin-left: 570px;
    width: 400px;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
}

input, textarea {
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    margin-top: 10px;
    padding: 10px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
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
            <li><a href="journals.php" style="color: blue;">Journals</a></li><br>
            <li><a href="st_notification.php">Notifications</a></li><br>
            <li><a href="records.php">Records</a></li><br>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="nav">
        <br>
        <h1>Students Dashboard</h1>
    </div>
    <br><br><br>
    <div class="container">
        <h2>Add a Journal Entry</h2>
        <form action="journals.php" method="POST">
            <label for="student_id">Student Id:</label>
            <input type="text" id="student_id" name="student_id" required>

            <label for="content">Journal Content:</label>
            <textarea id="content" name="content" required></textarea>

            <button type="submit">Submit</button>
        </form>
        <br>
        <?php
include("conn.php");
if (isset($_POST["submit"])) {
$student_id = $_POST['student_id'];
$content = $_POST['content'];
$created_at = date("Y-m-d H:i:s");
$sql = "INSERT INTO journals (student_id, content, created_at) VALUES ('$student_id', '$content', '$created_at')";

$role_check_sql = "SELECT role FROM users WHERE id = '$student_id'";
$role_result = mysqli_query($conn, $role_check_sql);

if ($role_result && mysqli_num_rows($role_result) > 0) {
    $row = mysqli_fetch_assoc($role_result);
    
    if ($row['role'] === 'student') {
        $insert_sql = "INSERT INTO journals (student_id, content, created_at) VALUES ('$student_id', '$content', '$created_at')";
        if (mysqli_query($conn, $insert_sql)) {
            echo "Journal entry added successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Only students can add journal entries.";
    }
} else {
    echo "Error: Student Id not found.";
}
}
mysqli_close($conn);
?>
    </div>
    <br><br><br><br><br>
    <footer style="margin-left: 630px">
        <h4>All Rights Reserved | &copy; Group IV 2025</h>
    </footer>
</body>
</html>