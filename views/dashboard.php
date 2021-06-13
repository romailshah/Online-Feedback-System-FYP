<br>
        <div class="wrapper">
            <div class="container">
            <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){ ?>
            <div class="row text-center" >
            <div class="col-md-4">
            <a href="?page=surveys" class="btn btn-warning"><i class="mdi mdi-webcam"></i> Surveys</a>
            </div>
            <div class="col-md-4">
            <a href="?page=profile" class="btn btn-success"><i class="mdi mdi-settings"></i> Settings</a>
            </div>
            <div class="col-md-4">
            <a href="?page=logout" class="btn btn-danger"><i class="mdi mdi-logout"></i> Logout</a>
            </div>
            </div>
        
            <?php } ?>



            <?php if(isset($_SESSION['teacher']) && !empty($_SESSION['teacher'])){ ?>
            <div class="row text-center" >
            <div class="col-md-4">
            <a href="?page=teacher_survey_list" class="btn btn-warning"><i class="mdi mdi-webcam"></i> Surveys</a>
            </div>
            <div class="col-md-4">
            <a href="?page=profile" class="btn btn-success"><i class="mdi mdi-settings"></i> Settings</a>
            </div>
            <div class="col-md-4">
            <a href="?page=logout" class="btn btn-danger"><i class="mdi mdi-logout"></i> Logout</a>
            </div>
            </div>
        
            <?php } ?>



    <div class="row">

<?php
if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{
    ?>

    <div class="card m-b-30" style="margin-left:35%; margin-top:5%;">
        <div class="card-body" >
            <div class="d-flex flex-row">
                <div class="col-3 align-self-center">
                    <div class="round">
                    <i class="mdi mdi-webcam"></i></div>
                        </div>
                        <div class="m-l-10">
                        <?php
                                    $class_id=$_SESSION['user']['class_id'];
                                            $data = "SELECT count(*) FROM assign_test where class_id= '$class_id'";
                                            $q_tests = mysqli_query($conn, $data);
                                            $total_survey = mysqli_fetch_assoc($q_tests);
                                            foreach ($total_survey as $total_surveys):
                                            ?>
                                            <h5 class="mt-0 round-inner"><?= $total_surveys ?></h5><p class="mb-0 text-muted">Assigned Surveys</p>
                                            <?php endforeach; ?>
                                        </div>
                                    <div class="col-3 align-self-end align-self-center">
                                        <h6 class="m-0 float-right text-center text-danger"> </h6>
                                    </div>



                                </div>
                            </div>
                            
                        
                        </div> 

                   

                        <?php
}else
{
    ?>
    
    <div class="card m-b-30" style="margin-left:35%; margin-top:15%;"><div class="card-body" >
                                <div class="d-flex flex-row">
                                   
                                    <div class="m-l-10">
                                      <a class="btn btn-info" href="?page=teacher_survey_list" >Survey List </a>
                                        </div>
                                
                                </div>
                            </div>
                        </div>


<?php
}
                        ?>

    </div><!-- row -->
</div><!-- az-content-body -->

