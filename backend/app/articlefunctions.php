<?php
function insertArticle($conn, $data, $fileNameNew1){
	$stmtinsert=$conn->prepare("INSERT INTO tblarticle (`article_id`,`article_title`,`article_details`,`article_featuredimage`,`is_active`,`top_article`) VALUES (:article_id, :article_title, :article_details, :article_featuredimage, :is_active, :top_article)");

    $stmtinsert->bindParam(':article_id', $data['article_id']);
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
function selectArticleFromId($conn,$articleId){
    $stmtSelect = $conn->prepare("SELECT * FROM tblarticle WHERE article_id=:article_id");
    $stmtSelect->bindParam(':article_id',$articleId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
?>