<?php
$id=$_GET['id'];
if (isset($_POST['btn-class'])){
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $name=$_POST['name'];
    }else{
        $name_msg='<div class="alert alert-danger">Field is Empty</div>';
    }
    if(isset($name) && !empty($name)){
            ///////
            /// UPDATE STUDENT
            echo $update_std = "UPDATE class SET `c_name`='$name' WHERE id= '$id'";
            if (mysqli_query($conn, $update_std)) {
                $msg = '<div class="alert alert-success">Program Details are Updated Successfully!</div>';
            } else {
                echo "Error:" . mysqli_error($conn);
            }
        }
        else {
            echo $update_std = "UPDATE class SET `c_name`='$name' WHERE id= '$id'";

            if (mysqli_query($conn, $update_std)) {
                $msg = '<div class="alert alert-success">Program Details are Updated Successfully!</div>';
            } else {
                echo "Error:" . mysqli_error($conn);
            }
        }

}// main if
?>
<?php

$sql = "SELECT * FROM `class` WHERE `id`='$id'";
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
                                    <h4 class="mt-0 header-title">Edit Program</h4> <br>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Program Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="Program Name" value="<?= $row['c_name'] ?>"  name="name" class="form-control" required="">
                                            <?= @$name_msg ?>
                                        </div>
                                    </div>



                                    <div c lass="form-group row justify-content-center">
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
        <?php
    }
}
?>
<br>