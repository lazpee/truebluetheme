<?php
@include 'validation.php';

session_start();

if (isset($_POST['save_profile'])) {
	
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$pass = md5($_POST['password']);
	$cpass = md5($_POST['cpassword']);
	
	
	$name = $_POST['shopname'];
	$description = $_POST['shopdescription'];
	$location = $_POST['location'];
		$msg = "";
$msg_class = "";

	$select = "SELECT * FROM tbl_user WHERE username = '$username' && password = '$pass'";

	$result = mysqli_query($conn, $select);


	if(mysqli_num_rows($result) > 0){
		$error[] = 'USER ALREADY EXIST';
	}
	else{
		if ($pass != $cpass) {
			$error[] = 'PASSWORD NOT MATCHED';
		}
		
	
	else{
  if (isset($_POST['save_profile'])) {
    // for the database
    $profileImageName = $_FILES["profileImage"]["name"];
    $target_dir = "image/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO tbl_user SET profileImage='$profileImageName', username='$username',password='$pass' ,name='$name',description='$description',location='$location' ";
        if ($conn->query($sql) === TRUE) 
        {

         header("location:products.php");
        } 

        else 
        {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    
  }
}
else
echo "error";
$conn->close();
}
	}
}
?>








<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css\log.css">

<link rel="stylesheet" type="text/css" href="css/uni.css">
<link rel="stylesheet" href="main.css">
	<title>Register Account</title>
</head>
<body>
	<div class="form-container">
		<div class="ic">
			<img src="image/logo1.png" alt="logo" style="height: 250px">
			<h1>Lazpee Seller</h1>

		</div>
                    <form action="" method="POST" enctype="multipart/form-data">
                    	<h3>Register Account</h3>
                    	
                    	<?php
                    		if(isset($error)){
                    			foreach ($error as $error) {
                    				echo '<span class="error-msg">'.$error.'</span>';
                    			}
                    		}
                    	?>

                    	<label>Username:</label>
                        <input type="username" name="username" class="box" required><br>
                        <label>Password:</label>
                        <input type="password" name="password" class="box" required><br>
                        <label>Confirm Password:</label>
                        <input type="password" name="cpassword" class="box"  required><br>
                        <label>Shop Name:</label>
                        <input type="text" name="shopname" class="box"  required><br><br>

                        <label>Shop Description:</label>
                       <textarea name="shopdescription" rows="5" cols="30"></textarea><br>

                        <label>Shop Pick-up Location:</label>
                        <input type="text" name="location" class="box"  required><br>
                        <label>Business Logo</label><br>
                        <div class="form-group text-center" style="position: relative;" >

            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">

              </div>
              <img src="image/logo.png" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none; " required>
    
               

                        <input type="submit" value="Register" name="save_profile" class="btn">
                        
                        <p>Already have an account? <a href="login.php">LOGIN HERE</a></p>
                    </form>
	</div>
	<script src="script.js"></script>
</body>
</html>