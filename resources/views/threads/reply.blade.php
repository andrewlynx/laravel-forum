<div class="w-full max-w-6xl mt-6 bg-gray-100 overflow-hidden sm:rounded-lg">
    <div class="bg-grey-200 p-4 py-2 border-solid border-grey-light border-b">
        <a href="#">
            {{ $reply->owner->name }}
        </a> said {{ $reply->created_at->diffForHumans() }}
    </div>
    <div class="p-4">
        {{ $reply->body }}
    </div>
</div>
