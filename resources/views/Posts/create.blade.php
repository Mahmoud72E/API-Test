<h1>Create New Post</h1>
<form action="{{route('posts.store')}}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="title"><br><br>
    <input type="text" name="body" placeholder="body"><br><br>
    <button type="submit">Submit</button>
</form>