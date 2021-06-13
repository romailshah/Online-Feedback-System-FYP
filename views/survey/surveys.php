<?php 
            @$sem=$_SESSION['user']['semester'];
            ?>
<style>
    a.disabled {
    pointer-events: none;
    color: #ccc;
}
</style>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Assign Surveys</h4>
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Teacher Name </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            //var_dump($_SESSION['user']);
                            $class_id=$_SESSION['user']['class_id'];
                            $sql = "SELECT tests.* , teachers.id as teacher_id, teachers.name as teacher_name FROM assign_test JOIN tests ON assign_test.test_id=tests.id INNER JOIN teachers ON assign_test.teacher_id=teachers.id  WHERE assign_test.class_id='$class_id' AND assign_test.semester='$sem'";
                                                        $res_test= mysqli_query($conn, $sql);
                            
                            if (mysqli_num_rows($res_test) > 0) {
                                // output data of each row
                                $x=0;
                                while($row = mysqli_fetch_assoc($res_test)) {
                                    $x=$x+1;
                                    ?>
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><a class="<?php $t_status=user_Survey_Status($login_user_id, $row['teacher_id'], $row['id']); if($t_status==1){ echo "disabled"; }  ?>" href="?page=test_detail&id=<?= $row['id']?>&teacher_id=<?= $row['teacher_id'] ?>"><?= $row['name']  ?> <?php if($t_status==1){ echo "(Completed)"; } ?> </a></td>
                                        <td><?= $row['teacher_name'] ?> </td>
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