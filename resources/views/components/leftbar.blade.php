<div class="sidebar">
    <ul class="sidebar-list">
        <a href=""><img src="logo.png" alt=""></a>
        <li><a href="/"><i class="fa-solid fa-house"></i>
                <p>Home</p>
            </a></li>
        <li><a href=""><i class="fa-solid fa-magnifying-glass"></i>
                <p>Explore</p>
            </a></li>
        <li><a href=""><i class="fa-regular fa-bell"></i>
                <p>Notifications</p>
            </a></li>
        <li><a href=""><i class="fa-regular fa-envelope"></i>
                <p>Messages</p>
            </a></li>
        <li><a href=""><i class="fa-regular fa-file"></i>
                <p>Pages</p>
            </a></li>
        <li><a href=""><i class="fa-solid fa-people-group"></i>
                <p>Groupes</p>
            </a></li>
        <li><a href="/profile/{{auth()->id()}}"><i class="fa-regular fa-user"></i>
                <p>Profile</p>
            </a></li>
        <li><a href="">Post</a></li>
    </ul>
    <div class="sidebar-profile">
        <img src="{{ asset(auth()->user()->profile) }}" alt="">
        <div class="sidebar-profile-info">
            <p class="name">{{auth()->user()->full_name}}</p>
            <p class="username">{{auth()->user()->username}}</p>
        </div>
    </div>
</div>
