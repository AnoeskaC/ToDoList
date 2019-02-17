<div class="container">
	<table border="1">
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Author</th>
			<th>Comment</th>
			<th colspan="2">Actie</th>
		</tr>

		<?php foreach ($books as $book) {
			echo "<tr>";
			echo "<td>" . $book['book_id'] . "</td>";
			echo "<td>" . $book['book_name'] . "</td>";
			echo "<td>" . $book['book_author'] . "</td>";
			echo "<td>" . $book['book_comment'] . "</td>";
			echo "<td><a href=\"" . URL . "book/edit/" . $book['book_id'] . "\">Wijzigen</a></td>";
			echo "<td><a href=\"" . URL . "book/delete/" . $book['book_id'] . "\">Verwijderen</a></td>";
			echo "</tr>";
		}
		?>
	</table>
	<a href="<?= URL ?>book/create">Nieuw boek toevoegen</a>
</div>