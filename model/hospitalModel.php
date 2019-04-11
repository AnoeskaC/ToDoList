<?php

function generatePatients()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `patients`
		JOIN `species` ON `patients`.`species_id` = `species`.`species_id`
		JOIN `clients` ON `patients`.`client_id` = `clients`.`client_id`
		JOIN `gender` ON `patients`.`gender_id` =`gender`.`gender_id`
		ORDER BY `patients`.`patient_name` ASC";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function generateGenders()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `gender`
		ORDER BY `gender`.`gender_description` ASC";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function generateClients()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `clients`
		ORDER BY `clients`.`client_lastname` ASC";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function generateSpecies()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `species` 
	ORDER BY `species`.`species_description` ASC";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function createClient()
{
	$firstname = ucwords($_POST["firstname"]);
	$lastname = ucwords($_POST["lastname"]);
	$client_firstname = isset($firstname) ? $firstname : null;
	$client_lastname = isset($lastname) ? $lastname : null;
	$phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
	$email = isset($_POST["email"]) ? $_POST["email"] : null;
	
	if ($client_firstname === null || $client_lastname === null || $phone === null || $email === null) {
		return false;
		exit();
	}
	$db = openDatabaseConnection();
	$sql = "INSERT INTO `clients` (`client_firstname`, `client_lastname`, `client_phone`, `client_Email`) 
	VALUES (:client_firstname, :client_lastname, :phone, :email)";
	$query = $db->prepare($sql);
	$query->execute(array(
		":client_firstname" => $client_firstname,
		":client_lastname" => $client_lastname,
		":phone" => $phone,
		":email" => $email
	));
	$db = null;
	return true;
}

function createSpecies()
{
	$Name = ucwords($_POST["species"]);
	$species = isset($Name) ? $Name : null;
	
	if ($species === null) {
		return false;
		exit();
	}
	$db = openDatabaseConnection();
	$sql = "INSERT INTO `species` (`species_description`) 
	VALUES (:species)";
	$query = $db->prepare($sql);
	$query->execute(array(
		":species" => $species
	));
	$db = null;
	return true;
}

function createPatient()
{
	$Name = ucwords($_POST["patientName"]);
	$patient = isset($Name) ? $Name : null;
	$species = isset($_POST["species"]) ? $_POST["species"] : null;
	$client = isset($_POST["client"]) ? $_POST["client"] : null;
	$status = isset($_POST["status"]) ? $_POST["status"] : null;
	$gender = isset($_POST["gender"]) ? $_POST["gender"] : null;
	
	if ($patient === null || $species === null || $client === null || $status === null || $gender === null) {
		return false;
		exit();
	}
	$db = openDatabaseConnection();
	$sql = "INSERT INTO `patients` (`patient_name`, `species_id`, `client_id`, `patient_status`,gender_id) 
	VALUES (:patient, :species, :client, :status, :gender)";
	$query = $db->prepare($sql);
	$query->execute(array(
		":patient" => $patient,
		":species" => $species,
		":client" => $client,
		":status" => $status,
		":gender" => $gender
	));
	$db = null;
	return true;
}

function getClient($idC)
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `clients` WHERE client_id = :idC LIMIT 1";
	$query = $db->prepare($sql);
	$query->execute(array(
     	":idC" => $idC
	));
	$db = null;
	return $query->fetch();
}

function getSpecie($idS)
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `species` WHERE species_id = :idS LIMIT 1";
	$query = $db->prepare($sql);
	$query->execute(array(
     	":idS" => $idS
	));
	$db = null;
	return $query->fetch();
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

function editClient($idC)
{
	$firstname = ucwords($_POST["firstname"]);
	$lastname = ucwords($_POST["lastname"]);
	$client_firstname = isset($firstname) ? $firstname : null;
	$client_lastname = isset($lastname) ? $lastname : null;
	$phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
	$email = isset($_POST["email"]) ? $_POST["email"] : null;
	if ($client_firstname === null || $client_lastname === null || $phone === null || $email === null) {
		return false;
		exit();
	}
	$db = openDatabaseConnection();
	$sql = "UPDATE `clients` 
		SET `client_firstname`= :client_firstname, `client_lastname`= :client_lastname, `client_phone`= :phone, `client_Email`= :email 
		WHERE client_id = :idC";
	$query = $db->prepare($sql);
	$query->execute(array(
		":client_firstname" => $client_firstname,
		":client_lastname" => $client_lastname,
		":phone" => $phone,
		":email" => $email,
		":idC" => $idC
	));
	$db = null;
	return true;
}

function editSpecie($idS)
{
	$Name = ucwords($_POST["species"]);
	$species = isset($Name) ? $Name : null;
	if ($species === null) {
		return false;
		exit();
	}
	$db = openDatabaseConnection();
	$sql = "UPDATE `species` 
		SET `species_description`= :species
		WHERE species_id = :idS";
	$query = $db->prepare($sql);
	$query->execute(array(
		":species" => $species,
		":idS" => $idS
	));
	$db = null;
	return true;
}

function deleteSpecie($idS)
{
	if ($idS === '') {
		return false;
	}
	$db = openDatabaseConnection();
	$sql = "DELETE FROM `species` WHERE species_id = :idS";
	$query = $db->prepare($sql);
	$query->execute(array(
     	":idS" => $idS
	));
	$db = null;
	return true;
}

function deleteClient($idC)
{
	if ($idC === '') {
		return false;
     	exit();
	}
	$db = openDatabaseConnection();
	$sql = "DELETE FROM `clients` WHERE client_id = :idC";
	$query = $db->prepare($sql);
	$query->execute(array(
		":idC" => $idC
	));
	$db = null;
	return true;
}