<h1>هل متاكد من الحذف</h1>

<form action="{{route('delete_post', 'test')}}"  method="post">
    @csrf
    {{ method_field('delete') }}
    <input type="hidden" name="post_id" value="{{$post->id}}"><br>
    <button type="submit">تاكيد</button>
</form>