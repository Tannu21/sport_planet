<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");  
    exit;
}
?>
<?php
    if(isset($_SESSION['email'])){
        
    include 'Include/dbconnect.php';
    $email=$_SESSION['email'];
	$id=$_REQUEST['id'];
    $qry = "SELECT * FROM `add_products` WHERE p_id = '$id'";
    $result = mysqli_query($conn,$qry);
?>
<!DOCTYPE html>
<html>
    <?php
        require('Include/head.php');
    ?>

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
                <li class="active">Add to cart Conform</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div>
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Add to cart Conform</h3> <br> <br> <br>
            <table class="responstable animated wow zoomIn" data-wow-delay=".5s">
                <tr>
                    <th><span>Product Name</span></th>
                    <th>Category Name</th>
                    <th>Img</th>
                    <th>Highlight</th>
                    <th>Discription</th>
                    <th>Product price</th>
                </tr>
                <tr>
                    <?php 
                        include 'Include/dbconnect.php';
                        $qry = "SELECT * FROM `add_products` WHERE p_id = '$id'";
                        $result = mysqli_query($conn,$qry);
                            while($row = mysqli_fetch_array($result)){
                                $p_name =$row['p_name'];
                                $s_category = $row['s_category'];
                                $upload_picture = $row['upload_picture'];
                                $p_price = $row['p_price'];
                                $highlight = $row['highlight'];
                                $discription = $row['discription'];
                            
                                echo "<tr>";
				    				echo "<td align='center' valign='top' with='5%'><font size='4' color='black'>$row[p_name]</font></td>";
				    				echo "<td align='center' valign='top' with='5%'><font size='4' color='black'>$row[s_category]</font></td>";
				    				echo "<td align='center' valign='top' with='80%'><img class='img-responsive' style='margin: 0 auto;' src='admin/Products_images/" .$row['9']."' width='70' height='45' /></td>";
				    				echo "<td align='center' valign='top' width='20%'><font size='4' color='black'>$row[highlight]</font><</td>";
				    				echo "<td align='center' valign='top' width='5%'><font size='4' color='black'>$row[discription]</font><</td>";						
				    			    echo "<td align='center' valign='top' width='5%'><font size='4' color='2cacff'>₹$row[p_price]</font></td>";
				    			echo "</tr>";
				        }
		            ?>
                </tr>

            </table>
                <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    include 'Include/dbconnect.php';

                    $email = $_SESSION['email'];
                    // $quantity = $_POST['quantity'];
                    // $qry = "INSERT INTO `cart` (`id`, `email` , 'quantity' , `p_name`, `s_category`, `upload_picture`, `p_price`, `highlight`, `discription`, `dateandtime`) VALUES (NULL, '$email' , '$quantity' , '$p_name', '$s_category', '$upload_picture', '$p_price', '$highlight', '$discription', CURRENT_TIMESTAMP())";
                    $qry = "INSERT INTO `cart` (`id`, `email`, `p_name`, `s_category`, `upload_picture`, `p_price`, `highlight`, `discription`, `dateandtime`) VALUES (NULL, '$email' , '$p_name', '$s_category', '$upload_picture', '$p_price', '$highlight', '$discription', CURRENT_TIMESTAMP())";
                    $sql = mysqli_query($conn,$qry);
                        if($sql){
                            echo"<script>window.location='checkout.php';</script>";	
                        }else{
                            echo "<script>alert('Failed')</script>";
                        }
                    }
                ?>
            <div class="container">
                <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                    <form action="#" method="POST" name="frm" enctype="multipart/form-data" onsubmit="return check(this)">  
                        <input type="submit" value="Continue" name="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}else{
    echo"<script> window.location='home.php';</script>";
}
?>
    <!-- footer -->
    <?php
            require ('Include/footer.php');
    
        ?>
    <!-- //footer -->
</body>

</html>