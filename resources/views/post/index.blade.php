<x-layout :title="$pageTitle">
    <h1>blog</h1>
    @foreach ($posts as $post )
    <h1 class="text-2xl">{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <p>{{ $post->author }}</p>
    @endforeach

    {{ $posts->links() }}
</x-layout>
