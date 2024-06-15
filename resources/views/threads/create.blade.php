<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a New Thread') }}
        </h2>
    </x-slot>

    <form method="POST" action="/threads" class="py-6 max-w-7xl mx-auto">
        {{ csrf_field() }}
        <div class="form-group mx-auto py-4">
            <label for="title" class="block text-gray-700 text-m font-bold mb-2 py-2">Title:</label>
            <input type="text" name="title" id="title" placeholder="Title" class="w-full bg-blue-500 hover:bg-blue-700 py-2 px-4 border border-blue-700 rounded">
        </div>
        <div class="form-group mx-auto py-4">
            <label for="body" class="block text-gray-700 text-m font-bold mb-2 py-2">Body:</label>
            <textarea name="body" id="body" class="form-control w-full rounded-lg" placeholder="Have something to say?" rows="5"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 py-2 px-4 border border-blue-700 rounded">Post</button>
    </form>

</x-app-layout>
