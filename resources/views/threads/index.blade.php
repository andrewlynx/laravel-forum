<x-public-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum Threads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach($threads as $thread)
            <article class="mb-4">
                <h4 class="text-xl text-gray-800 font-bold">
                    <a href="{{$thread->path()}}">{{ $thread->title }}</a>
                </h4>
                <div class="body">{{ $thread->body }}</div>
                <hr>
            </article>
        @endforeach
    </div>
</x-public-layout>
