<?php
  include 'layouts/header.php';
  $newsId=$_GET['ref'];
  $news = selectNewsFromId($conn,$newsId);
  	$file='../videoImage';
  	chmod($file, 0777);
  	$file1= '../newsVideos';
  	chmod($file1, 0777);
  	if (!unlink('../videoImage/'.$news['news_featuredimage'])) {  
        echo ("file_pointer cannot be deleted due to an error");  
    }  
    else {  
        echo ("file_pointer has been deleted");  
    }
    if (!unlink('../newsVideos/'.$news['news_video'])) {  
        echo ("file_pointer cannot be deleted due to an error");  
    }  
    else {  
        echo ("file_pointer has been deleted");  
    }
  if(deleteNews($conn, $newsId)){
  	
    showMsg('Video News Deleted Successfully');
    redirection('manageVideoNews.php');
  } 