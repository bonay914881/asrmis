<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-warning opacity-8"></span>
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-md-12 {{ $class ?? '' }}">
                <h1 class="display-2 text-white">Hello {{ Auth::user()->rankcode; }} {{ Auth::user()->firstname; }} {{ Auth::user()->middlename; }} {{ Auth::user()->lastname; }} {{ Auth::user()->appendage; }}</h1>
                <p class="text-white mt-0 mb-5">
                    @foreach(Auth::user()->roles as $role)
                        <span class="badge badge-danger mr-1">{{ $role->name }}</span>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div> 