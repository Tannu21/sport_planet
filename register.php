<?php
    $showAlert = false;
    $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'Include/dbconnect.php';

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists = false;

    // Check whether the this fname,lname nad email is exists
    $existSql = "SELECT * FROM `registetion` WHERE fname = '$fname' AND lname = '$lname' AND email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistsRows = mysqli_num_rows($result);

    if ($numExistsRows > 0){
        // $exists = true;
        $showError = "<script>alert('Username or Email is Already Exists Please try Different Username or Email to registetion')</script>";
    }
    else{
        $exists = false;
        if ($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `registetion` (`id`, `fname`, `lname`, `email`, `password`, `dateandtime`) VALUES (NULL,'$fname', '$lname', '$email', '$hash', CURRENT_TIMESTAMP())";
            $result = mysqli_query($conn, $sql);

            if($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "<script>alert('Password do not match')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <?php
        require ('Include/head.php');
    ?>
    <body>
        <?php 
        if($showAlert){
            echo "<script>alert('Registration Success');window.location='login.php';</script>";
        }
        if($showError){
            echo "<script>alert('Registration Failed')</script>$showError";
        }?>
        <?php
            require ('Include/header.php');
        ?>
        <!-- register -->
        <div class="register">
            <div class="container">
                <h3 class="animated wow zoomIn" data-wow-delay=".5s">Register Here</h3>
                <p class="est animated wow zoomIn" data-wow-delay=".5s">If something stands between you and your success, move it. Never be denied.</p>
                <div class="login-form-grids">
                    <h6 class="animated wow slideInUp" data-wow-delay=".5s">Register information</h6>
                    <form class="animated wow slideInUp" data-wow-delay=".5s" method="POST">
                        <input type="text" maxlength="10" placeholder="First Name" id="fname" name="fname" required=" ">
                        <input type="text" maxlength="15" placeholder="Last Name" id="lname" name="lname" required=" ">
                        <input type="email" maxlength="20" placeholder="Email Address" id="email" name="email"
                            required=" ">
                        <input type="password" maxlength="15" placeholder="Password" id="password" name="password" required=" ">
                        <input type="password" maxlength="15" placeholder="Password Confirmation" id="cpassword"
                            name="cpassword" required=" ">
                        
                        <input type="submit" name="submit" value="submit">
                    </form>
                </div>
                <div class="register-home animated wow slideInUp" data-wow-delay=".5s">
                    <a href="login.php">Login</a>
                </div>
            </div>
        </div>
        <!-- //register -->
        <!-- footer -->
    <?php
            require ('Include/footer.php');
        ?>
        <!-- //footer -->
    </body>

</html>
