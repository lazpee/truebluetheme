
<?php
    include('includes/header.php');
   
    if (isset($_SESSION['username'])) {
      $id =$_SESSION['id'];
       include('validation.php');
    }
    else{
      header("location:login.php");
    } 
?>
<link rel="stylesheet" type="text/css" href="css/uni.css">

 <div class="container-fluid px-4">
                   <br><br>
            <br> <h1 style="margin-left:580px;" class="mt-4">My Orders</h1><br>
            <div class="cont" style="margin-left:270px;">
                
                <div  class='table-responsive'>
                            <table cellspacing="7" class='table table-striped'>
                            <thead style="background: #072F5F; color:white;">
                             <tr><th>Customer Name</th><th>Products</th><th>Contact | Email</th><th>Address</th><th>Details</th><th>Order Date</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $results_per_page = 10;  
                        $query = ("select order_id, product_title, first_name, mobile, email, address1, address2, product_price,address2, qty, time from orders,products,user_info where orders.product_id=products.product_id and user_info.user_id=orders.user_id and products.sellerid= $id ")or die ("query 1 incorrect....."); 
                        $result = mysqli_query($conn, $query);  
                        $number_of_result = mysqli_num_rows($result); 
                        $number_of_page = ceil ($number_of_result / $results_per_page);  
                        if (!isset ($_GET['page']) ) {  
                          $page = 1;  
                        } else {  
                          $page = $_GET['page'];  
                        }  
                        $page_first_result = ($page-1) * $results_per_page;  
                        $query = "select order_id, product_title, first_name, mobile, email, address1, address2, product_price,address2, qty, time from orders,products,user_info where orders.product_id=products.product_id and user_info.user_id=orders.user_id and products.sellerid= $id LIMIT " . $page_first_result . ',' . $results_per_page;  
                        $result = mysqli_query($conn, $query);  



                        while(list($order_id,$p_names,$cus_name,$contact_no,$email,$address,$country,$details,$zip_code,$quantity,$time)=mysqli_fetch_array($result))
                        {   
                        echo "<tr><td>$cus_name</td><td>$p_names</td><td>$email<br>$contact_no</td><td>$address<br>ZIP: $zip_code<br>$country</td><td>Amount: $details<br>Quantity: $quantity</td><td>$time</td>

                        </tr>";
                        }
                        echo "<tr><td>";                   
                        for($page = 1; $page<= $number_of_page; $page++) {  
                            echo '<a href = "myorders.php?page=' . $page . '">' . $page . ' </a>';  
                        }  
    
                        ?>
                        <tbody>  
                           

                       <!--.insert table data here.-->
</table>

            </div>
    </div>    



            </div>
    </div>          
            
<?php
    include('includes/footer.php');
    include('includes/scripts.php')
?>