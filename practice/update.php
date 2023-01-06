<?php 
session_start();

    if (isset($_SESSION['username'])) {
        $id =$_SESSION['id'];   
        include('validation.php');
  }
  else{
    header("location:login.php");
  }

$name = $_POST['username'];
$address =  $_POST['dname'];
$position = $_POST["description"];
$bio = $_POST["location"];
$password = md5($_POST["pass"]);
$msg = "";
$msg_class = "";

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
        $sql = "UPDATE  tbl_user SET profileImage='$profileImageName',password='$password', username='$name',name='$address',description='$position',location='$bio' where id = $id ";
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
?>