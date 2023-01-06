
<?php
    include('includes/header.php');
    if (isset($_SESSION['username'])) {
//echo "Hello ". $_SESSION['useremail'];
	}
	else{
	  header("location:login.php");
	}
?>
<link rel="stylesheet" type="text/css" href="css/uni.css">
<style type="text/css">

    .container form span{
    background: green;
     margin-top: -40px;


   font-weight: bolder;
    background: #32CD32;
    font-size: 13px;
    color: black;
    padding: 8px;
    text-align: center;
}
  
</style>
 <div class="container-fluid px-4">
                   <br><br>

            
            <br> <h1 style="margin-left:620px;" class="mt-4">Update Product</h1><br>
    </div>     

            <div class="container">
    
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                     include('validation.php');

                    $product_id =  $_GET['product_id'];
                    $query = "SELECT * FROM products WHERE product_id='$product_id'";
                    $data = mysqli_query($conn,$query);

                    $total = mysqli_num_rows($data);
                    $result= mysqli_fetch_assoc($data);



                    ?>
                                    
                    <input  type="hidden" name="product_id" value="<?php echo $result['product_id']?>" required>
                    <label >Product Image:</label> <input  type="file" name="uploadfile" required><br>
                    <label>Product Name:</label> <input class="box" type="text" name="prodname" value="<?php echo $result['product_title']?>" required><br>
                    <label>Product Description:</label><input class="box" type="text" name="proddescription" value="<?php echo $result['product_desc']?>" required><br>
                    <label >Choose a category:</label>
                    <select name="variations"style="width: 332px">
                        <option value="">Please choose category</option>
                      <option value="1">Electronics</option>
                      <option value="2">Ladies Wears</option>
                      <option value="3">Mens Wear</option>
                      <option value="4">Mens Wear</option>
                      <option value="5">Furnitures</option>
                      <option value="6">Home Appliances</option>
                      <option value="7">Electronics Gadgets</option>
                      <option value="8">Foods</option>
                    </select>
                    <br><br>
                      <label >Choose a brand name:</label>
                    <select name="prodbrand" style="width: 332px">
                    <option value="">Please choose brandname</option>
                      <option value="1">HP</option>
                      <option value="2">Samsung</option>
                      <option value="3">Apple</option>
                      <option value="4">motorolla</option>
                      <option value="5">LG</option>
                      <option value="6">Cloth Brand</option>
                      <option value="7">others</option>
                    </select><br>
                    <label>Stock:</label> <input class="box" type="number" name="stock" value="<?php echo $result['stock']?>" required><br>
                    <label>Price:</label> <input class="box" type="number" name="price" value="<?php echo $result['product_price']?>" required><br>

                    <input type="submit" value="Update" name="update" class="btn">


                </form>
</div>
<?php
    @include 'validation.php';

    if (isset($_POST['update'])) {
    

$filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = 'image/'.$filename;
    move_uploaded_file($tempname, $folder);
     $product_id = $_POST['product_id'];
    $product_title = $_POST['prodname'];
    $proddescription = $_POST['proddescription'];
    $variations = $_POST['variations'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $prodbrand= $_POST['prodbrand'];


    

    $update = "UPDATE products SET product_image='$filename', product_title='$product_title',product_desc='$proddescription', product_cat='$variations', product_brand='$prodbrand',product_price='$price', stock='$stock' WHERE product_id='$product_id'";

    if ($conn->query($update) === TRUE) {
         
            echo "<script>alert('RECORD UPDATED')</script>";
        ?>

        <meta http-equiv="refresh" content="0; url=products.php">
        <?php
        

}
    else {
         echo "Error: " . $update . "<br>" . $conn->error;
}

    $conn->close();
                    }


?> 

<?php
    include('includes/footer.php');
    include('includes/scripts.php')
?>