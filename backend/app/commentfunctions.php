<?php
function insertComment($conn, $data, $newsId){
	$stmtinsert=$conn->prepare("INSERT INTO tblcomment (`news_id`,`name`,`useremail`,`comment`) VALUES (:news_id, :name, :useremail, :comment)");

	$stmtinsert->bindParam(':news_id', $newsId);
	$stmtinsert->bindParam(':name', $data['name']);
	$stmtinsert->bindParam(':useremail', $data['email']);
	$stmtinsert->bindParam(':comment', $data['comment']);
	// $stmtinsert->bindParam(':is_active', 'active');	

	if ($stmtinsert->execute()) {
		return true;
	}
	return false; 
}

function getAllCommentsByNewsId($conn, $newsId){
 	$stmtSelect = $conn->prepare("SELECT * FROM tblcomment where news_id=:news_id");
 	$stmtSelect->bindParam(':news_id',$newsId);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}

function getAllComments($conn){
 	$stmtSelect = $conn->prepare("SELECT * FROM tblcomment");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function getCommentById($conn, $commentId){
 	$stmtSelect = $conn->prepare("SELECT * FROM tblcomment where comment_id=:comment_id");
 	$stmtSelect->bindParam(':comment_id',$commentId);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetch();
}

function updateComment($conn, $data){

	$stmtupdate=$conn->prepare("UPDATE tblcomment SET is_active=:is_active WHERE comment_id=:comment_id");
	$stmtupdate->bindParam(':is_active', $data['is_active']);
	$stmtupdate->bindParam(':comment_id', $data['comment_id']);
	if ($stmtupdate->execute()) {
		return true;
	}
	return false;
}

function deleteComment($conn, $commentId){
	$stmtdelete=$conn->prepare("DELETE FROM tblcomment WHERE comment_id=:comment_id");
	$stmtdelete->bindParam(':comment_id', $commentId);
	if ($stmtdelete->execute()) {
		return true;
	}
	return false;
}
function insertArticleComment($conn, $data, $articleId){
	$stmtinsert=$conn->prepare("INSERT INTO tblarticlecomment (`article_id`,`name`,`email`,`comment`) VALUES (:article_id, :name, :email, :comment)");

	$stmtinsert->bindParam(':article_id', $articleId);
	$stmtinsert->bindParam(':name', $data['name']);
	$stmtinsert->bindParam(':email', $data['email']);
	$stmtinsert->bindParam(':comment', $data['comment']);


	if ($stmtinsert->execute()) {
		return true;
	}
	return false; 
}
function getAllArticleCommentsByArticleId($conn, $articleId){
 	$stmtSelect = $conn->prepare("SELECT * FROM tblarticlecomment where article_id=:article_id");
 	$stmtSelect->bindParam(':article_id',$articleId);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}