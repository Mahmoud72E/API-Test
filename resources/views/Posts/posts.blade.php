
<a href="{{route('posts.create')}}">Create New Post</a>
<table>
    <th>title</th>
    <th>body</th>
    <th>Settings</th>
    @foreach ($posts as $post)
    <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td><a href="{{route('posts.edit', $post->id)}}">Edit</a> 
        <a href="{{ route('posts.show', $post->id) }}">Delete</a></td>
    </tr>
    @endforeach
</table>