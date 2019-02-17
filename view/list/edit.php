<form action="<?= URL ?>list/editSave/<?= $lists["list_id"] ?>" method="POST">
	<input type="text" name="name" value="<?= $lists["list_name"] ?>">
	<input type="text" name="item" value="<?= $lists["list_item"] ?>">
	<input type="hidden" name="id" value="<?= $lists["list_id"] ?>">

	<input type="submit" value="Opslaan">
</form>
