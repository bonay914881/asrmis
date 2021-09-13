@extends('layouts.app', ['class' => '', 'pageSlug' => 'c4sequipments'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Create C4s Equipment</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('c4s equipment') }}" class="btn btn-sm btn-warning">{{ __('Back to C4s Equipment') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2"></div>

                    <div class="py-2">
                        <div class="card-body">
                            <form action="{{ route('c4sequipments.store') }}" method="post" enctype="multipart/form-data">
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
                                    <div class="form-group{{ $errors->has('nomenclature_id') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Nomenclature') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <select class="form-control" data-toggle="select" name="nomenclature_id">
                                            <option></option>
                                            @foreach($nomenclatures as $nomenclature)
                                                <option value="{{ $nomenclature->id }}">{{ $nomenclature->commocategories->communicationcategories->categorygroups->category_group_desc }} - {{ $nomenclature->commocategories->communicationcategories->category_description }} , {{ $nomenclature->commocategories->communicationcategories->category_code }} - {{ $nomenclature->commocategories->commo_code }} , {{ $nomenclature->commocategories->commo_category }} - {{ $nomenclature->equipment_code }} , {{ $nomenclature->nomenclature }} , {{ $nomenclature->classification }}</option>
                                            @endforeach
                                        </select>
                                        
                                        @if ($errors->has('nomenclature_id'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('nomenclature_id') }}</strong>
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

                                    <div class="form-group{{ $errors->has('serial_number') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Serial Number') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <input type="text" name="serial_number" class="form-control{{ $errors->has('serial_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Serial Number') }}" value="{{ old('serial_number') }}">

                                        @if ($errors->has('serial_number'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('serial_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Status') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <select class="form-control" name="status">
                                            <option></option>
                                            <option value="SERVICEABLE">SERVICEABLE</option>
                                            <option value="UNSERVICEABLE">UNSERVICEABLE</option>
                                            <option value="LOST">LOST</option>
                                            <option value="UNKNOWN">UNKNOWN</option>
                                        </select>
                                        
                                        @if ($errors->has('status'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('specification') ? ' has-danger' : '' }} mb-3">
                                        <label class="form-control-label">{{ __('Specification') }} <i style="color:#FF0000;"><b>{{ __('*') }}</b></i></label>
                                        <select class="form-control" name="specification">
                                            <option></option>
                                            <option value="MILITARY">MILITARY</option>
                                            <option value="COMMERCIAL">COMMERCIAL</option>
                                        </select>
                                        
                                        @if ($errors->has('specification'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('specification') }}</strong>
                                            </span>
                                        @endif
                                    </div>                                    

                                    <div class="form-group mb-3">
                                        <label class="form-control-label">{{ __('Date Acquired') }}</label>
                                        <input type="text" name="date_acquired" class="form-control datepicker" placeholder="{{ __('Date Acquired') }}" value="{{ old('date_acquired') }}">
                                    </div>   

                                    <div class="form-group mb-3">
                                        <label class="form-control-label">{{ __('Cost Acquired') }}</label>
                                        <input type="number" name="cost_acquired" class="form-control" placeholder="{{ __('Cost Acquired') }}" value="{{ old('cost_acquired') }}">
                                    </div>         
                                    
                                    <div class="form-group mb-3">
                                        <label class="form-control-label">{{ __('Remarks') }}</label>
                                        <input type="text" name="remarks" class="form-control" placeholder="{{ __('Remarks') }}" value="{{ old('remarks') }}">
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