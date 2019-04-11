<form action="<?= URL ?>patient/editSave/<?= $patient["patient_id"] ?>" method="POST">
	<input type="text" name="Name" value="<?= $patient["patient_Name"] ?>">
	<select name="Species" >
	<?php foreach ($species as $specie) { ?>
        <option value="<?= $specie['species_id'] ?>" <?php

        if ($patient['species_id'] === $specie['species_id']) {
        	echo "selected = selected>";
        } 
        echo $specie['species_Description'];
        ?>


    </option>
    <?php }; ?></select>
	<input type="text" name="Status" value="<?= $patient["patient_Status"] ?>">
	<select name="Client">
    <?php foreach ($clients as $client) { ?>
        <option value="<?= $client['client_id'] ?>"<?php
		
		 if ($patient['client_id'] === $client['client_id']) {
        	echo "selected = selected>";
        } 

        	?><?= $client['client_Firstname'] . ' ' . $client['client_Lastname'] ?>></option>
    <?php } ?></select>
	<input type="hidden" name="id" value="<?= $patient["patient_id"] ?>">

	<input type="submit" value="Opslaan">
</form>

<?= print_r($patient); ?>