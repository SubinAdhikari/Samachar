<?php
function insertArticle($conn, $data, $fileNameNew1){
	$stmtinsert=$conn->prepare("INSERT INTO tblarticle (`article_author`,`article_title`,`article_details`,`article_featuredimage`,`is_active`,`top_article`) VALUES (:article_author, :article_title, :article_details, :article_featuredimage, :is_active, :top_article)");
   
    $stmtinsert->bindParam(':article_author', $data['article_author']);
    $stmtinsert->bindParam(':article_title', $data['article_title']);
    $stmtinsert->bindParam(':article_details', $data['article_details']);
    $stmtinsert->bindParam(':article_featuredimage', $fileNameNew1);
    $stmtinsert->bindParam(':is_active', $data['is_active']);
    $stmtinsert->bindParam(':top_article', $data['top_article']);
    
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}

function updateArticle($conn, $data, $ref){
    $stmtupdate=$conn->prepare("UPDATE tblarticle SET article_author=:article_author, article_title=:article_title, article_details=:article_details, is_active=:is_active, top_article=:top_article WHERE article_id=:article_id");

    $stmtupdate->bindParam(':article_author', $data['article_author']);
    $stmtupdate->bindParam(':article_title', $data['article_title']);
    $stmtupdate->bindParam(':article_details', $data['article_details']);
    $stmtupdate->bindParam(':top_article', $data['top_article']);
    $stmtupdate->bindParam(':is_active', $data['is_active']);
    $stmtupdate->bindParam(':article_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}

function updateArticleImage($conn, $ref, $fileNameNew1){
    $stmtupdate=$conn->prepare("UPDATE tblarticle SET article_featuredimage=:article_featuredimage WHERE article_id=:article_id");
    $stmtupdate->bindParam(':article_featuredimage', $fileNameNew1);
    $stmtupdate->bindParam(':article_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function deleteArticle($conn, $articleId){
    $stmtdelete=$conn->prepare("DELETE FROM tblarticle WHERE article_id=:article_id");
    $stmtdelete->bindParam(':article_id', $articleId);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}
function selectArticleFromId($conn,$articleId){
    $stmtSelect = $conn->prepare("SELECT * FROM tblarticle WHERE article_id=:article_id");
    $stmtSelect->bindParam(':article_id',$articleId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function GetLatestThreeArticles($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblarticle ORDER BY article_views DESC LIMIT 3 ");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function GetArticlesOfSameWriter($conn, $name, $articleId){
    $stmtSelect = $conn->prepare("SELECT * FROM tblarticle WHERE article_author=:article_author AND
    article_id<>:article_id 
        ORDER BY article_id DESC LIMIT 3");
    $stmtSelect->bindParam(':article_author', $name);
    $stmtSelect->bindParam(':article_id', $articleId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function UpdateArticleVisitPage($conn,$data,$ref){
    $stmtupdate=$conn->prepare("UPDATE tblarticle SET article_views=:article_views  WHERE article_id=:article_id");

    $stmtupdate->bindParam(':article_views', $data);
    $stmtupdate->bindParam(':article_id', $ref);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}
function getAllArticleDetails($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblarticle");
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
?>