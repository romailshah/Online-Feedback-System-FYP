
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Program</a></li>
                            <li class="breadcrumb-item"><a href="?page=all_std">All Program</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">All Program</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Programs List</h4>
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM `class`";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                $x=0;
                                while($row = mysqli_fetch_assoc($result)) {
                                    $x=$x+1;
                                    ?>
                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?= $row['c_name'] ?></td>
                                        <td>
                                            <a  href="?page=delete&table=class&page_name=all_class&id=<?=$row['id']?>" class="btn btn-danger"><i class="mdi mdi-delete-forever"></i></a>
                                            <a href="?page=edit_class&id=<?= $row['id']; ?>" class="btn btn-secondary"><i class="mdi mdi-grease-pencil"></i></a>

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
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
