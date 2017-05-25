<form action="/blog/create" method="post">
  {{csrf_field()}}

  <input type="text" name="name" placeholder="Blog Name" required> <br>

  <textarea name="info" placeholder="Blog Description/Info"></textarea> <br>

  <input type="text" name="contact" placeholder="Contact Info"> <br>

  public <input type="checkbox" name="public" value="1">
  
  <button type="submit" class="lb-close">Create Blog</button>
</form>
