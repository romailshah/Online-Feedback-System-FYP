<?php
/////SURVEY SUBMITION

if(isset($_POST['survey-submit']) && isset($_POST['test_id'])){
    $test_id=$_POST['test_id'];
    $teacher_id=$_POST['teacher_id'];
$total_ques=countTotal_Question($_POST['test_id']);
 $option_points=0;
for ($i=1; $i <= $total_ques; $i++) { 
        $ques[$i]=$_POST["ques".$i];
        $option_points=$_POST["q".$i."option"] + $option_points;
        
    }
    $insert_result="INSERT INTO test_result (`total_points`, `test_id`, `user_id`, `teacher_id`) VALUES ('$option_points', '$test_id', '$login_user_id', '$teacher_id')";
    $result=mysqli_query($conn,$insert_result);
    if($result){
        header("Location: index.php?test_detail&msg=success");
    }else{
        header("Location: index.php?test_detail&msg=Error");
    }
}




if(isset($_GET['id'])){
    @$test_id=$_GET['id'];
    @$teacher_id=$_GET['teacher_id'];
    $q_test= "SELECT * FROM `tests` WHERE `id`='$test_id'";
    $res_test = mysqli_query($conn, $q_test);
    if (mysqli_num_rows($res_test) > 0) {
        while($row_test = mysqli_fetch_assoc($res_test)) {

            $sql_join = "SELECT test_questions.id,test_questions.test_id, test_questions.question, test_questions.points, test_questions.options, tests.name FROM `test_questions` INNER JOIN tests ON test_questions.test_id=tests.id WHERE test_questions.test_id=$test_id";
            $res_join = mysqli_query($conn, $sql_join);

            ?>
            <div class="wrapper">
                <div class="container-fluid">
                <form action="index.php?page=test_detail" method="POST">
                    <input type="text" name="test_id" value="<?= $test_id ?>" hidden>
                    <input type="text" name="teacher_id" value="<?= $teacher_id ?>" hidden>
                    <?php
                    if (mysqli_num_rows($res_join) > 0) {
                        // output data of each row
                        $x = 0;
                        while ($row_join = mysqli_fetch_assoc($res_join)) {
                            $x = $x + 1;
                            $decode_option=json_decode($row_join['options']);
                            $decode_points=json_decode($row_join['points']);

                            ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Qno# <?php echo $x.": ".$row_join['question']; ?></h4>
                                            <input type="text" class="form-control ml-2" name="ques<?=$x?>" value="<?= $row_join['id'] ?>" hidden>
                                            <div class="general-label">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" value="<?php echo "$decode_points->p_option1" ?>" class="custom-control-input" name="q<?= $x ?>option"  id="q<?= $x ?>optionA" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                    <label class="custom-control-label" for="q<?= $x ?>optionA"><?php echo "$decode_option->option1"."<br>"; ?></label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input value="<?php echo "$decode_points->p_option2" ?>" type="radio" class="custom-control-input" name="q<?= $x ?>option"  id="q<?= $x ?>optionB" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                    <label class="custom-control-label" for="q<?= $x ?>optionB"><?php echo "$decode_option->option2"."<br>";?></label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input value="<?php echo "$decode_points->p_option3" ?>" type="radio" class="custom-control-input" name="q<?= $x ?>option"  id="q<?= $x ?>optionC" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                    <label class="custom-control-label" for="q<?= $x ?>optionC"><?php echo "$decode_option->option3"."<br>";?></label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input value="<?php echo "$decode_points->p_option4" ?>" type="radio" class="custom-control-input" name="q<?= $x ?>option"  id="q<?= $x ?>optionD" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                    <label class="custom-control-label" for="q<?= $x ?>optionD"><?php echo "$decode_option->option4";?></label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            
                            <?php
                        }
                    }
                    ?>
                    <br><br>
                    <button name="survey-submit" type="submit" class="btn btn-success ml-2">Submit Survey</button>

                    </form>
                </div>
            </div>

            <?php


        }
    }

}