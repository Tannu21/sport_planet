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
<style>
    .w3-light-grey,
    .w3-hover-light-grey:hover,
    .w3-light-gray,
    .w3-hover-light-gray:hover {
        color: #000 !important;
        background-color: #f1f1f1 !important;
    }

    .w3-green,
    .w3-hover-green:hover {
        color: #fff !important;
        background-color: #1266f1 !important;
        height: 15px;
        width: 100%;
    }
</style>

<body>
    <?php
            require ('Include/Header.php');
        ?>
    <!-- //header -->
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Order Tracking</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Order Tracking</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt
                in culpa qui officia
                deserunt mollit anim id est laborum.</p>
            <br /><br /><br /><br /><br />
            <p class="animated wow zoomIn" data-wow-delay=".5s" style="font-size: 20px;color: #000;line-height: 1.8em;">
                Order Placed &nbsp &nbsp &nbsp &nbsp &nbsp Order Conformed &nbsp &nbsp &nbsp &nbsp &nbsp Package
                Shipped &nbsp &nbsp &nbsp &nbsp &nbsp Package Arrived &nbsp &nbsp &nbsp &nbsp &nbsp Out For Delivery
                &nbsp &nbsp &nbsp &nbsp &nbsp Delivered</p> <br>
            <div class="w3-light-grey animated wow zoomIn" data-wow-delay=".5s">
                <div id="myBar" class="w3-green">
                </div>
            </div>
            <br>

        </div>

        <script>

            var elem = document.getElementById("myBar");
            var width = 1;
            var id = setInterval(frame, 6000);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                }
                else {
                    width++;
                    elem.style.width = width + '%';
                }
            }

        </script>
    </div>
    </div>
    <!-- footer -->
    <?php
            require ('Include/footer.php');
    
        ?>
    <!-- //footer -->
</body>

</html>