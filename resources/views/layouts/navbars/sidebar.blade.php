<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('argon') }}/img/brand/loginLogo.png" class="navbar-brand-img" alt="..." style="margin-top: -10px;">
                <font class="text-gradient text-default" style="font-size: 30px; font-weight: bolder;">ASR-MIS</font>
            </a>
            <div class="ml-auto">
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item @if ($pageSlug == 'dashboard') class="active " @endif">
                        <a class="nav-link text-default" href="{{ route('dashboard') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">{{ __('Dashboard') }}</span>
                        </a>
                    </li>                     

                    @role('personnel')
                        <li class="nav-item @if ($pageSlug == 'personnels') class="active " @endif">
                            <a class="nav-link text-default" href="{{ route('personnels') }}">
                                <i class="ni ni-single-02 text-success"></i>
                                <span class="nav-link-text">{{ __('Personnels') }}</span>
                            </a>
                        </li>
                    @endrole

                    @role('logistics')
                        <li class="nav-item @if ($pageSlug == 'c4sequipments') class="active " @endif">
                            <a class="nav-link text-default" href="{{ route('c4s equipment') }}">
                                <i class="ni ni-laptop text-default"></i>
                                <span class="nav-link-text">{{ __('C4S Equipment') }}</span>
                            </a>
                        </li> 
                        <li class="nav-item @if ($pageSlug == 'c4sequipments') class="active " @endif">
                            <a class="nav-link text-default" href="{{ route('dashboard') }}">
                                <i class="ni ni-spaceship text-warning"></i>
                                <span class="nav-link-text">{{ __('Firepower') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @if ($pageSlug == 'c4sequipments') class="active " @endif">
                            <a class="nav-link text-default" href="{{ route('dashboard') }}">
                                <i class="ni ni-delivery-fast text-info"></i>
                                <span class="nav-link-text">{{ __('Mobility') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @if ($pageSlug == 'c4sequipments') class="active " @endif">
                                <a class="nav-link text-default" href="{{ route('dashboard') }}">
                                    <i class="ni ni-bullet-list-67 text-pink"></i>
                                    <span class="nav-link-text">{{ __('Ammunition') }}</span>
                                </a>
                            </li>
                        <li class="nav-item @if ($pageSlug == 'c4sequipments') class="active " @endif">
                            <a class="nav-link text-default" href="{{ route('dashboard') }}">
                                <i class="ni ni-archive-2 text-success"></i>
                                <span class="nav-link-text">{{ __('Magazine & Accessories') }}</span>
                            </a>
                        </li>                        
                        <li class="nav-item @if ($pageSlug == 'c4sequipments') class="active " @endif">
                            <a class="nav-link text-default" href="{{ route('dashboard') }}">
                                <i class="ni ni-collection text-yellow"></i>
                                <span class="nav-link-text">{{ __('CCSR Firepower & Ammunition') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @if ($pageSlug == 'c4sequipments') class="active " @endif">
                            <a class="nav-link text-default" href="{{ route('dashboard') }}">
                                <i class="ni ni-chart-bar-32 text-primary"></i>
                                <span class="nav-link-text">{{ __('JRRS / CORR') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @if ($pageSlug == 'c4sequipments') class="active " @endif">
                            <a class="nav-link text-default" href="{{ route('dashboard') }}">
                                <i class="fas fa-gas-pump text-default"></i>
                                <span class="nav-link-text">{{ __('POL Consumption') }}</span>
                            </a>
                        </li>
                        <li class="nav-item @if ($pageSlug == 'c4sequipments') class="active " @endif">
                            <a class="nav-link text-default" href="{{ route('dashboard') }}">
                                <i class="ni ni-book-bookmark text-pink"></i>
                                <span class="nav-link-text">{{ __('APP-PPMP') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#status" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="status">
                                <i class="ni ni-single-copy-04 text-warning"></i>
                                <span class="nav-link-text text-default">{{ __('Status') }}</span>
                            </a>        
                            <div class="collapse {{ $pageSlug == 'statusmobility'|| $pageSlug == 'statusc4s' ? ' show' : '' }}" id="status">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item @if ($pageSlug == 'statusmobility') class="active " @endif">
                                        <a class="nav-link text-default" href="">
                                                {{ __('Status of Mobility Assets') }}
                                        </a>
                                    </li>
                                    <li class="nav-item @if ($pageSlug == 'statusc4s') class="active " @endif">
                                        <a class="nav-link text-default" href="">
                                                {{ __('Status of C4S Projects') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reports" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="reports">
                                <i class="ni ni-folder-17 text-success"></i>
                                <span class="nav-link-text text-default">{{ __('Reports') }}</span>
                            </a>        
                            <div class="collapse {{ $pageSlug == 'c4sequipmentreport'|| $pageSlug == 'physicalandfinancialreport' ? ' show' : '' }}" id="reports">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item @if ($pageSlug == 'c4sequipmentreport') class="active " @endif">
                                        <a class="nav-link text-default" href="{{ route('c4s equipment report') }}">
                                                {{ __('C4s Equipment Report') }}
                                        </a>
                                    </li>
                                    <li class="nav-item @if ($pageSlug == 'physicalandfinancialreport') class="active " @endif">
                                        <a class="nav-link text-default" href="">
                                            {{ __('Physical & Financial Report') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>                       
                        <li class="nav-item ">
                            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-components">
                                <i class="ni ni-ui-04 text-danger"></i>
                                <span class="nav-link-text text-default">{{ __('References') }}</span>
                            </a>
                            <div class="collapse {{ $pageSlug == 'c4scategory' || $pageSlug == 'c4scategorygroup' || $pageSlug == 'c4scommocategory' || $pageSlug == 'c4snomenclature' || $pageSlug == 'firepowercategory' || $pageSlug == 'firepowermake' || $pageSlug == 'firepowernomenclature' || $pageSlug == 'mobilitycategory' || $pageSlug == 'mobilitytype' || $pageSlug == 'mobilitynomenclature' || $pageSlug == 'magazinecategory' || $pageSlug == 'magazinenomenclature' || $pageSlug == 'ammunitioncategory' ? 'show' : '' }}" id="navbar-components">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#c4s" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="c4s">{{ __('C4S Equipment') }}</a>
                                        <div class="collapse {{ $pageSlug == 'c4scategory' || $pageSlug == 'c4scategorygroup' || $pageSlug == 'c4scommocategory' || $pageSlug == 'c4snomenclature' || $pageSlug == 'firepowercategory' || $pageSlug == 'firepowermake' || $pageSlug == 'firepowernomenclature' || $pageSlug == 'mobilitycategory' || $pageSlug == 'mobilitytype' || $pageSlug == 'mobilitynomenclature' || $pageSlug == 'magazinecategory' || $pageSlug == 'magazinenomenclature' || $pageSlug == 'ammunitioncategory' ? 'show' : '' }}" id="c4s">
                                            <ul class="nav nav-sm flex-column">                                                 
                                                <li class="nav-item @if ($pageSlug == 'c4snomenclature') class="active " @endif">
                                                    <a class="nav-link text-default" href="{{ route('c4s nomenclature') }}">
                                                        {{ __('C4S Nomenclature') }}
                                                    </a>
                                                </li>
                                                <li class="nav-item @if ($pageSlug == 'c4scommocategory') class="active " @endif">
                                                    <a class="nav-link text-default" href="{{ route('c4s commo category') }}">
                                                        {{ __('C4S Commo Category') }}
                                                    </a>
                                                </li>
                                                <li class="nav-item @if ($pageSlug == 'c4scategory') class="active " @endif">
                                                    <a class="nav-link text-default" href="{{ route('c4s category') }}">
                                                        {{ __('C4S Category') }}
                                                    </a>
                                                </li> 
                                                <li class="nav-item @if ($pageSlug == 'c4scategorygroup') class="active " @endif">
                                                    <a class="nav-link text-default" href="{{ route('c4s category group') }}">
                                                        {{ __('C4S Category Group') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#firepower" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="firepower">{{ __('Firepower') }}</a>
                                        <div class="collapse" id="firepower" style="">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item @if ($pageSlug == 'firepowercategory') class="active " @endif">
                                                    <a class="nav-link text-default" href="">
                                                        {{ __('Firepower Category') }}
                                                    </a>
                                                </li>
                                                <li class="nav-item @if ($pageSlug == 'firepowermake') class="active " @endif">
                                                    <a class="nav-link text-default" href="">
                                                        {{ __('Firepower Make') }}
                                                    </a>
                                                </li>
                                                <li class="nav-item @if ($pageSlug == 'firepowernomenclature') class="active " @endif">
                                                    <a class="nav-link text-default" href="">
                                                        {{ __('Firepower Nomenclature') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#mobility" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="mobility">{{ __('Mobility') }}</a>
                                        <div class="collapse" id="mobility" style="">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item @if ($pageSlug == 'mobilitycategory') class="active " @endif">
                                                    <a class="nav-link text-default" href="">
                                                        {{ __('Mobility Category') }}
                                                    </a>
                                                </li>
                                                <li class="nav-item @if ($pageSlug == 'mobilitytype') class="active " @endif">
                                                    <a class="nav-link text-default" href="">
                                                        {{ __('Mobility Type') }}
                                                    </a>
                                                </li>
                                                <li class="nav-item @if ($pageSlug == 'mobilitynomenclature') class="active " @endif">
                                                    <a class="nav-link text-default" href="">
                                                        {{ __('Mobility Nomenclature') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#ammunition" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="ammunition">{{ __('Ammunition') }}</a>
                                        <div class="collapse" id="ammunition" style="">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item @if ($pageSlug == 'ammunitioncategory') class="active " @endif">
                                                    <a class="nav-link text-default" href="">
                                                        {{ __('Ammunition Category') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#magazine" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="magazine">{{ __('Magazine & Accessories') }}</a>
                                        <div class="collapse" id="magazine" style="">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item @if ($pageSlug == 'magazinecategory') class="active " @endif">
                                                    <a class="nav-link text-default" href="">
                                                        {{ __('Magazine & Accessories Category') }}
                                                    </a>
                                                </li>
                                                <li class="nav-item @if ($pageSlug == 'magazinenomenclature') class="active " @endif">
                                                    <a class="nav-link text-default" href="">
                                                        {{ __('Magazine & Accessories Nomenclature') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>                                        
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endrole   
                    
                    @role('super-admin')
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-settings" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-settings">
                                <i class="ni ni-settings text-info"></i>
                                <span class="nav-link-text text-default">{{ __('User Settings') }}</span>
                            </a>
        
                            <div class="collapse {{ $pageSlug == 'users'|| $pageSlug == 'roles' || $pageSlug == 'permissions' ? ' show' : '' }}" id="navbar-settings">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item @if ($pageSlug == 'users') class="active " @endif">
                                        <a class="nav-link text-default" href="{{ route('users') }}">
                                            {{ __('Users') }}
                                        </a>
                                    </li>
                                    <li class="nav-item @if ($pageSlug == 'roles') class="active " @endif">
                                        <a class="nav-link text-default" href="{{ route('roles') }}">
                                            {{ __('Roles') }}
                                        </a>
                                    </li>
                                    <li class="nav-item @if ($pageSlug == 'permissions') class="active " @endif">
                                        <a class="nav-link text-default" href="{{ route('permissions') }}">
                                            {{ __('Permissions') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endrole

                    @role('administrator')
                        <li class="nav-item @if ($pageSlug == 'audittrail') class="active " @endif">
                            <a class="nav-link text-default" href="{{ route('audit trail') }}">
                                <i class="fas fa-chart-bar text-danger"></i>
                                <span class="nav-link-text">{{ __('Audit Trail') }}</span>
                            </a>
                        </li> 

                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-settings" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-settings">
                                <i class="ni ni-settings text-info"></i>
                                <span class="nav-link-text text-default">{{ __('User Settings') }}</span>
                            </a>
        
                            <div class="collapse {{ $pageSlug == 'users'|| $pageSlug == 'roles' || $pageSlug == 'permissions' ? ' show' : '' }}" id="navbar-settings">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item @if ($pageSlug == 'users') class="active " @endif">
                                        <a class="nav-link text-default" href="{{ route('users') }}">
                                            {{ __('Users') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endrole
                </ul>
            </div>
        </div>
    </div>
</nav>  