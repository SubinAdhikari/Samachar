<?php
function insertAdminUser($conn, $data){
	$data['admin_password']=md5($data['admin_password']);
	$stmtinsert=$conn->prepare("INSERT INTO tbladminlogin (`admin_fname`,`admin_lastname`,`admin_email`,`admin_password`,`is_active`) VALUES (:admin_fname, :admin_lname, :admin_email, :admin_password, :is_active)");

	$stmtinsert->bindParam(':admin_fname', $data['admin_fname']);
	$stmtinsert->bindParam(':admin_lname', $data['admin_lname']);
	$stmtinsert->bindParam(':admin_email', $data['admin_email']);
	$stmtinsert->bindParam(':admin_password', $data['admin_password']);
	$stmtinsert->bindParam(':is_active', $data['is_active']);
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}