<div class="profile-section">

    <div class="back-container">
        <div class="back"><a href="/"><i class="fa-solid fa-arrow-left"></i></a></div>
        <div class="user-info">
            <p href="" class="user-name">'hmad</p>
            <span class="posts-length">187 posts</span>

        </div>
    </div>

    <div class="user-profile-container">
        <div class="thumbnail">
            <img src="storage/thumbnailImages/{{auth()->user()->thumbnail}}" alt="">
        </div>
        <div class="profile-img-edit-btn-container">
            <div class="profile-image">
                <img src="storage/profileImages/{{auth()->user()->profile}}" alt="">
            </div>
            <div class="edit-profile">
                <a href="profile-form/{{auth()->user()->id}}/edit">Edit profile</a>
            </div>
        </div>
        <div class="information-user">
            <div class="user-info">
                <p class="user-name">{{auth()->user()->full_name}}</p>
                <p class="user-username">{{auth()->user()->username}}</p>
            </div>
            <div class="description">
                <p>{{auth()->user()->description}}</p>
            </div>
            <div class="dates">
                <div class="birthdate"><i class="fa-solid fa-cake-candles"></i>
                    <p>Born November 6, 2003</p>
                </div>
                <div class="joindate"><i class="fa-solid fa-calendar-days"></i>
                    <p>Joined {{auth()->user()->created_at}}</p>
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

        <div class="post-container">
            <div class="post-profile">
                <img src="profile.jpg" alt="" class="post-profile-img">
                <div class="post-profile-info">
                    <p class="post-profile-name">hmad</p>
                    <p class="post-profile-username">redwood</p>
                    <p class="post-profile-time">.2h</p>
                </div>
            </div>
            <div class="post-info">
                <div class="post-text">lorem</div>
                <div class="post-img"><img src="profile.jpg" alt=""></div>
                <div class="like-cmnt">
                    <div class="likes">
                        <i class="fa-regular fa-heart"></i>
                        <p class="likes-num">2</p>
                    </div>
                    <div class="cmnts">
                        <i class="fa-regular fa-comment"></i>
                        <p class="cmnts-num">3</p>
                    </div>
                </div>
            </div>
        </div>




</div>
