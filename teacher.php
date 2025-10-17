<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSAPT | Teacher</title>
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
                <li><a href="teacher.php" class="text-blue-600 font-semibold text-lg hover:text-blue-800 transition duration-150 block py-2 px-4 rounded-lg bg-blue-50">Home</a></li>
                <li><a href="students_list.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Students</a></li>
                <li><a href="perfomance.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Performance</a></li>
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
            <h1 class="text-3xl font-extrabold text-gray-800 border-b-2 border-blue-500 pb-1 inline-block">Teacher's Dashboard</h1>
        </div>

        <div class="motivational-content w-full max-w-2xl p-8 bg-white rounded-xl shadow-lg mt-6">
            <div class="space-y-8">
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
</body>
</html>