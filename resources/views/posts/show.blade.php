@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h2>{{ $post->title }}</h2>

    <p>{{ $post->body }}</p>

    <hr>

    <a href="{{ route('posts.index') }}">Kembali</a>
    <a href="{{ route('posts.edit', $post) }}">Edit</a>

    <form method="POST" action="{{ route('posts.destroy', $post) }}">
    @csrf
    @method('DELETE')

    <button type="submit">Hapus</button>
</form>
@endsection