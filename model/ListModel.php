<?php

function getAllLists()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM list";

	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}


function getList($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM list WHERE list_id = :id LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return $query->fetch();
}

function createList()
{
	$name = isset($_POST["name"]) ? $_POST["name"] : null;
	$item = isset($_POST["item"]) ? $_POST["item"] : null;
	
	if ($name === null || $item === null) {
		return false;
	}
	//Database verbinding maken
	$db = openDatabaseConnection();

	$sql = "INSERT INTO list(list_name, list_item) VALUES (:name, :item)";

	$query = $db->prepare($sql);
	$query->execute(array(
		":name" => $name,
		":item" => $item
	));

	//Database verbinding sluiten
	$db = null;

	return true;
}

function editList($id=null)
{
	$name = isset($_POST["name"]) ? $_POST["name"] : null;
	$item = isset($_POST["item"]) ? $_POST["item"] : null;
	
	if ($id === null || $name === null || $item === null) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE list 
			SET list_name = :name, list_item = :item 
			WHERE list_id = :id";

	$query = $db->prepare($sql);

	$query->execute(array(
		":id" => $id,
		":name" => $name,
		":item" => $item
	));

	$db = null;

	return true;
}

function deleteList($id)
{
	if ($id === '') {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "DELETE FROM list WHERE list_id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return true;
}
