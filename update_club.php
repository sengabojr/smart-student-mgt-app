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
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>for club update</title>
    </head>
    <body>
        <div class="form-club">
<form action="create_club.php" method="POST">
    <input type="text" name="name" placeholder="Club Name">
    <br>
    <textarea name="description" cols="50" rows="7"></textarea><br>
    <button type="submit" name="submit">Create</button>
</form>
</div>
    </body>
    </html>