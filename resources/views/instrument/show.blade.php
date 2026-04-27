@extends('layouts.app')

@section('content')

    <div class="grid md:grid-cols-[280px_1fr] gap-8 mb-12">
        @if($instrument->image)
            <img src="{{ asset($instrument->image) }}" class="w-full h-80 object-cover rounded-xl" alt="{{ $instrument->name }}">
        @else
            <div class="w-full h-80 bg-primary/20 flex items-center justify-center rounded-xl">
                <i class="fa-solid fa-guitar text-6xl text-primary/50"></i>
            </div>
        @endif

        <div>
            @if($instrument->family)
                <span class="inline-block bg-primary text-soft text-xs px-3 py-1 rounded-full mb-3">{{ $instrument->family }}</span>
            @endif
            <h1 class="text-3xl font-semibold text-accent dark:text-soft mb-1">{{ $instrument->name }}</h1>
            @if($instrument->origin)
                <p class="text-sm opacity-60 mb-4"><i class="fa-solid fa-globe mr-1"></i> Origin: {{ $instrument->origin }}</p>
            @endif

            <p class="text-sm leading-relaxed mb-5 whitespace-pre-wrap">{{ $instrument->historical_description }}</p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-6">
                @if($instrument->type)
                <div class="bg-primary/10 rounded-lg p-3">
                    <div class="text-xs opacity-60">Type</div>
                    <div class="text-sm font-medium mt-1">{{ $instrument->type }}</div>
                </div>
                @endif
                @if($instrument->materials)
                <div class="bg-primary/10 rounded-lg p-3">
                    <div class="text-xs opacity-60">Materials</div>
                    <div class="text-sm font-medium mt-1">{{ $instrument->materials }}</div>
                </div>
                @endif
            </div>

            <div class="flex flex-wrap items-center gap-2">                <button x-data="{
                        liked: {{ auth()->check() && $instrument->likes()->where('user_id', auth()->id())->exists() ? 'true' : 'false' }},
                        likes: {{ $instrument->likes ? $instrument->likes->count() : 0 }},
                        toggleLike() {
                            @guest
                                window.location.href = 'signup';
                                return;
                            @endguest

                            this.liked = !this.liked;
                            this.liked ? this.likes++ : this.likes--;

                            fetch('{{ route('likes.toggle') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    likeable_id: {{ $instrument->id }},
                                    likeable_type: 'App\\Models\\Instrument'
                                })
                            });
                        }
                    }"
                    @click="toggleLike"
                    :class="liked ? 'bg-primary/20 text-primary border-primary' : 'border-primary/40 text-accent dark:text-soft hover:bg-primary/10 hover:border-primary'"
                    class="flex items-center gap-2 border px-4 py-2.5 rounded-lg text-sm font-medium transition ml-auto sm:ml-0">
                    <svg class="w-5 h-5 transition-transform" :class="liked ? 'fill-primary scale-110' : 'fill-none'"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                    <span x-text="likes">{{ $instrument->likes ? $instrument->likes->count() : 0 }}</span>
                </button>
            </div>
        </div>
    </div>


    <div class="mb-12 bg-primary/5 border border-primary/10 rounded-2xl p-6">
        <h3 class="text-base font-semibold flex items-center gap-2 mb-6">
            Comments
            <span class="bg-primary text-soft text-xs px-2 py-0.5 rounded-full">{{ $instrument->comments ? $instrument->comments->where('approved', true)->count() : 0 }}</span>
        </h3>

        <form method="POST" action="{{ route('comments.store') }}" class="flex gap-4 mb-8">
            @csrf
            <input type="hidden" name="entity_id" value="{{ $instrument->id }}">
            <input type="hidden" name="entity_type" value="App\Models\Instrument">
            <div class="flex-1">
                <textarea rows="2" name="content" required
                    @guest disabled placeholder="Sign in to share your thoughts..." @else placeholder="Share your thoughts or ask a question..." @endguest
                    class="w-full bg-white dark:bg-black/20 border border-primary/20 rounded-xl p-3 text-[15px] resize-none focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/50 text-accent dark:text-soft placeholder-accent/40 transition @guest opacity-70 cursor-not-allowed @endguest"></textarea>
                <div class="flex justify-end mt-2">
                    <button @guest disabled type="button" class="bg-primary/50 text-soft px-5 py-2 rounded-lg text-sm font-medium cursor-not-allowed transition shadow-sm" @else type="submit" class="bg-primary text-soft px-5 py-2 rounded-lg text-sm font-medium hover:bg-accent transition shadow-sm" @endguest>
                        Post Comment
                    </button>
                </div>
            </div>
        </form>

        <div class="space-y-6">
            @if($instrument->comments && $instrument->comments->where('approved', true)->count() > 0)
                @foreach($instrument->comments->where('approved', true) as $comment)
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-full bg-primary/20 shrink-0 overflow-hidden flex items-center justify-center">
                        <span class="font-bold text-primary">{{ substr($comment->user->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1">
                        <div x-data="{ editing: false, editContent: {{ Illuminate\Support\Js::from($comment->content) }} }" class="bg-white dark:bg-black/20 border border-primary/10 rounded-2xl rounded-tl-none p-4">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-bold text-sm text-accent dark:text-soft">{{ $comment->user->name }}</span>
                                <span class="text-xs opacity-50">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>

                            <p x-show="!editing" class="text-sm text-accent/80 dark:text-soft/80 leading-relaxed">{{ $comment->content }}</p>

                            <form x-show="editing" x-cloak method="POST" action="{{ route('comments.userUpdate', $comment) }}" class="mt-2 mb-2">
                                @csrf
                                @method('PUT')
                                <textarea x-model="editContent" name="content" required class="w-full bg-transparent border border-primary/20 rounded p-2 text-sm focus:outline-none focus:border-primary/50 text-accent dark:text-soft"></textarea>
                                <div class="flex justify-end gap-2 mt-2">
                                    <button type="button" @click="editing = false" class="text-xs text-accent/60 hover:text-accent">Cancel</button>
                                    <button type="submit" class="text-xs bg-primary text-soft px-3 py-1 rounded">Save</button>
                                </div>
                            </form>

                            <div class="flex items-center justify-between mt-3 pt-3 border-t border-primary/5">
                                <button
                                    @click="
                                        @auth
                                        fetch('{{ route('likes.toggle') }}', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            body: JSON.stringify({
                                                likeable_id: {{ $comment->id }},
                                                likeable_type: 'App\\Models\\Comment'
                                            })
                                        }).then(() => window.location.reload());
                                        @else
                                        window.location.href = '/signup';
                                        @endauth
                                    "
                                    class="flex items-center gap-1.5 text-xs transition {{ auth()->check() && $comment->likes()->where('user_id', auth()->id())->exists() ? 'text-primary' : 'text-accent/50 dark:text-soft/50 hover:text-primary' }}"
                                >
                                    <i class="fa-solid fa-heart"></i>
                                    <span>{{ $comment->likes()->count() }}</span>
                                </button>

                                @if(auth()->check() && auth()->id() === $comment->user_id)
                                <div class="flex items-center gap-3">
                                    <button @click="editing = true" x-show="!editing" class="text-xs text-primary hover:underline font-medium">Edit</button>
                                    <form x-show="!editing" method="POST" action="{{ route('comments.userDestroy', $comment) }}" class="inline m-0" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs text-red-500 hover:underline font-medium">Delete</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center text-accent/50 dark:text-soft/50 py-4">No comments yet. Be the first to share your thoughts!</p>
            @endif
        </div>
    </div>

@endsection
