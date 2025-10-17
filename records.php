<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
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
                <li><a href="journals.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Journals</a></li>
                <li><a href="st_notification.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Notifications</a></li>
                <li><a href="records.php" class="text-blue-600 font-semibold text-lg hover:text-blue-800 transition duration-150 block py-2 px-4 rounded-lg bg-blue-50">Records</a></li>
                <li><a href="logout.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="main flex-grow ml-64 p-8">
        <div class="nav mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800 border-b-2 border-blue-500 pb-1 inline-block">Students Records</h1>
        </div>
        
        <div class="php mt-6">
            <table class="min-w-full table-auto shadow-lg bg-white max-w-4xl border-separate border-spacing-0">
                <thead>
                    <tr>
                        <th class="py-3 px-6 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider rounded-tl-lg w-1/12">Student Id</th>
                        <th class="py-3 px-6 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider w-1/4">Subject</th>
                        <th class="py-3 px-6 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider w-1/4">Score</th>
                        <th class="py-3 px-6 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider rounded-tr-lg w-1/4">Term</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("conn.php");
                    $select="SELECT * FROM performances";
                    $sql=mysqli_query($conn,$select);
                    while ($row=mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr class="border-b border-gray-200 hover:bg-blue-50 transition duration-150">
                        <td class="py-3 px-6 text-sm text-gray-700 font-medium whitespace-nowrap"><?php echo $row['student_id']?></td>
                        <td class="py-3 px-6 text-sm text-gray-700 font-medium"><?php echo $row['subject']?></td>
                        <td class="py-3 px-6 text-sm text-gray-700 font-medium"><?php echo $row['score']?></td>
                        <td class="py-3 px-6 text-sm text-gray-600"><?php echo $row['term']?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>