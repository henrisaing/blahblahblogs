<form action="/blog/{{$blog->id}}/update" method="post">
  {{csrf_field()}}

  <input type="text" name="name" placeholder="Blog Name" value="{{$blog->name}}" required> <br>

  <textarea name="info" placeholder="Blog Description/Info">{{$blog->info}}</textarea> <br>

  <input type="text" name="contact" placeholder="Contact Info" value="{{$blog->contact}}"> <br>

  <select name="public">
    <option value="1" <?php if($blog->public){print('selected');} ?>>public</option>
    <option value="0" <?php if($blog->public == false){print('selected');} ?>>private</option>
  </select>
  
  <button type="submit" class="lb-close">Update Blog</button>
</form>
