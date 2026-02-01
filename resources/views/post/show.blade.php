<x-layout :title="$PageTitle">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
    <p>{{ $post->author }}</p>
    <ul class="mt-6 space-y-4">
        @foreach ($post->comments as $comment )
        <li class="p-4 bg-gray-100 rounded-md shadow-sm">
            <p class="text-gray-800">{{ $comment->content }}</p>
            <span class="mt-1 text-sm text-gray-600">{{ $comment->author }}</span>
        </li>
        @endforeach
    </ul>
    <div class="border border-gray-900 px-3 mt-2 bg-amber-400">
    <form method="POST" action="/comments" class="mt-8">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
    <div class="space-y-6">
        <div>
            <label for="author" class="block text-sm font-medium text-gray-900">Your Name</label>
            <div class="mt-2">
                <input type="text" name="author" value="{{ old('author') }}" class="{{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300' }}  block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1  placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">

            </div>
            @error('author')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="content" class="block test-sm font-medium text-gray-900">Your Comment</label>
            <div class="mt-2">
                <textarea name="content" id="content" rows="4"  class="{{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300' }}  block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1  placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"></textarea>>
</div>
@error('content')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            </div>

    </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add Comment</button>
  </div>
</form>
</div>
</x-layout>
