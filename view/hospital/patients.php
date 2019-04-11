<h2>Patiënten</h2>


	<?php
	foreach ($patients as $patient => $value) {
		if( $name != $value['patient_name']){
			$name = $value['patient_name'];
			echo '<h1>' . $name . '</h1>';
		}
		if ($status != $value['patient_status']){
			$status = $value['patient_status'];
			echo $status;
		}
		echo "<br>";
		if ($ownerFirst != $value['client_firstname']){
			$ownerFirst = $value['client_firstname'];
		}
		echo " ";
		if ($ownerLast != $value['client_lastname']){
			$ownerLast = $value['client_lastname'];
		}
			echo $ownerFirst . " " . $ownerLast;
			echo "<br>";
			echo $species = $value['species_description'];
		echo "<br>";
		echo "<a class='editthis' href = '" . URL . "patient/changePatient/" . $value["patient_id"]. "'>Edit</a>";
		echo " ";
		echo "<a class='deletethis' href = '" . URL . "patient/deletePatient/" . $value["patient_id"]. "'>Delete</a>";
	}
	?>

	<a id='createNew' href='<?=URL?>patient/createNewPatient'>+ Voeg patiënt toe</a>
		<a class='middle' href='<?=URL?>hospital'>Home</a>