<?php 

require(ROOT . "model/ListModel.php");

function index()
{
	render("list/index", array(
		'list' => getAllLists()
	));
}

// maak de list

function create()
{
	render("list/create");
}

//Het opslaan van de gemaakte list.

function createSave()
{
	if (!createList()) {
		header("Location:" . URL . "error/index");
		exit();
	}
	header("Location:" . URL . "home/index");
}

// het bewerken van de list

function edit($id)
{
	render("list/edit", array(
		'list' => getList($id)
	));
}

// de veranderingen op te slaan

function editSave()
{
	if (!editList()) {
		header("Location:" . URL . "error/index");
		exit();
	}
	header("Location:" . URL . "home/index");
}

// het verwijderen van de list

function delete($id)
{
	if (!deleteList($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}
	header("Location:" . URL . "home/index");
}
