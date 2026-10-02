@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')


    <h2>Daftar Post</h2>

    <p>
        <a href="{{ route('posts.create') }}">+ Buat Post Baru</a>
    </p>

    @if ($posts->count())
        @foreach ($posts as $post)
            <x-card :post="$post" />
        @endforeach

        {{ $posts->links() }}
    @else
        <x-alert type="info">
            Belum ada post.
        </x-alert>
    @endif

@endsection