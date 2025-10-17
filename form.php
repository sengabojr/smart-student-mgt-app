<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Sign In</title>
    <link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        // Custom Tailwind configuration to make the styling for the overlay/forms easier
        // This simulates the complex CSS required for the sliding animation
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#FF4B2B', // A common primary color for this type of form
                        'dark-blue': '#FF416C', 
                        'light-gray': '#eee',
                    },
                }
            }
        }
    </script>
    
    <style>
        .container {
            /* Simulates the overall container structure and positioning */
            position: relative;
            overflow: hidden;
            max-width: 900px; /* Adjusted from original large fixed width */
            min-height: 500px;
            z-index: 1;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .overlay {
            background: #FF416C;
            background: linear-gradient(to right, #FF4B2B, #FF416C) no-repeat 0 0 / cover;
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100%;
            width: 50%;
            padding: 0 40px;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-right { right: 0; transform: translateX(0); }
        .overlay-left { transform: translateX(-20%); }

        @keyframes show {
            0%, 49.99% { opacity: 0; z-index: 1; }
            50%, 100% { opacity: 1; z-index: 5; }
        }
    </style>
</head>

<?php
    include('conn.php');
    if (isset($_POST['submit'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password']; // NOTE: Always hash passwords in a production environment!
        $role=$_POST['role'];
        $insert="INSERT INTO users VALUES ('','$name','$email','$password','$role')";
        $sql=mysqli_query($conn,$insert);
        if (!$sql) {
            echo "Error:".mysqli_error($conn);
        }
        else {
            // Added Tailwind classes for success message display
            echo "<div class='fixed top-0 left-0 w-full p-4 bg-green-500 text-white text-center font-bold'>Registered Successfully, Please Login!</div>";
        }
    }
?>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    
    <?php
    include 'conn.php';
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $select="SELECT * FROM users WHERE email='$email' AND password='$password'";
        $query=mysqli_query($conn,$select);
        $user=mysqli_fetch_assoc($query);
        if ($user) {
            $_SESSION['id']=$user['id'];
            $_SESSION['role']=$user['role']; // Fixed variable name: $user['role'] instead of $role['role']
        
            if (strtolower($user['role'])=='admin') {
                header("location:admin.php");
                exit();
            }
            else if(strtolower($user['role'])=='student'){
                header('location:student.php');
                exit();
            }
            else if(strtolower($user['role'])=='teacher'){
                header('location:teacher.php');
                exit();
            }
            else {
                // Added Tailwind classes for error message display
                echo "<div class='fixed top-0 left-0 w-full p-4 bg-red-500 text-white text-center font-bold'>Invalid user role or credentials.</div>";
            }
        } else {
             // Added Tailwind classes for error message display
            echo "<div class='fixed top-0 left-0 w-full p-4 bg-red-500 text-white text-center font-bold'>Login failed. Please check your email and password.</div>";
        }
    }
    ?>

    <div class="container bg-white rounded-xl shadow-2xl relative" id="container">
        
        <div class="form-container sign-up-container absolute top-0 h-full w-1/2 left-0 transition-all duration-600 ease-in-out z-10">
            <form action="form.php" method="POST" class="bg-white flex items-center justify-center flex-col p-0 h-full text-center px-12 space-y-4">
                <h1 class="text-2xl font-bold mb-2 text-gray-800">Create Account</h1>
                
                <div class="social-container space-x-2">
                    <a href="#" class="social inline-flex justify-center items-center h-10 w-10 border border-gray-300 rounded-full text-gray-600 hover:bg-gray-100 transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social inline-flex justify-center items-center h-10 w-10 border border-gray-300 rounded-full text-gray-600 hover:bg-gray-100 transition"><i class="fab fa-linkedin-in"></i></a>
                </div>
                
                <span class="text-sm text-gray-500">or use your email for registration</span>
                
                <input required type="text" name="name" placeholder="Name" class="bg-light-gray w-full border border-gray-200 p-3 rounded-lg text-sm focus:ring-2 focus:ring-primary-blue focus:outline-none" />
                <input required type="email" name="email" placeholder="Email" class="bg-light-gray w-full border border-gray-200 p-3 rounded-lg text-sm focus:ring-2 focus:ring-primary-blue focus:outline-none" />
                <input required type="password" name="password" placeholder="Password" class="bg-light-gray w-full border border-gray-200 p-3 rounded-lg text-sm focus:ring-2 focus:ring-primary-blue focus:outline-none" />
                
                <select name="role" required class="bg-light-gray w-full border border-gray-200 p-3 rounded-lg text-sm focus:ring-2 focus:ring-primary-blue focus:outline-none text-gray-500">
                    <option selected disabled>Select Role</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                    <option value="admin">Admin</option> </select>
                
                <br>
                <button type="submit" name="submit" class="bg-primary-blue text-white text-xs font-bold uppercase py-3 px-10 rounded-full tracking-wider mt-4 hover:bg-dark-blue transition duration-300 shadow-md">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in-container absolute top-0 h-full w-1/2 left-0 transition-all duration-600 ease-in-out z-20">
            <form action="form.php" method="POST" class="bg-white flex items-center justify-center flex-col p-0 h-full text-center px-12 space-y-4">
                <h1 class="text-2xl font-bold mb-2 text-gray-800">Sign in</h1>
                
                <div class="social-container space-x-2">
                    <a href="#" class="social inline-flex justify-center items-center h-10 w-10 border border-gray-300 rounded-full text-gray-600 hover:bg-gray-100 transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social inline-flex justify-center items-center h-10 w-10 border border-gray-300 rounded-full text-gray-600 hover:bg-gray-100 transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social inline-flex justify-center items-center h-10 w-10 border border-gray-300 rounded-full text-gray-600 hover:bg-gray-100 transition"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social inline-flex justify-center items-center h-10 w-10 border border-gray-300 rounded-full text-gray-600 hover:bg-gray-100 transition"><i class="fab fa-github"></i></a>
                </div>
                
                <span class="text-sm text-gray-500">or use your account</span>
                
                <input type="email" name="email" placeholder="Email" class="bg-light-gray w-full border border-gray-200 p-3 rounded-lg text-sm focus:ring-2 focus:ring-primary-blue focus:outline-none" required/>
                <input type="password" name="password" placeholder="Password" class="bg-light-gray w-full border border-gray-200 p-3 rounded-lg text-sm focus:ring-2 focus:ring-primary-blue focus:outline-none" required/>
                
                <a href="#" class="text-xs text-gray-500 hover:text-primary-blue transition">Forgot your password?</a>
                
                <button type="submit" name="login" class="bg-primary-blue text-white text-xs font-bold uppercase py-3 px-10 rounded-full tracking-wider mt-4 hover:bg-dark-blue transition duration-300 shadow-md">Sign In</button>
            </form>
        </div>

        <div class="overlay-container absolute top-0 left-1/2 w-1/2 h-full transition-transform duration-600 ease-in-out">
            <div class="overlay h-full w-[200%] relative left-[-100%]">
                
                <div class="overlay-panel overlay-left absolute top-0 h-full w-1/2 flex flex-col justify-center items-center text-center px-10">
                    <h1 class="text-3xl font-bold mb-4">Welcome Back!</h1>
                    <p class="text-sm font-light leading-snug mb-8">To keep connected with us please login with your personal info</p>
                    <button class="ghost bg-transparent border-2 border-white text-white text-xs font-bold uppercase py-3 px-10 rounded-full tracking-wider hover:bg-white hover:text-primary-blue transition duration-300" id="signIn">Sign In</button>
                </div>
                
                <div class="overlay-panel overlay-right absolute top-0 h-full w-1/2 flex flex-col justify-center items-center text-center px-10 right-0">
                    <h1 class="text-3xl font-bold mb-4">Hi, There!</h1>
                    <p class="text-sm font-light leading-snug mb-8">Enter your personal details and start journey with us</p>
                    <button class="ghost bg-transparent border-2 border-white text-white text-xs font-bold uppercase py-3 px-10 rounded-full tracking-wider hover:bg-white hover:text-primary-blue transition duration-300" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
<script src="script.js"> </script>
</body>
</html>