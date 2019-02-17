<form action="<?= URL ?>book/editSave/<?= $books["book_id"] ?>" method="POST">
	<input type="text" name="name" value="<?= $books["book_name"] ?>">
	<input type="text" name="author" value="<?= $books["book_author"] ?>">
	<input type="text" name="comment" value="<?= $books["book_comment"] ?>">
	<input type="hidden" name="id" value="<?= $books["book_id"] ?>">

	<input type="submit" value="Opslaan">
</form>