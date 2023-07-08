<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");  
    exit;
}
?>
<?php
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
else{
    header('location: index.php');
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
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="filter-price animated wow slideInUp" data-wow-delay=".5s">
				</div>
				<div class="categories animated wow slideInUp" data-wow-delay=".5s">
					<h3>Categories</h3>
					<ul class="cate">
						<li>Indoor Game</li>
						<ul>
							<?php
                            include 'Include/dbconnect.php';
                            $disp="SELECT * FROM add_category WHERE c_category = 'Indor game'";
				            $sql=mysqli_query($conn,$disp);
                            while($row = mysqli_fetch_array($sql)){
			            ?>
							<li><a href="products.php?cat=<?php echo $row['s_category'];?>">
									<?php echo $row['s_category'] ?>
								</a></li>
							<?php } ?>
						</ul>
						<li>Outdoor Game</li>
						<ul>
							<?php
                            include 'Include/dbconnect.php';
                            $disp="SELECT * FROM add_category WHERE c_category = 'Outdor game'";
				            $sql=mysqli_query($conn,$disp);
                            while($row = mysqli_fetch_array($sql)){
			            ?>
							<li><a href="products.php?cat=<?php echo $row['s_category'];?>">
									<?php echo $row['s_category'] ?>
								</a></li>
							<?php } ?>
						</ul>
					</ul>
				</div>
			</div>
			<div class="col-md-8 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
						<div class="sorting" style="visibility: hidden">
							<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
							</select>
						</div>
						<div class="sorting-left" style="visibility: hidden">
							<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
						<img src="image/photo_2.jpg" alt=" " class="img-responsive" />
						<div class="products-right-grids-position1">
							<h4>2021 New Collection</h4>
							<p>The key is not the will to win… everybody has that. It is the will to prepare to win that is important.</p>
						</div>
					</div>
				</div>
				<?php		
					include("Include/dbconnect.php");
					$qry="SELECT * FROM `add_products` WHERE s_category LIKE '%$search%'";
					$sql=mysqli_query($conn,$qry);
				?>
				<div class="products-right-grids-bottom">
					<?php while($row = mysqli_fetch_array($sql)){
		 			?>
					<div class="col-md-4 products-right-grids-bottom-grid">
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp"
							data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="single.php?cat=<?php echo $row[0];?>" class="product-image">
									<?php echo "<img class='img-responsive' src='admin/Products_images/".$row['upload_picture']."' width='240' height='210'>"; ?>
								</a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="single.php?cat=<?php echo $row[0];?>">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
								</div>
							</div>
							<h4><a href="single.php?cat=<?php echo $row[0];?>">
									<?php echo $row['p_name']; ?>
								</a></h4>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>
										<s><?php echo "₹"; echo $row['o_price']; ?></s>
									</i> <span class="item_price">
										<?php echo "₹"; echo $row['p_price']; ?>
									</span><a class="item_add" href="cart.php?id=<?php echo $row[0];?>">add to cart</a></p>
									
							</div>
						</div>
					</div>
					<?php } ?>
					<?php while($row = mysqli_fetch_array($sql)){
		 			?>
					<div class="col-md-4 products-right-grids-bottom-grid">
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp"
							data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="single.php?cat=<?php echo $row[0];?>" class="product-image">
									<?php echo "<img class='img-responsive' src='admin/Products_images/".$row['upload_picture']."' width='240' height='210'>"; ?>
								</a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="single.php?cat=<?php echo $row[0];?>">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
								</div>
							</div>
							<h4><a href="single.php?cat=<?php echo $row[0];?>">
									<?php echo $row['p_name']; ?>
								</a></h4>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>
										<s><?php echo "₹"; echo $row['o_price']; ?></s>
									</i> <span class="item_price">
										<?php echo "₹"; echo $row['p_price']; ?>
									</span><a class="item_add" href="cart.php?id=<?php echo $row[0];?>">add to cart</a></p>
									
							</div>
						</div>
					</div>
					<?php } ?>
					<?php while($row = mysqli_fetch_array($sql)){
		 			?>
					<div class="col-md-4 products-right-grids-bottom-grid">
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp"
							data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="single.php?cat=<?php echo $row[0];?>" class="product-image">
									<?php echo "<img class='img-responsive' src='admin/Products_images/".$row['upload_picture']."' width='240' height='210'>"; ?>
								</a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="single.php?cat=<?php echo $row[0];?>">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
								</div>
							</div>
							<h4><a href="single.php?cat=<?php echo $row[0];?>">
									<?php echo $row['p_name']; ?>
								</a></h4>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>
										<s><?php echo "₹"; echo $row['o_price']; ?></s>
									</i> <span class="item_price">
										<?php echo "₹"; echo $row['p_price']; ?>
									</span><a class="item_add" href="cart.php?id=<?php echo $row[0];?>">add to cart</a></p>
									
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