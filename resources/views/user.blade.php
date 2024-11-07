@extends('partials.layout')
@section('content')
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <p class="text-2xl">{{ $user->name }}></p>
            <p>Comments: {{ $user->comments()->count() }}
            <p>Posts: {{ $user->posts()->count() }}
            <p>Likes: {{ $user->likes()->count() }}
            <p>Likes on Post: {{ $user->likesOnPost()->count() }}
            <p>Comments on Post: {{ $user->commentsOnPost()->count() }}
            <p>Followers: {{ $user->Followers()->count() }}
            <p>Followees: {{ $user->Followees()->count() }}
            <form method="POST">
                @if($user->authHasFollowed())
                <button class="btn btn-secondary">UnFollow</button>
                @else
                <button class="btn btn-primary">UnFollow</button>
                @endif

            </form>

        </div>
    </div>
    <div class="justify-center">
        {{ $posts->links() }}

    </div>

    <div class="grid-cols-4 grid gap-4">
        @foreach($posts as $post)
        <div>
            <div class="card bg-base-100 shadow-xl min-h-full">
                @if($post->image)
                <figure>
                    <img src="{{ $post->image}}" alt="">
                </figure>
                <p class="text-neutral-content"><a href="{{ $post->user->name }}"</a></p>
                <p class="text-neutral-content">Comments: {{ $post->comments_count }}</p>
                <p class="text-neutral-content">Likes: {{ $post->likes_count }}</p>
                <form action="{{ route('like', ['post' => $post]) }}" method="POST">
                    @csrf
                    @if ($post->authHasLiked)
                        <button type="submit" class="btn btn-primary">Unlike</button>
                    @else
                        <button type="submit" class="btn btn-primary">Like</button>
                    @endif
                </form>
                <div class="card-actions justify-end">
                    <a href="{{ route('post', ['post' => $post]) }}" class="btn btn-primary">Read More</a>
                </div>
        </div>
    </div>
    </div>
    @endforeach
    </div>
@endsection
