<?php
$login_u_id= $_SESSION['user_id'];

///////
/// add New User
if(isset($_POST['btn-update-user'])){
    ////name check
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $name=$_POST['name'];
    }
    ///email check
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email=$_POST['email'];
    }
    ///password check
    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password=$_POST['password'];
        ///Password Md5 Encryption
        $enc_password=md5($password);
    }



    if(isset($name) && !empty($name) &&isset($email) && !empty($email) &&isset($enc_password) && !empty($enc_password)){
        try {
            ;
            ////Database Insertion
            $sql = "UPDATE admin SET `name`= $name, `email`= $email, `password`=$enc_password WHERE `id`=$login_u_id";
            $check_sql = mysqli_query($conn, $sql);
            $message = "<div class='alert alert-success'>User Details Updated Successfully!</div>";
        } catch (PDOException $e) {

            $message = "<div class='alert alert-danger'>Error! $e->getMessage()</div>";
        }
    }
}//END of main IF


?>



<div class="wrapper">
    <div class="container">

    <div class="col-10 grid-margin mt-5 stretch-card">
        <div class="card">
            <div class="card-body">
                <?= @$message ?>
                <?php
             $data = "SELECT * FROM admin WHERE `id` = '$login_u_id'";
              $check_sql = mysqli_query($conn, $data);


                if (mysqli_num_rows($check_sql) > 0) {
                // output data of each row

                while($row = mysqli_fetch_assoc($check_sql)) {
              ?>
                <h4 class="card-title">Update Your Profile Details</h4>
                <form class="forms-sample" method="post">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control" id="exampleInputEmail3" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Change Password</label>

                        <input type="password" value="" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password" required>
                    </div>

                    <?php } } ?>
                    <button type="submit" onclick="submit" name="btn-update-user" class="btn btn-outline-success mr-2">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>

