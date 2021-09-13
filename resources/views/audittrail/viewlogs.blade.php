@extends('layouts.app', ['class' => '', 'pageSlug' => 'audittrail'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--5">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#" style="cursor: none;">
                                    <img src="{{ asset('argon') }}/img/theme/default-avatar.png" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5"></div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ $user->rankcode }} {{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }} {{ $user->appendage }}
                            </h3>
                            <div class="h5 font-weight-300">
                                @foreach($user->getRoleNames() as $v)
                                    <span class="badge badge-danger mr-1">{{ $v }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card body">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Log Details') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('audit trail') }}" class="btn btn-sm btn-warning">{{ __('Back to Audit Trail') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                            @foreach ($user->audittrails->sortByDesc('created_at') as $audittrail)
                                <div class="timeline-block">
                                    @if($audittrail->action == "CREATE")
                                        <span class="timeline-step badge-success">                                       
                                            <i class="ni ni-fat-add"></i>
                                        </span>  
                                    @elseif($audittrail->action == "DELETE")
                                        <span class="timeline-step badge-danger">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    @elseif($audittrail->action == "UPDATE")
                                        <span class="timeline-step badge-warning">
                                            <i class="fas fa-user-edit"></i>
                                        </span>
                                    @endif                                      
                                    <div class="timeline-content" style="max-width: 100%;">
                                        <small class="text-muted font-weight-bold">{{\Carbon\Carbon::parse($audittrail->created_at)->format('d F Y m:i:s A')}}</small>
                                        <h5 class=" mt-3 mb-0">{{ $audittrail->action }}</h5>
                                        <p class=" text-sm mt-1 mb-0">{!! $audittrail->remarks !!}</p>
                                    </div>
                                </div>
                            @endforeach
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