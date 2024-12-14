<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        // Apply 'auth' middleware only to routes that require the user to be logged in
        $this->middleware('auth')->only([
            'create', 'store', 'edit', 'update', 'destroy'
        ]);

        // Apply admin check only for admin-specific routes
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->role !== 'admin') {
                return redirect('/'); // Redirect non-admin users
            }
            return $next($request);
        })->only([
            'adminIndex', 'create', 'store', 'edit', 'update', 'destroy'
        ]);
    }

    // User side: Show all blogs (publicly accessible)
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }
    
     public function show($id)
    {
        // Retrieve the blog post by ID
        $blog = Blog::findOrFail($id);

        // Return the view with the blog post
        return view('blogs.show', compact('blog'));
    }

    // Admin side: List all blogs
    public function adminIndex()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    // Admin side: Show create form
    public function create()
    {
        return view('admin.blogs.create');
    }

    // Admin side: Store new blog
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Blog::create($request->only(['title', 'content']));
        return redirect()->route('admin.blogs.index');
    }

    // Admin side: Show edit form
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    // Admin side: Update blog
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog->update($request->only(['title', 'content']));
        return redirect()->route('admin.blogs.index');
    }

    // Admin side: Delete blog
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index');
    }
}
