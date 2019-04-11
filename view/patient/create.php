<form action="<?= URL ?>patient/createSave" method="POST">
	<input type="text" name="Name" placeholder="Name">
	<label>Specie</label>
	<select name="Species">
	<?php foreach ($species as $specie) { ?>
        <option value="<?= $specie['species_id'] ?>"><?= $specie['species_Description'] ?></option>
    <?php } ?>
	<input type="text" name="Status" placeholder="Status">
	 <label>Client</label>
    <select name="Client">
    <?php foreach ($clients as $client) { ?>
        <option value="<?= $client['client_id'] ?>"><?= $client['client_Firstname'] . ' ' . $client['client_Lastname'] ?></option>
    <?php } ?>
	<input type="submit">
</form>