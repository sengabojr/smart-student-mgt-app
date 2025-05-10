<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="admin.css">
</head>

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
        <h1 style="font-size: 30px;">Smart Student Activity & Performance Tracker</h1>
        <h4>Update User</h4>
    </div>

<body>
    <br><br><br>
    <center>
    <form action="" method="post">
    <div class="form-group ">
        <div class="form-floating col-md-5 mb-3 mt-3 ">
            <input type="text" name="name" id="" class="form-control" placeholder="Name"><br><br>
        </div>
        <div class="form-floating col-md-5 mb-3 mt-3">
            <input type="email" name="email" id="" class="form-control" placeholder="Email"><br><br>
        </div>
        <div class="form-floating col-md-5 mb-3 mt-3">
            <input type="password" name="password" id="" class="form-control" placeholder="Password"><br><br>
        </div>
        <div class="form-floating col-md-5 mb-3 mt-3">
            
        <select name="role" id="" class="form-control col-md-5 mb-3 mt-3">
            <option value="" selected disabled>Select Role</option>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select><br><br>
        <button type="submit" name="submit" class="btn btn-success form-control">Update</button>
        </div>
    </div> 
    </form>
    <?php
    include('conn.php');
    
    if (isset($_POST['submit'])) {
        $id=$_GET['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $role=$_POST['role'];
        $update="UPDATE users SET name='$name',email='$email',password='$password',role='$role' WHERE id='$id'";
        $sql=mysqli_query($conn,$update);
        if ($sql) {
            header('location:stud.php');
        }
        
    } 
    ?>
    </center>
</body>
</html>                                                  
<style>
    .form-group {
        margin-left: 270px;
        text-align: center;
    }
    .form-group input, select {
        width: 450px;
        height: 40px;
    }
    .form-group button {
        width: 250px;
        height: 38px;
        border: none;
        border-radius: 7px;
        background-color: green;
        color: white;
    }
</style>