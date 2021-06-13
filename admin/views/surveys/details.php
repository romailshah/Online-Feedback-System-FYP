<?php

if(isset($_GET['id'])){
    $test_id=$_GET['id'];

    if(isset($_POST['save-btn'])){
        $p_option1=0;
        $p_option2=0;
        $p_option3=0;
        $p_option4=0;
        if(isset($_POST['ques']) && !empty($_POST['ques'])){
            $ques=$_POST['ques'];
        }else{
            $ques_msg='<div class="alert alert-danger">Field is Empty</div>';
        }
//OPTIONS
        if(isset($_POST['option1']) && !empty($_POST['option1'])){
            $option1=$_POST['option1'];
        }else{
            $option1_msg='<div class="alert alert-danger">Field is Empty</div>';
        }
        if(isset($_POST['option2']) && !empty($_POST['option2'])){
            $option2=$_POST['option2'];
        }else{
            $option2_msg='<div class="alert alert-danger">Field is Empty</div>';
        }
        if(isset($_POST['option3']) && !empty($_POST['option3'])){
            $option3=$_POST['option3'];
        }else{
            $option3_msg='<div class="alert alert-danger">Field is Empty</div>';
        }
        if(isset($_POST['option4']) && !empty($_POST['option4'])){
            $option4=$_POST['option4'];
        }else{
            $option4_msg='<div class="alert alert-danger">Field is Empty</div>';
        }
        

        //OPTIONS POINTS






        if(isset($_POST['p_option1']) && !empty($_POST['p_option1'])){
            $p_option1=$_POST['p_option1'];
        }else{
            $p_option1_msg='<div class="alert alert-danger">Field is Empty</div>';
        }
        if(isset($_POST['p_option2']) && !empty($_POST['p_option2'])){
            $p_option2=$_POST['p_option2'];
        }else{
            $p_option2_msg='<div class="alert alert-danger">Field is Empty</div>';
        }
        if(isset($_POST['p_option3']) && !empty($_POST['p_option3'])){
            $p_option3=$_POST['p_option3'];
        }else{
            $p_option3_msg='<div class="alert alert-danger">Field is Empty</div>';
        }
        if(isset($_POST['p_option4']) && !empty($_POST['p_option4'])){
            $p_option4=$_POST['p_option4'];
        }else{
            $p_option4_msg='<div class="alert alert-danger">Field is Empty</div>';
        }
       $total_points=greater_option_points(trim( $p_option1),trim( $p_option2), trim( $p_option3),trim( $p_option4));
      
        if(isset($ques) && !empty($ques)&&isset($option1) && !empty($option1)&&
            isset($option2) && !empty($option2)&&isset($option3) && !empty($option3)&&
            isset($option4) && !empty($option4)&&isset($p_option1) ){

             //OPTION JSON ENCODING   
             $op['options'] = ["option1" => $option1, 
             "option2" => $option2,"option3" => $option3,"option4" => $option4]; 
            $options=json_encode($op['options']);


               //OPTION POINTS JSON ENCODING 
               $points_array['points'] = ["p_option1" => $p_option1, 
               "p_option2" => $p_option2,"p_option3" => $p_option3,"p_option4" => $p_option4];  
               
               $points=json_encode($points_array['points']);
                //var_dump($points_array);

            $insert_ques = "INSERT INTO `test_questions` (`test_id`, `question`, `points` , `options`, `total_points`)
                                VALUES ('$test_id', '$ques', '$points', '$options', '$total_points')";
            if (mysqli_query($conn, $insert_ques)) {
                $msg='<div class="alert alert-success">Question is Added Successfully!</div>';
            } else {
                echo "Error:" .mysqli_error($conn);
            }
        }
    }

    $q_test= "SELECT * FROM `tests` WHERE `id`='$test_id'";
    $res_test = mysqli_query($conn, $q_test);
    if (mysqli_num_rows($res_test) > 0) {
        while($row_test = mysqli_fetch_assoc($res_test)) {
            ?>
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12" style="margin-top: 80px;">

                            <div class="card m-b-30">
                                <div class="card-body">
                                    <?=@$msg?>
                                    <form action="" method="post">
                                        <h4 class="mt-0 header-title"><?= $row_test['name']?></h4> <br>
                                        <p>Add New Questions</p>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input class="form-control" placeholder="Write Question" type="text" id="ques" name="ques" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <input class="form-control" placeholder="Option A" type="text" id="option1" name="option1" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input class="form-control" placeholder="Option B" type="text" id="option2" name="option2" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input class="form-control" placeholder="Option C" type="text" id="option3" name="option3" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input class="form-control" placeholder="Option D" type="text" id="option4" name="option4" value="">
                                            </div>
                                        </div>
                                        <label for="">Points</label>
                                        <div class="form-group row">
                                            
                                            <div class="col-sm-3">
                                                <input class="form-control" placeholder="Option A Points" type="text" id="p_option1" name="p_option1" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input class="form-control" placeholder="Option B Points" type="text" id="p_option2" name="p_option2" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input class="form-control" placeholder="Option C Points" type="text" id="p_option3" name="p_option3" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input class="form-control" placeholder="Option D Points" type="text" id="p_option4" name="p_option4" value="">
                                            </div>
                                        </div>
                                        <div c lass="form-group row justify-content-center">
                                            <button class="btn btn-info" name="save-btn" type="submit">Add New Questions</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->

                    </div> <!-- end row -->




                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Question List</h4>
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Test Name</th>
                                            <th>Question</th>
                                            <th>Options</th>
                                            <th>Points</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql_join = "SELECT test_questions.id,test_questions.test_id, test_questions.question, test_questions.points, test_questions.options, tests.name FROM `test_questions` INNER JOIN tests ON test_questions.test_id=tests.id WHERE test_questions.test_id=$test_id";
                                        $res_join = mysqli_query($conn, $sql_join);

                                        if (mysqli_num_rows($res_join) > 0) {
                                            // output data of each row
                                            $x=0;
                                            while($row_join = mysqli_fetch_assoc($res_join)) {
                                                $x=$x+1;
                                                ?>
                                                <tr>
                                                    <td><?= $x ?></td>
                                                    <td><?= $row_join['name'] ?></td>
                                                    <td><?= $row_join['question'] ?></td>

                                                    <td><?php
                                                        $decode_option=json_decode($row_join['options']);
                                                        echo"<b>Option A: </b>"."$decode_option->option1"."<br>";
                                                        echo"<b>Option B: </b>"."$decode_option->option2"."<br>";
                                                        echo"<b>Option C: </b>"."$decode_option->option3"."<br>";
                                                        echo"<b>Option D: </b>"."$decode_option->option4";
                                                        ?>
                                                    </td>
                                                    <td><?php
                                                        $decode_option=json_decode($row_join['points']);
                                                        echo"<b>Points Option A: </b>"."$decode_option->p_option1"."<br>";
                                                        echo"<b>Points Option B: </b>"."$decode_option->p_option2"."<br>";
                                                        echo"<b>Points Option C: </b>"."$decode_option->p_option3"."<br>";
                                                        echo"<b>Points Option D: </b>"."$decode_option->p_option4";
                                                        ?></td>
                                                    <td>


                                                        <a  href="?page=delete&table=test_questions&page_name=assign_survey&id=<?=$row_join['id']?>" class="btn btn-danger"><i class="mdi mdi-delete-forever"></i></a>
                                                        <a href="?page=edit_class&id=<?= $row_join['id']; ?>" class="btn btn-secondary"><i class="mdi mdi-grease-pencil"></i></a>
                                                        </form>
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

            <?php


        }
    }

}