<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSAPT | Performance Management</title>
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
                <li><a href="teacher.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Home</a></li>
                <li><a href="students_list.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Students</a></li>
                <li><a href="perfomance.php" class="text-blue-600 font-semibold text-lg hover:text-blue-800 transition duration-150 block py-2 px-4 rounded-lg bg-blue-50">Performance</a></li>
                <li><a href="discipline.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Discipline</a></li>
                <li><a href="tr_notification.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Notifications</a></li>
            </ul>
        </div>
        
        <div class="mt-auto pt-6 border-t border-gray-200">
             <a href="logout.php" class="text-red-500 font-medium text-lg hover:text-red-700 transition duration-150 block py-2 px-4 rounded-lg">Logout</a>
        </div>
    </div>

    <div class="main flex-grow ml-64 p-8">
        <div class="nav mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800 border-b-2 border-blue-500 pb-1 inline-block">Students Performance</h1>
        </div>

        <div class="flex justify-start">
            <div class="container w-full max-w-lg p-8 bg-white rounded-xl shadow-lg mt-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Submit Students Performance</h2>
                
                <form action="" method="post" class="space-y-4">
                    
                    <input type="number" name="student_id" placeholder="Enter Student Id" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                           
                    <input type="text" name="subject" placeholder="Enter Subject" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                           
                    <input type="number" name="score" placeholder="Enter Score" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                           
                    <input type="text" name="term" placeholder="Enter Term" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                           
                    <button type="submit" name="submit"
                            class="w-2/3 mx-auto block bg-green-600 text-white font-semibold py-3 rounded-lg shadow-md hover:bg-green-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 mt-6">
                        Submit
                    </button>
                </form>

                <div class="mt-6 text-center">
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
                                    echo "<p class='text-green-600 font-medium'>Data inserted successfully.</p>";
                                } else {
                                    echo "<p class='text-red-600 font-medium'>Insert failed: " . mysqli_error($conn) . "</p>";
                                }
                            } else {
                                echo "<p class='text-red-600 font-medium'>Error: The entered user is not a student.</p>";
                            }
                        } else {
                            echo "<p class='text-red-600 font-medium'>Error: No user found with that ID.</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>