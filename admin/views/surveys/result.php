
<br><br><br>
<div class="wrapper">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">All Classes Result</h4>
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
                            $sql = "SELECT tests.name as test_name, semester, class.c_name, tests.id as test_id, class.id as class_id, teacher_id , teachers.name as teacher_name FROM `assign_test` LEFT JOIN tests ON assign_test.test_id=tests.id LEFT JOIN class ON class.id=assign_test.class_id INNER JOIN teachers ON teachers.id=assign_test.teacher_id";
                            $res_test= mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res_test) > 0) {
                                // output data of each row
                                $x=0;
                                while($row = mysqli_fetch_assoc($res_test)) {
                                    $x=$x+1;
                                    ?>
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?= $row['test_name']?></td>
                                        <td><?= $row['teacher_name']?></td>
                                        <td><?= $row['c_name'] ?></td>
                                        <td><?= $row['semester']?></td>
                                        <td><a class="btn btn-info" href="?page=result_detail&class_id=<?= $row['class_id']?>&test_id=<?= $row['test_id']?>&semester=<?=$row ['semester'] ?>&teacher_id=<?=$row ['teacher_id'] ?>">View Result</a></td>
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