<form action="/blog/{{$blog->id}}/update" method="post">
  {{csrf_field()}}

  <input type="text" name="name" placeholder="Blog Name" value="{{$blog->name}}" required> <br>

  <textarea name="info" placeholder="Blog Description/Info">{{$blog->info}}</textarea> <br>

  <input type="text" name="contact" placeholder="Contact Info" value="{{$blog->contact}}"> <br>

  public <input type="checkbox" name="public" value="1" <?php if($blog->public){print('checked');} ?>>
  
  <button type="submit" class="lb-close">Update Blog</button>
</form>
