<x-layout>
    <div class="middle-section">
        <div class="top-page">
            <a href="" class="foryou">For you</a>
            <a href="" class="following">Following</a>
        </div>

        <div class="form-contro">
            <a href="/profile/{{ auth()->id() }}">
                <div class="form-img">
                    <img src="{{ auth()->user()->profile }}" alt="">
                </div>
            </a>
            <div class="form-inputs">
                <form action="/create-post" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-wrapper">
                        <input class="input-box" type="text" name="content" placeholder="What's on your mind?!">
                        <span class="underline"></span>
                    </div>

                    <label for="file" class="custum-file-upload">
                        <div class="icon">
                            <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                        fill=""></path>
                                </g>
                            </svg>
                        </div>
                        <input id="file" name="media" type="file">
                    </label>

                    <button class="button" type="submit">


                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                        </svg>


                        <div class="text">
                            Post
                        </div>

                    </button>
                </form>

            </div>
        </div>


        @if (isset($posts) && count($posts) > 0)
            @foreach ($posts as $post)
                <div class="post-container">
                    <div class="post-profile">
                        <a href="/profile/{{ $post->user_id }}"> <img src="{{ asset($post->user->profile) }}" alt=""
                                class="post-profile-img"></a>
                        <div class="post-profile-info">
                            <a href="profile/{{ $post->user_id }}">
                                <p class="post-profile-name">{{ $post->user->full_name }}</p>
                            </a>
                            <a href="profile/{{ $post->user_id }}">
                                <p class="post-profile-username">{{ '@' }}{{ $post->user->username }}</p>
                            </a>
                            <p class="post-profile-time">{{ $post->user->created_at->format('D-m-y') }}</p>
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
                                <form action="{{ route('posts.like')}}" id="form-js">
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
        @endif



</x-layout>
