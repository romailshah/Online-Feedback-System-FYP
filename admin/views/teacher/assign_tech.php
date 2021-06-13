<?php
if (isset($_POST['btn-std'])) {



    if (isset($_POST['class_id']) && !empty($_POST['class_id'])) {
       echo  $class_id = $_POST['class_id'];
    } else {
        $class_id_msg = '<div class="alert alert-danger">Field is Empty</div>';
    }
    if (isset($_POST['teacher_id']) && !empty($_POST['teacher_id'])) {
        $teacher_id = $_POST['teacher_id'];
    } else {
        $teacher_id_msg = '<div class="alert alert-danger">Field is Empty</div>';
    }
    if(isset($_POST['semester']) && !empty($_POST['semester'])){
        $semester=$_POST['semester'];
    }else{
        $semester_msg='<div class="alert alert-danger">Field is Empty</div>';
    }

    if (isset($class_id) && !empty($class_id) && isset($teacher_id) && !empty($teacher_id)) {

        $check_std="SELECT * FROM `assign_teacher` WHERE `class_id`= '$class_id' AND `teacher_id` = '$teacher_id' AND `semester`= '$semester'";
        $result = mysqli_query($conn, $check_std);
        if (mysqli_num_rows($result) > 0) {
            $msg='<div class="alert alert-danger">Class Already Assigned To the Selected Teacher</div>';
        }else {
            ///////
            /// INSERT TEACHER ASSIGN CLASS
            $insert_tech = "INSERT INTO assign_teacher (`class_id`, `teacher_id`, `semester`)
            VALUES ('$class_id', '$teacher_id', '$semester')";

            if (mysqli_query($conn, $insert_tech)) {
                $msg = '<div class="alert alert-success">Teacher Assigned Successfully!</div>';
            } else {
                $msg = "Error:" . mysqli_error($conn);
            }
        }
    }
}
?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10" style="margin-top: 80px;">
                <div class="card m-b-30">
                    <div class="card-body">
                        <?= @$msg ?>
                        <form action="" method="post">
                            <h4 class="mt-0 header-title">Assign Teacher To Class</h4>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Teacher</label>
                                <div class="col-sm-10 col-md-4">
                                    <select class="form-control" name="teacher_id" id="">
                                        <option  value="">Select Teacher</option>
                                        <?php
                                        $fetch_teacher="SELECT * FROM teachers";
                                        $fetch_tech_res = mysqli_query($conn, $fetch_teacher);

                                        if (mysqli_num_rows($fetch_tech_res) > 0):
                                        // output data of each row
                                        $x=0;
                                        while($row = mysqli_fetch_assoc($fetch_tech_res)):
                                        ?>
                                        <option  value="<?=$row['id'] ?>"><?=$row['name'] ?></option>

                                        <?php
                                        endwhile;
                                        endif;
                                        ?>

                                    </select>
                            <?= @$teacher_id_msg ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Class</label>
                                <div class="col-sm-10 col-md-4">
                                    <select class="form-control" name="class_id" id="">
                                        <option  value="">Select Class</option>
                                        <?php
                                        $fetch_class="SELECT * FROM class";
                                        $fetch_class_res = mysqli_query($conn, $fetch_class);
                                        if (mysqli_num_rows($fetch_class_res) > 0):
                                            // output data of each row
                                            $x=0;
                                            while($row = mysqli_fetch_assoc($fetch_class_res)):
                                                ?>
                                                <option  value="<?=$row['id'] ?>"><?=$row['c_name'] ?></option>
                                            <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </select>
                                    <?= @$class_id_msg ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-10 col-md-4">
                                    <select  name="semester" class="form-control">
                                        <option  value="">Select Semester</option>
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
                            <div class="form-group row justify-content-left">
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
