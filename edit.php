<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSAPT | Update User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <div class="sidebar w-64 bg-white shadow-xl flex flex-col p-6 fixed h-full">
        <br>
        <div class="logo-container mb-12">
            <span class="inline-block mx-auto"><img src="logo_off.png" alt="Logo" class="logo w-24 h-auto"></span>
        </div>
        
        <div class="nav flex-grow">
            <ul class="space-y-4">
                <li><a href="admin.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Home</a></li>
                <li><a href="stud.php" class="text-blue-600 font-semibold text-lg hover:text-blue-800 transition duration-150 block py-2 px-4 rounded-lg bg-blue-50">Students</a></li>
                <li><a href="teach.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Teachers</a></li>
                <li><a href="club.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Manage Clubs</a></li>
                <li><a href="notification.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Notifications</a></li>
            </ul>
        </div>
        
        <div class="mt-auto pt-6 border-t border-gray-200">
             <a href="logout.php" class="text-red-500 font-medium text-lg hover:text-red-700 transition duration-150 block py-2 px-4 rounded-lg">Logout</a>
        </div>
    </div>

    <div class="main flex-grow ml-64 p-8">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Smart Student Activity & Performance Tracker</h1>
        <h4 class="text-xl text-gray-600 font-medium border-b-2 border-blue-500 pb-1 inline-block">Update User</h4>
        
        <div class="flex justify-start mt-8">
            <div class="form-group w-full max-w-xl p-6 bg-white rounded-xl shadow-lg">
                <form action="" method="post" class="space-y-6">
                    
                    <div class="form-floating">
                        <input type="text" name="name" id="name" placeholder="Name" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>
                    
                    <div class="form-floating">
                        <input type="email" name="email" id="email" placeholder="Email" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>
                    
                    <div class="form-floating">
                        <input type="password" name="password" id="password" placeholder="Password" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>
                    
                    <div class="form-floating">
                        <select name="role" id="role" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                                required>
                            <option value="" selected disabled>Select Role</option>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                    </div>
                    
                    <button type="submit" name="submit" 
                            class="w-full bg-green-600 text-white font-semibold py-3 rounded-lg shadow-md hover:bg-green-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Update User
                    </button>
                    
                </form>
            </div>
        </div>

        <?php
        include('conn.php');
        
        if (isset($_POST['submit'])) {
            $id=$_GET['id'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $role=$_POST['role'];
            
            // Note: In a real-world application, hash the password before updating the database!
            $update="UPDATE users SET name='$name',email='$email',password='$password',role='$role' WHERE id='$id'";
            $sql=mysqli_query($conn,$update);
            
            if ($sql) {
                header('location:stud.php');
                exit(); // Important to include exit after header redirect
            } else {
                // Optional: Add error message display here if the update fails
                echo "<p class='mt-4 text-red-600'>Update failed: " . mysqli_error($conn) . "</p>";
            }
        } 
        ?>
    </div>
</body>
</html>