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
            $password=$_POST['password'];
            $password_encrypt=md5($password);
        }else
            $password_msg='<div class="alert alert-danger">Password Does Not Matched!</div>';

    }else{
        $password_msg='<div class="alert alert-danger">Field is Empty</div>';
    }

    if(isset($_POST['program']) && !empty($_POST['program'])){
        $program=$_POST['program'];
    }else{
        $program_msg='<div class="alert alert-danger">Field is Empty</div>';
    }

    if(isset($_POST['session']) && !empty($_POST['session'])){
        $session=$_POST['session'];
    }else{
        $session_msg='<div class="alert alert-danger">Field is Empty</div>';
    }
    if(isset($_POST['semester']) && !empty($_POST['semester'])){
        $semester=$_POST['semester'];
    }else{
        $semester_msg='<div class="alert alert-danger">Field is Empty</div>';
    }
    if(isset($name) && !empty($name) && isset($email) && !empty($email) &&  isset($program) && !empty($program)
        && isset($session) && !empty($session) && isset($semester) && !empty($semester)){
        if(!empty($_POST['password']) && !empty($_POST['retype_password']) ) {
            ///////
            /// UPDATE STUDENT
           echo $update_std1 = "UPDATE students SET `name`='$name',`email`='$email',`password`='$password_encrypt', `reg_no`='$registration',`class_id`='$program',`semester`='$semester',`session`='$session',`status`='1' WHERE id='$id'";

            if (mysqli_query($conn, $update_std1)) {
                $msg = '<div class="alert alert-success">Student Details are Updated Successfully!</div>';
            } else {
                echo "Error:" . mysqli_error($conn);
            }
        }
        else {
          echo  $update_std2 = "UPDATE students SET `name`='$name',`email`='$email', `reg_no`='$registration',`class_id`='$program',`semester`='$semester',`session`='$session',`status`='1' WHERE id='$id'";

            if (mysqli_query($conn, $update_std2)) {
                $msg = '<div class="alert alert-success">Student Details are Updated Successfully!</div>';
            } else {
                echo "Error:" . mysqli_error($conn);
            }
        }

    }

}// main if
?>
<?php

$sql = "SELECT * FROM `students` WHERE `id`='$id'";
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
                                    <h4 class="mt-0 header-title">Edit Student</h4>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Full Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="Full Name" value="<?= $row['name'] ?>"  name="name" class="form-control" pattern="[A-Za-z ]+">
                                            <?= @$name_msg ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-sm-2 col-form-label">Reg No#</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="registration" value="<?= $row['reg_no'] ?>" placeholder="Registration Number" class="form-control pd-r-80" pattern="[A-Za-z0-9- ]+" title="Please Valid Reg.No like (BSIT-023R16-00)">
                                            <?= @$registration_msg ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" value="<?= $row['email'] ?>" placeholder="Email" class="form-control pd-r-80" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$">
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
                                        <label for="program" class="col-sm-2 col-form-label">Program</label>
                                        <div class="col-sm-10">
                                            <select name="program" class="form-control">
                                                <option label="Choose one" data-select2-id="3"></option>

                                                <?php
                                                $q_class="SELECT * FROM `class`";
                                                $res_class = mysqli_query($conn, $q_class);
                                                if (mysqli_num_rows($res_class) > 0) {
                                                    // output data of each row
                                                    $x=0;
                                                    while($row_class = mysqli_fetch_assoc($res_class)) {
                                                        $x=$x+1;
                                                        ?>
                                                       <option value="<?= $row_class['id'] ?>"><?= $row_class['c_name'] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </select>
                                            <?= @$program_msg ?>
                                        </div><!-- col -->
                                    </div>

                                    <div class="form-group row">
                                        <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                        <div class="col-sm-10">
                                            <select  name="semester" class="form-control">
                                                <option label="Choose one" data-select2-id="6"></option>
                                                <option value="1st" <?php if($row['semester']=="1st"){ echo "selected";} ?>>1st</option>
                                                <option value="2nd" <?php if($row['semester']=="2nd"){ echo "selected";} ?>>2nd</option>
                                                <option value="3rd" <?php if($row['semester']=="3rd"){ echo "selected";} ?>>3rd</option>
                                                <option value="4th" <?php if($row['semester']=="4th"){ echo "selected";} ?>>4th</option>
                                                <option value="5th" <?php if($row['semester']=="5th"){ echo "selected";} ?>>5th</option>
                                                <option value="6th" <?php if($row['semester']=="6th"){ echo "selected";} ?>>6th</option>
                                                <option value="7th" <?php if($row['semester']=="7th"){ echo "selected";} ?>>7th</option>
                                                <option value="8th" <?php if($row['semester']=="8th"){ echo "selected";} ?>>8th</option>
                                            </select>
                                            <?= @$semester_msg ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="session" class="col-sm-2 col-form-label">Session</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="<?= $row['session'] ?>" name="session" placeholder="2016-2020">
                                            <?= @$session_msg ?>
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
        <?php
    }
}
?>
<br>