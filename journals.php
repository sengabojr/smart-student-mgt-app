<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Entry</title>
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">
    
    <div class="sidebar w-64 bg-white shadow-xl flex flex-col p-6 fixed h-full">
        <br><br>
        <div class="logo-container mb-12">
            <img src="logo_off.png" class="logo w-24 h-auto mx-auto">
        </div>
        
        <div class="nav flex-grow">
            <ul class="space-y-4">
                <li><a href="student.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Home</a></li>
                <li><a href="clubs.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Clubs</a></li>
                <li><a href="journals.php" class="text-blue-600 font-semibold text-lg hover:text-blue-800 transition duration-150 block py-2 px-4 rounded-lg bg-blue-50">Journals</a></li>
                <li><a href="st_notification.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Notifications</a></li>
                <li><a href="records.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Records</a></li>
            </ul>
        </div>
        
        <div class="mt-auto pt-6 border-t border-gray-200">
             <a href="logout.php" class="text-red-500 font-medium text-lg hover:text-red-700 transition duration-150 block py-2 px-4 rounded-lg">Logout</a>
        </div>
    </div>

    <div class="main flex-grow ml-64 p-8">
        <div class="nav mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800 border-b-2 border-blue-500 pb-1 inline-block">Students Dashboard</h1>
        </div>
        
        <div class="flex justify-center mt-10">
            <div class="container w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Add a Journal Entry</h2>
                
                <form action="journals.php" method="POST" class="space-y-4">
                    
                    <div class="flex flex-col">
                        <label for="student_id" class="text-left text-sm font-medium text-gray-700 mb-1">Student Id:</label>
                        <input type="text" id="student_id" name="student_id" required
                               class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col">
                        <label for="content" class="text-left text-sm font-medium text-gray-700 mb-1">Journal Content:</label>
                        <textarea id="content" name="content" required rows="5"
                                  class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y"></textarea>
                    </div>

                    <button type="submit" name="submit"
                            class="w-full bg-green-600 text-white font-semibold py-3 rounded-lg shadow-md hover:bg-green-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 mt-6">
                        Submit
                    </button>
                </form>
                
                <div class="mt-4 text-center">
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
                                echo "<p class='text-green-600 font-medium'>Journal entry added successfully!</p>";
                            } else {
                                echo "<p class='text-red-600 font-medium'>Error: " . mysqli_error($conn) . "</p>";
                            }
                        } else {
                            echo "<p class='text-red-600 font-medium'>Error: Only students can add journal entries.</p>";
                        }
                    } else {
                        echo "<p class='text-red-600 font-medium'>Error: Student Id not found.</p>";
                    }
                    }
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
        
        <footer class="mt-12 text-center w-full">
            <h4 class="text-gray-500 text-sm">All Rights Reserved | &copy; Group IV 2025</h4>
        </footer>
    </div>
</body>
</html>