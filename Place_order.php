<?php
session_start();

if($_SESSION['loggedin']!=true){
    header("location: login.php");  
    exit;
}
?>
<script language="javascript">
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Please Enter Only  Number");
            return false;
        }
    }
</script>
<?php
    if(isset($_SESSION['email'])){
        
    include 'Include/dbconnect.php';
    $email=$_SESSION['email'];
	$id=$_REQUEST['id'];
    $qry = "SELECT * FROM `cart` WHERE id = '$id'";
    $result = mysqli_query($conn,$qry);
?>
<!DOCTYPE html>
<html>
<?php
        require('Include/head.php')
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
                <li class="active">Place Order</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Place Order</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt
                in culpa qui officia
                deserunt mollit anim id est laborum.</p>
            <div class="login-form-grids animated wow slideInUp" style="width: 75vw;" data-wow-delay=".5s">
                <div class="conatiner">
                    <form method="POST">
                    <?php 
                        include 'Include/dbconnect.php';
                        $qry = "SELECT * FROM `cart` WHERE id = '$id'";
                        $result = mysqli_query($conn,$qry);
                            while($row = mysqli_fetch_array($result)){
                                $p_name =$row['p_name'];
                                $upload_picture = $row['upload_picture'];
                                $p_price = $row['p_price'];
                    ?>
                        <div class="form-group">
                            <label for="Product Name">Product Name</label>
                            <input disabled type="text" class="form-control" value="<?php echo $row['p_name'];?>" maxlength="255" onkeypress="return isChar(event)"
                                id="" name="p_name" required=" " placeholder="Product Name">
                        </div>
                        <div class="form-group col-md-6">
                                <label for="Product Price">Product Price</label>
                                <input disabled type="text" class="form-control" maxlength="10" value="₹<?php echo $row['p_price'];?>"
                                    onkeypress="return isNumber(event)" id="" name="p_price" required=" "
                                    placeholder="Product Price">
                        </div>
                        <div class="form-group">
                            <?php echo "<img class='img-responsive' src='admin/Products_images/" .$row['upload_picture']."'width='100px'>";?>
                        </div>
                    <?php } ?>
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" maxlength="255" onkeypress="return isChar(event)"
                                id="" name="address" required=" " placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="Address 2">Address 2</label>
                            <input type="text" class="form-control" maxlength="255" onkeypress="return isChar(event)"
                                id="" name="address2" required=" " placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <label for="State">State</label>
                            <select id="" name="state" required=" " class="form-control">
                                <option selected>Choose...</option>
                                <option value="Gujarat (GJ)">Gujarat (GJ)</option>
                                <option value="Goa (GOA)">Goa (GOA)</option>
                                <option value="National Capital Territory of Delhi (DL)">National Capital Territory
                                    of Delhi (DL)</option>
                                <option value="Rajasthan (RJ)">Rajasthan (RJ)</option>
                            </select> <br>
                            <div class="form-group col-md-6">
                                <label for="City">City</label>
                                <input type="text" class="form-control" maxlength="10" placeholder="City"
                                    onkeypress="return isChar(event)" id="" name="city" required=" ">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Pin Code">Pin Code</label>
                                    <input type="text" class="form-control" maxlength="6"
                                        onkeypress="return isNumber(event)" id="" name="pincode" required=" "
                                        placeholder="Pin Code">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Mobile Number">Mobile Number</label>
                                    <input type="text" class="form-control" maxlength="10"
                                        onkeypress="return isNumber(event)" id="" name="number1" required=" "
                                        placeholder="10-digit Mobile Number">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Alternate Number">Alternate Number</label>
                                    <input type="text" class="form-control" maxlength="10"
                                        onkeypress="return isNumber(event)" id="" name="number2" required=" "
                                        placeholder="10-digit Mobile Number">
                                </div>
                                <div class="form-group row">
                                    <label for="Payment"
                                        class="col-sm-2 col-form-label col-form-label-sm">Payment</label>
                                    <div class="col-sm-10">
                                        <fieldset>
                                            <select id="disabledSelect" class="form-control"
                                                onkeypress="return isChar(event)" id="" name="payment" required=" ">
                                                <option value="Pay on delivery">Pay on delivery</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Place order">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'Include/dbconnect.php';

    $email = $_SESSION["email"];
    $address = $_POST["address"];
    $address2 = $_POST["address2"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $pincode = $_POST["pincode"];
    $number1 = $_POST["number1"];
    $number2 = $_POST["number2"];
    $payment = $_POST["payment"];
    
    $sql = "INSERT INTO `place_order` (`o_id`, `email`, `p_name` , `p_price` , `upload_picture` , `address`, `address2`, `state`, `city`, `pincode`, `number1`, `number2`, `payment`, `dateandtime`) VALUES (NULL,  '$email' , '$p_name' , '$p_price' , '$upload_picture' , '$address', '$address2', '$state', '$city', '$pincode', '$number1', '$number2', '$payment', CURRENT_TIMESTAMP())";

    $result = mysqli_query($conn, $sql);

	if($result){
        $a = "DELETE from cart WHERE `cart`.`id` = '$id'";
        $b = mysqli_query($conn,$a);
		echo "<script>alert('Your Order place succesfully');window.location ='Thankyou_page.php'; </script>";
	}else{
		echo "<script>alert('Your Order cant placeed Please try again')</script>";
	}

}
?>
    <?php 
        }else{
        echo"<script> window.location='home.php';</script>";
        } 
    ?>
    <!-- //login -->
    <!-- footer -->
    <?php
            require ('Include/footer.php');
        ?>
    <!-- //footer -->
</body>

</html>