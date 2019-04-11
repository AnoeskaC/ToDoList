<h2>Hospital</h2>
	<thead>
		<tr>
			<th>Name</th>
			<th>Species</th>
			<th>Status</th>
			<th>Client</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
<h2>Patiënts</h2>
	<table>
	<tbody>
		<?php 
			foreach ($patients as $patient) { ?>
			<tr>
				<td><?= $patient["patient_name"] ?></td>
				<td><?= $patient["species_description"] ?></td>
				<td><?= $patient["patient_status"] ?></td>
				<td><?= $patient["client_firstname"] ." ". $patient["client_lastname"] ?></td>
				<td class="center"><a href="#">edit</a></td>
				<td class="center"><a href="#">delete</a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>

    <p><a href="<?= URL ?>hospital/patients/create">Create</a></p>
