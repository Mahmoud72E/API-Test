<h1>Edit Post</h1>
<form action="{{url('posts/update')}}" method="post" autocomplete="off">
    {{ method_field('patch') }}
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <input type="text" name="title" placeholder="title" value="{{$post->title}}"><br><br>
    <input type="text" name="body" placeholder="body" value="{{$post->body}}"><br><br>
    <button type="submit">Submit</button>
</form>