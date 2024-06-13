<x-public-layout>
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

</x-public-layout>
