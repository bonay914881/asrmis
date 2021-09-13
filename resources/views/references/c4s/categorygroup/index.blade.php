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
                                <h3 class="mb-0">C4s Category Group</h3>
                                <p class="text-sm mb-0">
                                    Total C4s Category Group <font style="margin-left:3px;" class="text-danger">{{ number_format($total_categorygroups,0) }}</font>
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('c4s category group - create') }}" class="btn btn-sm btn-warning">{{ __('Create C4s Category Group') }}</a>
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
                                    <th scope="col" class="text-default">{{ __('Category Group  Code') }}</th>
                                    <th scope="col" class="text-default">{{ __('Category Group Description') }}</th>
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
                                @if(isset($categorygroups))
                                    @foreach ($categorygroups as $categorygroup)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $categorygroup->category_group_code }}</td>
                                            <td>{{ $categorygroup->category_group_desc }}</td>
                                            <td>{{\Carbon\Carbon::parse($categorygroup->created_at)->format('d F Y')}}</td>
                                            @can('action-edit','action-delete')  
                                                <td class="text-right">
                                                    <a href="{{ route('c4s category group - edit',$categorygroup) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit" style="margin-right: 5px;">
                                                        <i class="fas fa-user-edit text-warning"></i>
                                                    </a>
                                                    <span data-toggle="modal" data-target="#deleteCategoryGroup{{ $categorygroup->id }}">
                                                        <a href="#!" data-toggle="tooltip" class="table-action table-action-delete" data-original-title="Delete">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </a>
                                                    </span>
                                                    @include('references.c4s.categorygroup.modal.deleteCategoryGroup')
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                @endif 
                            </tbody>
                        </table>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                @if ($categorygroups->lastPage() > 1)
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled {{ ($categorygroups->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $categorygroups->url(1) }}" tabindex="-1">
                                                <i class="fas fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $categorygroups->lastPage(); $i++)
                                            <li class="{{ ($categorygroups->currentPage() == $i) ? ' active' : '' }} page-item">
                                                <a class=" page-link " href="{{ $categorygroups->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item {{ ($categorygroups->currentPage() == $categorygroups->lastPage()) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $categorygroups->url($categorygroups->currentPage()+1) }}">
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