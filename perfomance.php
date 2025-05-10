<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Performance Management</title>
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
            <li><a href="students_list.php">Students</a></li><br>
            <li><a href="perfomance.php" style="color: blue;">Performance</a></li><br>
            <li><a href="discipline.php">Discipline</a></li><br>
            <li><a href="tr_notification.php">Notifications</a></li><br>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="nav">
        <br>
        <h1>Students Performance</h1>
    </div>

    <div class="container"><br><br>
    <h2>Submit Students Performance</h2><br><br>
        <form action="" method="post">
            <input type="number" name="student_id" placeholder="Enter Student Id"><br><br>
            <input type="text" name="subject" placeholder="Enter Subject"><br><br>
            <input type="number" name="score" placeholder="Enter Score"><br><br>
            <input type="text" name="term" placeholder="Enter Term"><br><br><br>
            <button type="submit" name="submit">Submit</button>
        </form>
        <br>
        <?php
include('conn.php');

if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $score = $_POST['score'];
    $term = $_POST['term'];

    
    $role_query = "SELECT role FROM users WHERE id = '$student_id'";
    $result = mysqli_query($conn, $role_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['role'] === 'student') {
            
            $insert = "INSERT INTO `performances`(`student_id`, `subject`, `score`, `term`) 
                       VALUES ('$student_id','$subject','$score','$term')";
            $sql = mysqli_query($conn, $insert);

            if ($sql) {
                echo "Data inserted successfully.";
            } else {
                echo "Insert failed: " . mysqli_error($conn);
            }
        } else {
            echo "Error: The entered user is not a student.";
        }
    } else {
        echo "Error: No user found with that ID.";
    }
}
?>  
    </div>
</body>
</html>
<style>
    .container {
        margin-left: 290px;
        text-align: center;
    }
    .container input {
        width: 450px;
        height: 40px;
    }
    .container button {
        width: 240px;
        height: 38px;
        border: none;
        background-color: green;
        color: #fff;
        border-radius: 5px;
    }
</style>