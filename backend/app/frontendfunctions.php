<?php
function selectAllCategory($conn){
    $stmtSelect = $conn->prepare("SELECT category_id,category_name FROM tblcategory");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

function selectSubcategoryFromCategoryId($conn,$key){
	$stmtSelect = $conn->prepare("SELECT subcategory_name FROM tblsubcategory WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$key);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function GetLatestNews($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews ORDER BY news_id DESC LIMIT 1 ");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function GetSecondLastNews($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews ORDER BY news_id DESC LIMIT 1,1 ");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function GetThirdLastNews($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews ORDER BY news_id DESC LIMIT 2,1 ");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function GetForthLastNews($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews ORDER BY news_id DESC LIMIT 3,1 ");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

?>