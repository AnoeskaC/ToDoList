<h2>Diersoorten</h2>

		<?php
		foreach ($species as $spec => $value) {
			$specname = $value['species_description'];
			echo '<h1>' . $specname . '</h1>';
			echo "<a class='editthis' href = '" . URL . "species/editSpecies/" . $value["species_id"]. "'>Edit</a>";
			echo " ";
			echo "<a class='deletethis' href = '" . URL . "species/deleteSpecies/" . $value["species_id"]. "'>Delete</a>";
		}
		?>
		<br>
		<a id='createNew' href='<?=URL?>species/createNewSpec'>+ Toevoegen</a>
		<a class='middle' href='<?=URL?>hospital'>Home</a>