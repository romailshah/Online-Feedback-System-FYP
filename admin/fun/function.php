<?php

function getclass($id){
    global $conn;

    if($id=="all"){
        $sql_class="SELECT * FROM class";
    }else{
        $sql_class="SELECT * FROM class WHERE id='$id'";
    }
    return $class_res=mysqli_query($conn,$sql_class);

}


function countTotal_Question($id){
    global $conn;

    $query="SELECT test_questions.id FROM `test_questions` INNER JOIN tests ON test_questions.test_id=tests.id WHERE test_questions.test_id='$id'";

    $result=mysqli_query($conn,$query);
    return $total_questions=mysqli_num_rows($result);
}


function user_Survey_Status($user_id, $teacher_id, $test_id){
    global $conn;

    $query="SELECT * FROM `test_result` WHERE `test_id`= '$test_id' AND `user_id`= '$user_id' AND `teacher_id`='$teacher_id'";

    $result=mysqli_query($conn,$query);
    $status=mysqli_num_rows($result);
    if($status > 0){
        return 1;
    
    }else
     return 0;
}

function greater_option_points($p_option1,$p_option2, $p_option3,$p_option4){
    $greater=0;
    $op['points'] = ["option1" => $p_option1, "option2" => $p_option2,"option3" => $p_option3,"option4" => $p_option4];
  
  


return  $value = max($op['points']);

 
}

function test_total_points($test_id)
{
    global $conn;
    $total = 0;
    $sql = "SELECT total_points FROM test_questions WHERE `test_id`='$test_id'";
    $res_test = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res_test) > 0) {
        while ($row = mysqli_fetch_assoc($res_test)) {
            $total = $row['total_points'] + $total;
        }
    }
 return $total;

}
?>