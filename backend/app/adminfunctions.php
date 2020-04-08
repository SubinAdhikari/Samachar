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
function updateAdminUser($conn, $data){

	$stmtupdate=$conn->prepare("UPDATE tbladmin SET admin_fname=:admin_fname, admin_lname=:admin_lname, admin_username=:admin_username, admin_email=:admin_email, admin_phone=:admin_phone, is_active=:is_active WHERE admin_id=:admin_id");

	$stmtupdate->bindParam(':admin_fname', $data['admin_fname']);
	$stmtupdate->bindParam(':admin_lname', $data['admin_lname']);
	$stmtupdate->bindParam(':admin_username', $data['admin_username']);
	$stmtupdate->bindParam(':admin_email', $data['admin_email']);
	$stmtupdate->bindParam(':admin_phone', $data['admin_phone']);
	$stmtupdate->bindParam(':is_active', $data['is_active']);
	$stmtupdate->bindParam(':admin_id', $data['admin_id']);
	if ($stmtupdate->execute()) {
		return true;
	}
	return false;
}
function getAllAdminUsers($conn){
 	$stmtSelect = $conn->prepare("SELECT * FROM tbladmin");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function getAdminUserById($conn, $adminId){
 	$stmtSelect = $conn->prepare("SELECT * FROM tbladmin where admin_id=:admin_id");
 	$stmtSelect->bindParam(':admin_id',$adminId);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetch();
}
function deleteAdminUser($conn, $adminId){
	$stmtdelete=$conn->prepare("DELETE FROM tbladmin WHERE admin_id=:admin_id");
	$stmtdelete->bindParam(':admin_id', $adminId);
	if ($stmtdelete->execute()) {
		return true;
	}
	return false;
}
function checkEmail($conn,$adminEmail){
 	$stmtSelect = $conn->prepare("SELECT admin_email FROM tbladmin WHERE admin_email=:admin_email");
 	$stmtSelect->bindParam(':admin_email',$adminEmail);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	$stmtSelect->fetchAll();
 	if ($stmtSelect->rowCount()==0) {
 		return 'email_success';
 	}else{
 		return 'email_fail';
 	}

}
if (isset($_POST['check_email'])) {
			echo $_POST['check_email'];
			$adminEmail = $_POST['check_email'];
			$email_report = checkEmail($conn,$adminEmail);
			echo json_encode(array('error' => $email_report));
}