<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>All Blogs</h1>
<a href="{{route('blogs.create')}}">Create a new Blog</a><br>

@foreach($blogs as $blog)
    <div style="margin-bottom: 24px; border: 1px solid black; width: 90px;">
        <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a>
        <p>{{ $blog->content }}</p>
        <form action="{{ route('blogs.destroy', $blog->id) }}" method="post">
            @csrf
            @method('delete')
            <button>delete blog</button>
        </form>
        <form action="{{ route('blogs.edit', $blog->id) }}" method="get">
            @csrf
            <button>Edit blog</button>
        </form>
    </div>
@endforeach
</body>
</html>
