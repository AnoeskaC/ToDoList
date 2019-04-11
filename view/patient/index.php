<div class="container">
	<table border="1">
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Species</th>
			<th>Status</th>
			<th>Client</th>
			<th colspan="2">Action</th>
		</tr>
		<?php foreach ($patients as $patient) {
			echo "<tr>";
			echo "<td>" . $patient['patient_id'] . "</td>";
			echo "<td>" . $patient['patient_Name'] . "</td>";
			echo "<td>" . $patient['species_Description'] . "</td>";
			echo "<td>" . $patient['patient_Status'] . "</td>";
			echo "<td>" . $patient['client_Firstname'] . " " . $patient['client_Lastname'] . "</td>";
			echo "<td><a href=\"" . URL . "patient/edit/" . $patient['patient_id'] . "\">edit</a></td>";
			echo "<td><a href=\"" . URL . "patient/delete/" . $patient['patient_id'] . "\">delete</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<a href="<?= URL ?>patient/create">Create</a>
</div>