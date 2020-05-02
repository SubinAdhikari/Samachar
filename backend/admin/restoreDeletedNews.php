<?php
include 'layouts/header.php';
$ref=$_GET['ref'];
$data=getDeletedNewsByID($conn,$ref);
// print_r($data);
if(restoreDeletedNews($conn,$data)){
    deleteTrashNewsFromTrashNotPhoto($conn,$ref);
    redirection('manageNews.php');
}
?>