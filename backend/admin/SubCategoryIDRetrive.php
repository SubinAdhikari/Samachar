<?php
include '../app/call.php';

$categoryName=$_GET['categoryName'];
 
// $message = array(); 
 // if(isset($_POST['categoryName'])){
 // $categoryName=$_POST['categoryName'];	
 $categoryId=subCategoryIdFetch($conn,$categoryName);


if(isset($categoryId)){
    foreach($categoryId as $row => $value){
        foreach($value as $key){
        	echo "<option value=$key>$key</option>";
            // $message['option'] = "<option value=$key>$key</option>";
        }
    }
    }

// }
// header('Content-type: application/json'); 
// echo json_encode($message);
?>