<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");  
    exit;
}
?>
<?php
    $showAlert = false;
    $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'Include/dbconnect.php';

    $email = $_POST["email"];

    $existSql = "SELECT * FROM `m_join_mail` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistsRows = mysqli_num_rows($result);

    if ($numExistsRows > 0){
        $showError = "<script>alert('Yoy Already Joined')</script>";
    }
    else{
        $exists = false;
        if ($email){
            $sql = "INSERT INTO `m_join_mail` (`j_id`, `email`, `dateandtime`) VALUES (NULL, '$email', CURRENT_TIMESTAMP())";
            $result = mysqli_query($conn, $sql);

            if($result){
                $showAlert = true;
            }
        }
    }

    // $sql = "INSERT INTO `m_join_mail` (`j_id`, `email`, `dateandtime`) VALUES (NULL, '$email', CURRENT_TIMESTAMP())";
    
    // $result = mysqli_query($conn, $sql);

    // if($result){
    //     echo "<script>alert('Thank you for joining')</script>";
    // }else{
    //     echo "<script>alert(You can't join please try again)</script>";
    // }

}
?>
<?php 
    if($showAlert){
        echo "<script>alert('Thank you for joining')</script>";
    }
    if($showError){
        echo "<script>alert('You can't join please try again')</script>$showError";
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
        <!-- banner -->
        <div class="banner">
            <div class="container">
                <div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
                    <h3>Sports & Games Online Shopping</h3>
                    <h4>Up to <span>30% <i>Off/-</i></span></h4>
                    <div class="wmuSlider example1">
                        <div class="wmuSliderWrapper">
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-wrap">
                                    <div class="banner-info1">
                                        <p>bat + ball + Pawn </p>
                                    </div>
                                </div>
                            </article>
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-wrap">
                                    <div class="banner-info1">
                                        <p>Cycle + stamps + Shuttle + net</p>
                                    </div>
                                </div>
                            </article>
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-wrap">
                                    <div class="banner-info1">
                                        <p> Ludo + Aerro + Racket</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <script src="js/jquery.wmuSlider.js"></script>
                    <script>
                        $('.example1').wmuSlider();
                    </script>
                </div>
            </div>
        </div>
        <!-- //banner -->
        <!-- banner-bottom -->
        <div class="banner-bottom">
            <div class="container">
                <div class="banner-bottom-grids">
                    <div class="banner-bottom-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                        <div class="grid">
                            <figure class="effect-julia">
                                <img src="image/badminton.jpg" alt=" " class="img-responsive" />
                                <figcaption>
                                    <h3>Sport <span>Plante</span><i> in online shopping</i></h3>
                                    <div>
                                        <p>Games is a part of life </p>
                                        <p>Life is nothing Withot game </p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="banner-bottom-grid-left1 animated wow slideInUp" data-wow-delay=".5s">
                        <div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
                            <div class="banner-bottom-grid-left-grid1">
                                <img src="image/swimming.jpg" alt=" " class="img-responsive" />
                            </div>
                            <div class="banner-bottom-grid-left1-pos">
                                <p>That's Fun Game</p>
                            </div>
                        </div>
                        <div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
                            <div class="banner-bottom-grid-left-grid1">
                                <img src="image/Chess_01.jpg" alt=" " class="img-responsive" />
                            </div>
                            <div class="banner-bottom-grid-left1-position">
                                <div class="banner-bottom-grid-left1-pos1">
                                    <p>Latest New Collections</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-bottom-grid-right animated wow slideInRight" data-wow-delay=".5s">
                        <div class="banner-bottom-grid-left-grid grid-left-grid1">
                            <div class="banner-bottom-grid-left-grid1">
                                <img src="image/Basketball_.jpg" alt=" " class="img-responsive" />
                            </div>
                            <div class="grid-left-grid1-pos">
                                <p>top and classic designs <span>2021 Collection</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //banner-bottom -->
        <!-- collections -->
        <div class="new-collections">
            <div class="container">
                <h3 class="animated wow zoomIn" data-wow-delay=".5s">New Collections</h3>
                <p class="est animated wow zoomIn" data-wow-delay=".5s">If something stands between you and your success, move it. Never be denied.</p>
                <div class="new-collections-grids">
                    <div class="col-md-3 new-collections-grid">
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="single.php?cat=3" class="product-image"><img src="image/F-1.jpg" alt=" "
                                        class="img-responsive" /></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="single.php?cat=3">Quick View</a>
                                </div>
                            </div>
                            <h4><a href="single.php?cat=3"> NIVIA Country Colour (Italia) Football - Size: 5</a></h4>
                            <!-- <p>Vel illum qui dolorem eum fugiat.</p> -->
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p><span class="item_price">₹272 </span><a class="item_add"
                                        href="cart.php?id=3">add to cart </a></p>
                            </div>
                        </div>
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="single.php?cat=71" class="product-image"><img src="image/Tt-3.jpg" alt=" "
                                        class="img-responsive" /></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="single.php?cat=71">Quick View</a>
                                </div>
                            </div>
                            <h4><a href="single.php?cat=71">Cktech New Sport Item Table Tennis, Tennis Racket Red, Black Table Tennis(Racket, Ball)</a></h4>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p><span class="item_price">₹549</span><a class="item_add"
                                        href="cart.php?id=71">add to cart </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 new-collections-grid">
                        <div class="new-collections-grid1 new-collections-grid1-image-width animated wow slideInUp"
                            data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="single.php?cat=105" class="product-image"><img src="image/Car-9.jpg" alt=" "
                                        class="img-responsive" /></a>
                                <div class="new-collections-grid1-image-pos new-collections-grid1-image-pos1">
                                    <a href="single.php?cat=105">Quick View</a>
                                </div>
                                <div class="new-one">
                                    <p>New</p>
                                </div>
                            </div>
                            <h4><a href="single.php?cat=105">KOXTONS - Carrom Board Full Size ( Super ) With STRICKER & Accessories</a></h4>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p><span class="item_price">₹1580</span><a class="item_add"
                                        href="cart.php?id=105">add to cart </a></p>
                            </div>
                        </div>
                        <div class="new-collections-grid-sub-grids">
                            <div class="new-collections-grid1-sub">
                                <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="new-collections-grid1-image">
                                        <a href="single.php?cat=87" class="product-image"><img src="image/H-7.jpg" alt=" "
                                                class="img-responsive" /></a>
                                        <div class="new-collections-grid1-image-pos">
                                            <a href="single.php?cat=87">Quick View</a>
                                        </div>
                                    </div>
                                    <h4><a href="single.php?cat=87">Rioff Wooden Hockey Sticks For Men And Women Practice And Beginner Level</a></h4>
                                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                                        <p><span class="item_price">₹329</span><a class="item_add"
                                                href="cart.php?id=87">add to cart </a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="new-collections-grid1-sub">
                                <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                                    <div class="new-collections-grid1-image">
                                        <a href="single.php?cat=47" class="product-image"><img src="image/Cr-8.jpg" alt=" "
                                                class="img-responsive" /></a>
                                        <div class="new-collections-grid1-image-pos">
                                            <a href="single.php?cat=47">Quick View</a>
                                        </div>
                                    </div>
                                    <h4><a href="single.php?cat=47">Ugam Creation Plastic Ball Bat Toy, Cricket Kit For Kids (Red-Color May Vary)</a></h4>
                                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                                        <p><span class="item_price">₹349</span><a class="item_add"
                                                href="cart.php?id=47">add to cart </a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-3 new-collections-grid">
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="single.php?cat=23" class="product-image"><img src="image/L-4.jpg" alt=" "
                                        class="img-responsive" /></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="single.php?cat=23">Quick View</a>
                                </div>
                            </div>
                            <h4><a href="single.php?cat=23">Dravya Sales® Ludo Snake Ladder Board Game </a></h4>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p><span class="item_price">₹349</span><a class="item_add"
                                        href="cart.php?id=23">add to cart </a></p>
                            </div>
                        </div>
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="single.php?cat=65" class="product-image"><img src="image/Bo-1.jpg" alt=" "
                                        class="img-responsive" /></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="single.php?cat=65">Quick View</a>
                                </div>
                            </div>
                            <h4><a href="single.php?cat=65">Bowling Set Plastic 6 Pins 1 Balls Large Bowling Toy For Kids (With Free Two Duck Keychains)</a></h4>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p><span class="item_price">₹890</span><a class="item_add"
                                        href="cart.php?id=65">add to cart </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //collections -->
        <!-- new-timer -->
        <div class="timer">
            <div class="container">
                <div class="timer-grids">
                    <div class="col-md-8 timer-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                        <h3><a href="single.php?cat=101">Slyk Sterling Professional Aluminium Baseball</a></h3>
                        
                        <div class="new-collections-grid1-left simpleCart_shelfItem timer-grid-left-price">
                            <p><span class="item_price">₹1199</span></p>
                            <h4>SLYK Aluminum Youth Baseball Bat made from high grade Aluminum alloy for faster swing speed. ultra-thin handle with All Sports grip for increased stability and accuracy, Ideal for all levels of baseball players from practice to matches.</h4>
                            <p><a class="item_add timer_add" href="cart.php?id=101">add to cart </a></p>
                        </div>
                        <div id="counter"> </div>
                        <script src="js/jquery.countdown.js"></script>
                        <script src="js/script.js"></script>
                    </div>
                    <div class="col-md-4 timer-grid-right animated wow slideInRight" data-wow-delay=".5s">
                        <div class="timer-grid-right1">
                            <img src="image/Bas-9.jpg" alt=" " class="img-responsive" />
                            <div class="timer-grid-right-pos">
                                <h4>Special Offer</h4>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //new-timer -->
        <!-- collections-bottom -->
        <div class="collections-bottom">
            <div class="container">
                <div class="collections-bottom-grids">
                    <div class="collections-bottom-grid animated wow slideInLeft" data-wow-delay=".5s">
                        <h3>45% Offer For <span>Hockey</span></h3>
                    </div>
                </div>
                <div class="newsletter animated wow slideInUp" data-wow-delay=".5s">
                    <h3>Newsletter</h3>
                    <p>Join us now to get all news and special offers.</p>
                    <form method = "POST">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        <input type="email" name = "email" maxlength="20" value="Enter your email address" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Enter your email address';}" required="">
                        <input type="submit" value="Join Us">
                    </form>
                </div>
            </div>
        </div>
        <!-- //collections-bottom -->
        <!-- footer -->
        <?php
            require ('Include/footer.php');
        ?>
        <!-- //footer -->
    </body>

</html>