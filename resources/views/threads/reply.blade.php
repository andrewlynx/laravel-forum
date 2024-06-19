<div class="w-full max-w-6xl mt-6 bg-gray-100 overflow-hidden sm:rounded-lg">
    <div class="flex bg-grey-200 p-4 py-2 border-solid border-grey-light border-b">
        <h5 class="flex-1">
            <a href="#">
                {{ $reply->owner->name }}
            </a> said {{ $reply->created_at->diffForHumans() }}
        </h5>
        <div>
            <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                {{ csrf_field() }}
                <button type="submit" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                    {{ $reply->favorites_count }} {{ \Illuminate\Support\Str::plural('Favorite', $reply->favorites_count) }}
                </button>
            </form>
        </div>
    </div>
    <div class="p-4">
        {{ $reply->body }}
    </div>
</div>
