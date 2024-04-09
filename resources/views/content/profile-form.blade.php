<div class="profile-container-form">
<section class="profile-form-container">
    <header>Update your information</header>
    <form class="form" action="{{route('profile.update', ['user' => $user->id])}}" method="POST" enctype="multipart/form-data">
        @error('thumbnail')
            {{$message}}
        @enderror
        @error('profile')
            {{$message}}
        @enderror
        @error('full_name')
            {{$message}}
        @enderror
        @error('username')
            {{$message}}
        @enderror
        @error('description')
            {{$message}}
        @enderror
        @error('birthdate')
            {{$message}}
        @enderror
        @error('gender')
            {{$message}}
        @enderror
        @error('address')
            {{$message}}
        @enderror
        @csrf
        @method('PUT')
        <div class="photos">
            <label>Add a cover photo</label>
            <input type="file" name="thumbnail">
        </div>
        <div class="photos">
            <label>Profile</label>
            <input type="file" name="profile">
        </div>
        <div class="input-box">
            <label>Full Name</label>
            <input placeholder="Enter your name" type="text" name="full_name">
        </div>
        <div class="input-box">
            <label>Username</label>
            <input placeholder="Enter a username" type="text" name="username">
        </div>
        <div class="input-box desc">
            <label>Bio</label>
            <input placeholder="max:255" type="text" name="description">
        </div>
        <div class="column">
            <div class="input-box">
                <label>Birth Date</label>
                <input placeholder="Enter birth date" type="date" name="birthdate">
            </div>
        </div>
        <div class="gender-box">
            <label>Gender</label>
            <div class="gender-option">
                <div class="gender">
                    <input checked="" name="gender" id="check-male" value="male" type="radio">
                    <label for="check-male">Male</label>
                </div>
                <div class="gender">
                    <input name="gender" id="check-female"  value="female" type="radio">
                    <label for="check-female">Female</label>
                </div>
            </div>
        </div>
        <div class="input-box address">
            <label>Address</label>
            <input placeholder="Enter street address" name="address" type="text">
        </div>
        <button>Save</button>
    </form>
</section>
</div>
