<?php 
ob_start();
$action = $_GET['action'];

include('admin_class.php');

$crud = new Action();

//Login============ Start 
if ($action == "user_login_action") {
	$save = $crud->user_login_action();
	if ($save) {
		echo $save;
	}
}
//Login============ End 

//DASHBOARD============ Start approve member
if ($action == "approve_member_action") {
	$save = $crud->approve_member_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "approve_add_renew_member_action") {
	$save = $crud->approve_add_renew_member_action();
	if ($save) {
		echo $save;
	}
}


if ($action == "decline_member_action") {
	$save = $crud->decline_member_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "new_client_restore_member_action") {
	$save = $crud->new_client_restore_member_action();
	if ($save) {
		echo $save;
	}
}
//============ End approve member

//===========Start Member
if ($action == "trainor_fetch_id_data_action") {
	$save = $crud->trainor_fetch_id_data_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "save_trainor_action") {
	$save = $crud->save_trainor_action();
	if ($save) {
		echo $save;
	}
}
//===========End Member

//PAYMENTS============ Start 
if ($action == "filter_action") {
	$save = $crud->filter_action();
	if ($save) {
		echo $save;
	}
}
//============ End 

//MEMBERS============ Start edit member
if ($action == "edit_member_action") {
	$save = $crud->edit_member_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "archive_member_action") {
	$save = $crud->archive_member_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "restore_member_action") {
	$save = $crud->restore_member_action();
	if ($save) {
		echo $save;
	}
}
//============ End edit member


//SCHEDULES======== Start schedule
if($action == "save_schedule"){
	$save = $crud->save_schedule();
	if($save)
		echo $save;
}

if ($action == "get_schedule") {
	$save = $crud->get_schedule();
	if ($save) {
		echo $save;
	}
}

if ($action == "insert_new_classes_timetable_schedule") {
	$save = $crud->insert_new_classes_timetable_schedule();
	if ($save) {
		echo $save;
	}
}

if ($action == "delete_classes_timetable_schedule") {
	$save = $crud->delete_classes_timetable_schedule();
	if ($save) {
		echo $save;
	}
}



if ($action == "edit_classes_timetable_schedule") {
	$save = $crud->edit_classes_timetable_schedule();
	if ($save) {
		echo $save;
	}
}
//============ End  schedule

//CLIENT============ Start add new client
if($action == "save_new_client"){
	$save = $crud->save_new_client();
	if($save)
		echo $save;
}
//============ End add new client


//HEALTH STATUS============ Start add new client
if($action == "insert_progress_action"){
	$save = $crud->insert_progress_action();
	if($save)
		echo $save;
}

//--------------------------edit
if($action == "edit_progress_action"){
	$save = $crud->edit_progress_action();
	if($save)
		echo $save;
}


//--------------------------delete
if($action == "delete_progress"){
	$save = $crud->delete_progress();
	if($save)
		echo $save;
}


//============ End add new client

//Rates============ Start 
if($action == "delete_walk_in"){
	$save = $crud->delete_walk_in();
	if($save)
		echo $save;
}
//============ End 

//=================Start My Profile
if($action == "availability_action"){
	$save = $crud->availability_action();
	if($save)
		echo $save;
}

if($action == "classes_time_table_action"){
	$save = $crud->classes_time_table_action();
	if($save)
		echo $save;
}


//=================End My Profile

//Rates===================Start

if($action == "edit_package_action"){
	$save = $crud->edit_package_action();
	if($save)
		echo $save;
}

if($action == "delete_package_action"){
	$save = $crud->delete_package_action();
	if($save)
		echo $save;
}

//========================End

//Pricing=================Start Pricing
if($action == "insert_new_rate_action"){
	$save = $crud->insert_new_rate_action();
	if($save)
		echo $save;
}

if ($action == "insert_new_package_rate_action") {
	$save = $crud->insert_new_package_rate_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "insert_new_personal_training_rate_action") {
	$save = $crud->insert_new_personal_training_rate_action();
	if ($save) {
		echo $save;
	}
}


if ($action == "edit_package_rate_action") {
	$save = $crud->edit_package_rate_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "edit_walk_in_rate") {
	$save = $crud->edit_walk_in_rate();
	if ($save) {
		echo $save;
	}
}

//=================End Start Pricing


//================= Start Fitness Goals
//Add
if ($action == "insert_new_goals_action") {
	$save = $crud->insert_new_goals_action();
	if ($save) {
		echo $save;
	}
}

//View
if ($action == "view_goals_action") {
	$save = $crud->view_goals_action();
	if ($save) {
		echo $save;
	}
}

//Edit
if ($action == "edit_fitness_goals_action") {
	$save = $crud->edit_fitness_goals_action();
	if ($save) {
		echo $save;
	}
}


//Delete
if ($action == "delete_fitness_goals_action") {
	$save = $crud->delete_fitness_goals_action();
	if ($save) {
		echo $save;
	}
}
//=================End  Fitness Goals

//=================Start Assign Physical Fitness
if ($action == "assign_phyiscal_fitness") {
	$save = $crud->assign_phyiscal_fitness();
	if ($save) {
		echo $save;
	}
}

//Delete
if ($action == "delete_trainor_physical_fitness") {
	$save = $crud->delete_trainor_physical_fitness();
	if ($save) {
		echo $save;
	}
}

//Edit
if ($action == "edit_trainor_physical_fitness") {
	$save = $crud->edit_trainor_physical_fitness();
	if ($save) {
		echo $save;
	}
}
//=================End Assign Phyiscal Fitness

//=================Start  Physical Fitness

//Delete
if ($action == "delete_physical_fitness_action") {
	$save = $crud->delete_physical_fitness_action();
	if ($save) {
		echo $save;
	}
}
//=================End  Phyiscal Fitness

//=================Start Password
if ($action == "save_new_password_action") {
	$save = $crud->save_new_password_action();
	if ($save) {
		echo $save;
	}
}
//=================End Password


//TRAINOR=================Start Password
if ($action == "session_start_action") {
	$save = $crud->session_start_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "edit_trainor_action") {
	$save = $crud->edit_trainor_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "archive_trainor_action") {
	$save = $crud->archive_trainor_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "restore_trainor_action") {
	$save = $crud->restore_trainor_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "user_decline_action") {
	$save = $crud->user_decline_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "restore_decline_user_action") {
	$save = $crud->restore_decline_user_action();
	if ($save) {
		echo $save;
	}
}

//=================End Password

//============Start Trainor
if ($action == "insert_new_user_action") {
	$save = $crud->insert_new_user_action();
	if ($save) {
		echo $save;
	}
}

if ($action == "approve_user_action") {
	$save = $crud->approve_user_action();
	if ($save) {
		echo $save;
	}
}
//============End Trainor

//============Start Create New Password
if ($action == "user_create_new_password") {
	$save = $crud->user_create_new_password();
	if ($save) {
		echo $save;
	}
}
//============End Trainor


//============Start Send Email Message
if ($action == "user_rp_mail_action") {
	$save = $crud->user_rp_mail_action();
	if ($save) {
		echo $save;
	}
}
//============End Send Email Message


//============Start Verification Code
if ($action == "send_verification_code") {
	$save = $crud->send_verification_code();
	if ($save) {
		echo $save;
	}
}
//============End Send Verification Code


//============Start Verification Code
if ($action == "check_verification_code") {
	$save = $crud->check_verification_code();
	if ($save) {
		echo $save;
	}
}
//============End Send Verification Code

//============Start Get Status
if ($action == "refresh_get_status") {
	$save = $crud->refresh_get_status();
	if ($save) {
		echo $save;
	}
}
//============End Get Status

//============Start Get Status
if($action == 'add_region_action'){
	$save = $crud->add_region_action();
	if($save){
		echo $save;
	}
}
//============End Get Status

//============Start Get Status
if($action == 'region_table_action'){
	$save = $crud->region_table_action();
	if($save){
		echo $save;
	}
}
//============End Get Status

//============Start Address
if ($action == "address_action") {
	$save = $crud->address_action();
	if ($save) {
		echo $save;
	}
}
//============End Address

//============Start Address
if ($action == "resend_verification_code_action") {
	$save = $crud->resend_verification_code_action();
	if ($save) {
		echo $save;
	}
}
//============End Address

//============Start Announcement
if ($action == "insert_announcement_action") {
	$save = $crud->insert_announcement_action();
	if ($save) {
		echo $save;
	}
}

if($action == 'delete_announcement_action'){
	$save = $crud->delete_announcement_action();
	if($save){
		echo $save;
	}
}

if($action == 'edit_announcement_action'){
	$save = $crud->edit_announcement_action();
	if($save){
		echo $save;
	}

}
//============End Announcement

//============Start Gym Equipment
if($action == 'insert_gym_education_action'){
	$save = $crud->insert_gym_education_action();
	if($save){
		echo $save;
	}
}

if($action == 'edit_gym_equipment_action'){
	$save = $crud->edit_gym_equipment_action();
	if($save){
		echo $save;
	}
}

if($action == 'delete_gym_equipment_action'){
	$save = $crud->delete_gym_equipment_action();
	if($save){
		echo $save;
	}
}
//============End Gym Equipment



//============Start Gym Equipment
if($action == 'maintenance_action'){
	$save = $crud->maintenance_action();
	if($save){
		echo $save;
	}
}

//============End Gym Equipment

ob_end_flush();
?>
