<x-app-layout>
    <x-slot name="header">
        <div class="bg-grey-200 py-2">
            <a href="#">
                {{ $thread->creator->name }}
            </a> posted {{ $thread->created_at->diffForHumans() }}
        </div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $thread->title }}
        </h2>
    </x-slot>

    {{ $thread->body }}
    @foreach ($thread->replies as $reply)
        @include('threads.reply')
    @endforeach

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

</x-app-layout>
