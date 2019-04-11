<form action="<?= URL ?>species/editSave/<?= $specie["species_id"] ?>" method="POST">
	<input type="text" name="Description" value="<?= $specie["species_Description"] ?>">
	<input type="hidden" name="id" value="<?= $specie["species_id"] ?>">

	<input type="submit" value="Opslaan">
</form>