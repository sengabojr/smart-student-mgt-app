<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <div class="sidebar w-64 bg-white shadow-xl flex flex-col p-6 fixed h-full">
        <br>
        <div class="logo-container mb-12">
            <img src="logo_off.png" alt="Logo" class="logo w-24 h-auto mx-auto">
        </div>
        
        <div class="nav flex-grow">
            <ul class="space-y-4">
                <li><a href="admin.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Home</a></li>
                <li><a href="stud.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Students</a></li>
                <li><a href="teach.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Teachers</a></li>
                <li><a href="club.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Manage Clubs</a></li>
                <li><a href="notification.php" class="text-blue-600 font-semibold text-lg hover:text-blue-800 transition duration-150 block py-2 px-4 rounded-lg bg-blue-50">Notifications</a></li>
                <li><a href="logout.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Logout</a></li>
            </ul>
        </div>
        
        <div class="mt-auto pt-6 border-t border-gray-200">
             <a href="logout.php" class="text-red-500 font-medium text-lg hover:text-red-700 transition duration-150 block py-2 px-4 rounded-lg">Logout</a>
        </div>
    </div>

    <div class="main flex-grow ml-64 p-8">
        <h1 class="text-3xl font-extrabold text-gray-800 border-b-2 border-blue-500 pb-1 inline-block mb-8">Send Notifications</h1>

        <div class="flex justify-start">
            <div class="contain w-full max-w-xl p-8 bg-white rounded-xl shadow-lg">
                <h4 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Compose A Notification</h4>
                
                <form action="" method="POST" class="space-y-6">
                    
                    <input type="text" name="title" placeholder="Notification Title" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    
                    <textarea name="message" placeholder="Enter Message" cols="61" rows="8" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y"></textarea>
                    
                    <select name="role" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-gray-500">
                        <option value="opt" selected disabled>Send To</option>
                        <option value="teacher">Teachers</option>
                        <option value="student">Students</option>
                        <option value="both">Both</option>
                    </select>
                    
                    <input type="text" name="created" placeholder="Created By" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    
                    <button type="submit" name="submit"
                            class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 mt-6">
                        Send Notification
                    </button>
                </form>
            </div>
        </div>

        <footer class="mt-12 text-center w-full">
            <h3 class="text-gray-500 text-sm">All Rights Reserved | &copy; Group IV 2025</h3>
        </footer>
    </div>
</body>
</html>
<?php
include("conn.php");

// Message display for PHP feedback
echo '<div class="main ml-64 p-8 absolute top-0 left-0 w-full text-center">';
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $message=$_POST['message'];
    $role=$_POST['role'];
    $created=$_POST['created'];
    $insert="INSERT INTO notifications (title, message, target_role, created_by) VALUES('$title','$message','$role','$created')";
    $sql=mysqli_query($conn,$insert);
    
    if ($sql) {
        echo '<p class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative inline-block">Notification sent successfully!</p>';
    }
    else{
        echo '<p class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative inline-block">Notification not sent: ' . mysqli_error($conn) . '</p>';
    }
}
echo '</div>';
?>