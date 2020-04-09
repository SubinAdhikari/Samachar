<?php

function insertAdvertisement($conn, $data, $fileNameNew1){
	$stmtinsert=$conn->prepare("INSERT INTO tbladvertisement (`advertisement_name`,`advertisement_category`,`advertisement_image`,`advertisement_expiry_date`,`status`) VALUES (:advertisement_name, :advertisement_category, :advertisement_image, :advertisement_expiry_date, :status)");
   
    $stmtinsert->bindParam(':advertisement_name', $data['advertisement_name']);
    $stmtinsert->bindParam(':advertisement_category', $data['advertisement_category']);
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

function selectAllAdvertisementOfGold($conn,$data){
    $stmtSelect = $conn->prepare("SELECT advertisement_id,advertisement_category,advertisement_image,status,advertisement_expiry_date FROM tbladvertisement WHERE advertisement_category=:advertisement_category ");
    $stmtSelect->bindParam(':advertisement_category',$data);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}

function selectAllAdvertisementOfSilver($conn,$data){
    $stmtSelect = $conn->prepare("SELECT advertisement_id,advertisement_category,advertisement_image,status,advertisement_expiry_date FROM tbladvertisement WHERE advertisement_category=:advertisement_category ");
    $stmtSelect->bindParam(':advertisement_category',$data);
 	$stmtSelect->execute();
 	$stmtSelect->setFetchMode(PDO::FETCH_ASSOC);
 	return $stmtSelect->fetchAll();
}

function selectAllAdvertisementOfBronze($conn,$data){
    $stmtSelect = $conn->prepare("SELECT advertisement_id,advertisement_category,advertisement_image,status,advertisement_expiry_date FROM tbladvertisement WHERE advertisement_category=:advertisement_category ");
    $stmtSelect->bindParam(':advertisement_category',$data);
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
    $stmtdelete=$conn->prepare("DELETE FROM tbladvertisement WHERE advertisement_id=:advertisement_id");
    $stmtdelete->bindParam(':advertisement_id', $advertisement_id);
    if ($stmtdelete->execute()) {
        return true;
    }
    return false;
}
?>