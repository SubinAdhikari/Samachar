<?php
include 'layouts/header.php';
$ref=$_GET['ref'];
$data=selectNewsArchiveId($conn,$ref);
// print_r($data);
if(restoreArchivedNews($conn,$data)){
    removeFromArchive($conn,$ref);
    redirection('manageArchiveNews.php');
}
?>