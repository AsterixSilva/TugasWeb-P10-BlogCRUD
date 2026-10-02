<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $posts = Post::latest()->paginate(6);

    return view('posts.index', compact('posts'));
}

    /**
     * Show the form for creating a new resource.
     */
 public function create()
{
    return view('posts.create');
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|max:200',
        'body' => 'required|min:10',
    ]);

    try {
        Post::create($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post berhasil dibuat!');
    } catch (\Throwable $e) {
        return back()
            ->withInput()
            ->with('error', 'Post gagal dibuat.');
    }
}

    /**
     * Display the specified resource.
     */
public function show(Post $post)
{
    return view('posts.show', [
        'post' => $post
    ]);
}

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Post $post)
{
    return view('posts.edit', [
        'post' => $post
    ]);
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Post $post)
{
    $validated = $request->validate([
        'title' => 'required|max:200',
        'body' => 'required',
    ]);

    $post->update($validated);

    return redirect()
        ->route('posts.show', $post)
        ->with('success', 'Post diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Post $post)
{
    $post->delete();

    return redirect()
        ->route('posts.index')
        ->with('success', 'Post dihapus!');
}
}
