<?php

require(ROOT . "model/ListModel.php");

function index()
{
	
	render("list/index", array(
		'lists' => getAllLists()
	));
}

function create()
{
	render("list/create");
}

function createSave()
{
	if (createList()) {
		header("location:" . URL . "list/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();	
	}
}

function edit($id)
{
	$list = getList($id);

	render("list/edit", array(
		"list" => $list
	));
}

function editSave($id)
{
	if (editList($id)) {
		header("location:" . URL . "list/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}

function delete($id)
{
	if (deleteList($id)) {
		header("location:" . URL . "list/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}

