<x-public-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $thread->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{ $thread->body }}
    </div>
</x-public-layout>
