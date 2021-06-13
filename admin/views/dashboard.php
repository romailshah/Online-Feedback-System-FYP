<br><br><br><br>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <!-- Column --><div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30"><div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="col-3 align-self-center">
                                        <div class="round"><i class="mdi mdi-webcam"></i></div>
                                    </div>
                                    <div class="col-6 align-self-center text-center">
                                        <div class="m-l-10">
                                            <?php
                                            $data = "SELECT count(*) FROM class";
                                            $q_class= mysqli_query($conn, $data);
                                            $count_r = mysqli_fetch_assoc($q_class);
                                            foreach ($count_r as $count):
                                            ?>
                                            <h5 class="mt-0 round-inner"><?= $count ?></h5>
                                            <?php endforeach; ?>
                                            <p class="mb-0 text-muted">Total Classes</p>
                                        </div>
                                    </div>
                                    <div class="col-3 align-self-end align-self-center">
                                        <h6 class="m-0 float-right text-center text-danger"><i class="mdi mdi-arrow-down"></i> </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Column --><!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <div class="d-flex flex-row">
                                    <div class="col-3 align-self-center">
                                        <div class="round"><i class="mdi mdi-account-multiple-plus"></i></div>
                                    </div>
                                    <div class="col-6 text-center align-self-center">
                                        <div class="m-l-10">
                                            <?php
                                            $data = "SELECT count(*) FROM students";
                                            $q_students = mysqli_query($conn, $data);
                                            $total_std = mysqli_fetch_assoc($q_students);
                                            foreach ($total_std as $total_stds):
                                            ?>
                                            <h5 class="mt-0 round-inner"><?=$total_stds ?></h5>
                                            <?php endforeach; ?>
                                            <p class="mb-0 text-muted">Total Students</p>
                                        </div>
                                    </div>
                                    <div class="col-3 align-self-end align-self-center">
                                        <h6 class="m-0 float-right text-center text-success">
                                            <i class="mdi mdi-arrow-up"></i>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30"><div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="col-3 align-self-center">
                                        <div class="round"><i class="mdi mdi-basket"></i></div>
                                    </div>
                                    <div class="col-6 align-self-center text-center">
                                        <div class="m-l-10">
                                            <?php
                                            $data = "SELECT count(*) FROM tests";
                                            $q_tests = mysqli_query($conn, $data);
                                            $total_survey = mysqli_fetch_assoc($q_tests);
                                            foreach ($total_survey as $total_surveys):
                                            ?>
                                            <h5 class="mt-0 round-inner"><?= $total_surveys ?></h5><p class="mb-0 text-muted">Total Surveys</p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-3 align-self-end align-self-center">
                                        <h6 class="m-0 float-right text-center text-danger"><i class="mdi mdi-arrow-down"></i> ></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Column --><!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="col-3 align-self-center">
                                        <div class="round"><i class="mdi mdi-rocket"></i></div>
                                    </div>
                                    <div class="col-6 align-self-center text-center">
                                        <div class="m-l-10">
                                            <?php
                                            $data = "SELECT count(*) FROM teachers";
                                            $q_teachers = mysqli_query($conn, $data);
                                            $total_teacher = mysqli_fetch_assoc($q_teachers);
                                            foreach ($total_teacher as $total_teachers):
                                            ?>
                                            <h5 class="mt-0 round-inner"><?= $total_teachers ?></h5>
                                            <?php endforeach; ?>
                                            <p class="mb-0 text-muted">Total Teachers</p>
                                        </div>
                                    </div>
                                    <div class="col-3 align-self-end align-self-center">
                                        <h6 class="m-0 float-right text-center text-success"><i class="mdi mdi-arrow-up"></i> </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
        </div>

