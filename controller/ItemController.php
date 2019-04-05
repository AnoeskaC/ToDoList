<?php 

require(ROOT . "model/ItemModel.php");

function index()
{
	render("home/index", array(
		'task' => getAllItemsFromList()
	));
}

function create($list_id)
{
	render("task/create", array(
		'listId' => $list_id));
}

function createSave()
{
	if (!createItem()) {
		header("Location:" . URL . "error/index");
		exit();
	}
	header("Location:" . URL . "home/index");
}

function edit($id)
{
	render("item/edit", array(
		'item' => getTask($id)
	));
}

function editSave()
{
	if (!editItem()) {
		header("Location:" . URL . "error/index");
		exit();
	}
	header("Location:" . URL . "home/index");
}

function delete($id)
{
	if (!deleteItem($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}
	header("Location:" . URL . "home/index");
}
