<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum Threads') }}
        </h2>
    </x-slot>

    @foreach($threads as $thread)
        <article class="mb-4">
            <h4 class="text-xl text-gray-800 font-bold">
                <a href="/{{$thread->path()}}">{{ $thread->title }}</a>
            </h4>
            <div class="body py-2">{{ $thread->body }}</div>
            <hr>
        </article>
    @endforeach

</x-app-layout>
