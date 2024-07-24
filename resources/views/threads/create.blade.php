<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a New Thread') }}
        </h2>
    </x-slot>

    <div class="flex-2/3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <form method="POST" action="/threads" class="py-6 max-w-7xl mx-auto">
                {{ csrf_field() }}
                <div class="form-group mx-auto py-4">
                    <label for="category_id" class="block text-gray-700 text-m font-bold mb-2 py-2">Category:</label>
                    <div class="relative">
                        <select required class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="category_id" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group mx-auto py-4">
                    <label for="title" class="block text-gray-700 text-m font-bold mb-2 py-2">Title:</label>
                    <input type="text" name="title" id="title" required value="{{ old('title') }}" placeholder="Title" class="w-full bg-blue-500 hover:bg-blue-700 py-2 px-4 border border-blue-700 rounded">
                </div>
                <div class="form-group mx-auto py-4">
                    <label for="body" class="block text-gray-700 text-m font-bold mb-2 py-2">Body:</label>
                    <textarea name="body" id="body" required class="form-control w-full rounded-lg" placeholder="Have something to say?" rows="5">{{ old('body') }}</textarea>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 py-2 px-4 border border-blue-700 rounded">Post</button>
                @if (count($errors))
                    <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-6" role="alert">
                        @foreach($errors->all() as $error)
                            <li class="block sm:inline">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </div>
    </div>

</x-app-layout>
