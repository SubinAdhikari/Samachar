<?php

function RetriveAllNews($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}

function searchNewsByID($conn,$newsId){
    $stmtSelect = $conn->prepare("SELECT * FROM tblnews WHERE news_id=:news_id");
    $stmtSelect->bindParam(':news_id',$newsId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}

?>