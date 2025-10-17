<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSAPT | Students List</title>
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
                <li><a href="students_list.php" class="text-blue-600 font-semibold text-lg hover:text-blue-800 transition duration-150 block py-2 px-4 rounded-lg bg-blue-50">Students</a></li>
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
            <h1 class="text-3xl font-extrabold text-gray-800 border-b-2 border-blue-500 pb-1 inline-block">Students List</h1>
        </div>
        
        <div class="mt-6">
            <table class="min-w-full table-auto shadow-lg bg-white max-w-4xl rounded-xl overflow-hidden border-separate border-spacing-0">
                <thead>
                    <tr>
                        <th class="py-3 px-4 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider rounded-tl-lg w-[5%]">Id</th>
                        <th class="py-3 px-4 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider w-[30%]">Name</th>
                        <th class="py-3 px-4 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider w-[45%]">Email</th>
                        <th class="py-3 px-4 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider rounded-tr-lg w-[20%]">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('conn.php');
                    $select="SELECT * FROM users WHERE role='student'";
                    $query=mysqli_query($conn,$select);
                    $is_even = false; // Used for row stripe coloring
                    while ($row=mysqli_fetch_assoc($query)) {
                        $row_class = $is_even ? 'bg-gray-50' : 'bg-white';
                        $is_even = !$is_even;
                    ?>
                    <tr class="<?php echo $row_class; ?> border-b border-gray-200 hover:bg-blue-50 transition duration-150">
                        <td class="py-3 px-4 text-sm text-gray-700 font-medium whitespace-nowrap"><?php echo $row['id'];?></td>
                        <td class="py-3 px-4 text-sm text-gray-700"><?php echo $row['name'];?></td>
                        <td class="py-3 px-4 text-sm text-gray-700"><?php echo $row['email'];?></td>
                        <td class="py-3 px-4 text-sm text-gray-700"><?php echo $row['role'];?></td>
                    </tr>
                    <?php
                    }?> 
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>