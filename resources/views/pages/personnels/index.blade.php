@extends('layouts.app', ['class' => '', 'pageSlug' => 'personnels'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ $title_card_header }}</h3>
                                <p class="text-sm mb-0">
                                    Total {{ $title_card_header }}<font style="margin-left:3px;" class="text-danger">{{ number_format($total_personnels,0) }}</font>                                                                  
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('personnels - officers','PEROFFREG') }}" class="btn btn-sm btn-warning">{{ __('Regular Officers') }}</a>
                                <a href="{{ route('personnels - officers','PEROFFRES') }}" class="btn btn-sm btn-warning">{{ __('Reserve Officers') }}</a>
                                <a href="{{ route('personnels - enlisted personnels','PERENL') }}" class="btn btn-sm btn-warning">{{ __('Enlisted Personnels') }}</a>
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
                                    <th scope="col" class="text-default">{{ __('PM Code') }}</th>
                                    <th scope="col" class="text-default">{{ __('Rank') }}</th>
                                    <th scope="col" class="text-default">{{ __('First Name') }}</th>
                                    <th scope="col" class="text-default">{{ __('Middle Name') }}</th>
                                    <th scope="col" class="text-default">{{ __('Last Name') }}</th>
                                    <th scope="col" class="text-default">{{ __('Serial Number') }}</th>
                                    <th scope="col" class="text-default">{{ __('AFPOS') }}</th>
                                    <th scope="col" class="text-default">{{ __('Creation Date') }}</th>
                                    <th scope="col" class="text-right text-default">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($records))
                                    <tr><td colspan="12" class="text-center"><font style="font-weight: 900;" class="text-danger"><b>{{ __('No Records Found!') }}</b></font></td></tr>
                                @endif 
                                @if(isset($personnels))
                                    @foreach ($personnels as $personnel)    
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $personnel->PMCode }}</td>
                                            <td>{{ $personnel->rankcode }}</td>
                                            <td>{{ $personnel->firstname }}</td>
                                            <td>{{ $personnel->middlename }}</td>
                                            <td>{{ $personnel->lastname }} {{ $personnel->appendage }}</td>
                                            <td>{{ $personnel->afpsn }}</td>
                                            <td>{{ $personnel->afposmoscode }}</td>
                                            <td>{{\Carbon\Carbon::parse($personnel->created_at)->format('d F Y')}}</td>
                                            <td class="text-right">
                                                <a href="" class="table-action" data-toggle="tooltip" data-original-title="Edit" style="margin-right: 5px;">
                                                    <i class="fas fa-user-edit text-warning"></i>
                                                </a>
                                                <span data-toggle="modal" data-target="#deleteUser{{ $personnel->id }}">
                                                    <a href="#!" data-toggle="tooltip" class="table-action table-action-delete" data-original-title="Delete">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </a>
                                                </span>
                                                {{-- @include('users.modal.deleteUser') --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                @if ($personnels->lastPage() > 1)
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled {{ ($personnels->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $personnels->url(1) }}" tabindex="-1">
                                                <i class="fas fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $personnels->lastPage(); $i++)
                                            <li class="{{ ($personnels->currentPage() == $i) ? ' active' : '' }} page-item">
                                                <a class=" page-link " href="{{ $personnels->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item {{ ($personnels->currentPage() == $personnels->lastPage()) ? ' disabled' : '' }}">
                                            <a class="page-link" href="{{ $personnels->url($personnels->currentPage()+1) }}">
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