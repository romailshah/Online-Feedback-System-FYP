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
                                <th>Test Name</th>
                                <th>Teacher Name</th>
                                <th>Class Name</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            //var_dump($_SESSION['user']);
                           echo  $teacher_id=$_SESSION['teacher']['id'];
                            $sql = "SELECT tests.* , teachers.id as teacher_id, teachers.name as teacher_name, class.c_name as class_name, assign_test.semester, assign_test.test_id,assign_test.class_id FROM assign_test 

                            LEFT JOIN tests ON assign_test.test_id=tests.id 
                            
                            INNER JOIN teachers ON assign_test.teacher_id=teachers.id 
                            
                            INNER  JOIN class ON class.id=assign_test.class_id  
                            
                            
                            WHERE assign_test.teacher_id='$teacher_id'";
                            $res_test= mysqli_query($conn, $sql);

                            if (mysqli_num_rows($res_test) > 0) {
                                // output data of each row
                                $x=0;
                                while($row = mysqli_fetch_assoc($res_test)) {
                                    $x=$x+1;
                                    ?>
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['teacher_name'] ?></td>
                                        <td><?= $row['class_name'] ?></td>
                                        <td><?= $row['semester'] ?></td>
                                        <td><a href="?page=view_survey_result&class_id=<?= $row['class_id'] ?>&semester=<?= $row['semester']?>&test_id=<?=$row['test_id']?>&teacher_id=<?=$row['teacher_id']?>" class="btn btn-info">View</a></td>

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