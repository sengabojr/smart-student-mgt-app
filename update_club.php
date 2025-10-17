<?php
    include('conn.php');
    
    if (isset($_POST['submit'])) {
        // WARNING: This PHP logic is for UPDATING a user, but the HTML form below is for CREATING a club.
        // I have kept this logic untouched, but it will not interact with the club form below correctly.
        $id=$_GET['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $role=$_POST['role'];
        
        $update="UPDATE users SET name='$name',email='$email',password='$password',role='$role' WHERE id='$id'";
        $sql=mysqli_query($conn,$update);
        if ($sql) {
            // header('location:stud.php'); // Redirect is commented out to allow viewing the page
        }
        
    } 
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SSAPT | Club Creation</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 flex items-center justify-center min-h-screen">
        
        <div class="form-club bg-white p-8 rounded-xl shadow-2xl w-full max-w-lg">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Create New Club</h2>
            
            <form action="create_club.php" method="POST" class="space-y-6">
                
                <input type="text" name="name" placeholder="Club Name" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150">
                
                <textarea name="description" rows="7" placeholder="Club Description" required
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none transition duration-150"></textarea>
                
                <button type="submit" name="submit"
                        class="w-full bg-green-600 text-white font-semibold py-3 rounded-lg shadow-md hover:bg-green-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Create
                </button>
            </form>
            
        </div>
    </body>
    </html>