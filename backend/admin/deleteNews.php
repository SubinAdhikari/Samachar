<?php
  include 'layouts/header.php';
  $newsId=$_GET['ref'];
  if(deleteNews($conn, $newsId)){
    showMsg('News Deleted Successfully');
    redirection('manageNews.php');
  }