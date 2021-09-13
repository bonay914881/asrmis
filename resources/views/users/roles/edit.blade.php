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
                                <h3 class="mb-0">Edit Roles</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('roles') }}" class="btn btn-sm btn-warning">{{ __('Back to Roles') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2"></div>

                    <div class="py-2">
                        <div class="card-body">
                            <form class="col-md-12" action="{{ route('roles.update', $role) }}" method="post" enctype="multipart/form-data">
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
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Name') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $role->name }}" autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <label class="form-control-label">{{ __('Permissions') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                    <div class="form-group{{ $errors->has('permission') ? ' has-danger' : '' }} mb-3">                                        
                                        @foreach($permission as $value)
                                            <div class="form-check form-check-inline" style="font-weight: bold;">
                                                <label class="form-check-label">
                                                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'form-check-input')) }}
                                                    <span class="badge badge-danger">{{ $value->name }}</span>
                                                </label>
                                            </div>
                                        @endforeach

                                        @if ($errors->has('permission'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('permission') }}</strong>
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