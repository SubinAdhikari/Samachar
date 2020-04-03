<?php
function insertCatagory($conn, $data){
	$stmtinsert=$conn->prepare("INSERT INTO tblcategory (`category_name`,`category_descrption`,`is_active`) VALUES (:category_name, :category_descrption,:is_active)");

	$stmtinsert->bindParam(':category_name', $data['category_name']);
    $stmtinsert->bindParam(':category_descrption', $data['category_descrption']);
    $stmtinsert->bindParam(':is_active', $data['is_active']);
	if ($stmtinsert->execute()) {
		return true;
	}
	return false; 
}
?>