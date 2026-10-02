@extends('layouts.app')

@section('title', 'Buat Post')

@section('content')
    <h2>Buat Post Baru</h2>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <div>
            <label>Judul</label>
            <input type="text" name="title" value="{{ old('title') }}">

            @error('title')
                <small>{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label>Isi</label>
            <textarea name="body">{{ old('body') }}</textarea>

            @error('body')
                <small>{{ $message }}</small>
            @enderror
        </div>

        <button type="submit">Simpan</button>
    </form>
@endsection