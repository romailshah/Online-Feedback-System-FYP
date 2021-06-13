<?php
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $table_name=$_POST['table_name'];
    $sql="DELETE FROM `$table_name` WHERE `id`='$id'";
    $res=mysqli_query($conn,$sql);
    if($res){
        $message = "<div class='alert alert-success'>Success: Record Deleted!</div>";
    }else{
        $message = "<div class='alert alert-danger'><b>Error!</b> Error During Deleting Data. </div>";
    }
}
?>
<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Users</a></li>
                            <li class="breadcrumb-item"><a href="?page=all_std">All Teachers</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">All Teachers</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Teachers List</h4>
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Teacher Name</th>
                                <th>Class Name</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT assign_teacher.id, teachers.name, class.c_name, assign_teacher.semester FROM `teachers` INNER JOIN `assign_teacher` ON teachers.id=assign_teacher.teacher_id INNER JOIN class ON class.id=assign_teacher.class_id";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                $x=0;
                                while($row = mysqli_fetch_assoc($result)) {
                                    $x=$x+1;
                                    ?>
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['c_name'] ?></td>
                                        <td><?= $row['semester'] ?></td>
                                        <td>
                                            <a  href="?page=delete&table=assign_teacher&page_name=assign_all_tech&id=<?=$row['id']?>" class="btn btn-danger"><i class="mdi mdi-delete-forever"></i></a>
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
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
