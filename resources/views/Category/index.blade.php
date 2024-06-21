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
<h1>All Categories</h1>
<a href="{{route('categories.create')}}">Create a new Blog</a><br>

@foreach($categories as $category)
    <div style="margin-bottom: 24px; border: 1px solid black; width: 90px;">
        <a href="{{ route('categories.show', $category->id) }}">{{ $category->title }}</a>
        <form action="{{ route('categories.destroy', $blog->id) }}" method="post">
            @csrf
            @method('delete')
            <button>delete category</button>
        </form>
        <form action="{{ route('$categories.edit', $blog->id) }}" method="get">
            @csrf
            <button>Edit category</button>
        </form>
    </div>
@endforeach
</body>
</html>
