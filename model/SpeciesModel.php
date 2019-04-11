<?php

function getAllSpecies(){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function getGeslachts()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `geslacht`
		ORDER BY `geslacht`.`geslacht_description` ASC";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function getSpecies()
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `species` 
	ORDER BY `species`.`species_description` ASC";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
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