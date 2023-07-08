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
        require('Include/head.php');
    ?>

<body>
	<!-- header -->
	<?php
            require ('Include/Header.php');
    ?>
	<!-- //header -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Order List</li>
			</ol>
		</div>
	</div>
	<div class="products">
		<div class="container">
			<div class="col-md-8 products-right">
				<div class="products-right-grids-bottom" style="width: 78vw;">
				    <?php		
					    include 'Include/dbconnect.php';
                    
                        $email = $_SESSION['email'];
                        $qry = "select * from `place_order` where email = '$email'";
                        // $qry = "select * from `cart`";
                        $sql = mysqli_query($conn,$qry);
                        $num = mysqli_num_rows($sql);
				        while($row = mysqli_fetch_array($sql)){
		 			?>
					<div class="container">
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp"
							data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<img class='img-responsive' src='<?php echo "admin/Products_images/", $row['upload_picture']; ?>' width='300' height='400'>
								</a>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
								</div>
							</div>
							<h4><?php echo $row['p_name']; ?></h4>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<div class="form-group col-md-6">
                                	<p></span><a class="item_add" href="track.php">Track Order</a></p>
								</div>
								<div class="form-group col-md-6">
                                	<p></span><a class="item_add" href="invoice.php?id=<?php echo $row['0']?>">View Invoice</a></p>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- footer -->
	<?php
    	require ('Include/footer.php');
	?>
	<!-- //footer -->
</body>

</html>