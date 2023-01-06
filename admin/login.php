<?php
include "db.php";
session_start();
if (isset($_SESSION['useremail'])) 
{
	header("location:index.php");
}
else
{
	if (isset($_POST['email']) && isset($_POST['password'])) 
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM admin_info WHERE admin_email='$email' AND admin_password ='$password'";
		$result = $con->query($sql);
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				echo "login successfully";	
				$_SESSION['useremail'] = $email;

				//cookies
				if (!empty($_POST['remember'])) 
				{
					$remember = $_POST['remember'];
					setcookie("remember", $remember, time()+86400);
					setcookie("email",$email,time()+86400);
					setcookie("password",$password,time()+86400);
				}
				



				else
				{
					setcookie("email",null);
					setcookie("password",null);
					setcookie("remember",null);
				}
					header("location:login.php");
			}
		}
		else if (empty($password)) 
				{
					header("Location:login.php?error=password is required");
					exit();
				}
				else if (empty($email)) 
				{
				header("Location:login.php?error=User Name is required");
				exit();
				}
		else
		{
			echo"Please re-enter your email and password!";
		}

	}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="login.css" />
</head>
<body>
<div class="login">
  	<h1>Login</h1>
	    <form method="post">
	    <input type="email" name="email" placeholder="Username" required="required" />
	    <input type="password" name="password" placeholder="Password" required="required" />
	    <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Submit</button>
    </form>
</div>
</body>
</html>