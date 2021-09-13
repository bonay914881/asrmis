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
                                <h3 class="mb-0">C4s Commo Category</h3>
                                <p class="text-sm mb-0">
                                    Total C4s Commo Category <font style="margin-left:3px;" class="text-danger">{{ number_format($total_commocategories,0) }}</font>
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('c4s commo category - create') }}" class="btn btn-sm btn-warning">{{ __('Create C4s Commo Category') }}</a>
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
                                    <th scope="col" class="text-default">{{ __('Category Group Code') }}</th>
                                    <th scope="col" class="text-default">{{ __('Category Code') }}</th>
                                    <th scope="col" class="text-default">{{ __('Commo Code') }}</th>
                                    <th scope="col" class="text-default">{{ __('Commo Category') }}</th>
                                    <th scope="col" class="text-default">{{ __('Commo Description') }}</th>
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
                                @if(isset($commocategories))
                                    @foreach ($commocategories as $commocategory)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $commocategory->categorygroups->category_group_desc }}</td>
                                            <td>{{ $commocategory->communicationcategories->category_code }}</td>
                                            <td>{{ $commocategory->commo_code }}</td>
                                            <td>{{ $commocategory->commo_category }}</td>
                                            <td>{{ $commocategory->commo_desc }}</td>
                                            <td>{{\Carbon\Carbon::parse($commocategory->created_at)->format('d F Y')}}</td>
                                            @can('action-edit','action-delete')  
                                                <td class="text-right">
                                                    <a href="{{ route('c4s commo category - edit',$commocategory) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit" style="margin-right: 5px;">
                                                        <i class="fas fa-user-edit text-warning"></i>
                                                    </a>
                                                    <span data-toggle="modal" data-target="#deleteCommoCategory{{ $commocategory->id }}">
                                                        <a href="#!" data-toggle="tooltip" class="table-action table-action-delete" data-original-title="Delete">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </a>
                                                    </span>
                                                    @include('references.c4s.commocategory.modal.deleteCommoCategory')
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                @endif 
                            </tbody>
                        </table>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                @if ($commocategories->lastPage() > 1)
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled {{ ($commocategories->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $commocategories->url(1) }}" tabindex="-1">
                                                <i class="fas fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $commocategories->lastPage(); $i++)
                                            <li class="{{ ($commocategories->currentPage() == $i) ? ' active' : '' }} page-item">
                                                <a class=" page-link " href="{{ $commocategories->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item {{ ($commocategories->currentPage() == $commocategories->lastPage()) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $commocategories->url($commocategories->currentPage()+1) }}">
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