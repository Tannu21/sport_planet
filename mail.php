<?php
session_start();

if($_SESSION['loggedin']!=true){
    header("location: login.php");  
    exit;
}
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'Include/dbconnect.php';

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $massage = $_POST["massage"];

	$sql = "INSERT INTO `m_mail` (`m_id`, `name`, `email`, `subject`, `massage`, `dateandtime`) VALUES (NULL, '$name', '$email', '$subject', '$massage', CURRENT_TIMESTAMP())";
    
    $result = mysqli_query($conn, $sql);

	if($result){
		echo "<script>alert('Your mail sand succesfully')</script>";
	}else{
		echo "<script>alert('Your mail cant sand')</script>";
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
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
				</li>
				<li class="active">Mail Us</li>
			</ol>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- mail -->
	<div class="mail animated wow zoomIn" data-wow-delay=".5s">
		<div class="container">
			<h3>Mail Us</h3>
			<p class="est">If something stands between you and your success, move it. Never be denied.</p>
			<div class="mail-grids">
				<div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
				<form class="animated wow slideInUp" data-wow-delay=".5s" method="POST">
                        <input type="text" maxlength="10" placeholder="Name" id="name" name="name" required=" ">
                        <input type="email" maxlength="20" placeholder="Email" id="email" name="email"
                            required=" ">
						<input type="text" maxlength="20" placeholder="Subject" id="Subject" name="subject" required=" ">
						<textarea type="text" name ="massage" placeholder="Massage....." id = "massage" onfocus="this.value = '';"
							onblur="if (this.value == '') {this.value = 'Massage...';}"
							required=""></textarea>
                        
                        <input type="submit" name="submit" value="submit">
                    </form>
				</div>
				<div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<div class="mail-grid-right1">
						<img src="image/Tanvika.jpg" alt=" " class="img-responsive" />
						<h4>Rathod Tanvika<span>Manager</span></h4>
						<ul class="phone-mail">
							<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone: +91 93165 87876
							</li>
							<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email: <a
									href="mailto:rathodtannu14@gmail.com">rathodtannu14@gmail.com</a></li>
						</ul>
						<ul class="social-icons">
							<li><a href="https://www.facebook.com/" class="facebook" add
									target="_blank"></a></li>
							<li><a href="https://twitter.com/" class="twitter" add target="_blank"></a>
							</li>
							<li><a href="https://www.instagram.com/" class="instagram" add
									target="_blank"></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<iframe class="animated wow slideInLeft" data-wow-delay=".5s"
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3098.7638135888296!2d-77.47669308468912!3d39.04350424592369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b63eb3bc8da92b%3A0x78c8e09ab1cabc90!2sShopping+Plaza%2C+Ashburn%2C+VA+20147%2C+USA!5e0!3m2!1sen!2sin!4v1457602090579"
				frameborder="0" style="border:0" allowfullscreen></iframe>
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