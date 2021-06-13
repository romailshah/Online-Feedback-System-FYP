<?php
if (isset($_POST['btn-test'])){
    if(isset($_POST['survey_name']) && !empty($_POST['survey_name'])){
        $survey_name=$_POST['survey_name'];
    }else{
        $survey_name_msg='<div class="alert alert-danger">Field is Empty</div>';
    }


    if(isset($survey_name) && !empty($survey_name)){
        $check_test="SELECT * FROM `tests` WHERE name= '$survey_name'";
        $result = mysqli_query($conn, $check_test);
        if (mysqli_num_rows($result) > 0) {
            $msg='<div class="alert alert-danger">Test Name Already Exist</div>';
        }else{
            $insert_std = "INSERT INTO `tests` (`name`)
            VALUES ('$survey_name')";
            if (mysqli_query($conn, $insert_std)) {
                $msg='<div class="alert alert-success">Test is Added Successfully!</div>';
            } else {
                echo "Error:" .mysqli_error($conn);
            }

        }
    }



}// main if
?>

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin-top: 80px;">

                <div class="card m-b-30">
                    <div class="card-body">
                        <?= @$msg ?>
                        <form action="" method="post">
                            <h4 class="mt-0 header-title">Add New Test</h4>
                            <div class="form-group row">

                                <div class="col-sm-10 col-md-6">
                                    <input type="text" placeholder="Survey Name"  name="survey_name" class="form-control">
                                    <?= @$survey_name_msg ?>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <button type="submit" name="btn-test" class="btn btn-lg btn-facebook m-b-10 m-l-10 waves-effect waves-light">
                                    <i class="fa fa-save m-r-5"></i>Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->

        </div> <!-- end row -->

        <!--        Test List-->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">All Test Or Surveys</h4>
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
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
                                        <td><a href="?page=test_detail&id=<?= $row['id']?>"><?= $row['name'] ?></a></td>
                                        <td>
                                            <a  href="?page=delete&table=tests&page_name=add_survey&id=<?=$row['id']?>" class="btn btn-danger"><i class="mdi mdi-delete-forever"></i></a>
                                            <a href="?page=edit_survey&id=<?= $row['id']; ?>" class="btn btn-secondary"><i class="mdi mdi-grease-pencil"></i></a>
                                        </td>
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