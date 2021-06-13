<?php
if (isset($_POST['btn-class'])){
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $name=$_POST['name'];
    }else{
        $name_msg='<div class="alert alert-danger">Field is Empty</div>';
    }
    if(isset($_POST['semester']) && !empty($_POST['semester'])){
        $semester=$_POST['semester'];
    }else{
        $semester_msg='<div class="alert alert-danger">Field is Empty</div>';
    }
    if(isset($name) && !empty($name)){
        $check_std="SELECT * FROM `class` WHERE `c_name`= '$name' ";
        $result = mysqli_query($conn, $check_std);
        if (mysqli_num_rows($result) > 0) {
            $msg='<div class="alert alert-danger">Class Already Exist</div>';
        }else{
            ///////
            /// INSERT ADMIN
            $insert_std = "INSERT INTO `class` (`c_name`) VALUES ('$name')";

            if (mysqli_query($conn, $insert_std)) {
                $msg='<div class="alert alert-success">Class is Added Successfully!</div>';
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
                        <h4 class="mt-0 header-title">Add New Program</h4>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="Program Name"  name="name" class="form-control">
                                <?= @$name_msg ?>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <button type="submit" name="btn-class" class="btn btn-lg btn-facebook m-b-10 m-l-10 waves-effect waves-light">
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