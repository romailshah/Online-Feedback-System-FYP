<?php
if(isset($_POST['signin'])) {
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $type=$_POST['type'];
    if($type=="student") {
        if (isset($email) && !empty($email) && isset($pass) && !empty($pass)) {
            $enc_pass=md5($pass);
            $select_sql = "SELECT * FROM students WHERE email='$email' AND password= '$enc_pass'";
            $res = mysqli_query($conn, $select_sql);
           
            if (mysqli_num_rows($res) >= 1) {
                while($row = mysqli_fetch_assoc($res)) {

                    $_SESSION['user'] = $row;
                }
                var_dump($_SESSION['user']['email']);
           die();

                header("Location: ?page=home");
            }else
                $message="<div class='alert alert-danger'>Email or Password are Wrong.</div>";
        }
    }
    if($type=="teacher") {
        if (isset($email) && !empty($email) && isset($pass) && !empty($pass)) {
            $enc_pass=md5($pass);
                $select_sql = "SELECT * FROM teachers WHERE `email`='$email' AND `password`='$enc_pass'";
                $check_sql = mysqli_query($conn, $select_sql);
            if (mysqli_num_rows($check_sql) > 0) {
                while($row = mysqli_fetch_assoc($check_sql)) {

                    $_SESSION['teacher'] = $row;
                }
                header("Location: ?page=home");
            }else
                $message="<div class='alert alert-danger'>Email or Password are Wrong.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NFC Feedback System</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="admin/assets/login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="admin/assets/login/css/style.css">
</head>
<body>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Login</h2>
                    <h3 class="form-title">NFC Feedback System</h3>
                    <p>Student & Teacher Login</p>
                    <form method="POST" class="register-form" id="register-form">

                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <select name="type" id="" class="form-control">
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                            </select>
                        </div>
                        <?= @$message ?>

                        <div class="form-group form-button">
                            <input type="submit" name="signin"  class="form-submit" value="Login"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="admin/assets/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="?page=signup" class="signup-image-link">Forget Password?</a>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- JS -->
<script src="admin/assets/login/vendor/jquery/jquery.min.js"></script>
<script src="admin/assets/login/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>