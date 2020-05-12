<?php
function selectAllCategory($conn){
    $stmtSelect = $conn->prepare("SELECT category_id,category_name FROM tblcategory");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

function selectSubcategoryFromCategoryId($conn,$key){
	$stmtSelect = $conn->prepare("SELECT subcategory_name,subcategory_id FROM tblsubcategory WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$key);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC); 
 	return $stmtSelect->fetchAll();
}
function GetLatestNews($conn){
    $empty='';
    $value='no';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE is_bannerNews=:is_bannerNews AND news_video=:news_video ORDER BY news_id DESC LIMIT 1 ");
    $stmtSelect->bindParam(':is_bannerNews',$value);
    $stmtSelect->bindParam(':news_video',$empty);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function GetLatestThreeBannerNews($conn){
    $value='yes';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE is_bannerNews=:is_bannerNews ORDER BY news_id DESC LIMIT 3 ");
    $stmtSelect->bindParam(':is_bannerNews',$value);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}   
function GetSecondLastNews($conn){
    $empty='';
    $value='no';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE is_bannerNews=:is_bannerNews AND news_video=:news_video ORDER BY news_id DESC LIMIT 1,1 ");
    $stmtSelect->bindParam(':is_bannerNews',$value);
    $stmtSelect->bindParam(':news_video',$empty);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function GetThirdLastNews($conn){
    $empty='';
    $value='no';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE is_bannerNews=:is_bannerNews AND news_video=:news_video ORDER BY news_id DESC LIMIT 2,1 ");
    $stmtSelect->bindParam(':is_bannerNews',$value);
    $stmtSelect->bindParam(':news_video',$empty);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function GetForthLastNews($conn){
    $empty='';
    $value='no';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE is_bannerNews=:is_bannerNews AND news_video=:news_video  ORDER BY news_id DESC LIMIT 3,1 ");
    $stmtSelect->bindParam(':is_bannerNews',$value);
    $stmtSelect->bindParam(':news_video',$empty);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getNewsByCategoryID($conn,$key){
    $value = 76;
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE category_id=:category_id AND subcategory_id<>:subcategory_id ORDER BY news_id DESC LIMIT 3");
    $stmtSelect->bindParam(':category_id',$key);
    $stmtSelect->bindParam(':subcategory_id',$value);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function GetLatestThreeNews($conn){
    $empty='';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE news_video=:news_video ORDER BY news_visit DESC LIMIT 5");
    $stmtSelect->bindParam(':news_video',$empty);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function GetWritingsByAuthor($conn, $writtenBy, $newsId){
    //category id of bichar
    $category_id='4';
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE news_writtenby=:news_writtenby AND category_id=:category_id AND news_id<>:news_id ORDER BY news_visit DESC LIMIT 5");
    $stmtSelect->bindParam(':news_writtenby',$writtenBy);
    $stmtSelect->bindParam(':category_id',$category_id);
    $stmtSelect->bindParam(':news_id',$newsId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getAllNewsByCategoryId($conn,$key){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE category_id=:category_id ORDER BY news_id DESC");
    $stmtSelect->bindParam(':category_id',$key);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function getCategoryDetailByCategoryID($conn,$key){
    $stmtSelect = $conn->prepare("SELECT * FROM tblcategory WHERE category_id=:category_id");
    $stmtSelect->bindParam(':category_id',$key);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
    }
function selectLatestArticle($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblarticle ORDER BY article_id DESC LIMIT 6 ");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
?>