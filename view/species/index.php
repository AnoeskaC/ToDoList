<div class="container">
	<table border="1">
		<tr>
			<th>#</th>
			<th>description</th>
			<th colspan="2">Action</th>
		</tr>
		<?php foreach ($species as $specie) {
			echo "<tr>";
			echo "<td>" . $specie['species_id'] . "</td>";
			echo "<td>" . $specie['species_Description'] . "</td>";
			echo "<td><a href=\"" . URL . "species/edit/" . $specie['species_id'] . "\">edit</a></td>";
			echo "<td><a href=\"" . URL . "species/delete/" . $specie['species_id'] . "\">delete</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<a href="<?= URL ?>species/create">Create</a>
</div>