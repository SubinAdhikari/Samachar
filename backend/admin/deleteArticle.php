<?php
  include 'layouts/header.php';
  $article_id=$_GET['ref'];
  if(deleteArticle($conn, $article_id)){
    showMsg('Article Deleted Successfully');
    redirection('manageArticle.php');
  }