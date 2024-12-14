@extends('layouts.app')

@section('title', 'Create New Blog')

@section('content')
    <div class="container">
        <h1>Create New Blog</h1>

        <form method="POST" action="{{ route('admin.blogs.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Blog</button>
        </form>
    </div>
@endsection
