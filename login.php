<?php 
include './includes/header.php';?>
<title>Login</title>
<?php
include './database/connect.php';
$msg = '';
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(empty($username) || empty($password)){
        $msg = "Enter username or password";
    }else{
        $sql = "SELECT * FROM `users` WHERE username='$username'";
        if ($result = $conn->query($sql)) {
            $record = $result->fetch_assoc();
            $userID = $record["id"];
            $_SESSION["user_id"] = $userID;
            $pass = $record["password"];
        if ($password != $pass) {
            $msg = "Incorrect username or password";
        } else {
            header("Location: http://localhost/nathanblog/home.php");
            exit();
        }
    }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="form-contain col-md-6 mb-5">
            <div class="logo-container">
                <img src="./static/images/NaBlog_free-file.png" alt="logo" class="auth-logo">
                <!-- <h3>Registration</h3> -->
            </div>
            <form action="" class="p-5 bg-white" method="post">
                <!-- <h2>LOGIN</h2> -->
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-md-12">
                        <label class="text-black" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control password">
                    </div>
                </div>
                <div class="row">
                <div class="text-small form-alert"><?php echo $msg; ?></div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="submit" name="login" value="Login" class="btn btn-primary py-2 px-4 text-white">
                    </div>
                </div>
                <div class="row">
                    <h5 class="text-small">Don't have account? <span><a href="register.php">Sign-up</a></span></h5>
                </div>
            </form>
        </div>
        <div class="col-md-5 side-img" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)),url(./uploads/img_v_1.jpg);"></div>
    </div>
</div>
</body>

</html>