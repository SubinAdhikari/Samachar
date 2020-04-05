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
function subCategoryIdFetchByName($conn,$subCategoryName){
	$stmtSelect = $conn->prepare("SELECT subcategory_id FROM tblsubcategory WHERE subcategory_name=:subcategory_name");
    $stmtSelect->bindParam(':subcategory_name',$subCategoryName);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function insertNews($conn, $data){
	$stmtinsert=$conn->prepare("INSERT INTO tblnews (`news_title`,`category_id`,`subcategory_id`,`news_deails`,`news_url`,`is_active`,`top_news`) VALUES (:news_title, :category_id, :subcategory_id,:news_details, :news_url, :is_active, :top_news)");

	$stmtinsert->bindParam(':news_title', $data['news_title']);
    $stmtinsert->bindParam(':category_id', $data['category_id']);
    $stmtinsert->bindParam(':subcategory_id', $data['subcategory_id']);
    $stmtinsert->bindParam(':news_details', $data['news_details']);
    $stmtinsert->bindParam(':news_url', $data['news_url']);
    $stmtinsert->bindParam(':is_active', $data['is_active']);
    $stmtinsert->bindParam(':top_news', $data['top_news']);
    
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}
function getAllNewsDetails($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getCategoryNameByCategoryId($conn,$categoryId){   
    $stmtSelect= $conn->prepare("SELECT category_name FROM tblcategory WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$categoryId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();

}
function getSubCategoryNameByCategoryId($conn,$subCategoryId){   
    $stmtSelect= $conn->prepare("SELECT subcategory_name FROM tblsubcategory WHERE subcategory_id=:subcategory_id");
    $stmtSelect->bindParam(':subcategory_id',$subCategoryId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function selectNewsFromId($conn,$newsId){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE news_id=:news_id");
    $stmtSelect->bindParam(':news_id',$newsId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function updateNews($conn, $data, $ref){
    $stmtupdate=$conn->prepare("UPDATE tblnews SET news_title=:news_title, news_deails=:news_deails ,news_url=:news_url,  is_active=:is_active,top_news=:top_news WHERE news_id=:news_id");

    $stmtupdate->bindParam(':news_title', $data['news_title']);
    $stmtupdate->bindParam(':news_deails', $data['news_deails']);
    $stmtupdate->bindParam(':news_url', $data['news_url']);
    $stmtupdate->bindParam(':top_news', $data['top_news']);
    $stmtupdate->bindParam(':is_active', $data['is_active']);
    $stmtupdate->bindParam(':news_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function deleteNews($conn, $newsId){
    $stmtdelete=$conn->prepare("DELETE FROM tblnews WHERE news_id=:news_id");
    $stmtdelete->bindParam(':news_id', $newsId);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}
?>