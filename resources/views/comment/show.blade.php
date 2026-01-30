<x-layout :title="$pageTitle">
    <h2>comment: {{ $comment->author}}</h2>
    <p>{{ $comment->content }}</p>

    @if($comment->post)
    <h3>Related Posts</h3>
    <ul>
        <li>
            <strong>{{ $comment->post->title }}</strong>
            <p>{{ $comment->post->body }}</p>
            <p>Author: {{ $comment->post->author }}</p>
            <a href="{{ route('blog.show',$comment->post->id) }}">View full post</a>
        </li>

    
<p>no posts are associated with this comment</p>
        @endif
    </ul>
</x-layout>
`
