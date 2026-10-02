@props(['post'])

<article class="card">
    <h3>{{ $post->title }}</h3>

    <p>{{ $post->body }}</p>

    <a href="{{ route('posts.show', $post) }}">
        Lihat Post
    </a>
</article>