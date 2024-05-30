<x-layout>
    <div class="followings-section">

        <div class="back-container">
            <div class="back" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="user-info">
                <p href="" class="user-name">{{ $user->full_name }}</p>
                <span class="posts-length">{{ $user->username }}</span>
            </div>
        </div>
        @forelse ($followings as $following)
            <div class="followings-list">
                <div class="followings-info">
                    <a href="{{route('profile.show', $following->id)}}">
                        <div class="followings-profile">
                            <img src="{{ asset($following->profile) }}" alt="">
                        </div>
                    </a>
                    <div class="followings-info-text">
                        <a href="{{route('profile.show', $following->id)}}">
                            <div class="followings-fullname">{{ $following->full_name }}</div>
                        </a>
                        <a href="{{route('profile.show', $following->id)}}">
                            <div class="followings-username">{{ $following->username }}</div>
                        </a>
                        <div class="followings-bio">{{ $following->description }}</div>
                    </div>
                </div>
                @if (auth()->id()!= $following->id)
                    <div class="follow-button">
                        @if ($user->follows($following))
                            <form action="{{ route('user.unfollow', $following->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="unfollow">Unfollow</button>
                            </form>
                        @else
                            <form action="{{ route('user.follow', $following->id) }}" method="POST">
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
