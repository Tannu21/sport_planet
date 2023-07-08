<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");  
    exit;
}
?>
<!DOCTYPE html>
<html>
	<?php
    	require ('Include/head.php');
    ?>
    <body>
        <!-- header -->
        <?php
            require ('Include/header.php');
        ?>
	<!-- //header -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Checkout Page</li>
			</ol>
		</div>
	</div>
	<?php
		include 'Include/dbconnect.php';
	
		$email = $_SESSION['email'];
		$qry = "select * from `cart` where email = '$email'";
		// $qry = "select * from `cart`";
	
		$sql = mysqli_query($conn,$qry);
		$num = mysqli_num_rows($sql);
		$tot = 0;
	?>
	<!-- //breadcrumbs -->
	<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h3 class="animated wow slideInLeft" data-wow-delay=".5s">Your shopping cart contains: <span><?php echo $num;?></span></h3>
			<div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>Product</th>
							<th>Product Name</th>
							<th>Price</th>
							<!-- <th>Quantity</th> -->
							<!-- <th>Total</th> -->
							<th>Remove</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php
					while($row = mysqli_fetch_array($sql)){
                        $upload_picture = $row['upload_picture'];
						$p_name =$row['p_name'];
                        $p_price = $row['p_price'];
					?>
					<tr class="rem1">
							<td class="invert-image"><a href="login.php"><?php echo "<img class='img-responsive' src='admin/Products_images/" .$row['upload_picture']."'width='100%'>";?></a></td>
							<td class="invert" ><?php echo $row['p_name']; ?></td>
							<td class="invert">₹<?php echo $row['p_price']; ?></td>
							<!-- <td class="invert">₹<?php echo $row['p_price']; ?><input type="hidden" class="iprice" value="<?php echo $row['p_price']; ?>"></td> -->
							<!-- <td class="invert" ><input type="number" class="text-center iquantity" onchange="subTotal()" size="4" value="<?php echo $row['quantity']; ?>" name="quantity" id=""></td> -->
							<!-- <td class="itotal"></td> -->
							<td class="invert"><a class="btn btn-warning" href="delete.php?id=<?php echo $row['0']?>" role="button">Remove</a></td>
							<td>
								<a class="btn btn-warning" href="Place_order.php?id=<?php echo $row[0];?>" role="button">Place Order</a>
								<!-- <form method="POST">
									<input type="submit" class="btn btn-warning" value="Place Order" name="Submit">
								</form> -->
							</td>
						</tr>
						<!-- <script>
			
							var iprice=document.getElementsByClassName('iprice');
							var iquantity=document.getElementsByClassName('iquantity');
							var itotal=document.getElementsByClassName('itotal');

							function subTotal(){
								for(i+0; i<iprice.lenght;i++){
									itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
								}
							}
						
							subTotal()
						</script> -->
					<?php
					$tot=$tot+$row['p_price']; 
					} ?>
					<!--quantity-->
					<script>
						$('.value-plus').on('click', function () {
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) + 1;
							divUpd.text(newVal);
						});
						$('.value-minus').on('click', function () {
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) - 1;
							if (newVal >= 1) divUpd.text(newVal);
						});
					</script>
					<!--quantity-->
				</table>
				</div>
				<div class="checkout-left">
					<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
						<h4>Continue to basket</h4>
						<ul>
						<?php	
							$qry1="SELECT `p_price` FROM `cart` WHERE `email` = '$email'";
							// $qry1="SELECT `p_price` FROM `cart`";
							$sql1=mysqli_query($conn,$qry1);
							$count=0;
							while($row1 = mysqli_fetch_array($sql1))
							{ ?>
							<li>Product<i>-</i> <?php $count++; echo $count;  ?><span>₹ <?php echo $row1['p_price']; ?></span></li>
							<?php } ?>
							<hr>
							<li ><h3>Total <i>-</i> <span>₹ <?php echo $tot;?></h3></span></li>
						</ul>
					</div>
						<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
							<a href="index.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>ContinueShopping</a>
						</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<?php
    	    // if($_SERVER["REQUEST_METHOD"] == "POST"){
    	    //     include 'Include/dbconnect.php';
			// 	$email = $_SESSION['email'];
    	    //     $qry = "INSERT INTO `place_order` (`id`, `email` , `p_name` , `upload_picture`, `p_price` , `datetime`) VALUES (NULL , '$email' , '$p_name' , '$upload_picture', '$p_price' , CURRENT_TIMESTAMP())";
    	    //     $sql = mysqli_query($conn,$qry);
    	    //         if($sql){
    	    //             echo"<script>window.location='Place_order.php';</script>";	
    	    //         }else{
    	    //             echo "<script>alert('Failed')</script>";
    	    //         }
    	    //     }
    	?>
	<!-- //checkout -->
	<!-- footer -->
	<?php
        require ('Include/footer.php');
    ?>
	<!-- //footer -->
</body>

</html>