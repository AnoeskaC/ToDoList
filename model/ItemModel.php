<?php

function getItem($id)
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM items WHERE item_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));
	$db = null;
	return $query->fetch();
}

function getAllItemsFromList($list_id) {
	$db = openDatabaseConnection();

	$sql = "SELECT item_id, item_description, task.status_id, status_name FROM item
	INNER JOIN status ON task.status_id = status.status_id
	WHERE list_id = :listId ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':listId' => $list_id
	));

	$db = null;

	return $query->fetchAll();
}

function createItem() {
	$description = isset($_POST['item_description']) ? $_POST['item_description'] : null;
	$listId = isset($_POST['list_id']) ? $_POST['list_id'] : null;

	if (strlen($description) == 0 | strlen($listId) == 0) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "INSERT INTO items(item_description, list_id) VALUES (:name, :listId)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $description,
		':listId' => $listId
	));

	$db = null;

	return true;
}

function editItem()
{
	$description = isset($_POST['item_description']) ? $_POST['item_description'] : null;
	$id = isset($_POST['item_id']) ? $_POST['item_id'] : null;

	if (strlen($description) == 0 || strlen($id) == 0) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = "UPDATE items SET item_description = :description WHERE item_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':description' => $description,
		':id' => $id));
	$db = null;

	return true;
}

function deleteItem($id = null)
{
	if (!$id) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = "DELETE FROM items WHERE item_id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));
	$db = null;

	return true;
}
