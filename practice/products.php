<?php include('includes/header.php');

    if (isset($_SESSION['username'])) {
       $id =$_SESSION['id'];
	}
	else{
	  header("location:login.php");
	} ?>

<link rel="stylesheet" type="text/css" href="css/uni.css">

 <div class="container-fluid px-4">
                   <br><br>

            
            <br> <h1 style="margin-left:580px;" class="mt-4"> My Products</h1>
            <div style="margin-left:270px;" class="cont">
                <?php

                    include('validation.php');
                     

                    $query = "SELECT * FROM products  where sellerid = $id";
                    $data = mysqli_query($conn,$query);

                    $total = mysqli_num_rows($data);
                    
                   // echo $total;

                        

                    if ($total != 0) {
                       ?>

                       
                        <div  class='table-responsive'>
                            <table cellspacing="7" class='table table-striped'>
                            <thead style="background: #072F5F; color:white;">
                            <tr>

                                <th width="30%" colspan="2" style="text-align: center;">PRODUCT </th>
                                <th width="20%">DESCRIPTION</th>
                                <th width="8%">STOCK</th>
                                <th width="10%">PRICE</th> 
                                <th width="10%">OPTIONS</th>
                                
                            </tr>
                              </thead>
                        <tbody>  
                           

                       <?php
                        
                           
}                   
                    else{
                        echo "no records found";
                    }

                        $results_per_page = 5;              
                        $result = mysqli_query($conn, $query);  
                        $number_of_result = mysqli_num_rows($result); 
                        $number_of_page = ceil ($number_of_result / $results_per_page);  
                        if (!isset ($_GET['page']) ) {  
                          $page = 1;  
                        } else {  
                          $page = $_GET['page'];  
                        }  
                        $page_first_result = ($page-1) * $results_per_page;  
                        $query = "SELECT * FROM products  where sellerid = $id LIMIT  " . $page_first_result . ',' . $results_per_page;  
                        $data = mysqli_query($conn, $query);  



                       while ($result= mysqli_fetch_assoc($data)) {

                        echo "
                        <tr>
                             <td><img src='".$result['product_image']."' height='120px' width='120px' ></td>

                            <td style='padding-top:30px'>".$result['product_title']."</td>
                            <td style='padding-top:30px'>".$result['product_desc']."</td>
                            <td style='padding-top:30px'>".$result['stock']."</td>
                            <td style='padding-top:30px'>".$result['product_price']."</td>
                            
                            <td style='padding-top:20px'><a  href='drop.php?product_id=".$result['product_id']."'><i  class='fas fa-trash' ></i>Delete</a><br><br><a href='updateproduct.php?product_id=".$result['product_id']."'><i class='fas fa-edit'></i>Update</a></td>
                            
                        </tr>";
    }
                        echo "<tr><td>";                   
                        for($page = 1; $page<= $number_of_page; $page++) {  
                            echo '<a href = "products.php?page=' . $page . '">' . $page . ' </a>';  
                        }  
    
                        ?>
    
</table>
            </div>
    </div>    


<?php include('includes/footer.php'); 
include('includes/scripts.php');?>
