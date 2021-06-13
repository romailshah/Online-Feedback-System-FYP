
<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Users</a></li>
                            <li class="breadcrumb-item"><a href="?page=view_std">View Students</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Vew Student Detail</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-6">
                <div class="card m-b-30">
                    <div class="card-body">

                            <?php
                            @$id=$_GET['id'];
                            $sql = "SELECT students.*, `class`.`c_name` FROM  `students` LEFT JOIN `class` ON `students`.`class_id`=`class`.`id` WHERE `students`.`id`='$id'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row

                                while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <div class="card m-b-30">
                                        <div class="card-body p-5">
                                            <h4 class="card-title font-20 mt-0"><?= $row['name'] ?></h4>
                                            <h6 class="card-subtitle text-muted"><?= $row['reg_no'] ?></h6>
                                            <h6><b>Registration: </b><?= $row['reg_no'] ?></h6>
                                            <p class="card-text"><b>Program: </b><td><?= $row['c_name'] ?></td></p>
                                            <p class="card-text"><b>Semester: </b><td><?= $row['semester'] ?></td></p>
                                            <p class="card-text"><b>Session: </b><td><?= $row['session'] ?></td></p>
                                        </div>
                                        <div class="card-footer">
                                            <a name="back" href="?page=all_std" class="btn btn-secondary">Back</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->

