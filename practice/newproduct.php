


<?php
    include('includes/header.php');

    if (isset($_SESSION['username'])) {
         $id =$_SESSION['id'];
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
 <div>

            <br>
            <br>
            <h1 style="margin-left:580px;" class="mt-4">Add New Product</h1>
    </div>           
            <div class="container">
    
                <form action="" method="POST" enctype="multipart/form-data">
                 <?php
    @include 'validation.php';

    if (isset($_POST['add'])) {
    
    //IMAGE UPLOAD
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = 'image/'.$filename;
    move_uploaded_file($tempname, $folder);
    


    $prodname = $_POST['prodname'];
    $proddescription = $_POST['proddescription'];
    $variations = $_POST['variations'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $product_keywords = $_POST['prodkey'];
    $product_brand = $_POST['prodbrand'];

    $insert = "INSERT INTO products(product_image,product_title, product_desc, product_cat,product_brand,  
                 product_keywords,  stock,product_price,sellerid) VALUES('$folder','$prodname', '$proddescription','$variations',
                 '$product_brand','$product_keywords','$stock',   '$price' ,'$id')";
    if ($conn->query($insert) === TRUE) {
         
       $msg[] = 'PRODUCT SUCCESSFULLY ADDED';
}
    else {
         echo "Error: " . $insert . "<br>" . $conn->error;
}

    $conn->close();
                    }


?> 
<?php
                            if(isset($msg)){
                                foreach ($msg as $msg) {
                                    echo '<span class="error-msg">'.$msg.'</span>';
                                }
                            }
                        ?>
<br><br>
                    <label >Product Image:</label> <input  type="file" name="uploadfile" required><br>
                    <label>Product Name:</label> <input class="box" type="text" name="prodname" required><br>
                    <label>Product Description:</label>
                    <textarea name="proddescription" rows="3" cols="30"></textarea><br>
                    <label >Choose a category:</label>
                    <select name="variations"style="width: 332px">
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
                      <option value="1">HP</option>
                      <option value="2">Samsung</option>
                      <option value="3">Apple</option>
                      <option value="4">motorolla</option>
                      <option value="5">LG</option>
                      <option value="6">Cloth Brand</option>
                      <option value="7">others</option>
                    </select><br>
                    <label>Product Keyword:</label>
                    <textarea name="prodkey" rows="3" cols="30"></textarea><br>
                    <label>Stock:</label> <input class="box" type="number" name="stock" required><br>
                    <label>Price:</label> <input class="box" type="number" name="price" required><br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" value="Add" name="add" class="btn">


                </form>
</div>
<?php
    include('includes/footer.php');
    include('includes/scripts.php')
?>