<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
    <title>SSAT | Manage Clubs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <div class="sidebar w-64 bg-white shadow-xl flex flex-col p-6 fixed h-full">
        <br>
        <div class="logo-container mb-12">
            <img src="logo_off.png" class="logo w-24 h-auto mx-auto">
        </div>

        <div class="nav flex-grow">
            <ul class="space-y-4">
                <li><a href="admin.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Home</a></li>
                <li><a href="stud.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Students</a></li>
                <li><a href="teach.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Teachers</a></li>
                <li><a href="club.php" class="text-blue-600 font-semibold text-lg hover:text-blue-800 transition duration-150 block py-2 px-4 rounded-lg bg-blue-50">Manage Clubs</a></li>
                <li><a href="notification.php" class="text-gray-700 text-lg hover:text-blue-600 transition duration-150 block py-2 px-4 rounded-lg">Notifications</a></li>
            </ul>
        </div>
        
        <div class="mt-auto pt-6 border-t border-gray-200">
             <a href="logout.php" class="text-red-500 font-medium text-lg hover:text-red-700 transition duration-150 block py-2 px-4 rounded-lg">Logout</a>
        </div>
    </div>

    <div class="main flex-grow ml-64 p-8">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Smart Student Activity & Performance Tracker</h1>
        <span class="text-xl text-gray-600 font-medium border-b-2 border-blue-500 pb-1">Clubs Management</span>
        
        <div class="links flex mt-8 w-full max-w-4xl shadow-md rounded-t-lg overflow-hidden">
            <a href="club.php" class="flex-1 text-center py-3 px-4 bg-blue-600 text-white font-semibold transition duration-150 hover:bg-blue-700 border-r border-blue-700">
                Clubs
            </a>
            <a href="create_club.php" class="flex-1 text-center py-3 px-4 bg-gray-200 text-gray-700 font-semibold transition duration-150 hover:bg-gray-300">
                Add
            </a>
        </div>

        <table class="min-w-full table-auto mt-0 shadow-lg bg-white max-w-4xl border-separate border-spacing-0">
            <thead>
                <tr>
                    <th class="py-3 px-6 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider rounded-tl-lg w-1/4">Name</th>
                    <th class="py-3 px-6 bg-gray-700 text-left text-xs font-semibold text-white uppercase tracking-wider w-1/2">Description</th>
                    <th class="py-3 px-6 bg-gray-700 text-center text-xs font-semibold text-white uppercase tracking-wider rounded-tr-lg w-1/4">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("conn.php");
                $select="SELECT * FROM clubs";
                $sql=mysqli_query($conn,$select);
                while ($row=mysqli_fetch_assoc($sql )) {
                ?>
                <tr class="border-b border-gray-200 hover:bg-blue-50 transition duration-150">
                    <td class="py-3 px-6 text-sm text-gray-700 font-medium"><?php echo $row['name']?></td>
                    <td class="py-3 px-6 text-sm text-gray-600"><?php echo $row['description']?></td>
                    <td class="py-3 px-6 text-center">
                        <?php echo"<a href='delete_club.php?id= ".$row['id']."' class='text-red-500 hover:text-red-700 font-medium'>Delete</a>"?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>