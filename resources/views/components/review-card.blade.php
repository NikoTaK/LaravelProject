<div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow">
    <div class="flex items-center mb-6">
        <div>
            <h4 class="font-semibold text-lg">{{ $review->user->name }}</h4>
            <div class="text-yellow-400 text-lg">
                @for ($i = 0; $i < $review->rating; $i++)
                    ★
                @endfor
            </div>
        </div>
    </div>
    <p class="text-gray-600 leading-relaxed">{{ Str::limit($review->comment, 150) }}</p>

    @if ($review->user_id === Auth::id())
        <!-- Delete Review Form -->
        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition-all">
                Delete Review
            </button>
        </form>
    @endif
</div>
