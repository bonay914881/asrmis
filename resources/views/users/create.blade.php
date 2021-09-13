@extends('layouts.app', ['class' => '', 'pageSlug' => 'users'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Create Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('users') }}" class="btn btn-sm btn-warning">{{ __('Back to Users') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2"></div>

                    <div class="py-2">
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')	

                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <h6 class="heading-small text-muted mb-4">
                                    <font class="text-danger"><b>{{ __('Note') }}</b></font> {{ __(': fields with') }} <font class="text-danger"><b>{{ __('asterisk (*)') }}</b></font> {{ __('are required.') }}
                                </h6>

                                <div class="pl-lg-4"> 
                                    <div class="form-group{{ $errors->has('rankcode') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Rank') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <select class="form-control" name="rankcode">
                                            <option></option>
                                            <option value="BGEN">BGEN - Brigadier General</option>
                                            <option value="COL">COL - Colonel</option>
                                            <option value="LTC">LTC - Lieutenant Colonel</option>
                                            <option value="MAJ">MAJ - Major</option>
                                            <option value="CPT">CPT - Captain</option>
                                            <option value="1LT">1LT - 1st Lieutenant</option>
                                            <option value="2LT">2LT - 2nd Lieutenant</option>
                                            <option style="background-color: #d8d7d7; height: 1px;" disabled>&nbsp;</option>
                                            <option value="FCSM">FCSM - First Chief Senior Master Sergeant</option>
                                            <option value="CMS">CMS - Chief Senior Master Sergeant</option>
                                            <option value="SMS">SMS - Senior Master Sergeant</option>
                                            <option value="Msg">Msg - Master Sergeant</option>
                                            <option value="TSg">TSg - Techhnical Sergeant</option>
                                            <option value="SSg">SSg - Staff Sergeant</option>
                                            <option value="Sgt">Sgt - Sergeant</option>
                                            <option value="Cpl">Cpl - Corporal</option>
                                            <option value="PFC">PFC - Private First Class</option>
                                            <option value="Pvt">Pvt - Private</option>
                                        </select>
                                        
                                        @if ($errors->has('rankcode'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('rankcode') }}</strong>
                                            </span>
                                        @endif
                                    </div> 

                                    <div class="form-group{{ $errors->has('unitcode') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Unit') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <select class="form-control" name="unitcode">
                                            <option></option>
                                            @foreach($unitcodes->sortBy('recordnumber') as $unitcode)
                                                <option value="{{ $unitcode->cg_unitcode }}">{{ $unitcode->cg_unitcode }} - {{ $unitcode->unit_description }}</option>
                                            @endforeach
                                        </select>
                                        
                                        @if ($errors->has('unitcode'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('unitcode') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('First Name') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="firstname" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('firstname') }}">

                                        @if ($errors->has('firstname'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('middlename') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Middle Name') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="middlename" class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}" placeholder="{{ __('Middle Name') }}" value="{{ old('middlename') }}">

                                        @if ($errors->has('middlename'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('middlename') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Last Name') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="lastname" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" value="{{ old('lastname') }}">

                                        @if ($errors->has('lastname'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-control-label">{{ __('Appendage') }}</label>
                                        <input type="text" name="appendage" class="form-control" placeholder="{{ __('Appendage') }}" value="{{ old('appendage') }}">
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('E-mail ( Username )') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('E-mail ( Username )') }}" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <label class="form-control-label">{{ __('Roles') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                    <div class="form-group{{ $errors->has('roles') ? ' has-danger' : '' }} mb-3">
                                        @role('super-admin')
                                            @foreach($roles->sortByDesc('id') as $value)
                                                <div class="form-check form-check-inline" style="font-weight: bold;">
                                                    <label class="form-check-label">
                                                        {{ Form::checkbox('roles[]', $value->id, false, array('class' => 'form-check-input')) }}
                                                        <span class="badge badge-danger">{{ $value->name }}</span>
                                                    </label>
                                                </div>                                        
                                            @endforeach 
                                        @endrole

                                        @role('administrator')
                                            @foreach($roles->sortByDesc('id')->forget(1) as $value)
                                                <div class="form-check form-check-inline" style="font-weight: bold;">
                                                    <label class="form-check-label">
                                                        {{ Form::checkbox('roles[]', $value->id, false, array('class' => 'form-check-input')) }}
                                                        <span class="badge badge-danger">{{ $value->name }}</span>
                                                    </label>
                                                </div>                                        
                                            @endforeach 
                                        @endrole                                                                             

                                        @if ($errors->has('roles'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('roles') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Password') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="{{ old('password') }}">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <input type="hidden" name="pamu" value="ASR">

                                    <div class="text-left">
                                        <button type="submit" class="btn btn-success mt-4">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')    
@endpush