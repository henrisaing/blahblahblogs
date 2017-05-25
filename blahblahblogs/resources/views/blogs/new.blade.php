<form action="/blog/create" method="post">
  {{csrf_field()}}

  <input type="text" name="name" placeholder="Blog Name" required> <br>

  <textarea name="info" placeholder="Blog Description/Info"></textarea> <br>

  <input type="text" name="contact" placeholder="Contact Info"> <br>

  <select name="public">
    <option value="1">public</option>
    <option value="0">private</option>
  </select>
  
  <button type="submit" class="lb-close">Create Blog</button>
</form>
