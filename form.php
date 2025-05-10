<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Sign Up | Sign In</title>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="logo_off.png" type="image/x-icon">
</head>

<?php
	include('conn.php');
	if (isset($_POST['submit'])) {
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$role=$_POST['role'];
		$insert="INSERT INTO users VALUES ('','$name','$email','$password','$role')";
		$sql=mysqli_query($conn,$insert);
		if (!$sql) {
			echo "Error:".mysqli_error($conn);
		}
		else {
			echo"Registered Successfully, Please Login!";
		}
	}
	?>
<body>
	<br><br><br>
	<div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="form.php" method="POST">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                   
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input required type="text" name="name" placeholder="Name" />
                <input required type="email" name="email" placeholder="Email" />
                <input required type="password" name="password" placeholder="Password" />
				<select name="role"  required>
					<option selected disabled>Select Role</option>
					<option value="Teacher">Teacher</option>
					<option value="Student">Student</option>
				</select>
				<br>
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="form.php" method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
					<a href="#" class="social"><i class="fab fa-github"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hi, There!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
<script src="script.js"> </script>
</body>
</html>                                                        


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
						$_SESSION['role']=$role['role'];
					
					if ($user['role']=='admin') {
						header("location:admin.php");
					}
					else if($user['role']=='student'){
						header('location:student.php');
					}
					else if($user['role']=='teacher'){
						header('location:teacher.php');
					}
					
					
					else {
						echo "invalid user";
					}
				}
				}?>