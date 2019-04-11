<?php

function getAllPatients(){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM patients";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function getPatients()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `patients`
		JOIN `species` ON `patients`.`species_id` = `species`.`species_id`
		JOIN `clients` ON `patients`.`client_id` = `clients`.`client_id`
		ORDER BY `patients`.`patient_name` ASC";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function getPatient($idP)
{
    $db = openDatabaseConnection();
    $sql = "SELECT * FROM `Patients` WHERE patient_id = :idP LIMIT 1";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":idP" => $idP
    ));
    $db = null;
    return $query->fetch();
}

function createPatient()
{
	$Name = ucwords($_POST["patientName"]);
	$patient = isset($Name) ? $Name : null;
	$species = isset($_POST["species"]) ? $_POST["species"] : null;
	$client = isset($_POST["client"]) ? $_POST["client"] : null;
	$status = isset($_POST["status"]) ? $_POST["status"] : null;
	$geslacht = isset($_POST["geslacht"]) ? $_POST["geslacht"] : null;
	
	if ($patient === null || $species === null || $client === null || $status === null || $geslacht === null) {
		return false;
		exit();
	}
	$db = openDatabaseConnection();
	$sql = "INSERT INTO `patients` (`patient_name`, `species_id`, `client_id`, `patient_status`,geslacht_id) 
	VALUES (:patient, :species, :client, :status, :geslacht)";
	$query = $db->prepare($sql);
	$query->execute(array(
		":patient" => $patient,
		":species" => $species,
		":client" => $client,
		":status" => $status,
		":geslacht" => $geslacht
	));
	$db = null;
	return true;
}

function editPatient($idP)
{	
	$Name = ucwords($_POST["patientName"]);
	$patient = isset($Name) ? $Name : null;
	$status = isset($_POST["status"]) ? $_POST["status"] : null;
	if ($patient === null || $status === null) {
		return false;
		exit();
	}
	$db = openDatabaseConnection();
	$sql = "UPDATE `patients` 
		SET `patient_name`= :patient, `patient_status`= :status 
		WHERE patient_id = :idP";
	$query = $db->prepare($sql);
	$query->execute(array(
		":patient" => $patient,
		":status" => $status,
		":idP" => $idP
	));
	$db = null;
	return true;
}