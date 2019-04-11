<div class="container">
	<table border="1">
		<tr>
			<th>#</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Phone</th>
			<th>Email</th>
			<th colspan="2">Action</th>
		</tr>
		<?php foreach ($clients as $client) {
			echo "<tr>";
			echo "<td>" . $client['client_id'] . "</td>";
			echo "<td>" . $client['client_Firstname'] . "</td>";
			echo "<td>" . $client['client_Lastname'] . "</td>";
			echo "<td>" . $client['client_Phone'] . "</td>";
			echo "<td>" . $client['client_Email'] . "</td>";
			echo "<td><a href=\"" . URL . "client/edit/" . $client['client_id'] . "\">edit</a></td>";
			echo "<td><a href=\"" . URL . "client/delete/" . $client['client_id'] . "\">delete</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<a href="<?= URL ?>client/create">Create</a>
</div>