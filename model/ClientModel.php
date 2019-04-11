<?php

function getAllClients()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM clients";

	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getClient($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM clients WHERE client_id = :id LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return $query->fetch();
}

function createClient()
{
	$Firstname = isset($_POST["Firstname"]) ? $_POST["Firstname"] : null;
	$Lastname = isset($_POST["Lastname"]) ? $_POST["Lastname"] : null;
	$Phone = isset($_POST["Phone"]) ? $_POST["Phone"] : null;
	$Email = isset($_POST["Email"]) ? $_POST["Email"] : null;
	
	if ($Firstname === null || $Lastname === null || $Phone === null || $Email === null) {
		return false;
	}
	//Database verbinding maken
	$db = openDatabaseConnection();

	$sql = "INSERT INTO clients (client_Firstname, client_Lastname, client_Phone, client_Email) VALUES (:Firstname, :Lastname, :Phone, :Email)";

	$query = $db->prepare($sql);
	$query->execute(array(
		":Firstname" => $Firstname,
		":Lastname" => $Lastname,
		":Phone" => $Phone,
		":Email" => $Email  
	));

	//Database verbinding sluiten
	$db = null;

	return true;
}

function deleteClient($id)
{
	if ($id === '') {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "DELETE FROM clients WHERE client_id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return true;
}

function editClient($id=null)
{
	$Firstname = isset($_POST["Firstname"]) ? $_POST["Firstname"] : null;
	$Lastname = isset($_POST["Lastname"]) ? $_POST["Lastname"] : null;
	$Phone = isset($_POST["Phone"]) ? $_POST["Phone"] : null;
	$Email = isset($_POST["Email"]) ? $_POST["Email"] : null;
	
	if ($id === null || $Firstname === null || $Lastname === null || $Phone === null || $Email === null) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE clients
			SET client_Firstname = :Firstname, client_Lastname = :Lastname, client_Phone = :Phone, client_Email = :Email
			WHERE client_id = :id";

	$query = $db->prepare($sql);

	$query->execute(array(
		":id" => $id,
		":Firstname" => $Firstname,
		":Lastname" => $Lastname,
		":Phone" => $Phone,
		":Email" => $Email
	));

	$db = null;

	return true;
}