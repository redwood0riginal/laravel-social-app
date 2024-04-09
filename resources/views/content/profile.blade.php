<x-layout>

    <div class="profile-section">

        <div class="back-container">
            <div class="back"><a href="/"><i class="fa-solid fa-arrow-left"></i></a></div>
            <div class="user-info">
                <p href="" class="user-name">{{ $user->username }}</p>
                <span class="posts-length">{{ count($user->posts) }}
                    {{ count($user->posts) > 1 ? 'posts' : 'post' }}</span>
            </div>
        </div>
        <div class="user-profile-container">
            <div class="thumbnail">
                <img src="{{ asset('storage/thumbnailImages/' . auth()->user()->thumbnail) }}" alt="">
            </div>
            <div class="profile-img-edit-btn-container">
                <div class="profile-image">
                    <img src="{{ asset('storage/profileImages/' . auth()->user()->profile) }}" alt="">
                </div>
                @if ($user->id == auth()->id())
                    <div class="edit-profile">
                        <a href="/profile-form/{{ auth()->user()->id }}/edit">Edit profile</a>
                    </div>
                @endif
            </div>
            <div class="information-user">
                <div class="user-info">
                    <p class="user-name">{{ auth()->user()->full_name }}</p>
                    <p class="user-username">{{ auth()->user()->username }}</p>
                </div>
                <div class="description">
                    <p>{{ auth()->user()->description }}</p>
                </div>
                <div class="dates">
                    <div class="birthdate"><i class="fa-solid fa-cake-candles"></i>
                        <p>Born
                            {{ auth()->user()->birthdate ? \Carbon\Carbon::parse(auth()->user()->birthdate)->format('M d') : '' }}
                        </p>
                    </div>
                    <div class="joindate"><i class="fa-solid fa-calendar-days"></i>
                        <p>Joined {{ auth()->user()->created_at->format('M d') }}</p>
                    </div>
                </div>
                <div class="follow">
                    <div class="following-list"><a href=""><span>80 </span>Following</a></div>
                    <div class="followers-list"><a href=""><span>36 </span>Followers</a></div>
                </div>
            </div>
        </div>

        <div class="nav-area">
            <a href="" class="posts-section">Posts</a>
            <a href="" class="likes-section">Likes</a>
        </div>

        @foreach ($posts as $post)
            <div class="post-container">
                <div class="post-profile">
                    <img src="{{ asset('storage/profileImages/' . $post->user->profile) }}" alt=""
                        class="post-profile-img">
                    <div class="post-profile-info">
                        <p class="post-profile-name">{{ $post->user->full_name }}</p>
                        <p class="post-profile-username">{{ '@' }}{{ $post->user->username }}</p>
                        <p class="post-profile-time">{{ $post->created_at->format('D-m-y') }}</p>
                    </div>
                </div>
                <div class="post-info">
                    <div class="post-text">{{ $post->content }}</div>
                    @if ($post->media)
                        <div class="post-img"><img src="{{ asset('storage/postImages/' . $post->media) }}"
                                alt=""></div>
                    @endif
                    <div class="like-cmnt">
                        <div class="likes">
                            <i class="fa-regular fa-heart"></i>
                            <p class="likes-num">{{ $post->likes }}</p>
                        </div>
                        <div class="cmnts">
                            <i class="fa-regular fa-comment"></i>
                            <p class="cmnts-num">{{ $post->comments }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</x-layout>
