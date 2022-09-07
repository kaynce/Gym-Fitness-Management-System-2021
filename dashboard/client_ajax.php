<?php 
ob_start();
$action = $_GET['action'];

include('client_class.php');

$crud = new Action();

//============ Start Login
if($action == "client_login_action"){
	$save = $crud->client_login_action();
	if($save)
		echo $save;
}
//============ End Login

//============ Start Registration
if($action == "client_reg_info_action"){
	$save = $crud->client_reg_info_action();
	if($save)
		echo $save;
}

if($action == "client_renew_action"){
	$save = $crud->client_renew_action();
	if($save)
		echo $save;
}

//============ End Registration

//============ Start add new client
if($action == "save_pending_client"){
	$save = $crud->save_pending_client();
	if($save)
		echo $save;
}
//============ End add new client

//============ Start add new client
if($action == "student_screenshot"){
	$save = $crud->student_screenshot();
	// if($save)
	// 	echo $save;
}
//============ End add new client


//============ Start 
// if($action == "student_packages"){
// 	$save = $crud->student_packages();
// 	// if($save)
// 	// 	echo $save;
// }
//============ End  

//============ Start 
if($action == "non_student_screenshot"){
	$save = $crud->non_student_screenshot();
	// if($save)
	// 	echo $save;
}
//============ End  


//============ Start 
if($action == "training_classes_info"){
	$save = $crud->training_classes_info();
	// if($save)
	// 	echo $save;
}
//============ End  


//=====================Start Fitness Goals
//============ Start 
if($action == "insert_new_goals_action"){
	$save = $crud->insert_new_goals_action();
	if($save)
		echo $save;
}
//============ End  

//============ Start 
if($action == "edit_fitness_goals_action"){
	$save = $crud->edit_fitness_goals_action();
	if($save)
		echo $save;
}
//============ End  
//=====================End Fitness Goals

//=================Start Password
if ($action == "save_new_password_action") {
	$save = $crud->save_new_password_action();
	if ($save) {
		echo $save;
	}
}
//=================End Password

//=================Start Comment
if ($action == "send_comment") {
	$save = $crud->send_comment();
	if ($save) {
		echo $save;
	}
}
//=================End Comment

//=================Start Address
if ($action == "metro_manila_province_action") {
	$save = $crud->metro_manila_province_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "metro_manila_city_action") {
	$save = $crud->metro_manila_city_action();
	if ($save) {
		echo $save;
	}
}

//=================End Address

//=================Start Client
if ($action == "insert_new_client_action") {
	$save = $crud->insert_new_client_action();
	if ($save) {
		echo $save;
	}
}
//=================End Address

//=================Start Create New Password
if ($action == "client_create_new_password") {
	$save = $crud->client_create_new_password();
	if ($save) {
		echo $save;
	}
}
//=================End Address


//=================Start Mail Recover Action
if ($action == "client_rp_mail_action") {
	$save = $crud->client_rp_mail_action();
	if ($save) {
		echo $save;
	}
}
//=================End Mail Recover Action


//=================Start Mail Recover Action
if ($action == "send_verification_code_action") {
	$save = $crud->send_verification_code_action();
	if ($save) {
		echo $save;
	}
}
//=================End Mail Recover Action


//============Start Verification Code
if ($action == "check_verification_code_action") {
	$save = $crud->check_verification_code_action();
	if ($save) {
		echo $save;
	}
}
//============End Send Verification Code

//============Start Address
if ($action == "address_action") {
	$save = $crud->address_action();
	if ($save) {
		echo $save;
	}
}
//============End Address

ob_end_flush();
?>
