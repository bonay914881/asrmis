@extends('layouts.app', ['class' => '', 'pageSlug' => 'permissions'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Roles</h3>
                                <p class="text-sm mb-0">
                                    Total Roles <font style="margin-left:3px;" class="text-danger">{{ number_format($total_roles,0) }}</font>
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('roles - create') }}" class="btn btn-sm btn-warning">{{ __('Create Role') }}</a>
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
                                    <th scope="col" class="text-default">{{ __('Name') }}</th>
                                    <th scope="col" class="text-default">{{ __('Permissions') }}</th>
                                    <th scope="col" class="text-default">{{ __('Creation Date') }}</th>
                                    <th scope="col" class="text-right text-default">{{ __('ACtion') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($records))
                                    <tr><td colspan="12" class="text-center"><font style="font-weight: 900;" class="text-danger"><b>{{ __('No Records Found!') }}</b></font></td></tr>
                                @endif 
                                @if(isset($roles))
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @if(!empty($role->getPermissionNames()))
                                                    @foreach($role->getPermissionNames() as $v)
                                                        <span class="badge badge-danger mr-1">{{ $v }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{\Carbon\Carbon::parse($role->created_at)->format('d F Y')}}</td>
                                            <td class="text-right">
                                                <a href="{{ route('roles - edit',$role) }}" class="table-action" data-toggle="tooltip" data-original-title="Edit" style="margin-right: 5px;">
                                                    <i class="fas fa-user-edit text-warning"></i>
                                                </a>
                                                <span data-toggle="modal" data-target="#deleteRole{{ $role->id }}">
                                                    <a href="#!" data-toggle="tooltip" class="table-action table-action-delete" data-original-title="Delete">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </a>
                                                </span>
                                                @include('users.roles.modal.deleteRole')
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif 
                            </tbody>
                        </table>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                @if ($roles->lastPage() > 1)
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled {{ ($roles->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $roles->url(1) }}" tabindex="-1">
                                                <i class="fas fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $roles->lastPage(); $i++)
                                            <li class="{{ ($roles->currentPage() == $i) ? ' active' : '' }} page-item">
                                                <a class=" page-link " href="{{ $roles->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item {{ ($roles->currentPage() == $roles->lastPage()) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $roles->url($roles->currentPage()+1) }}">
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