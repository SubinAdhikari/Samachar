<?php
include '../app/call.php';

$categoryName=$_GET['categoryName'];
 
$message = array(); 

 $categoryId=subCategoryIdFetch($conn,$categoryName);
 $subCategories = getSubCategoriesByCategoryId($conn, $categoryId);


if(isset($categoryId)){
    foreach($categoryId as $row => $value){
        foreach($value as $key){
        	echo "<option value=$key>$key</option>";
            
        }
    }
    }


?>