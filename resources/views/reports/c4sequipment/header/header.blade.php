<div class="dropdown">
    <a class="btn btn-sm btn-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Filter By') }}
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        <a class="dropdown-item" href="{{ route('c4s equipment report - serviceable') }}">{{ __('Serviceable') }}</a>
        <a class="dropdown-item" href="{{ route('c4s equipment report - unserviceable') }}">{{ __('Unserviceable') }}</a>
        <a class="dropdown-item" href="{{ route('c4s equipment report - lost') }}">{{ __('Lost') }}</a>
        <a class="dropdown-item" href="{{ route('c4s equipment report - unknown') }}">{{ __('Unknown') }}</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('c4s equipment report - military') }}">{{ __('Military') }}</a>
        <a class="dropdown-item" href="{{ route('c4s equipment report - commercial') }}">{{ __('Commercial') }}</a>
    </div>
</div>
