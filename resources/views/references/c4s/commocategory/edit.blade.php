@extends('layouts.app', ['class' => '', 'pageSlug' => 'c4scommocategory'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit C4s Commo Category</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('c4s commo category') }}" class="btn btn-sm btn-warning">{{ __('Back to C4s Commo Category') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2"></div>

                    <div class="py-2">
                        <div class="card-body">
                            <form action="{{ route('commocategories.update',$commocategory) }}" method="post" enctype="multipart/form-data">
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
                                    <div class="form-group{{ $errors->has('commo_code') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Commo Code') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="commo_code" class="form-control{{ $errors->has('commo_code') ? ' is-invalid' : '' }}" value="{{ $commocategory->commo_code }}" autofocus>

                                        @if ($errors->has('commo_code'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('commo_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('commo_category') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Commo Category') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="commo_category" class="form-control{{ $errors->has('commo_category') ? ' is-invalid' : '' }}" value="{{ $commocategory->commo_category }}">

                                        @if ($errors->has('commo_category'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('commo_category') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('commo_desc') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Commo Description') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="commo_desc" class="form-control{{ $errors->has('commo_desc') ? ' is-invalid' : '' }}" value="{{ $commocategory->commo_desc }}">

                                        @if ($errors->has('commo_desc'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('commo_desc') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Category') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <select class="form-control" data-toggle="select" name="category_id">
                                            <option></option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" data-tokens="{{ $category->category_code }}" {{ ($commocategory->category_id == $category->id) ? "selected" : "" }} >{{ $category->category_code }}</option>
                                            @endforeach
                                        </select>
                                        
                                        @if ($errors->has('category_id'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('category_group_id') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Category Group') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <select class="form-control" data-toggle="select" name="category_group_id">
                                            <option></option>
                                            @foreach($categorygroups as $categorygroup)
                                                <option value="{{ $categorygroup->id }}" data-tokens="{{ $categorygroup->category_group_desc }}" {{ ($commocategory->category_group_id == $categorygroup->id) ? "selected" : "" }} >{{ $categorygroup->category_group_desc }}</option>
                                            @endforeach
                                        </select>
                                        
                                        @if ($errors->has('category_group_id'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('category_group_id') }}</strong>
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