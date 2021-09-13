@extends('layouts.app', ['class' => '', 'pageSlug' => 'c4sequipmentreport'])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">C4s Equipment Report</h3>
                            </div>
                            <div class="col-4 text-right">
                                @include('reports.c4sequipment.header.header')                                
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2"></div>

                    <div class="py-2">
                        <div class="card-body">
                            <embed src="{{ URL::to('/c4sequipmentreport/c4sequipmentreportsmilitarypdf') }}" style="width:100%; height:1000px;" frameborder="0">
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