<?php

function getAllBooks()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM books";

	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getBook($id)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM books WHERE book_id = :id LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return $query->fetch();
}

function createBook()
{
	$name = isset($_POST["name"]) ? $_POST["name"] : null;
	$author = isset($_POST["author"]) ? $_POST["author"] : null;
	$comment = isset($_POST["comment"]) ? $_POST["comment"] : null;
	
	if ($name === null || $author === null || $comment === null) {
		return false;
	}
	//Database verbinding maken
	$db = openDatabaseConnection();

	$sql = "INSERT INTO books(book_name, book_author, book_comment) VALUES (:name, :author, :comment)";

	$query = $db->prepare($sql);
	$query->execute(array(
		":name" => $name,
		":author" => $author,
		":comment" => $comment 
	));

	//Database verbinding sluiten
	$db = null;

	return true;
}

function deleteBook($id)
{
	if ($id === '') {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "DELETE FROM books WHERE book_id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return true;
}

function editBook($id=null)
{
	$name = isset($_POST["name"]) ? $_POST["name"] : null;
	$author = isset($_POST["author"]) ? $_POST["author"] : null;
	$comment  = isset($_POST["comment "]) ? $_POST["comment "] : null;
	
	if ($id === null || $name === null || $author === null || $comment  === null) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE book 
			SET book_name = :name, book_author = :author, book_comment  = :comment  
			WHERE book_id = :id";

	$query = $db->prepare($sql);

	$query->execute(array(
		":id" => $id,
		":name" => $name,
		":author" => $author,
		":comment" => $comment
	));

	$db = null;

	return true;
}