<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.app')
<div class="container">
    <h1 class="mb-4">All Blog Posts</h1>

    <form action="{{ route('blogs.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search blogs" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    @foreach ($blogs as $blog)
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">{{ $blog->title }}</h3>
                <p class="card-text">{{ Str::limit($blog->content, 150) }}</p>
                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
    @endforeach
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
