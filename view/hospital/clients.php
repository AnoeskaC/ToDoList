<h2>Cliënten</h2>

	<?php
	foreach ($clients as $client => $value) {
		$name = $value['client_firstname'];
		$sirname = $value['client_lastname'];
		echo '<h1>' . $name . ' ' . $sirname . '</h1>';
		echo "<a class='editthis' href = '" . URL . "client/changeClient/" . $value["client_id"]. "'>Edit</a>";
		echo " ";
		echo "<a class='deletethis' href = '" . URL . "client/removeClient/" . $value["client_id"]. "'>Delete</a>";
	}
	?>

	<a id='createNew' href='<?=URL?>client/createNewClient'>+ Voeg cliënt toe</a>
	<a class='middle' href='<?=URL?>hospital'>Home</a>