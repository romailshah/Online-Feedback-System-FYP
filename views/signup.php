
<?php
if(isset($_POST['signup'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $repassowrd=$_POST['re_pass'];
    $email = $password = null;
    if(!empty($_POST['email'])){
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $check_user = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $check_user->execute([$_POST['email']]);
            if($check_user->rowCount() == 0){
                $email = $_POST['email'];
            }else{
                $email_error = 'Email is already taken try different one.';
            }
        }else{
            $email_error = 'Email is not valid.';
        }
    }else{
        $email_error = 'Field is not to be empty.';
    }

    if(!empty($_POST['pass'])){
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    }else{
        $password_error = 'Field is not to be empty Or Password Mismatched.';
    }

    if(isset($name)&& !empty($name) && isset($email)&& !empty($email) && isset($password)&& !empty($password)){
        $check_user = $pdo->prepare("INSERT INTO users (fullname, email, password, role) VALUES (?, ?, ?, ?)");
        $check_user->execute([$name, $email, $password, 'teacher']);
        header("Location: login.php");
    }


}

?>
<div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <h3>Online Feedback System</h3>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="assets/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="?page=signin" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
</div>