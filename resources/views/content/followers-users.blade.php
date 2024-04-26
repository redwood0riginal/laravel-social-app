<x-layout>
    <div class="followings-section">

        <div class="back-container">
            <div class="back" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="user-info">
                <p href="" class="user-name">{{ $user->full_name }}</p>
                <span class="posts-length">{{ $user->username }}</span>
            </div>
        </div>
        @forelse ($followers as $follower)
            <div class="followings-list">
                <div class="followings-info">
                    <a href="{{route('profile.show', $follower->id)}}">
                        <div class="followings-profile">
                            <img src="{{ $follower->profile }}" alt="">
                        </div>
                    </a>
                    <div class="followings-info-text">
                        <a href="{{route('profile.show', $follower->id)}}">
                            <div class="followings-fullname">{{ $follower->full_name }}</div>
                        </a>
                        <a href="{{route('profile.show', $follower->id)}}">
                            <div class="followings-username">{{ $follower->username }}</div>
                        </a>
                        <div class="followings-bio">{{ $follower->description }}</div>
                    </div>
                </div>

                @if (auth()->id()!= $follower->id)
                <div class="follow-button">
                    @if ($follower->follows($user))
                        <form action="{{ route('user.unfollow', $follower->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="unfollow">Unfollow</button>
                        </form>
                    @else
                        <form action="{{ route('user.follow', $follower->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="follow">Follow</button>
                        </form>
                    @endif
                </div>
            @endif
            </div>


        @empty
            <div> no followings !!</div>
        @endforelse


    </div>


</x-layout>
