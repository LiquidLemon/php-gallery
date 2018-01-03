<form action="/newsletter" method="post" class="survey" id="newsletter">
  <h3>Fill the survey and get notified about upcoming events!</h3>
    <table>
      <tr>
        <td><label for="email">Email:</label></td>
        <td><input name="email" type="email" id="email" title="Your contact information"></td>
      </tr>
      <tr>
        <td><label for="name">Name:</label></td>
        <td><input name="name" type="text" id="name" title="Your name or a nick"></td>
      </tr>
      <tr>
        <td><label for="comments">Comments:</label></td>
        <td><textarea id="comments" name="comments" cols="30" rows="10" title="Anything more you want to say about yourself"></textarea></td>
      </tr>
      <tr>
        <td>Your skills:</td>
        <td title="Challenge types you are familiar with">
          <label><input type="checkbox" name="skills[]" value="web">web</label>
          <label><input type="checkbox" name="skills[]" value="pwn">pwn</label>
          <label><input type="checkbox" name="skills[]" value="crypto">crypto</label>
          <label><input type="checkbox" name="skills[]" value="forensics">forensics</label>
        </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td title="Self-explanatory, yeah?">
          <label><input type="radio" name="sex" value="m">Male</label>
          <label><input type="radio" name="sex" value="f">Female</label>
        </td>
      </tr>
    </table>
  <input type="reset" value="Reset" />
  <input type="submit" name="submit" value="Submit!" />
</form>
<div id="newsletter-warning" title="Warning" class="invisible">
<p>Make sure to include your email</p>
</div>
