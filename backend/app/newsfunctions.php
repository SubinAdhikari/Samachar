<?php
function retriveSubCategories($conn){
    $stmtSelect = $conn->prepare("SELECT category_name FROM tblsubcategory");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}

function getSubCategoriesByCategoryId($conn,$categoryId){
	$stmtSelect= $conn->prepare("SELECT subcategory_name FROM tblsubcategory WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$categoryId);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();

}


?>