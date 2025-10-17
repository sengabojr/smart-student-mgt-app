<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSAT | Admin Dashboard</title>
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Optional: Tailwind config for a custom blue color if needed,
        // but default Tailwind colors are used here.
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-blue-start': '#007bff', // Used for gradient start
                        'custom-blue-end': '#0056b3',   // Used for gradient end
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <div class="sidebar w-64 bg-white shadow-xl flex flex-col p-6 fixed h-full">
        <br>
        <div class="logo-container mb-12">
            <img src="logo_off.png" alt="" class="logo w-24 h-auto mx-auto">
        </div>

        <div class="nav flex-grow">
            <ul class="space-y-4">
                <li><a href="admin.php" class="text-blue-600 font-semibold text-lg hover:text-blue-800 transition duration-150 block py-2 px-4 rounded-lg bg-blue-50">Home</a></li>
                <li><a href="stud.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Students</a></li>
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
        <h1 class="text-4xl font-extrabold text-gray-800 mb-6">Smart Student Activity & Performance Tracker</h1>

        <div class="text mb-8 p-4 bg-white shadow-lg rounded-lg border-l-4 border-blue-500">
            <h3 class="text-2xl font-semibold text-gray-700">Welcome, Admin!</h3>
            <br>
            <p class="text-xl text-gray-600 mb-2">
                <?php 
                $now = new DateTime();
                echo $now->format("l, H:i:s d-m-Y ");
                ?>
            </p>
            <span class="text-green-500 font-medium text-lg">System Is Running Smoothly!</span>
        </div>
        
        <div class="all flex space-x-8 mt-10">
            
            <div class="card w-72 p-6 rounded-2xl text-white shadow-2xl transition duration-300 hover:scale-105"
                 style="background: linear-gradient(135deg, var(--custom-blue-start), var(--custom-blue-end));">
                
                <div class="card-title text-xl font-bold mb-3">Total Students</div>
                
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
                <div class="card-number text-6xl font-extrabold mb-1"><?php echo $studentCount; ?></div>
                <div class="card-text text-base opacity-90">Students</div>
            </div>

            <div class="card w-72 p-6 rounded-2xl text-white shadow-2xl transition duration-300 hover:scale-105"
                 style="background: linear-gradient(135deg, var(--custom-blue-start), var(--custom-blue-end));">
                
                <div class="card-title text-xl font-bold mb-3">Total Teachers</div>
                
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
                <div class="card-number text-6xl font-extrabold mb-1"><?php echo $teacherCount; ?></div>
                <div class="card-text text-base opacity-90">Teachers</div>
            </div>

        </div>
    </div>
</body>
</html>