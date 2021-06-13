<?php
require_once "../config.php";
include "fun/function.php";
include "includes/header.php";
if(!empty($_SESSION['admin'])) {
if(isset($_GET['page']) && !empty($_GET['page'])){
    //include "includes/sidebar.php";
    include "includes/topbar.php";
    $page = $_GET['page'];
    if($page === 'dashboard'){
        include "views/dashboard.php";
    }
    if($page ==='profile'){
        include "views/login/profile.php";
    }
    //STD ROUTES
    elseif ($page === 'add_std'){
        include "views/student/add_std.php";
    }elseif ($page === 'all_std'){
        include "views/student/all_std.php";
    }elseif ($page === 'edit_std'){
        include "views/student/edit_std.php";
    }elseif ($page === 'view_std'){
        include "views/student/view_std.php";
    }
    //END OF STD



    //CLASS ROUTES
    elseif ($page === 'add_class'){
        include "views/class/add_class.php";
    }elseif ($page === 'all_class'){
        include "views/class/all_classes.php";
    }elseif ($page === 'edit_class'){
        include "views/class/edit_class.php";
    }
    //END OF CLASS

    //Surveys ROUTES
    elseif ($page === 'add_survey'){
        include "views/surveys/add.php";
    }elseif ($page === 'test_detail'){
        include "views/surveys/details.php";
    }elseif ($page === 'edit_survey'){
        include "views/surveys/edit.php";
    }elseif ($page === 'assign_survey'){
        include "views/surveys/assign_survey.php";
    }elseif ($page === 'result'){
        include "views/surveys/result.php";
    }elseif ($page === 'result_detail'){
        include "views/surveys/result_detail.php";
}
    //END OF Surveys

    //TEACHER ROUTES
    elseif ($page === 'add_teacher'){
        include "views/teacher/add_teacher.php";
    }elseif ($page === 'all_teacher'){
        include "views/teacher/all_teacher.php";
    }elseif ($page === 'edit_teacher'){
        include "views/teacher/edit_teacher.php";
    }elseif ($page === 'assign_tech'){
        include "views/teacher/assign_tech.php";
    }elseif ($page === 'assign_all_tech'){
        include "views/teacher/assign_all_tech.php";
    }
    //END OF TEACHER
     //ADMIN ROUTES
     elseif ($page === 'add_admin'){
        include "views/admin/add_admin.php";
    }elseif ($page === 'all_admin'){
        include "views/admin/all_admin.php";
    }elseif ($page === 'edit_admin'){
        include "views/admin/edit_admin.php";
    }
    //END OF ADMIN
    elseif ($page === 'login'){
        include "views/login.php";
    }
    elseif ($page === 'delete'){
        include "views/delete.php";
    }

    include "includes/footer.php";
}else{

    include "views/login.php";
}


}else{
    include "views/login.php";
}
