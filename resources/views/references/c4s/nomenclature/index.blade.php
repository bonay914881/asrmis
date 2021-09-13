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
                                <h3 class="mb-0">C4s Nomenclature</h3>
                                <p class="text-sm mb-0">
                                    Total C4s Nomenclature <font style="margin-left:3px;" class="text-danger">{{ number_format($total_nomenclatures,0) }}</font>
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('c4s nomenclature - create') }}" class="btn btn-sm btn-warning">{{ __('Create C4s Nomenclature') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">    
                        <div class="row align-items-center">
                            <div class="col-9"></div>
                            <div class="col-3 text-right">
                                <form>
                                    <div class="form-group mt-4">
                                        <div class="input-group">
                                            <input class="form-control" name="search" placeholder="Search . . ." type="text" />
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="py-2">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-default">{{ __('#') }}</th>
                                    <th scope="col" class="text-default">{{ __('Commo Code') }}</th>
                                    <th scope="col" class="text-default">{{ __('Equipment Code') }}</th>
                                    <th scope="col" class="text-default">{{ __('Nomenclature') }}</th>
                                    <th scope="col" class="text-default">{{ __('Classification') }}</th>
                                    <th scope="col" class="text-default">{{ __('Creation Date') }}</th>
                                    @can('action-edit','action-delete')  
                                        <th scope="col" class="text-right text-default">{{ __('Action') }}</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($records))
                                    <tr><td colspan="12" class="text-center"><font style="font-weight: 900;" class="text-danger"><b>{{ __('No Records Found!') }}</b></font></td></tr>
                                @endif 
                                @if(isset($nomenclatures))
                                    @foreach ($nomenclatures as $nomenclature)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $nomenclature->commocategories->commo_code }}</td>
                                            <td>{{ $nomenclature->equipment_code }}</td>
                                            <td>{{ $nomenclature->nomenclature }}</td>
                                            <td>{{ $nomenclature->classification }}</td>
                                            <td>{{\Carbon\Carbon::parse($nomenclature->created_at)->format('d F Y')}}</td>
                                            @can('action-edit','action-delete')  
                                                <td class="text-right">
                                                    <a href="{{ route('c4s nomenclature - edit',$nomenclature) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit" style="margin-right: 5px;">
                                                        <i class="fas fa-user-edit text-warning"></i>
                                                    </a>
                                                    <span data-toggle="modal" data-target="#deleteNomenclature{{ $nomenclature->id }}">
                                                        <a href="#!" data-toggle="tooltip" class="table-action table-action-delete" data-original-title="Delete">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </a>
                                                    </span>
                                                    @include('references.c4s.nomenclature.modal.deleteNomenclature')
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                @endif 
                            </tbody>
                        </table>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                @if ($nomenclatures->lastPage() > 1)
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled {{ ($nomenclatures->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $nomenclatures->url(1) }}" tabindex="-1">
                                                <i class="fas fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $nomenclatures->lastPage(); $i++)
                                            <li class="{{ ($nomenclatures->currentPage() == $i) ? ' active' : '' }} page-item">
                                                <a class=" page-link " href="{{ $nomenclatures->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item {{ ($nomenclatures->currentPage() == $nomenclatures->lastPage()) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $nomenclatures->url($nomenclatures->currentPage()+1) }}">
                                                <i class="fas fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            </nav>
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