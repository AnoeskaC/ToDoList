<?php

require(ROOT . "model/BookModel.php");

function index()
{
	
	render("book/index", array(
		'books' => getAllBooks()
	));
}

function create()
{
	render("book/create");
}

function createSave()
{
	if (createBook()) {
		header("location:" . URL . "book/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();	
	}
}

function edit($id)
{
	$song = getBook($id);

	render("book/edit", array(
		"book" => $book
	));
}

function editSave($id)
{
	if (editBook($id)) {
		header("location:" . URL . "book/index");
		exit();
	} else {
		header("location:" . URL . "error/error_404");
		exit();
	}
}

function delete($id)
{
	if (deleteBook($id)) {
		header("location:" . URL . "book/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}