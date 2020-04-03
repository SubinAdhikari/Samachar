<?php
function insertAdminUser($conn, $data){
	$data['admin_password']=md5($data['admin_password']);
	$stmtinsert=$conn->prepare("INSERT INTO tbladmin (`admin_fname`,`admin_lname`,`admin_username`,`admin_password`,`admin_email`,`admin_phone`,`is_active`) VALUES (:admin_fname, :admin_lname,:admin_username,:admin_password,:admin_email,:admin_phone ,:is_active)");

	$stmtinsert->bindParam(':admin_fname', $data['admin_fname']);
	$stmtinsert->bindParam(':admin_lname', $data['admin_lname']);
	$stmtinsert->bindParam(':admin_username', $data['admin_username']);
	$stmtinsert->bindParam(':admin_password', $data['admin_password']);
	$stmtinsert->bindParam(':admin_email', $data['admin_email']);
	$stmtinsert->bindParam(':admin_phone', $data['admin_phone']);
	$stmtinsert->bindParam(':is_active', $data['is_active']);
	// $stmtinsert->bindParam(':created_date', $data['created_date']);
	// $stmtinsert->bindParam(':updated_date', $data['updated_date']);
	if ($stmtinsert->execute()) {
		return true;
	}
	return false; 
}

