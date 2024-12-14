@extends('layouts.app')

@section('title', 'Admin Blog List')

@section('content')
    <div class="container">
        <h1>Admin Blog List</h1>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Create Blog</a>
        <div class="list-group">
            @foreach($blogs as $blog)
                <div class="list-group-item">
                    <h5>{{ $blog->title }}</h5>
                    <p>{{ Str::limit($blog->content, 100) }}</p>
                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection

