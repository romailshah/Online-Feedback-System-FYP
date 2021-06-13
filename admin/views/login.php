<?php
if(isset($_POST['signin'])) {
    $email=$_POST['email'];
    $pass=$_POST['pass'];
        if (isset($email) && !empty($email) && isset($pass) && !empty($pass)) {
            $enc_pass=md5($pass);
           $select_sql = "SELECT * FROM `admin` WHERE `email` ='$email' AND password='$enc_pass'";
            $check_sql = mysqli_query($conn, $select_sql);
            if (mysqli_num_rows($check_sql) > 0) {
                while($row = mysqli_fetch_assoc($check_sql)) {

                    $_SESSION['admin'] = $row;
                }

                header("Location: index.php?page=dashboard");
            }else
                $message="<div class='alert alert-danger' style='text-align: center; align-items: center;'>username or Password are Wrong.</div>";
        }
    }
?>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <h3 class="text-center mt-0 m-b-15">
                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo.jpg" width="250"  alt="logo"></a>
            </h3>
            <?= @$message ?>
            <div class="row">
                <div class="col text-center">
                    <h6><b>NFC Feedback System <br><br> Admin Login</b></h6>
                </div>
            </div>
            <div class="p-3">
                <form class="form-horizontal m-t-20" method="post">

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="text" name="email" required="" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" name="pass" type="password" required="" placeholder="Password"pattern=".{6}" title="Six or more characters" />
                        </div>
                    </div>
                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button name="signin" class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>