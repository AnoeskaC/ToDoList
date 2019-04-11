<form action="<?= URL ?>list/editSave/<?= $list["list_id"] ?>" method="POST">
	<input type="text" name="name" value="<?= $list["list_name"] ?>">
	<input type="text" name="item" value="<?= $list["list_item"] ?>">
	<input type="hidden" name="id" value="<?= $list["list_id"] ?>">

	<input type="submit" value="Opslaan">
</form>
