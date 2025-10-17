<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSAPT | Student</title>
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
                <li><a href="student.php" class="text-blue-600 font-semibold text-lg hover:text-blue-800 transition duration-150 block py-2 px-4 rounded-lg bg-blue-50">Home</a></li>
                <li><a href="clubs.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Clubs</a></li>
                <li><a href="journals.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Journals</a></li>
                <li><a href="st_notification.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Notifications</a></li>
                <li><a href="records.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Records</a></li>
            </ul>
        </div>
        
        <div class="mt-auto pt-6 border-t border-gray-200">
             <a href="logout.php" class="text-red-500 font-medium text-lg hover:text-red-700 transition duration-150 block py-2 px-4 rounded-lg">Logout</a>
        </div>
    </div>

    <div class="main flex-grow ml-64 p-8">
        <div class="nav mb-12">
            <h1 class="text-3xl font-extrabold text-gray-800">Smart Student Activity & Performance Tracker</h1>
            <h3 class="text-xl text-gray-600 font-medium border-b-2 border-blue-500 pb-1 inline-block mt-2">Students Dashboard</h3>
        </div>

        <div class="content-wrapper">
            <div class="welcome-section mb-10 p-6 bg-white rounded-xl shadow-lg w-full max-w-2xl">
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
                    die("<p class='text-red-500 font-bold'>Query failed: " . mysqli_error($conn) . "</p>");
                }

                if ($row = mysqli_fetch_assoc($result)) {
                    $name = htmlspecialchars($row['name']);
                    $id = $row['id'];
                    echo "<h2 class='text-2xl font-bold text-gray-800 mb-2'>Welcome, $name!</h2>";
                    echo "<p class='text-lg text-gray-600'>Your Student ID is: <span class='font-mono font-semibold text-blue-600'>$id</span></p>";
                } else {
                    echo "<p class='text-red-500 font-bold'>Error: Student not found.</p>";
                }

                mysqli_close($conn);
                ?>
            </div>

            <div class="motivational-content w-full max-w-2xl p-6 bg-white rounded-xl shadow-lg">
                <div class="space-y-6">
                    <div>
                        <h4 class="text-xl font-bold text-blue-600 border-b pb-1 mb-3">🎓 Academic Encouragement</h4>
                        <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                            <li>Every small step counts — keep moving forward, and success will follow.</li>
                            <li>Believe in your ability to learn. You are capable of amazing things!</li>
                            <li>Don’t watch the clock; do what it does — keep going.</li>
                            <li>Success isn’t about being the best. It’s about always getting better.</li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-xl font-bold text-blue-600 border-b pb-1 mb-3">💡 Growth Mindset</h4>
                        <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                            <li>Mistakes mean you're trying. Keep learning, keep growing.</li>
                            <li>Progress, not perfection — that’s the goal.</li>
                            <li>Your future is created by what you do today, not tomorrow.</li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-xl font-bold text-blue-600 border-b pb-1 mb-3">💪 Motivation & Strength</h4>
                        <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                            <li>Tough times don’t last. Tough students do.</li>
                            <li>Push yourself — no one else is going to do it for you.</li>
                            <li>You’ve made it this far — don’t give up now.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>