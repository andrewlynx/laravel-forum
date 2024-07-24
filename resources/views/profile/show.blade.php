<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="flex-1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
            <small>Since {{ $user->created_at->diffForHumans() }}</small>
        </h2>
        @foreach($threads as $thread)
            <div class="p-6 my-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $thread->title }}
                </h2>
                {{ $thread->body }}
            </div>
        @endforeach
        {{ $threads->links() }}
    </div>
</x-app-layout>
