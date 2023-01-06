 <?php
include 'db.php';
include 'header.php';

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($con,"delete from orders_info where order_id='$order_id'")or die("delete query is incorrect...");
} 
$id=$_SESSION["uid"];
///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"><php echo $page;?> </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>Products</th><th>Contact | Email</th><th>Address</th><th>Details</th><th>Time</th>
                    </tr></thead>
                    <tbody>
                       <?php 
                        $result=mysqli_query($con,"select order_id, product_title,  mobile, email, address1, address2, product_price,address2, qty, time from orders,products,user_info where user_info.user_id=$id and (orders.product_id=products.product_id and orders.user_id= $id)   Limit $page1,10")or die ("query 1 incorrect.....");

                        while(list($order_id,$p_names,$contact_no,$email,$address,$country,$details,$zip_code,$quantity,$time)=mysqli_fetch_array($result))
                        { 
                        echo "<tr><td>$p_names</td><td>$email<br>$contact_no</td><td>$address<br>ZIP: $zip_code<br>$country</td><td>Amount: $details<br>Quantity: $quantity</td><td>$time</td>

                        <td>
                       

                        </td></tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                  
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 
//counting paging

                $paging=mysqli_query($con,"select order_id, product_title, first_name, mobile, email, address1, address2, product_price,address2, qty, time from orders,products,user_info where user_info.user_id=$id and (orders.product_id=products.product_id and orders.user_id= $id) ORDER BY time DESC");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="orders.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php 
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <?php
include "footer.php";
?>