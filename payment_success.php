<?php

include_once("db.php");
include "header.php"; 
if(!isset($_SESSION["uid"]))
{
	header("location:index.php");
}
else{
if (isset($_POST["st"])) 
{

	# code...
	$trx_id = $_POST["tx"];
		$p_st = $_POST["st"];
		$amt = $_POST["total_price"];
		$cm_user_id = $_SESSION["uid"];
		$time =$_POST["date"];
 
	if ($p_st == "Completed") {

		


		$sql = "SELECT p_id,qty FROM cart WHERE user_id = '$cm_user_id'";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			# code...
			while ($row=mysqli_fetch_array($query)) {
			$product_id[] = $row["p_id"];
			$qty[] = $row["qty"];
			}

			for ($i=0; $i < count($product_id); $i++) { 
				$sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,p_status,time) VALUES ('$cm_user_id','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st','$time')";
				$quan = $qty[$i];

				mysqli_query($con,$sql);
				$sql = "SELECT stock FROM products WHERE product_id = $product_id[$i]";
				$query = mysqli_query($con,$sql);
				if (mysqli_num_rows($query) > 0) {
				while ($row=mysqli_fetch_array($query)) 
				{
					$stock = $row["stock"]-$quan;

				}
				
			}
				$sql = "UPDATE products SET stock =	'$stock' WHERE product_id = $product_id[$i]";
				mysqli_query($con,$sql);
			}
			?>
					<!DOCTYPE html>
					<html>
						<head>
							<meta charset="UTF-8">
							<title>LAZPEE</title>
							<link rel="stylesheet" href="css/bootstrap.min.css"/>
							<script src="js/jquery2.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="main.js"></script>
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						
						<p><br/></p>
						<p><br/></p>
						<p><br/></p>
						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Thankyou </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your payment process is 
											successfully completed and your Transaction id is <b><?php echo $trx_id; ?></b><br/>
											you can continue your Shopping <br/></p>
											<?php if (isset($_SESSION["uid"])) {

	$f_name = $_POST["firstname"];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip= $_POST['zip'];
    $cardname= $_POST['cardname'];
    $cardnumber= $_POST['cardNumber'];
    $expdate= $_POST['expdate'];
    $cvv= $_POST['cvv'];
    $user_id=$_SESSION["uid"];
    $cardnumberstr=(string)$cardnumber;
    $total_count=$_POST['total_count'];
    $prod_total = $_POST['total_price'];
    
    
    $sql0="SELECT order_id from `orders_info`";
    $runquery=mysqli_query($con,$sql0);
    if (mysqli_num_rows($runquery) == 0) {
        echo( mysqli_error($con));
        $order_id=1;
    }else if (mysqli_num_rows($runquery) > 0) {
        $sql2="SELECT MAX(order_id) AS max_val from `orders_info`";
        $runquery1=mysqli_query($con,$sql2);
        $row = mysqli_fetch_array($runquery1);
        $order_id= $row["max_val"];
        $order_id=$order_id+1;
        echo( mysqli_error($con));
    }

	$sql = "INSERT INTO `orders_info` 
	(`order_id`,`user_id`,`f_name`, `email`,`address`, 
	`city`, `state`, `zip`, `cardname`,`cardnumber`,`expdate`,`prod_count`,`total_amt`,`cvv`) 
	VALUES ($order_id, '$user_id','$f_name','$email', 
    '$address', '$city', '$state', '$zip','$cardname','$cardnumberstr','$expdate','$total_count','$prod_total','$cvv')";


    if(mysqli_query($con,$sql)){
        $i=1;
        $prod_id_=0;
        $prod_price_=0;
        $prod_qty_=0;
        $sellerid_=0;
        while($i<=$total_count){
            $str=(string)$i;
            $prod_id_+$str = $_POST['prod_id_'.$i];
            $prod_id=$prod_id_+$str;		
            $prod_price_+$str = $_POST['prod_price_'.$i];
            $prod_price=$prod_price_+$str;
            $prod_qty_+$str = $_POST['prod_qty_'.$i];
            $prod_qty=$prod_qty_+$str;
            $sellerid_+$str = $_POST['sellerid_'.$i];
            $sellerid=$sellerid_+$str;
            $sub_total=(int)$prod_price*(int)$prod_qty;
            $sql1="INSERT INTO `order_products` 
            (`order_pro_id`,`order_id`,`product_id`,`qty`,`amt`,`sellerid`) 
            VALUES (NULL, '$order_id','$prod_id','$prod_qty','$sub_total','$sellerid')";
            if(mysqli_query($con,$sql1)){
                $del_sql="DELETE from cart where user_id=$user_id";
                if(mysqli_query($con,$del_sql)){
                    
                }else{
                    echo(mysqli_error($con));
                }

            }else{
                echo(mysqli_error($con));
            }
            $i++;


        }
    }else{

        echo(mysqli_error($con));
        
    }
    
}else{
    echo"<script>window.location.href='index.php'</script>";
} ?>
											<a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php
			
		}
		
	}
}
}



?>

















































