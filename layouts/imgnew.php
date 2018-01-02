<?php
$user = currentUser();
?>
<form action="/img" method="POST" enctype="multipart/form-data">
<table>
  <tr>
    <td><label for="author">Author: </label></td>
    <td>
      <?php if ($user): ?>
      <input type="text" name="author" value="<?= $user->name ?>" disabled>
      <?php else: ?>
      <input type="text" name="author">
      <?php endif; ?>
    </td>
  </tr>
  <tr>
    <td><label for="title">Title: </label></td>
    <td><input type="text" name="title"></td>
  </tr>
  <tr>
    <td><label for="watermark">Watermark: </label></td>
    <td><input type="text" name="watermark"></td>
  </tr>
  <tr>
    <td><label for="img">Image: </label></td>
    <td><input type="file" name="img"></td>
  </tr>
  <?php if ($user): ?>
  <tr>
    <td rowspan="2">Access: </td>
    <td><label>Public: <input type="radio" name="access" value="public" checked></label></td>
  </tr>
  <tr>
    <td>
      <label>Private: <input type="radio" name="access" value="private"></label>
    </td>
  </tr>
  <?php endif; ?>
  <tr>
    <td colspan="2"><input type="submit" value="Add image"></td>
  </tr>
</table>
</form>
