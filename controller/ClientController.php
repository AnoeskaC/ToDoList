<?php

require(ROOT . "model/ClientModel.php");

function index()
{
	$clients = getAllClients();
	
	render("client/index", array(
		'clients' => $clients)
	);
}

function create()
{
	render("client/create");
}

function createSave()
{
	if (createClient()) {
		header("location:" . URL . "client/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();	
	}
}

function read($id)
{
	$client = getClient($id);

	render("client/read", array(
		"client" => $client
	));
}

function edit($id)
{
	$client = getClient($id);

	render("client/edit", array(
		"client" => $client
	));
}

function editSave($id)
{
	if (editClient($id)) {
		header("location:" . URL . "client/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}

function delete($id)
{
	if (deleteClient($id)) {
		header("location:" . URL . "client/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}