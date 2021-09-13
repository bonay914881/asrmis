<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        @foreach ($battalion_descriptions->take(1) as $battalion_description)
                            <h3 class="mb-0">{{ $battalion_description->UnitCode }} <font class="text-danger">{{ $battalion_description->cnt }}</font></h3>
                            <p class="text-sm mb-0">                                            
                                {{ $battalion_description->unit_description }}
                            </p>
                        @endforeach     
                    </div>
                </div>
            </div>

            <div class="col-12 mt-2"></div>

            <div class="py-2">
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="h3 mb-5">Officers <font class="text-danger">{{ $bgen_battalions+$col_battalions+$ltc_battalions+$maj_battalions+$cpt_battalions+$firstlt_battalions+$secondlt_battalions }}</font></h5>
                            <ul class="list-group list-group-flush list my--3">
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $bgen_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Brigadier General</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $bgen_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $bgen_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $col_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Colonel</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $col_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $col_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $ltc_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Lieutenant Colonel</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $ltc_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $ltc_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $maj_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Major</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $maj_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $maj_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $cpt_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Captain</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $cpt_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $cpt_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $firstlt_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>First Lieutenant</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $firstlt_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $firstlt_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $secondlt_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Second Lieutenant</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $secondlt_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $secondlt_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul> 
                        </div>
                        <div class="col-md-4">
                            <h5 class="h3 mb-5">Enlisted Personnels <font class="text-danger">{{ $fcms_battalions+$cms_battalions+$sms_battalions+$msg_battalions+$tsg_battalions+$ssg_battalions+$sgt_battalions+$cpl_battalions+$pfc_battalions+$pvt_battalions }}</font></h5>
                            <ul class="list-group list-group-flush list my--3">
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $fcms_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>First Chief Master Sergeant</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $fcms_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $fcms_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $cms_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Chief Master Sergeant</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $cms_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $cms_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $sms_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Senior Master Sergeant</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $sms_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $sms_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $msg_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Master Sergeant</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $msg_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $msg_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $tsg_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Technical Sergeant</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $tsg_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $tsg_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $ssg_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Staff Sergeant</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $ssg_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $ssg_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $sgt_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Sergeant</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $sgt_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $sgt_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $cpl_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Corporal</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $cpl_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $cpl_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $pfc_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Private First Class</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $pfc_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $pfc_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $pvt_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Private</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $pvt_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $pvt_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5 class="h3 mb-5">Civilian Employees <font class="text-danger">{{ $reg_battalions }}</font></h5>
                            <ul class="list-group list-group-flush list my--3">
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                <b>{{ $reg_battalions }}</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <h5>Regular</h5>
                                            <div class="progress progress-xs mb-0" style="height: 5px;">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $reg_battalions }}" aria-valuemin="0" aria-valuemax="150" style="width: {{ $reg_battalions }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>   
                </div>                                  
            </div>
        </div>
    </div>
</div>