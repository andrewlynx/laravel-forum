<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum Threads') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            @foreach($threads as $thread)
                <article class="mb-4">
                    <div class="flex">
                        <h4 class="text-xl text-gray-800 font-bold flex-1">
                            <a href="/{{$thread->path()}}">{{ $thread->title }}</a>
                        </h4>
                        <a href="/{{$thread->path()}}">
                            <strong>{{ $thread->replies_count }} {{ Str::plural('comment', $thread->replies_count) }}</strong>
                        </a>
                    </div>
                    <div class="body py-2">{{ $thread->body }}</div>
                    <hr>
                </article>
            @endforeach
        </div>
    </div>

</x-app-layout>
