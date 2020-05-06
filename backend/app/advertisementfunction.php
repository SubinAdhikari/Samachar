<?php

function insertAdvertisement($conn, $data, $fileNameNew1){
	$stmtinsert=$conn->prepare("INSERT INTO tbladvertisement (`advertisement_area`,`advertisement_specific_area`,`advertisement_name`,`advertisement_image`,`advertisement_expiry_date`,`status`) VALUES (:advertisement_area, :advertisement_specific_area, :advertisement_name, :advertisement_image, :advertisement_expiry_date, :status)");
    
    $stmtinsert->bindParam(':advertisement_area', $data['advertisement_area']);
    $stmtinsert->bindParam(':advertisement_specific_area', $data['advertisement_specific_area']);
    $stmtinsert->bindParam(':advertisement_name', $data['advertisement_name']);
    $stmtinsert->bindParam(':advertisement_image', $fileNameNew1);
    $stmtinsert->bindParam(':advertisement_expiry_date', $data['advertisement_expiry_date']);
    $stmtinsert->bindParam(':status', $data['status']);
    
	if ($stmtinsert->execute()) {
		return true;
	}
	return false;
}
function selectAllAdvertisement($conn){
    $stmtSelect = $conn->prepare("SELECT * FROM tbladvertisement ");
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function getSpecificAreas($conn,$areaName){
    $stmtSelect = $conn->prepare("SELECT * FROM tbladvertisement WHERE advertisement_area=:advertisement_area");
    $stmtSelect->bindParam(':advertisement_area',$areaName);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function selectIfAdvertisementIsFull($conn,$Advertisment_category){
    $stmtSelect = $conn->prepare("SELECT advertisement_category FROM tbladvertisement WHERE advertisement_category=:advertisement_category ");
    $stmtSelect->bindParam(':advertisement_category',$Advertisment_category);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}
function deleteAdvertisement($conn, $advertisement_id){
    $advertisement = selectAdvertisementFromId($conn,$advertisement_id);
    if (!unlink('../advertisementImage/'.$advertisement['advertisement_image'])) {  
        echo ("file_pointer cannot be deleted due to an error");  
    }  
    else {  
        echo ("file_pointer has been deleted");  
    }
    $stmtdelete=$conn->prepare("DELETE FROM tbladvertisement WHERE advertisement_id=:advertisement_id");
    $stmtdelete->bindParam(':advertisement_id', $advertisement_id);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}
function selectAllAdvertisementSpecificArea($conn,$area,$specificArea){
    $stmtSelect = $conn->prepare("SELECT advertisement_id,advertisement_category,advertisement_image,status,advertisement_expiry_date FROM tbladvertisement WHERE advertisement_area=:advertisement_area AND advertisement_specific_area=:advertisement_specific_area");
    $stmtSelect->bindParam(':advertisement_area',$area);
    $stmtSelect->bindParam(':advertisement_specific_area',$specificArea);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetchAll();
}
function selectAdvertisementFromId($conn,$advertisementId){   
    $stmtSelect= $conn->prepare("SELECT * FROM tbladvertisement WHERE advertisement_id=:advertisement_id");
    $stmtSelect->bindParam(':advertisement_id',$advertisementId);
    $stmtSelect->execute();
    $stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
    return $stmtSelect->fetch();
}
function updateDateOfAdvertisement($conn, $data){

    $stmtupdate=$conn->prepare("UPDATE tbladvertisement SET advertisement_expiry_date=:advertisement_expiry_date WHERE advertisement_id=:advertisement_id");

    $stmtupdate->bindParam(':advertisement_expiry_date', $data['advertisement_expiry_date']);
    $stmtupdate->bindParam(':advertisement_id', $data['advertisement_id']);
    if ($stmtupdate->execute()) {
        return true;
    }
    return false;
}

?>