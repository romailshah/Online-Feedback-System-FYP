<?php
require_once "config.php";

if(!empty($_SESSION['user']) || !empty($_SESSION['teacher'])) {
    @$login_user_id =$_SESSION['user']['id'];
    @$login_teacher_id =$_SESSION['teacher']['id'];
    if ($_GET['page'] != "login") {
        include "admin/fun/function.php";
        include "includes/header.php";
        include "includes/topbar.php";
    }
    if (isset($_GET['page']) && !empty($_GET['page'])) {

        $page = $_GET['page'];
        if ($page === 'signin') {
            include "views/login.php";
        } elseif ($page === 'home') {
            include "views/dashboard.php";
        }elseif ($page === 'surveys') {
            include "views/survey/surveys.php";
        }
        elseif ($page === 'view_survey_result') {
            include "views/survey/view_survey_result.php";
        }
        elseif ($page === 'test_detail') {
            include "views/survey/details.php";
        }elseif ($page === 'teacher_survey_list') {
            include "views/survey/teacher_survey_list.php";
        }
        elseif ($page === 'teacher_survey') {
                include "views/survey/teacher_survey.php";
        }elseif ($page === 'profile') {
            include "views/profile.php";
    }
        elseif ($page === 'logout') {
            include "views/logout.php";
        }

    }else{
        include "views/dashboard.php";
    }
}else{
    include "views/login.php";
}
include "./includes/footer.php";