<x-layout>
    <article>
        <h1>
            <a href="/posts/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        </h1>

        <p>
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>

        <div>{!! $post->body !!}</div>
    </article>

    <br>
    <a href="/"><<<< GO</a>
</x-layout>
