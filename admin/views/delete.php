<?php

if (isset($_GET['id'])) {
   echo $id = $_GET['id'];
   echo  $page_name=$_GET['page_name'];
  echo  $table = $_GET['table'];
    $sql = "DELETE FROM `$table` WHERE `id`='$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header("Location: ?page=$page_name");
    } else {
        $message = "<div class='alert alert-danger'>Error 404 </div>";
    }
}
?>