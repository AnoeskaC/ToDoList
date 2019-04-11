<form action="<?= URL ?>client/editSave/<?= $client["client_id"] ?>" method="POST">
	<input type="text" name="Firstname" value="<?= $client["client_Firstname"] ?>">
	<input type="text" name="Lastname" value="<?= $client["client_Lastname"] ?>">
	<input type="text" name="Phone" value="<?= $client["client_Phone"] ?>">
	<input type="text" name="Email" value="<?= $client["client_Email"] ?>">
	<input type="hidden" name="id" value="<?= $client["client_id"] ?>">

	<input type="submit" value="Opslaan">
</form>