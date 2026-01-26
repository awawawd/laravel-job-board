<x-layout :title="$pageTitle">
    <h1>Comments explore</h1>
    @foreach ($comments as $comment )
    <h1 class="text-2xl">{{ $comment->content }}</h1>
    <a href="/blog/{{ $comment->post->id }}">{{ $comment->post->title }}</a>
    @endforeach
        {{ $comments->links() }}
</x-layout>
