<?php
include './includes/header.php'; ?>
<title>Register</title>
<?php
include './database/connect.php';
$msg = '';
if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm-password"];

    $sql = "INSERT INTO `users`(`username`, `email`, `role`, `password`)  
                VALUES('$username', '$email','Author', '$password')";

    if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
        $msg = "enter all fields";
    } else {
        if ($result = $conn->query("SELECT * FROM users WHERE `email`='$email'")) {
            if ($result->num_rows > 0) {
                echo "user already exists";
            } else {
                if ($password == $confirm) {
                    if ($conn->query($sql)) {
                        echo $sql;
                        header("Location: http://localhost/nathanblog/login.php");
                        exit();
                    }
                } else {
                    echo "password mismatch";
                }
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
            </div>
            <form action="" class="p-5 bg-white" method="post">
                <div class="row form-group">

                    <div class="col-md-12">
                        <label class="text-black" for="email">Username</label>
                        <input type="username" id="username" name="username" class="form-control">
                    </div>
                </div>


                <div class="row form-group">

                    <div class="col-md-12">
                        <label class="text-black" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-md-12">
                        <label class="text-black" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control password">
                    </div>
                </div>
                <div class="row form-group">

                    <div class="col-md-12">
                        <label class="text-black" for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" class="form-control password">
                    </div>
                </div>
                <div class="row">
                    <div class="text-small form-alert"><?php echo $msg; ?></div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="submit" name="register" value="Register" class="btn btn-block btn-primary py-2 px-4 text-white">
                    </div>
                </div>
                <div class="row">
                    <h5 class="text-small">Already have an account? <span><a href="login.php">Login</a></span></h5>
                </div>
            </form>
        </div>
        <div class="col-md-5 side-img" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(./static/images/img-7.jpg);"></div>
    </div>
</div>
</body>

</html>