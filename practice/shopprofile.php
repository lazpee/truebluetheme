
<?php
    include('includes/header.php');
    if (isset($_SESSION['username'])) {
        $id =$_SESSION['id'];   
        include('validation.php');
	}
	else{
	  header("location:login.php");
	}
    $sql = "SELECT * FROM tbl_user WHERE id= $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>

?>

<link rel="stylesheet" type="text/css" href="css/uni.css">
<link rel="stylesheet" href="main.css">


 <div>
                   <br><br>
<br>
            <h1 style="margin-left:620px;" class="mt-4">Shop Profile</h1><br>
    </div>          
            <div class="container">
   
                <form action="update.php" method="POST" enctype="multipart/form-data">
 
                   <input  type="hidden" name = "code" value= "">
                    <label>Username:</label> <input class="box" type="text" name="username" value=<?php echo $row["username"]; ?> required><br>
                     <label>Password:</label> <input class="box" type="password" name="pass" value=<?php echo $row["password"]; ?> required><br>
                    <label>Shop Name:</label> <input class="box" type="text" name="dname" value=<?php echo $row["name"]; ?> required><br>
                    <label>Shop Description:</label>
                    <input class="box" type="text" name="description" value=<?php echo $row["description"]; ?> required><br>
                    <label>Shop pick-up Location:</label> <input class="box" type="text" name="location" value=<?php echo $row["location"]; ?>  required><br>
                    <center>
                        <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div" style="border: none">
          <h2 class="text-center mb-3 mt-3">Edit Logo</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="image/logo.png" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none; " required>
          </div>
                    
                    </div>
                </div></div>
  
                    <input type="submit" value="Update" name="save_profile" class="btn">


                </form>
</div>         
<script src="script.js"></script>
<?php
    include('includes/footer.php');
    include('includes/scripts.php')
?>
<?php

  }
} else {
  echo "0 results";
}
$conn->close();
?>