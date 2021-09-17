<?php
require 'connection.php';

date_default_timezone_set('Africa/Lagos');

$user = NULL;
$user_id = NULL;
$staff_id = NULL;
$username = NULL;
$user_privilege = NULL;

$departments = NULL;
$faculties = NULL;

session_start();
//session_destroy();
if (isset($_SESSION['orms_admin_login']) && !empty($_SESSION['orms_admin_login'])) {
	$login = $_SESSION['orms_admin_login'];
	$q = $connect->query("SELECT * FROM `users` WHERE `id` = '$login'");
	$user = $q->fetch_array();
	
	$user_id = $user['id'];
	$staff_id = $user['staff_id'];
	$username = $user['username'];
	$user_privilege = $user['privilege'];
}

$faculties_q = $connect->query("SELECT * FROM `faculties` ORDER BY `name` DESC");
$dept_q = $connect->query("SELECT * FROM `departments` ORDER BY `name` DESC LIMIT 4");

if ($faculties_q->num_rows > 0)
	while ($faculty = $faculties_q->fetch_array()) {
		$faculties[] = $faculty;
	}

if ($dept_q->num_rows > 0)
	while ($dept = $dept_q->fetch_array()) {
		$departments[] = $dept;
	}
