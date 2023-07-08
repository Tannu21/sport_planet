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
                <li class="active">Thank You</li>
            </ol>
        </div>
    </div>
    <div class="products">
        <p style="font-size: 10em;display: flex;margin: 0 23vw;">Thank You</p> <br> <br> <br> <br>
        <div class="container">
                    <button type="button" class="btn btn-warning" onclick="window.location.href='index.php'" style="margin: 0 31vw;">Return To Home</button>
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