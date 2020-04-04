<?php
session_start();
include '../app/call.php';

// $categoryName=$_GET['categoryName'];
 
// $message = array(); 

//  $categoryId=subCategoryIdFetch($conn,$categoryName);
//  $subCategories = getSubCategoriesByCategoryId($conn, $categoryId);


// if(isset($categoryId)){
//     foreach($categoryId as $row => $value){
//         foreach($value as $key){
//         	echo "<option value=$key>$key</option>";
            
//         }
//     }
//     }

$categoryName = $_POST['categoryName'];
$optionText='';
$categoryId=subCategoryIdFetch1($conn,$categoryName);
// $subcategories = getSubCategoriesByCategoryId($conn, $categoryId);
//  foreach($categoryId as $key){
//      foreach($key as $value){
//         $subCategories = getSubCategoriesByCategoryId($conn, $value);
//      }
//  }
$abc = implode("", $categoryId);
$subcategories = getSubCategoriesByCategoryId($conn, $abc);

if($subcategories)
{		
	foreach ($subcategories as $key => $subcategory) 
	{
		$optionText.= '<option value="'.$subcategory['subcategory_name'].'">'.$subcategory['subcategory_name'].'</option>';
	}

	echo $optionText;
}

else
{
	echo $optionText=0;
}
?>