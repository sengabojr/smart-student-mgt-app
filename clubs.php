<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSAPT | Clubs</title>
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
                <li><a href="clubs.php" class="text-blue-600 font-semibold text-lg hover:text-blue-800 transition duration-150 block py-2 px-4 rounded-lg bg-blue-50">Clubs</a></li>
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
        <div class="nav mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Smart Student Activity & Performance Tracker</h1>
            <h4 class="text-xl text-gray-600 font-medium border-b-2 border-blue-500 pb-1">Clubs List</h4>
        </div>

        <table class="min-w-full table-auto mt-6 shadow-lg bg-white max-w-4xl border-separate border-spacing-0">
            <thead>
                <tr>
                    <th class="py-3 px-6 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider rounded-tl-lg w-1/12">Id</th>
                    <th class="py-3 px-6 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider w-1/4">Name</th>
                    <th class="py-3 px-6 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider rounded-tr-lg w-7/12">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');
                $select="SELECT * FROM clubs";
                $query=mysqli_query($conn,$select);
                while ($row=mysqli_fetch_assoc($query)) {
                ?>
                <tr class="border-b border-gray-200 hover:bg-blue-50 transition duration-150">
                    <td class="py-3 px-6 text-sm text-gray-700 font-medium whitespace-nowrap"><?php echo $row['id'];?></td>
                    <td class="py-3 px-6 text-sm text-gray-700 font-medium"><?php echo $row['name'];?></td>
                    <td class="py-3 px-6 text-sm text-gray-600"><?php echo $row['description'];?></td>
                </tr>

                <?php
                }?>
            </tbody>
        </table>
    </div>

</body>
</html>