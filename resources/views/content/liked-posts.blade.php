<x-layout>

    <div class="profile-section">

        <div class="back-container">
            <div class="back" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="user-info">
                <p href="" class="user-name">{{ $user->username }}</p>
                <span class="posts-length">{{ count($user->posts) }}
                    {{ count($user->posts) > 1 ? 'posts' : 'post' }}</span>
            </div>
        </div>
        <div class="user-profile-container">
            <div class="thumbnail">
                <img src="{{ asset($user->thumbnail) }}" alt="">
            </div>
            <div class="profile-img-edit-btn-container">
                <div class="profile-image">
                    <img src="{{ asset($user->profile) }}" alt="">
                </div>
                @if ($user->id == auth()->id())
                    <div class="edit-profile">
                        <a href="/profile-form/{{ auth()->user()->id }}/edit">Edit profile</a>
                    </div>
                @else
                    <div class="follow-profile">
                        @if (auth()->user()->follows($user))
                            <form action="{{ route('user.unfollow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="unfollow">Unfollow</button>
                            </form>
                        @else
                            <form action="{{ route('user.follow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit">Follow</button>
                            </form>
                        @endif


                    </div>
                @endif
            </div>
            <div class="information-user">
                <div class="user-info">
                    <p class="user-name">{{ $user->full_name }}</p>
                    <p class="user-username">{{ $user->username }}</p>
                </div>
                @if ($user->description)
                    <div class="description">
                        <p>{{ $user->description }}</p>
                    </div>
                @endif

                <div class="dates">
                    @if ($user->birthdate)
                        <div class="birthdate"><i class="fa-solid fa-cake-candles"></i>
                            <p>Born
                                {{ $user->birthdate ? \Carbon\Carbon::parse($user->birthdate)->format('M d') : '' }}
                            </p>
                        </div>
                    @endif

                    <div class="joindate"><i class="fa-solid fa-calendar-days"></i>
                        <p>Joined {{ $user->created_at->format('M Y') }}</p>
                    </div>
                </div>
                <div class="follow">
                    <div class="following-list"><a href=""><span>{{ $user->followings->count() }} </span>Following</a></div>
                    <div class="followers-list"><a href=""><span>{{ $user->followers->count() }} </span>Followers</a></div>
                </div>
            </div>
        </div>

        <div class="nav-area">
            <a href="{{ route('profile.show', $user->id) }}" class="posts-section">Posts</a>
            <a href="{{ route('profile.liked.show', $user->id) }}" class="likes-section">Likes</a>
        </div>

        @foreach ($posts as $post)
            <div class="post-container">
                <div class="post-profile">
                    <img src="{{ asset($post->user->profile) }}" alt="" class="post-profile-img">
                    <div class="post-profile-info">
                        <p class="post-profile-name">{{ $post->user->full_name }}</p>
                        <p class="post-profile-username">{{ '@' }}{{ $post->user->username }}</p>
                        <p class="post-profile-time">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    @if ($user->id == auth()->id() && $post->user_id == auth()->id())
                        <div class="delete-btn">
                            <form method="POST" action="{{ route('post.delete', $post->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit"><i class="fa-solid fa-xmark"></i></button>
                            </form>
                        </div>
                    @endif
                </div>

                <div class="post-info">
                    <div class="post-text">{{ $post->content }}</div>
                    @if ($post->media)
                        <div class="post-img"><img src="{{ asset('storage/postImages/' . $post->media) }}"
                                alt=""></div>
                    @endif
                    <div class="like-cmnt">
                        <div class="likes">
                            <form action="{{ route('posts.like') }}" id="form-js">
                                <input type="hidden" value='{{ $post->id }}' id="post-id-js">
                                <button type="submit" class=""><i class="fa-regular fa-heart"></i></button>
                            </form>
                            <p class="likes-num" id="count-js">{{ $post->likes->count() }}</p>
                        </div>
                        <a href="{{ route('posts.show', $post->id) }}">
                            <div class="cmnts">
                                <i class="fa-regular fa-comment"> </i>
                                <p class="cmnts-num">{{$post->comments->count()}}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</x-layout>
