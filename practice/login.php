<?php
@include 'validation.php';
session_start();

if (isset($_POST['submit'])) {
	
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$pass = md5($_POST['password']);


	$select = "SELECT * FROM tbl_user WHERE username = '$username' && password = '$pass'";
	$run_query = mysqli_query($conn,$select);
	$result = mysqli_query($conn, $select);
	$count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

	if(mysqli_num_rows($result) > 0){
		$_SESSION['username'] = $row["username"];
		$_SESSION['id'] = $row["id"];
		header('location:products.php');
	}
	else{
		$error[] = 'INCORRECT USERNAME OR PASSWORD!!';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css\log.css">
	<title>LAZPEE SELLER</title>
</head>
<body>
	
	<div class="form-container">

		<div class="ic">
			<img src="image/logo1.png" alt="logo" style="height: 250px">
			<h1>Lazpee Seller</h1>

			
			
		</div>
                    <form action="" method="POST" >
                    	<br><br><h2>Login</h2>
                    <br><br>
                    	<?php
                    		if(isset($error)){
                    			foreach ($error as $error) {
                    				echo '<span class="error-msg">'.$error.'</span>';
                    			}
                    		}
                    	?>
                    	<label>Username:</label>
                        <input type="username" name="username" class="box"  required><br>
                        <label>Password:</label>
                        <input type="password" name="password" class="box"  required><br>
                        <input type="submit" value="Login" name="submit" class="btn"> <br><br>                   
                        <p>Don't have account yet? <a href="register.php">REGISTER HERE</a></p>
                    </form>
	</div>
</body>
</html>