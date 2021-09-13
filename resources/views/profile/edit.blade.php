@extends('layouts.app', ['class' => '', 'pageSlug' => 'dashboard'])

@section('content')
    @include('users.partials.header')   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#" style="cursor: none;">
                                    <img src="{{ asset('argon') }}/img/theme/default-avatar.png" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5"></div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->rankcode }} {{ auth()->user()->firstname }} {{ auth()->user()->middlename }} {{ auth()->user()->lastname }} {{ auth()->user()->appendage }}
                            </h3>
                            <div class="h5 font-weight-300">
                                @foreach(Auth::user()->roles as $role)
                                    <span class="badge badge-danger mr-1">{{ $role->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update',auth()->user()->id) }}">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Rank Code') }}</label>
                                    <select class="form-control" name="rankcode">
                                        <option value="BGEN"{{ (auth()->user()->rankcode == 'BGEN') ? "selected" : "" }} >BGEN - Brigadier General</option>
                                        <option value="COL" {{ (auth()->user()->rankcode == 'COL') ? "selected" : "" }}>COL - Colonel</option>
                                        <option value="LTC"{{ (auth()->user()->rankcode == 'LTC') ? "selected" : "" }} >LTC - Lieutenant Colonel</option>
                                        <option value="MAJ" {{ (auth()->user()->rankcode == 'MAJ') ? "selected" : "" }}>MAJ - Major</option>
                                        <option value="CPT"{{ (auth()->user()->rankcode == 'CPT') ? "selected" : "" }} >CPT - Captain</option>
                                        <option value="1LT" {{ (auth()->user()->rankcode == '1LT') ? "selected" : "" }}>1LT - 1st Lieutenant</option>
                                        <option value="2LT"{{ (auth()->user()->rankcode == '2LT') ? "selected" : "" }} >2LT - 2nd Lieutenant</option>
                                        <option style="background-color: #d8d7d7; height: 1px;" disabled>&nbsp;</option>
                                        <option value="FCMS" {{ (auth()->user()->rankcode == 'FCMS') ? "selected" : "" }}>FCMS - First Chief Senior Master Sergeant</option>
                                        <option value="CMS"{{ (auth()->user()->rankcode == 'CMS') ? "selected" : "" }} >CMS - Chief Senior Master Sergeant</option>
                                        <option value="SMS" {{ (auth()->user()->rankcode == 'SMS') ? "selected" : "" }}>SMS - Senior Master Sergeant</option>
                                        <option value="Msg"{{ (auth()->user()->rankcode == 'Msg') ? "selected" : "" }} >Msg - Master Sergeant</option>
                                        <option value="TSg" {{ (auth()->user()->rankcode == 'TSg') ? "selected" : "" }}>TSg - Technical Sergeant</option>
                                        <option value="SSg"{{ (auth()->user()->rankcode == 'SSg') ? "selected" : "" }} >SSg - Staff Sergeant</option>
                                        <option value="Sgt" {{ (auth()->user()->rankcode == 'Sgt') ? "selected" : "" }}>Sgt - Sergeant</option>
                                        <option value="Cpl"{{ (auth()->user()->rankcode == 'Cpl') ? "selected" : "" }} >Cpl - Corporal</option>
                                        <option value="PFC" {{ (auth()->user()->rankcode == 'PFC') ? "selected" : "" }}>PFC - Private First Class</option>
                                        <option value="Pvt"{{ (auth()->user()->rankcode == 'Pvt') ? "selected" : "" }} >Pvt - Private</option>
                                    </select>

                                    @if ($errors->has('rankcode'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rankcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Last Name') }}</label>
                                    <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" value="{{ auth()->user()->lastname }}">

                                    @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('First Name') }}</label>
                                    <input type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ auth()->user()->firstname }}">

                                    @if ($errors->has('firstname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('middlename') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Middle Name') }}</label>
                                    <input type="text" name="middlename" class="form-control {{ $errors->has('middlename') ? ' is-invalid' : '' }}" placeholder="{{ __('Middle Name') }}" value="{{ auth()->user()->middlename }}">

                                    @if ($errors->has('middlename'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('middlename') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('appendage') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Appendage') }}</label>
                                    <input type="text" name="appendage" class="form-control {{ $errors->has('appendage') ? ' is-invalid' : '' }}" placeholder="{{ __('Appendage') }}" value="{{ auth()->user()->appendage }}">
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ auth()->user()->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-left">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password',auth()->user()->id) }}">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control {{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control " placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-left">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change Password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
