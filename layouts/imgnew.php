<form action="/img" method="POST" enctype="multipart/form-data">
<table>
  <tr>
    <td><label for="author">Author: </label></td>
    <td><input type="text" name="author"></td>
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
  <tr>
    <td colspan="2"><input type="submit" value="Add image"></td>
  </tr>
</table>
</form>
