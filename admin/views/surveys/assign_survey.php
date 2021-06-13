<?php
if (isset($_POST['assign-btn'])){

    if(isset($_POST['test_id']) && !empty($_POST['test_id'])){
        $test_id=$_POST['test_id'];
    }else{
        $test_id_msg='<div class="alert alert-danger"> Test ID Field is Empty</div>';
    }
    if(isset($_POST['class']) && !empty($_POST['class'])){
        $class=$_POST['class'];
    }else{
        $class_msg='<div class="alert alert-danger"> Class Field is Empty</div>';
    }
    if(isset($_POST['sem'])){
        $sem=$_POST['sem'];
    }else{
        $semester_msg='<div class="alert alert-danger"> Semester Field is Empty</div>';
    }if(isset($_POST['teacher_id'])){
        $teacher_id=$_POST['teacher_id'];
    }else{
        $teacher_msg='<div class="alert alert-danger"> Teacher Field is Empty</div>';
    }

    if(isset($test_id) && !empty($test_id)){
        $check_test="SELECT * FROM `assign_test` WHERE `test_id`= '$test_id' AND `teacher_id`='$teacher_id' AND `class_id`='$class' AND semester='$sem'";
        $res_t = mysqli_query($conn, $check_test);
        if (mysqli_num_rows($res_t) > 0) {
            $msg='<div class="alert alert-danger">Survey Already Assigned</div>';
        }else {
        $insert_std = "INSERT INTO `assign_test` (`test_id` , `class_id` , `semester`, `teacher_id`)
            VALUES ('$test_id', '$class', '$sem', '$teacher_id')";
            if (mysqli_query($conn, $insert_std)) {
                $msg = '<div class="alert alert-success">Survey Assigned Successfully!</div>';
            } else {
                $error= "Error:" . mysqli_error($conn);
            }
        }

    }



}// main if
?>
<br><br>
<div class="wrapper">
    <div class="container">

        <!--        Test List-->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Assign an Survey To Class</h4>
                        <?= @$msg ?>
                        <?= @$test_id_msg ?>
                        <?= @$class_msg ?>
                        <?= @$semester_msg ?>
                        
                        
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Semester</th>
                                <th>Teacher</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM `tests`";
                            $res_test= mysqli_query($conn, $sql);

                            if (mysqli_num_rows($res_test) > 0) {
                                // output data of each row
                                $x=0;
                                while($row = mysqli_fetch_assoc($res_test)) {
                                    $x=$x+1;
                                    ?>

                                    <tr>
                                        <td><?= $x ?></td>
                                        <td>

                                            <a href="?page=test_detail&id=<?= $row['id']?>"><?= $row['name'] ?></a>
                                        </td>
                                        <form action="" name="fm" method="post">
                                        <td>
                                            <select name="class" class="form-control" id="">
                                            <option value="">Select Class</option>
                                                <?php
                                                $class_res=getclass("all");
                                                while($class_row=mysqli_fetch_assoc($class_res)):
                                                ?>
                                                <option value="<?php echo $class_row['id'] ?>"><?= $class_row['c_name'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            
                                        </td>
                                        <td>
                                        <select name="sem" class="form-control">
                                        <option value="">Select Semester</option>
                                                <option value="1st">1st</option>
                                                <option value="2nd">2nd</option>
                                                <option value="3rd">3rd</option>
                                                <option value="4th">4th</option>
                                                <option value="5th">5th</option>
                                                <option value="6th">6th</option>
                                                <option value="7th">7th</option>
                                                <option value="8th">8th</option>
                                            </select>
                                            </td>
                                            <td>
                                            <select class="form-control" name="teacher_id" id="">
                                        <option  value="">Select Teacher</option>
                                        <?php
                                        $fetch_teacher="SELECT * FROM teachers";
                                        $fetch_tech_res = mysqli_query($conn, $fetch_teacher);

                                        if (mysqli_num_rows($fetch_tech_res) > 0):
                                        // output data of each row
                                        $x=0;
                                        while($row_t = mysqli_fetch_assoc($fetch_tech_res)):
                                        ?>
                                        <option  value="<?=$row_t['id'] ?>"><?=$row_t['name'] ?></option>

                                        <?php
                                        endwhile;
                                        endif;
                                        ?>

                                    </select>
                                            </td>
                                            <td>
                                                <input type="text" name="test_id" value="<?= $row['id'] ?>" hidden>
                                            <button class="btn btn-info" name="assign-btn" type="submit">Assign</button>

                                            </td>

</form>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div>
</div>
<br>