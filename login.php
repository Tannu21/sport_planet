<?php
    $login = false;
    $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'Include/dbconnect.php';

    $email = $_POST["email"];
    $password = $_POST["password"];

        $sql = "select * from registetion where email = '$email'";
        // $sql = "select * from admin where email = '$email'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            while($row = mysqli_fetch_assoc($result)){
                if(password_verify($password ,$row['password'])){
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    header("location: index.php");
                }
                else{
                    $showError = "<script>alert('Invalid Credentials')</script>";
                }
            }
            
        }
    else{
        $showError = "<script>alert('Invalid Credentials')</script>";
    }

}
?>

<!DOCTYPE html>
<html>
    <?php
        require('Include/head.php')
    ?>
    <body background="image/F-1.jpg" style="no-repeat;">
        <?php 
        if($login){
            echo "<script>alert('Login Success');window.location='index.php';</script>";
        }
        if($showError){
            echo "<script>alert('Login Failled')</script>$showError";
        }?>
        <?php
            require ('Include/header.php');
        ?>
    <!-- login -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Login Form</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">If something stands between you and your success, move it. Never be denied.</p>
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <form method = "POST">
                    <input type="email" placeholder="Email Address" id = "email" name ="email" required=" ">
                    <input type="password" placeholder="Password" id = "password" name ="password" required=" ">
                    <input type="submit" value="Login">
                </form>
            </div>
            <h4 class="animated wow slideInUp" data-wow-delay=".5s">For New People</h4>
            <p class="animated wow slideInUp" data-wow-delay=".5s"><a href="register.php">Register Here</a></p>
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