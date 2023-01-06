   
<?php
    
    session_start();
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

   <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href=""></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

                <div class="input-group">
                    <h2  style="color:white; margin-right: 430px;">Lazpee Seller</h2>             
                    <img src="image/<?php echo $row["profileImage"]; ?>" style="color: white; width: 50px; height: 50px; float: right;" >    
                    <input style="background-color: red; font-weight: bolder; color:white;" type="button" value="Logout"  onclick="location.href='logout.php';" />
                </div>

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                
            </ul>
        </nav>
        <?php

  }
} else {
  echo "0 results";
}
$conn->close();
?>