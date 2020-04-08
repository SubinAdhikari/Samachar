<?php
function retriveCategories($conn){
    $stmtSelect = $conn->prepare("SELECT category_name FROM tblcategory");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}

function subCategoryIdFetch($conn,$categoryName){
    $stmtSelect = $conn->prepare("SELECT category_id FROM tblcategory WHERE category_name=:category_name");
    $stmtSelect->bindParam(':category_name',$categoryName);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function insertSubCategory($conn,$data){
	$stmtinsert=$conn->prepare("INSERT INTO tblsubcategory (`subcategory_name`,`category_id`,`subcategory_descrption`,`is_active`) VALUES (:subcategory_name,:category_id,:subcategory_descrption,:is_active)");
	$stmtinsert->bindParam(':subcategory_name', $data['subcategory_name']);
	$stmtinsert->bindParam(':category_id', $data['category_id']);
	$stmtinsert->bindParam(':subcategory_descrption', $data['subcategory_descrption']);
	$stmtinsert->bindParam(':is_active', $data['is_active']);
	// $stmtinsert->bindParam(':created_date', $data['created_date']);
	// $stmtinsert->bindParam(':updated_date', $data['updated_date']);
	if ($stmtinsert->execute()) {
		return true;
	}
	return false; 
}
function UpdateSubCategory($conn, $data,$ref){
	$stmtupdate=$conn->prepare("UPDATE tblsubcategory SET subcategory_name=:subcategory_name, category_id=:category_id, subcategory_descrption=:subcategory_descrption, is_active=:is_active WHERE subcategory_id=:subcategory_id");

	$stmtupdate->bindParam(':subcategory_name', $data['subcategory_name']);
	$stmtupdate->bindParam(':category_id', $data['category_id']);
	$stmtupdate->bindParam(':subcategory_descrption', $data['subcategory_descrption']);
	$stmtupdate->bindParam(':is_active', $data['is_active']);
	$stmtupdate->bindParam(':subcategory_id', $ref);
	if ($stmtupdate->execute()) {
		return true;
	}
	return false;
}
function getSubCategoriesDetails($conn){
	$stmtSelect = $conn->prepare("SELECT * FROM tblsubcategory");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function selectCategoryNameByID($conn,$data){
	$stmtSelect = $conn->prepare("SELECT category_name FROM tblcategory WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$data);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function deleteSubCategory($conn, $subcategory_id){
	$stmtdelete=$conn->prepare("DELETE FROM tblsubcategory WHERE subcategory_id=:subcategory_id");
	$stmtdelete->bindParam(':subcategory_id', $subcategory_id);
	if ($stmtdelete->execute()) {
		return true;
	}
	return false;
}
function SelectSubCategoryDetailsFromId($conn,$ref){
	$stmtSelect = $conn->prepare("SELECT * FROM tblsubcategory WHERE subcategory_id=:subcategory_id");
    $stmtSelect->bindParam(':subcategory_id',$ref);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetch();
}
function selectNameBYID($conn,$data){
	$stmtSelect = $conn->prepare("SELECT category_name,category_id FROM tblcategory WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$data);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetch();
}
function SelectSubCategoryNameFromId($conn,$ref){
	$stmtSelect = $conn->prepare("SELECT subcategory_name FROM tblsubcategory WHERE subcategory_id=:subcategory_id");
    $stmtSelect->bindParam(':subcategory_id',$ref);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetch();
}
function getAllNewsBySubCategoryId($conn,$subcategory_id){
	$stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE subcategory_id=:subcategory_id");
    $stmtSelect->bindParam(':subcategory_id',$subcategory_id);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
?> 