<?php
  include 'layouts/header.php';
  $comment_id=$_GET['ref'];
  if(deleteArticleComment($conn, $comment_id)){
    showMsg('Comment Deleted Successfully');
    redirection('manageArticleComments.php');
  }