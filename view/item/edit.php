<form action="<?= URL ?>item/editSave" method="post">
  <h2>Edit</h2>
  Task description: <input type="text" name="item_description" value="<?= $item['item_description'] ?>"><br>
  <input type="hidden" name="item_id" value="<?= $item['item_id']; ?>">
  <button type="submit">Submit</button>
</form>
