<?php
session_start();
include '../app/call.php';


$area = $_POST['areaName'];
$optionText='<option value="">Select Subcategory</option>';
$specificAreas = array();
if ($area == 'front_page') {
	array_push($specificAreas,'first_top','second_top','first_banner','second_banner','third_banner','first_side','second_side','first_bottom');        
}elseif ($area == 'category_page') {
    array_push($specificAreas,'below_categoryTitleFirst','below_categoryTitleSecond','below_categoryNewsFirstSide','below_categoryNewsSecondSide','below_categoryNewsList','above_categoryFooter');
}elseif ($area == 'news_detailpage') {
    array_push($specificAreas,'below_newsTitle','below_newsPhoto','below_newsFirstPara','below_newsLastPara','above_newsComment');
}elseif ($area == 'article_detailpage') {
    array_push($specificAreas,'below_articleTitle','below_articlePhoto','below_articleFirstPara','below_articleLastPara','above_articleComment');
}

$specificAreasDb = getSpecificAreas($conn, $area);
print_r($specificAreasDb);
foreach($specificAreasDb as $key => $value){
	deleteElement($value['advertisement_specific_area'], $specificAreas);
}




if($specificAreas)
{		
	foreach ($specificAreas as $key => $value) 
	{
		$optionText.= '<option value="'.$value.'">'.$value.'</option>';
	}

	echo $optionText;
}

else
{
	echo $optionText=0;
}

function deleteElement($element, &$array){
    $index = array_search($element, $array);
    if($index !== false){
        unset($array[$index]);
    }
}
?>