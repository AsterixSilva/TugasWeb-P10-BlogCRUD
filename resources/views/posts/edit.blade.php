@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h2>Edit Post</h2>

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Judul</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}">

            @error('title')
                <small>{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label>Isi</label>
            <textarea name="body">{{ old('body', $post->body) }}</textarea>

            @error('body')
                <small>{{ $message }}</small>
            @enderror
        </div>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('posts.show', $post) }}">Batal</a>
@endsection