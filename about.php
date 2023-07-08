<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");  
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
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
				</li>
				<li class="active">About Page</li>
			</ol>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- mail -->
	<div class="mail animated wow zoomIn" data-wow-delay=".5s">
		<div class="container">
			<h3>About</h3>
			<p class="est">If something stands between you and your success, move it. Never be denied.</p> <br> <br> <br>
			<div class="about-grids">
				<div">
					<p><b><h3><u>Sport Planet</u></h3></b></p> <br>
					<p class="top">
					<p><b><u><h4>Hello  Strikers!</h4></u></b></p> <br>

					<ul>
						<li>Let’s get going to dig out the best products in your game & make ‘em available right at your
							doorstep. We will be glad to serve you in any city in India & speedily, so that you enjoy
							your product in the coming weekend! All this, with no shipping charges if you purchase above
							Rs.1000.</li> <br>

						<li>Scout through your favourite brands with latest technologies. Just click & be its proud
							owner, at the best available price in the market. Come, help us help you to fly high with
							your new & improved game with high quality sportsgear!</li> <br>

						<li>Right from Racquets, Balls, Bats, Clubs to Shoes, Caps & other thousands of accessories, a
							wonderful selection awaits you to take a pick from. Give your wishlist to us & we will get
							you what you want.</li> <br>

						<li>Secure payment methods with seamless transactions & a commited helpline for all your
							queries.</li> <br>

						<li>Blog in to learn about your game & give your juniors a tip or two. Ask us to help you select
							your product, we will be glad to help you.</li> <br>

						<li>Hey kids – don’t despair!! Check out our Juniors section for a plethora of goods , just to
							suit you! There’s something for every sportsman in here.</li> <br> <br>
					</ul>
					</p>
			</div>
			
			<div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">
				<div class="mail-grid-right1">
					<img src="image/" alt=" " class="img-responsive" />
					<h4>Tanvika Rathod<span>Manager</span></h4>
					<ul class="phone-mail">
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone: +91 12345 67890
						</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email: <a
								href="mailto:rathodtannu14@gmail.com">rathodtannu14@gmail.com</a></li>
					</ul>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
	<!-- //mail -->
	<!-- footer -->
	<?php
            require ('Include/footer.php');
        ?>
	<!-- //footer -->
</body>

</html>