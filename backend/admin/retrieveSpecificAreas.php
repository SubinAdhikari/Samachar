<?php
session_start();
include '../app/call.php';


$area = $_POST['areaName'];
$optionText='<option value="">Select Subcategory</option>';
$specificAreas = array();
if ($area == 'header') {
    array_push($specificAreas,'header');        
}elseif ($area == 'front_page') {
	array_push($specificAreas,'first_top','second_top','first_banner','second_banner','third_banner','above_category1st','above_category2nd','above_category3rd','above_category4th','above_category5th','above_category6th','above_category7th','above_category8th','above_category9th','above_category10th','above_category11th','first_side','second_side','third_side','fourth_side','fifth_side','sixth_side','seventh_side','eighth_side','nineth_side','tenth_side','eleventh_side','twelveth_side','first_bottom');        
}elseif ($area == 'category_page') {
    array_push($specificAreas,'below_categoryTitleFirst','below_categoryTitleSecond','below_categoryNewsFirstSide','below_categoryNewsSecondSide','below_categoryNewsThirdSide','below_categoryNewsFourthSide','below_categoryNewsFifthSide','below_categoryNewsSixthSide','below_categoryNewsList','above_categoryFooter');
}elseif ($area == 'subcategory_page') {
    array_push($specificAreas,'below_subcategoryTitleFirst','below_subcategoryTitleSecond','below_subcategoryNewsFirstSide','below_subcategoryNewsSecondSide','below_subcategoryNewsThirdSide','below_subcategoryNewsFourthSide','below_subcategoryNewsFifthSide','below_subcategoryNewsSixthSide','below_subcategoryNewsList','above_subcategoryFooter');
}elseif ($area == 'search_resultpage') {
    array_push($specificAreas,'below_searchResultNavbarFirst','below_searchResultNavbarSecond','below_searchResultFirstSide','below_searchResultSecondSide','below_searchResultThirdSide','below_searchResultFourthSide','below_searchResultFifthSide','below_searchResultSixthSide','below_searchResultNewsList','above_searchResultFooter');
}elseif ($area == 'news_detailpage') {
    array_push($specificAreas,'below_newsTitle','below_newsPhoto','below_newsFirstSide','below_newsSecondSide','below_newsThirdSide','below_newsFourthSide','below_newsFifthSide','below_newsSixthSide','below_newsSeventhSide','below_newsFirstPara','below_newsLastPara','above_newsComment');
}elseif ($area == 'article_detailpage') {
    array_push($specificAreas,'below_articleTitle','below_articlePhoto','below_articleFirstSide','below_articleSecondSide','below_articleThirdSide','below_articleFourthSide','below_articleFifthSide','below_articleSixthSide','below_articleSeventhSide','below_articleFirstPara','below_articleLastPara','above_articleComment');
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