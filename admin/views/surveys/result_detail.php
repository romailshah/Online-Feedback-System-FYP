<?php
if(!empty($_GET['class_id'])){
    $class_id=$_GET['class_id'];
    $semester=$_GET['semester'];
    $test_id=$_GET['test_id'];
    $teacher_id=$_GET['teacher_id'];
    $get_result="SELECT total_points, students.name, tests.name AS test_name FROM test_result INNER JOIN tests ON test_result.test_id=tests.id JOIN students ON students.id=test_result.user_id WHERE students.class_id='$class_id' AND tests.id='$test_id' AND students.semester='$semester' AND `teacher_id`='$teacher_id'";
?>
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
                                <th>Name</th>
                                <th>Test Name</th>
                                <th>Total Points</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            
                            $res_test= mysqli_query($conn, $get_result);
                            $rowcount=mysqli_num_rows($res_test);
                            if ($num_std=mysqli_num_rows($res_test) > 0) {
                                // output data of each row
                                $x=0;
                                $std_totalp=0;
                                while($row = mysqli_fetch_assoc($res_test)) {
                                    $x=$x+1;
                                    ?>
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['test_name'] ?></td>
                                        <td><?= $row['total_points'] ?></td>
                                    </tr>
                                    <?php
                                    $std_totalp=$row['total_points']+$std_totalp;

                                }
                                $Average=$std_totalp/$rowcount;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="background-color: grey; color: white;">Total Average:</th>
                                <th style="background-color: grey; color: white;">Total Percentage</th>
                                <th>Total Students</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                           $total_test_points=test_total_points($test_id);
                            $res_test= mysqli_query($conn, $get_result);
                                    ?>
                                    <tr>
                                        <td style="background-color: green; color: white;"><?= @$Average ?></td>
                                        <td style="background-color: green; color: white;"><?php
                                        @$total=($Average/$total_test_points)*100;
                                           echo @$ans=number_format((float)$total, 2, '.', '')." %";
                                            ?></td>
                                        <td><?= @$rowcount ?></td>
                                    </tr>
                                    <?php
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

<?php
}
    ?>