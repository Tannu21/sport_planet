<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");  
    exit;
}
?>
<?php
    include 'Include/dbconnect.php';
	$cat=$_REQUEST['cat'];
    $qry = "SELECT * FROM `add_products` WHERE p_id = '$cat'";
    $result = mysqli_query($conn,$qry);
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'Include/dbconnect.php';

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $massage = $_POST["massage"];

	$sql = "INSERT INTO `review` (`r_id`, `name`, `email`, `subject`, `massage`, `dateandtime`) VALUES (NULL, '$name', '$email', '$subject', '$massage', CURRENT_TIMESTAMP())";
    
    $result = mysqli_query($conn, $sql);

	if(!$result){
	// 	echo "<script>alert('Your mail sand succesfully')</script>";
	// }else{
		echo "<script>alert('Please reenetr')</script>";
	}

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
	<?php
	include 'Include/dbconnect.php';
    $qry = "SELECT * FROM `add_products` WHERE p_id = '$cat'";
    $result = mysqli_query($conn,$qry);
        while($row = mysqli_fetch_array($result)){
    ?>
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">
					<?php echo $row['p_name'];?>
				</li>
			</ol>
		</div>
	</div>
	<?php } ?>
	<!-- //breadcrumbs -->
	<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-4 products-left">
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
				<?php
				include 'Include/dbconnect.php';
    			$qry = "SELECT * FROM `add_products` WHERE p_id = '$cat'";
    			$result = mysqli_query($conn,$qry);
        			while($row = mysqli_fetch_array($result)){
    			?>
				<div class="men-position animated wow slideInUp" data-wow-delay=".5s">
					<img src="image/photo_4.jpg" alt=" " class="img-responsive" /></a>
					<div class="men-position-pos">
						<h4>Sport collection</h4>
						<h5><span>55%</span> Flat Discount</h5>
					</div>
				</div>
			</div>
			<div class="col-md-8 single-right">
				<div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="images/si.jpg">
								<div class="thumb-image"> <img data-imagezoom="true" class="img-responsive" <?php
										echo "<img class='img-responsive' src='admin/Products_images/" .$row['9']."' width='100%'>";
									?></img> </div>
							</li>
						</ul>
					</div>
					<!-- flixslider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
					<script>
						// Can also be used with $(document).ready()
						$(window).load(function () {
							$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
							});
						});
					</script>
					<!-- flixslider -->
				</div>
				<div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight"
					data-wow-delay=".5s">
					<h3>
						<?php echo $row['p_name'];?>
					</h3>
					<h4><span class="item_price">
							<i>₹
								<?php echo $row['p_price'];?>
						</span> - <s>
							
							<?php echo $row['o_price'];?>
						</s> (
						<?php echo $row['discount'];?>%)</i>
					</h4>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="description">
						<h5><i>Highlight</i></h5>
						<p>
							<?php echo $row['highlight'];?>
						</p>
					</div>
					<div class="occasion-cart">
						<a class="item_add" type="submit" name="submit" href="cart.php?id=<?php echo $row[0];?>">add to cart </a>
					</div>
					<!-- </form> -->
					<div class="social">
						<div class="social-left">
							<p>Share On :</p>
						</div>
						<ul class="social-icons">
							<li><a href="https://www.facebook.com/jignesh.sarvaiya.1656" class="facebook" add
									target="_blank"></a></li>
							<li><a href="https://twitter.com/Jignesh59372501" class="twitter" add target="_blank"></a>
							</li>
							<li><a href="https://www.instagram.com/jignesh_sarvaiya_10" class="instagram" add
									target="_blank"></a></li>
						</ul>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
				<div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab"
									data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab"
									aria-controls="profile">Reviews</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home"
								aria-labelledby="home-tab">
								<h5>Product Brief Description</h5>
								<p>
									<?php echo $row['discription'];?>
								</p>
							</div>
							<?php } ?>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile"
								aria-labelledby="profile-tab">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-right" >
										<?php
												include 'Include/dbconnect.php';
												$disp = "SELECT * FROM review";
												$sql=mysqli_query($conn,$disp);
    											while($row = mysqli_fetch_array($sql)){
											?>
											<ul>
												<li><a><?php echo $row['name'];?></a></li>
											</ul>
											<p><?php echo $row['massage'];?></p><br>
											<?php } ?>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="add-review">
										<h4>add a review</h4>
										<form method="POST">
											<input type="text" name="name" id="name" placeholder="Name" required="">
											<input type="email" name="email" id="email" style="margin-left: 0;"
												placeholder="Email" required="">
											<input type="text" name="subject" id="subject" placeholder="Subject"
												required="">
											<textarea type="text" name="massage" id="massage" placeholder="Message...."
												required=""></textarea>
											<input type="submit" value="Send">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //single -->
	<!-- single-related-products -->
	<?php
    	include 'Include/dbconnect.php';
		$cat=$_REQUEST['cat'];
    	$qry = "SELECT * FROM `add_products` WHERE p_id = '$cat'";
    	$result = mysqli_query($conn,$qry);
	?>
	<div class="single-related-products">
		<div class="container">
			<h3 class="animated wow slideInUp" data-wow-delay=".5s">Related Products</h3>
			<p class="est animated wow slideInUp" data-wow-delay=".5s">If something stands between you and your success, move it. Never be denied.</p>
			<div class="new-collections-grids">
			<?php
				include 'Include/dbconnect.php';
    			$qry = "SELECT * FROM `add_products` WHERE p_id = '$cat'";
    			$result = mysqli_query($conn,$qry);
    		    while($row = mysqli_fetch_array($result)){
    			?>
				<div class="col-md-3 new-collections-grid">
					<div class="new-collections-grid1 animated wow slideInLeft" data-wow-delay=".5s">
						<div class="new-collections-grid1-image">
							<a href="single.php?cat=<?php echo $row[0];?>" class="product-image"><?php
										echo "<img class='img-responsive' src='admin/Products_images/" .$row['9']."' width='100%'>";
									?></a>
							<div class="new-collections-grid1-right">
							</div>
						</div>
						<h4><a href="single.php?cat=<?php echo $row[0];?>"><?php echo $row['p_name'];?></a></h4>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							<p><span class="item_price"><?php echo "₹"; echo $row ['p_price']; ?></span><a class="item_add" href="cart.php?id=<?php echo $row[0];?>">add to cart
								</a></p>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php
					include 'Include/dbconnect.php';
    				$qry = "SELECT * FROM `add_products` WHERE p_id = '$cat'";
    				$result = mysqli_query($conn,$qry);
        			while($row = mysqli_fetch_array($result)){
    			?>
				<div class="col-md-6 new-collections-grid">
					<div class="new-collections-grid1-sub">
						<div class="new-collections-grid1 animated wow slideInLeft" data-wow-delay=".6s">
							<div class="new-collections-grid1-image">
								<a href="single.php?cat=<?php echo $row[0];?>" class="product-image"><?php
										echo "<img class='img-responsive' src='admin/Products_images/" .$row['9']."' width='100%'>";
									?></a>
								<div class="new-collections-grid1-right">
								</div>
							</div>
							<h4><a href="single.php?cat=<?php echo $row[0];?>"><?php echo $row['p_name'];?></a></h4>
							<div class="new-collections-grid1-left simpleCart_shelfItem">
								<p><span class="item_price"><?php echo "₹"; echo $row ['p_price']; ?></span><a class="item_add" href="cart.php?id=<?php echo $row[0];?>">add to
										cart </a></p>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php
						include 'Include/dbconnect.php';
    					$qry = "SELECT * FROM `add_products` WHERE p_id = '$cat'";
    					$result = mysqli_query($conn,$qry);
    		    		while($row = mysqli_fetch_array($result)){
    				?>
					<div class="new-collections-grid1-sub">
						<div class="new-collections-grid1 animated wow slideInLeft" data-wow-delay=".7s">
							<div class="new-collections-grid1-image">
								<a href="single.php?cat=<?php echo $row[0];?>" class="product-image"><?php
										echo "<img class='img-responsive' src='admin/Products_images/" .$row['9']."' width='100%'>";
									?></a>
								<div class="new-collections-grid1-right">
								</div>
							</div>
							<h4><a href="single.php?cat=<?php echo $row[0];?>"><?php echo $row['p_name'];?></a></h4>
							<div class="new-collections-grid1-left simpleCart_shelfItem">
								<p><span class="item_price"><?php echo "₹"; echo $row ['p_price']; ?></span><a class="item_add" href="cart.php?id=<?php echo $row[0];?>">add to
										cart </a></p>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<?php } ?>
				<?php
					include 'Include/dbconnect.php';
    				$qry = "SELECT * FROM `add_products` WHERE p_id = '$cat'";
    				$result = mysqli_query($conn,$qry);
    		    	while($row = mysqli_fetch_array($result)){
    			?>
				<div class="col-md-3 new-collections-grid">
					<div class="new-collections-grid1 animated wow slideInLeft" data-wow-delay=".8s">
						<div class="new-collections-grid1-image">
							<a href="single.php?cat=<?php echo $row[0];?>" class="product-image"><?php
										echo "<img class='img-responsive' src='admin/Products_images/" .$row['9']."' width='100%'>";
									?></a>
							<div class="new-collections-grid1-right">
							</div>
						</div>
						<h4><a href="single.php?cat=<?php echo $row[0];?>"><?php echo $row['p_name'];?></a></h4>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							<p><span class="item_price"><?php echo "₹"; echo $row ['p_price']; ?></span><a class="item_add" href="cart.php?id=<?php echo $row[0];?>">add to cart
								</a></p>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //single-related-products -->
	<!-- footer -->
	<?php
            require ('Include/footer.php');
        ?>
	<!-- //footer -->
	<!-- zooming-effect -->
	<script src="js/imagezoom.js"></script>
	<!-- //zooming-effect -->
</body>

</html>