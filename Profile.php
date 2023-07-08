<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
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
    include 'Include/dbconnect.php';
    $email=$_REQUEST['email'];
    $qry = "SELECT * FROM `registetion` WHERE `email` = '$email'";
    // $qry = "SELECT * FROM `registetion`";
    $run = mysqli_query($conn,$qry);
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'Include/dbconnect.php';

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    // $sql = "UPDATE `registetion` SET `fname` = '$fname', `lname` = '$lname' WHERE email = '$email'";
    $sql = "UPDATE `registetion` SET `fname` = '$fname', `lname` = '$lname' WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        echo "<script>alert('Profile update Successfully')</script>";
    }else{
        echo "<script>alert('Profile update Failed')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <?php
        require('Include/head.php')
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
                <li class="active">Profile</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Profile</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">If something stands between you and your success, move it. Never be denied.</p>
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            <form class="animated wow slideInUp" data-wow-delay=".5s" method="POST">
                        <?php
                            include 'Include/dbconnect.php';
                            $qry = "SELECT * FROM `registetion` WHERE `email` = '$email'";
                            // $qry = "SELECT * FROM `registetion`";
                            $run = mysqli_query($conn,$qry);
                            while($row = mysqli_fetch_array($run)){
                        ?>
                        <h6>Profile information</h6>
                        <input type="text" value="<?php echo $row['fname'];?>" maxlength="10" placeholder="First Name" id="fname" name="fname" required=" ">
                        <input type="text" value="<?php echo $row['lname'];?>" maxlength="15" placeholder="Last Name" id="lname" name="lname" required=" ">

                        <h6>Login information</h6>
                        <input disabled type="email" value="<?php echo $row['email'];?>" maxlength="20" placeholder="Email Address" id="email" name="email"
                            required=" ">  
                            <p>You can't change your email</p>
                        <input type="submit" name="submit" value="Save Changes">
                        <?php } ?>
                    </form>
            </div>
        </div>
    </div>
    <!-- //login -->
    <!-- footer -->
    <?php
            require ('Include/footer.php');
        ?>
    <!-- //footer -->
</body>

</html>