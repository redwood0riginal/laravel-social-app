<x-layout>
    <div class="single-post">
        <div class="back-container">
            <div class="back"><a href="/"><i class="fa-solid fa-arrow-left"></i></a></div>
            <div class="user-info">
                <p href="" class="user-name">post</p>
            </div>
        </div>
        <div class="post-container">
            <div class="post-profile">
                <a href="/profile/{{ $post->user_id }}"> <img src="{{ asset($post->user->profile) }}" alt=""
                        class="post-profile-img"></a>
                <div class="post-profile-info">
                    <a href="/profile/{{ $post->user_id }}">
                        <p class="post-profile-name">{{ $post->user->full_name }}</p>
                    </a>
                    <a href="/profile/{{ $post->user_id }}">
                        <p class="post-profile-username">{{ '@' }}{{ $post->user->username }}</p>
                    </a>
                    <p class="post-profile-time">{{ $post->user->created_at->format('D-m-y') }}</p>
                </div>
            </div>
            <div class="post-info">
                <div class="post-text">{{ $post->content }}</div>
                @if ($post->media)
                    <div class="post-img"><img src="{{ asset('storage/postImages/' . $post->media) }}" alt="">
                    </div>
                @endif
                <div class="like-cmnt">
                    <div class="likes">
                        <form action="{{ route('posts.like')}}" id="form-js">
                            <input type="hidden" value='{{ $post->id }}' id="post-id-js">
                            <button type="submit" class=""><i class="fa-regular fa-heart"></i></button>
                         </form>
                         <p class="likes-num" id="count-js">{{ $post->likes->count() }}</p>
                    </div>
                    <div class="cmnts">
                        <i class="fa-regular fa-comment"></i>
                        <p class="cmnts-num">{{ $post->comments->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-contro">
            <a href="/profile/{{ auth()->id() }}">
                <div class="form-img">
                    <img src="{{ asset(auth()->user()->profile) }}" alt="">
                </div>
            </a>
            <div class="form-inputs">
                <form action="{{ route('posts.comment.store', $post->id) }}" method="post">
                    @csrf
                    <div class="input-wrapper">
                        <input class="input-box" type="text" name="comment" placeholder="Post your reply">
                        <span class="underline"></span>
                    </div>

                    <button class="button" type="submit">


                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                        </svg>


                        <div class="text">
                            Reply
                        </div>

                    </button>
                </form>
            </div>
        </div>
        @forelse ($comments as $comment)
            <div class="comments">
                <div class="post-container">
                    <div class="post-profile">
                        <a href="/profile/{{ $comment->user_id }}"> <img src="{{ asset($comment->user->profile) }}"
                                alt="" class="post-profile-img"></a>
                        <div class="post-profile-info">
                            <a href="/profile/{{ $comment->user_id }}">
                                <p class="post-profile-name">{{ $comment->user->full_name }}</p>
                            </a>
                            <a href="/profile/{{ $comment->user_id }}">
                                <p class="post-profile-username">{{ '@' }}{{ $comment->user->username }}</p>
                            </a>
                            <p class="post-profile-time">{{ $comment->created_at->format('D-m-y') }}</p>
                        </div>
                    </div>
                    <div class="post-info">
                        <div class="post-text">{{ $comment->comment }}</div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</x-layout>
