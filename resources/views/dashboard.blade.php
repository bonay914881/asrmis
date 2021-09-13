@extends('layouts.app', ['class' => '', 'pageSlug' => 'dashboard'])

@section('content')
    @include('layouts.headers.cards')
    
    @role('personnel')
        <div class="container-fluid mt--6">
            @if(Auth::user()->unitcode == "ASRH")
                @include('dashboard.personnels.motherunit')
            @else
                @include('dashboard.personnels.subunits')
            @endif 
            @include('layouts.footers.auth')
        </div>
    @endrole

    @role('logistics')
        <div class="container-fluid mt--6">
            @include('dashboard.logistics.index')
            @include('layouts.footers.auth')
        </div>
    @endrole
@endsection

@push('js')
    <script>
        $('.progress-bar').each(function() {
            var min = $(this).attr('aria-valuemin');
            var max = $(this).attr('aria-valuemax');
            var now = $(this).attr('aria-valuenow');
            var siz = (now-min)*100/(max-min);
            $(this).css('width', siz+'%');
        });
    </script>
@endpush