@extends('layouts.app', ['class' => '', 'pageSlug' => 'c4snomenclature'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Create C4s Nomenclature</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('c4s nomenclature') }}" class="btn btn-sm btn-warning">{{ __('Back to C4s Nomenclature') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2"></div>

                    <div class="py-2">
                        <div class="card-body">
                            <form action="{{ route('nomenclatures.store') }}" method="post" enctype="multipart/form-data">
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
                                    <div class="form-group{{ $errors->has('equipment_code') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Equipment Code') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="equipment_code" class="form-control{{ $errors->has('equipment_code') ? ' is-invalid' : '' }}" placeholder="{{ __('Equipment Code') }}" value="{{ old('equipment_code') }}" autofocus>

                                        @if ($errors->has('equipment_code'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('equipment_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('nomenclature') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Nomenclature') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="nomenclature" class="form-control{{ $errors->has('nomenclature') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomenclature') }}" value="{{ old('nomenclature') }}">

                                        @if ($errors->has('nomenclature'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('nomenclature') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('classification') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Classification') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="classification" class="form-control{{ $errors->has('classification') ? ' is-invalid' : '' }}" placeholder="{{ __('Classification') }}" value="{{ old('classification') }}">

                                        @if ($errors->has('classification'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('classification') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('commo_category_id') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Category') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <select class="form-control" data-toggle="select" name="commo_category_id">
                                            <option></option>
                                            @foreach($commocategories as $commocategory)
                                                <option value="{{ $commocategory->id }}">{{ $commocategory->commo_code }} - {{ $commocategory->commo_desc }}</option>
                                            @endforeach
                                        </select>
                                        
                                        @if ($errors->has('commo_category_id'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('commo_category_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>

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