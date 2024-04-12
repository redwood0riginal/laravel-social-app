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
        <li><a href="/profile/{{ auth()->id() }}"><i class="fa-regular fa-user"></i>
                <p>Profile</p>
            </a></li>
        <li><a href="">Post</a></li>
    </ul>
    <div class="sidebar-profile">
        <img src="{{ asset(auth()->user()->profile) }}" alt="">
        <div class="sidebar-profile-info">
            <p class="name">{{ auth()->user()->full_name }}</p>
            <p class="username">{{ auth()->user()->username }}</p>
        </div>
        <div class="logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="Btn">
                    <div class="sign"><svg viewBox="0 0 512 512">
                            <path
                                d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                            </path>
                        </svg></div>
                    <div class="text">Logout</div>
                </button>
            </form>
        </div>
    </div>
</div>
