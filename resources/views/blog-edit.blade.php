<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Blog</title>
</head>
<body>
<h1>Edit Blog</h1>
<form action="{{ route('blogs.update', $blog->id) }}" method="post">
    @csrf
    @method('put')
    <label>
        Title:
        <input type="text" name="title" value="{{ $blog->title }}" />

        @error('title')
        <div style="display: flex;">{{ $message }}</div>
        @enderror
    </label>
    <label>
        Content:
        <input type="text" name="content" value="{{ $blog->content }}"/>

        @error('content')
        <div style="display: flex;">{{ $message }}</div>
        @enderror
    </label>
    <button type="submit">Submit</button>
</form>
</body>
</html>
