<?php
@$id=$_GET['id'];
if (isset($_POST['btn-std'])){
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $name=$_POST['name'];
    }else{
        $name_msg='<div class="alert alert-danger">Field is Empty</div>';
    }
    if(isset($_POST['registration']) && !empty($_POST['registration'])){
        $registration=$_POST['registration'];
    }else{
        $registration_msg='<div class="alert alert-danger">Field is Empty</div>';
    }

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email=$_POST['email'];
    }else{
        $email_msg='<div class="alert alert-danger">Field is Empty</div>';
    }

    if(isset($_POST['password']) && !empty($_POST['password'])){
        if($_POST['retype_password'] == $_POST['password']){
          echo  $password=$_POST['password'];
          echo  $password_encrypt=md5($password);
        }else
            $password_msg='<div class="alert alert-danger">Password Does Not Matched!</div>';

    }else{
        $password_msg='<div class="alert alert-danger">Field is Empty</div>';
    }

    if(isset($_POST['department']) && !empty($_POST['department'])){
        $department=$_POST['department'];
    }else{
        $department_msg='<div class="alert alert-danger">Field is Empty</div>';
    }
    if(isset($name) && !empty($name) && isset($email) && !empty($email) &&  isset($department) && !empty($department)){
        if(!empty($_POST['password']) && !empty($_POST['retype_password']) ) {
            ///////
            /// UPDATE STUDENT
            $update_std = "UPDATE teachers SET `name`='$name',`email`='$email',`password`='$password_encrypt', `reg_no`='$registration',`department`='$department' WHERE id= '$id'";
            if (mysqli_query($conn, $update_std)) {
                $msg = '<div class="alert alert-success">Teacher Details are Updated Successfully!</div>';
            } else {
                echo "Error:" . mysqli_error($conn);
            }
        }
        else {
            $update_std = "UPDATE teachers SET `name`='$name',`email`='$email', `reg_no`='$registration',`department`= '$department' WHERE id= '$id'";

            if (mysqli_query($conn, $update_std)) {
                $msg = '<div class="alert alert-success">Teacher Details are Updated Successfully!</div>';
            } else {
                echo "Error:" . mysqli_error($conn);
            }
        }

    }

}// main if
?>
<?php

$sql = "SELECT * FROM `teachers` WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row

    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10" style="margin-top: 80px;">

                        <div class="card m-b-30">
                            <div class="card-body">
                                <?= @$msg ?>
                                <form action="" method="post">
                                    <h4 class="mt-0 header-title">Edit Teacher</h4> <br>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Full Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="Full Name" value="<?= $row['name'] ?>"  name="name" class="form-control" required="">
                                            <?= @$name_msg ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-sm-2 col-form-label">Reg No#</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="registration" value="<?= $row['reg_no'] ?>" placeholder="Registration Number" class="form-control pd-r-80" required="">
                                            <?= @$registration_msg ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" value="<?= $row['email'] ?>" placeholder="Email" class="form-control pd-r-80" required="">
                                            <?= @$email_msg ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password"  name="password" placeholder="Password" class="form-control pd-r-80">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-sm-2 col-form-label">Retype Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="retype_password" placeholder="Password" class="form-control pd-r-80">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="program" class="col-sm-2 col-form-label">Department</label>
                                        <div class="col-sm-10">
                                            <select name="department" class="form-control">
                                                <option label="Choose one" data-select2-id="3"></option>
                                                <option value="Computer Science" <?php if($row['department']=="Computer Science"){ echo "selected";} ?>>Computer Science</option>
                                                <option value="Mechanical" <?php if($row['department']=="Mechanical"){ echo "selected";} ?>>Mechanical</option>
                                            </select>
                                            <?= @$department_msg ?>
                                        </div><!-- col -->
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
        <?php
    }
}
?>
<br>