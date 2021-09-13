@extends('layouts.app', ['class' => '', 'pageSlug' => 'c4scategorygroup'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit C4s Category Group</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('c4s category group') }}" class="btn btn-sm btn-warning">{{ __('Back to C4s Category Group') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2"></div>

                    <div class="py-2">
                        <div class="card-body">
                            <form action="{{ route('categorygroups.update',$categorygroup) }}" method="post" enctype="multipart/form-data">
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
                                    <div class="form-group{{ $errors->has('category_group_code') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Category Group Code') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="category_group_code" class="form-control{{ $errors->has('category_group_code') ? ' is-invalid' : '' }}" value="{{ $categorygroup->category_group_code }}" autofocus>

                                        @if ($errors->has('category_group_code'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('category_group_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('category_group_desc') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Category Group Description') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="category_group_desc" class="form-control{{ $errors->has('category_group_desc') ? ' is-invalid' : '' }}" value="{{ $categorygroup->category_group_desc }}">

                                        @if ($errors->has('category_group_desc'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('category_group_desc') }}</strong>
                                            </span>
                                        @endif

                                        <input type="hidden" name="prev_value_category_group_code" value="{{ $categorygroup->category_group_code }}">
                                        <input type="hidden" name="prev_value_category_group_desc" value="{{ $categorygroup->category_group_desc }}">
                                        <input type="hidden" name="action" value="UPDATE">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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