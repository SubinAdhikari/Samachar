<?php
  include 'layouts/header.php';
  $comment_id=$_GET['ref'];
  if(deleteComment($conn, $comment_id)){
    showMsg('Comment Deleted Successfully');
    redirection('manageComments.php');
  }