<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//user
$routes->get('/', 'Home::index');
$routes->get('/aboutus', 'Home::aboutus');
$routes->get('/courses', 'Home::courses');
$routes->get('/admission', 'Home::admission');
$routes->get('/teachers', 'Home::teachers');
$routes->get('/contact', 'Home::contact');
$routes->post('/contact/sendEmail', 'ContactController::sendEmail');
$routes->get('/events', 'EventController::eventlist');
$routes->get('/news', 'NewsController::news');

//login
// $routes->get('/enroll', 'SignupController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);
$routes->post('/profile/uploadImage', 'ProfileController::uploadImage');

$routes->get('/verification_form', 'VerificationController::index');
$routes->post('/verify', 'VerificationController::verify');
$routes->get('/login-register/signin', 'SigninController::index');


//
//forgot password 
$routes->get('/forgot_password', 'ForgotPasswordController::forgotPassword');
$routes->post('/forgot_password/send', 'ForgotPasswordController::sendVerificationCode');
$routes->get('/forgot_password/verify', 'ForgotPasswordController::verifyCode');
$routes->post('/forgot_password/check_code', 'ForgotPasswordController::checkVerificationCode');
$routes->get('/forgot_password/new_password', 'ForgotPasswordController::newPassword');
$routes->post('/forgot_password/update', 'ForgotPasswordController::updatePassword');

$routes->group('', ['filter' => 'admin'], function($routes) {
    // Admin routes
    $routes->get('/admin', 'Home::admin');
    $routes->get('/dashboard', 'Home::dashboard');
    $routes->get('/examinationdata', 'ExamController::getExamData');
    $routes->get('/addevents', 'EventController::addevents');
    $routes->get('/allevents', 'EventController::allevents');
    $routes->post('/eventStore', 'EventController::store');

    // Adding/retrieving teacher
    $routes->get('/teacherform', 'TeacherController::teacher');
    $routes->get('/allteachers', 'TeacherController::show');
    $routes->post('/addteacher', 'TeacherController::insert');
    $routes->get('/deleteteachers(:num)', 'TeacherController::delete/$1');
    $routes->get('generate-report', 'TeacherController::generateReport');

    // News
    $routes->get('/addnews', 'NewsController::addnews');
    $routes->post('/newsinsert', 'NewsController::insert');
    $routes->get('/allnews', 'NewsController::show');
    $routes->get('/deletenews(:num)', 'NewsController::delete/$1');

    // User list
    $routes->get('/allusers', 'SignupController::userdata');
    $routes->get('/deleteuser(:num)', 'SignupController::delete/$1');

    // Enrollment
    $routes->get('/applicationform', 'ApplicationFormController::applicationform');
    $routes->post('/submitApplication', 'ApplicationFormController::submitApplication');
    $routes->get('/currentenroll', 'ApplicationFormController::currentenroll');
    $routes->match(['get', 'post'],'/sidenav', 'ApplicationFormController::sidenav');

    // Exam controller
    $routes->post('/submitExam', 'ExamController::submitExam');
    $routes->get('/show_result', 'ExamController::showResult');

    // Faculty
    $routes->get('/faculty', 'FacultyController::index');
    $routes->get('/facultyadd', 'FacultyController::create');
    $routes->post('/faculty/store', 'FacultyController::store');
    $routes->get('/faculty/edit/(:num)', 'FacultyController::edit/$1');
    $routes->post('/faculty/update/(:num)', 'FacultyController::update/$1');
    $routes->get('/faculty/delete/(:num)', 'FacultyController::delete/$1');
    $routes->match(['get', 'post'],'/details(:num)', 'FacultyController::details/$1');
    $routes->get('generate-report-sched(:num)', 'FacultyController::generateReport/$1');

    // Schedule
    $routes->get('/schedule', 'ScheduleController::index');
    $routes->match(['get', 'post'], '/schedule/create', 'ScheduleController::create');
    $routes->get('/scheduledelete/(:num)', 'ScheduleController::delete/$1');
    $routes->post('/schedule/update/(:num)', 'ScheduleController::update/$1');
    // History for schedule
    $routes->get('/history', 'ScheduleHistoryController::index'); 

    // Subject list
    $routes->get('/subject_list_add', 'SubjectListController::create');
    $routes->post('/subject_list/store', 'SubjectListController::store');
    $routes->get('/subject_list', 'SubjectListController::index');
    $routes->get('/subject_list/edit/(:num)', 'SubjectListController::edit/$1');
    $routes->post('/subject_list/update/(:num)', 'SubjectListController::update/$1');
    $routes->post('/subject_list/delete/(:num)', 'SubjectListController::delete/$1');

    //qrcode
    $routes->get('/uploadexcel', 'AdminController::viewTable');
    $routes->post('/admin/uploadExcel', 'AdminController::uploadExcel');
    $routes->post('/admin/updateStatus/(:num)/(:alpha)', 'AdminController::updateStatus/$1/$2');
    $routes->post('/admin/scanQRCode/(:any)', 'AdminController::scanQRCode/$1');
    $routes->get('/scanqrpage', 'AdminController::scanqrpage');
    $routes->post('/admin/scanQRCode/(:any)', 'AdminController::scanQRCode/$1');

    //GLInkform
    $routes->get('/admin/uploadForm', 'AdminController::uploadGoogleFormLink');
    $routes->post('/admin/uploadGoogleFormLink', 'AdminController::uploadGoogleFormLink');
    $routes->get('/gformlinkpage', 'AdminController::showGFormlinkpage');
    $routes->post('/admin/toggleLinkVisibility', 'AdminController::toggleLinkVisibility');


});