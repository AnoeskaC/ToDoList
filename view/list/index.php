<div class="container">
	<table border="1">
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>List</th>
			<th colspan="2">Actie</th>
		</tr>

		<?php foreach ($list as $list) {
			echo "<tr>";
			echo "<td>" . $list['list_id'] . "</td>";
			echo "<td>" . $list['list_name'] . "</td>";
			echo "<td>" . $list['list_author'] . "</td>";
			echo "<td><a href=\"" . URL . "list/edit/" . $list['list_id'] . "\">Wijzigen</a></td>";
			echo "<td><a href=\"" . URL . "list/delete/" . $list['list_id'] . "\">Verwijderen</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<a href="<?= URL ?>list/create">Nieuw lijst toevoegen</a>
</div>