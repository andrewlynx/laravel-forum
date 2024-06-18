<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $thread->title }}
        </h2>
    </x-slot>

    <div class="w-3/4 p-2">
        <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            {{ $thread->body }}

            @foreach ($replies as $reply)
                @include('threads.reply')
            @endforeach
            {{ $replies->links() }}

            @if(auth()->check())
                <form method="POST"
                      action="/{{ $thread->path().'/replies' }}"
                      class="py-6 max-w-7xl mx-auto"
                >
                    {{ csrf_field() }}
                    <div class="form-group mx-auto">
                        <textarea name="body" id="body" class="form-control w-full rounded-lg" placeholder="Have something to say?" rows="5"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 border border-blue-700 rounded">Post</button>
                </form>
            @else
                <p class="text-center p-6">Please <a href="/{{ route('login') }}">sign in</a> to leave a comment</p>
            @endif
        </div>
    </div>
    <div class="w-1/4 p-2">
        <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            This thread was published {{ $thread->created_at->diffForHumans() }} by
            <a href="#">{{ $thread->creator->name }}</a> and currently has {{ $thread->replies_count }} {{ Str::plural('comment', $thread->replies_count) }}.
        </div>
    </div>

</x-app-layout>
