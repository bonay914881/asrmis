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
                                <h3 class="mb-0">Edit Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('users') }}" class="btn btn-sm btn-warning">{{ __('Back to Users') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2"></div>

                    <div class="py-2">
                        <div class="card-body">
                            <form action="{{ route('users.update',$user) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

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
                                        <select class="form-control text-default" name="rankcode">
                                            <option value="BGEN"{{ ($user->rankcode == 'BGEN') ? "selected" : "" }} >BGEN - Brigadier General</option>
                                            <option value="COL" {{ ( $user->rankcode == 'COL') ? "selected" : "" }}>COL - Colonel</option>
                                            <option value="LTC"{{ ($user->rankcode == 'LTC') ? "selected" : "" }} >LTC - Lieutenant Colonel</option>
                                            <option value="MAJ" {{ ( $user->rankcode == 'MAJ') ? "selected" : "" }}>MAJ - Major</option>
                                            <option value="CPT"{{ ($user->rankcode == 'CPT') ? "selected" : "" }} >CPT - Captain</option>
                                            <option value="1LT" {{ ( $user->rankcode == '1LT') ? "selected" : "" }}>1LT - 1st Lieutenant</option>
                                            <option value="2LT"{{ ($user->rankcode == '2LT') ? "selected" : "" }} >2LT - 2nd Lieutenant</option>
                                            <option style="background-color: #d8d7d7; height: 1px;" disabled>&nbsp;</option>
                                            <option value="FCMS" {{ ( $user->rankcode == 'FCMS') ? "selected" : "" }}>FCMS - First Chief Senior Master Sergeant</option>
                                            <option value="CMS"{{ ($user->rankcode == 'CMS') ? "selected" : "" }} >CMS - Chief Senior Master Sergeant</option>
                                            <option value="SMS" {{ ( $user->rankcode == 'SMS') ? "selected" : "" }}>SMS - Senior Master Sergeant</option>
                                            <option value="Msg"{{ ($user->rankcode == 'Msg') ? "selected" : "" }} >Msg - Master Sergeant</option>
                                            <option value="TSg" {{ ( $user->rankcode == 'TSg') ? "selected" : "" }}>TSg - Technical Sergeant</option>
                                            <option value="SSg"{{ ($user->rankcode == 'SSg') ? "selected" : "" }} >SSg - Staff Sergeant</option>
                                            <option value="Sgt" {{ ( $user->rankcode == 'Sgt') ? "selected" : "" }}>Sgt - Sergeant</option>
                                            <option value="Cpl"{{ ($user->rankcode == 'Cpl') ? "selected" : "" }} >Cpl - Corporal</option>
                                            <option value="PFC" {{ ( $user->rankcode == 'PFC') ? "selected" : "" }}>PFC - Private First Class</option>
                                            <option value="Pvt"{{ ($user->rankcode == 'Pvt') ? "selected" : "" }} >Pvt - Private</option>
                                        </select>
                                        
                                        @if ($errors->has('rankcode'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('rankcode') }}</strong>
                                            </span>
                                        @endif
                                    </div> 

                                    <div class="form-group{{ $errors->has('unitcode') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Unit') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <select class="form-control text-default" name="unitcode">
                                            <option></option>
                                            @foreach($unitcodes->sortBy('recordnumber') as $unitcode)
                                                <option value="{{ $unitcode->cg_unitcode }}" data-tokens="{{ $unitcode->cg_unitcode }} {{ $unitcode->unit_description }}" {{ ($user->unitcode == $unitcode->cg_unitcode) ? "selected" : "" }} >{{ $unitcode->cg_unitcode }} - {{ $unitcode->unit_description }}</option>
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
                                        <input type="text" name="firstname" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" value="{{ $user->firstname }}" placeholder="Input First Name">

                                        @if ($errors->has('firstname'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('middlename') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Middle Name') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="middlename" class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}" value="{{ $user->middlename }}" placeholder="Input Middle Name">

                                        @if ($errors->has('middlename'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('middlename') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Last Name') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="lastname" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" value="{{ $user->lastname }}" placeholder="Input Last Name">

                                        @if ($errors->has('lastname'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-control-label">{{ __('Appendage') }}</label>
                                        <input type="text" name="appendage" class="form-control" value="{{ $user->appendage }}" placeholder="Input Ext.">
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('E-mail ( Username )') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $user->email }}">

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
                                                        {{ Form::checkbox('roles[]', $value->name, in_array($value->name, $userRole) ? true : false, array('class' => 'form-check-input')) }}
                                                        <span class="badge badge-danger">{{ $value->name }}</span>
                                                    </label>
                                                </div>                                        
                                            @endforeach   
                                        @endrole
                                        
                                        @role('administrator')
                                            @foreach($roles->sortByDesc('id')->forget(1) as $value)
                                                <div class="form-check form-check-inline" style="font-weight: bold;">
                                                    <label class="form-check-label">
                                                        {{ Form::checkbox('roles[]', $value->name, in_array($value->name, $userRole) ? true : false, array('class' => 'form-check-input')) }}
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

                                    <div class="text-left">
                                        <button type="submit" class="btn btn-warning mt-4">Update</button>
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