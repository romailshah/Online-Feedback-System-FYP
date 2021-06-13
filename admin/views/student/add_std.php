<?php
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
    if(isset($name) && !empty($name) && isset($email) && !empty($email) && isset($password_encrypt) && !empty($password_encrypt) && isset($program) && !empty($program)
        && isset($session) && !empty($session) && isset($semester) && !empty($semester)){
        $check_std="SELECT * FROM `students` WHERE email= '$email'";
        $result = mysqli_query($conn, $check_std);
        if (mysqli_num_rows($result) > 0) {
            $msg='<div class="alert alert-danger">User Already Exist</div>';
        }else{
            ///////
            /// INSERT STUDENT
            $insert_std = "INSERT INTO students (`name`, `email`, `password`, `class_id`, `semester`, `session`, `status`, `reg_no`)
            VALUES ('$name', '$email', '$password_encrypt', '$program', '$semester', '$session', '1', '$registration')";

            if (mysqli_query($conn, $insert_std)) {
                $msg='<div class="alert alert-success">Student is Added Successfully!</div>';
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
                            <h4 class="mt-0 header-title">Add New Student</h4>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Full Name"  name="name" class="form-control" pattern="[A-Za-z ]+">
                                    <?= @$name_msg ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Reg No#</label>
                                <div class="col-sm-10">
                                    <input type="text" name="registration" placeholder="Registration Number" class="form-control pd-r-80" pattern="[A-Za-z0-9- ]+" title="Please Valid Reg.No like (BSIT-023R16-00)">
                                    <?= @$registration_msg ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" placeholder="Email" class="form-control pd-r-80" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$">
                                    <?= @$email_msg ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-url-input" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" placeholder="Password" class="form-control pd-r-80" pattern=".{6,}" title="Six Or More Character">
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
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                        <option value="5th">5th</option>
                                        <option value="6th">6th</option>
                                        <option value="7th">7th</option>
                                        <option value="8th">8th</option>
                                    </select>
                                    <?= @$semester_msg ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="session" class="col-sm-2 col-form-label">Session</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="session" placeholder="2017-2021"  title="Please Use Valid Format like (2016-2020)"/>
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
<br>