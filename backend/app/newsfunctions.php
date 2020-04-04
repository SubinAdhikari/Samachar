<?php
function retriveSubCategories($conn){
    $stmtSelect = $conn->prepare("SELECT category_name FROM tblsubcategory");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}

function getSubCategoriesByCategoryId($conn,$categoryId){
	
	$stmtSelect= $conn->prepare("SELECT * FROM tblsubcategory WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$categoryId);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();

}
function subCategoryIdFetch1($conn,$categoryName){
    $stmtSelect = $conn->prepare("SELECT category_id FROM tblcategory WHERE category_name=:category_name");
    $stmtSelect->bindParam(':category_name',$categoryName);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetch();
}


?>