<?php
if (isset($_POST['btn-std'])){
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $name=$_POST['name'];
    }else{
        $name_msg='<div class="alert alert-danger">Field is Empty</div>';
    }
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email=$_POST['email'];
    }else{
        $email_msg='<div class="alert alert-danger">Field is Empty</div>';
    }

    if(isset($_POST['password']) && !empty($_POST['password'])){
        if($_POST['retype_password'] == $_POST['password']){
            $password=$_POST['password'];
            $password_encrypt=md5($password);
        }else
            $password_msg='<div class="alert alert-danger">Password Does Not Matched!</div>';

    }else{
        $password_msg='<div class="alert alert-danger">Field is Empty</div>';
    }

    if(isset($name) && !empty($name) && isset($email) && !empty($email) && isset($password_encrypt) && !empty($password_encrypt)){
        $check_std="SELECT * FROM `admin` WHERE email= '$email'";
        $result = mysqli_query($conn, $check_std);
        if (mysqli_num_rows($result) > 0) {
            $msg='<div class="alert alert-danger">User Already Exist</div>';
        }else{
            ///////
            /// INSERT ADMIN
           $insert_std = "INSERT INTO `admin` (`name`, `email`, `password`,`status`)
            VALUES ('$name', '$email', '$password_encrypt', '1')";

            if (mysqli_query($conn, $insert_std)) {
                $msg='<div class="alert alert-success">Admin is Added Successfully!</div>';
            } else {
                echo "Error:" .mysqli_error($conn);
            }

        }
    }



}// main if
?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10" style="margin-top: 80px;">

                <div class="card m-b-30">
                    <div class="card-body">
                        <?= @$msg ?>
                        <form action="" method="post">
                        <h4 class="mt-0 header-title">Add New Admin</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="Full Name"  name="name" class="form-control">
                                <?= @$name_msg ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" placeholder="Email" class="form-control pd-r-80">
                                <?= @$email_msg ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-url-input" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" placeholder="Password" class="form-control pd-r-80">
                                <?= @$password_msg ?>
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="example-url-input" class="col-sm-2 col-form-label">Retype Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="retype_password" placeholder="Password" class="form-control pd-r-80">
                                    <?= @$password_msg ?>
                                </div>
                            </div>
                        <div class="form-group row justify-content-center">
                            <button type="submit" name="btn-std" class="btn btn-lg btn-facebook m-b-10 m-l-10 waves-effect waves-light">
                                <i class="fa fa-save m-r-5"></i>Save
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->

        </div> <!-- end row -->
    </div>
</div>
<br>