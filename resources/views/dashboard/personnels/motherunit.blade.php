<div class="content">
    <div class="row"> 
        @foreach ($signal_battalions as $signal_battalion)
            <div class="col-lg-3 col-md-6">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <ul class="list-group list-group-flush list my--3">
                                    <li class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <a href="#" class="avatar rounded-circle bg-default" style="cursor:none;">
                                                    <b>{{ $signal_battalion->cnt }}</b>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <h2>{{ $signal_battalion->unit_description }}</h2>
                                                <div class="progress progress-xs mb-0" style="height: 5px;">
                                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="{{ $signal_battalion->cnt }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $signal_battalion->cnt }}%;"></div>
                                                </div>
                                                @if($signal_battalion->UnitCode == 'ASRH')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $asrh_signal_bn_officer_reg+$asrh_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $asrh_signal_bn_officer_reg+$asrh_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $asrh_signal_bn_officer_reg+$asrh_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $asrh_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $asrh_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $asrh_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $asrh_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $asrh_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $asrh_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == '1SBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $one_signal_bn_officer_reg+$one_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $one_signal_bn_officer_reg+$one_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $one_signal_bn_officer_reg+$one_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $one_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $one_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $one_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $one_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $one_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $one_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == '2SBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $two_signal_bn_officer_reg+$two_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $two_signal_bn_officer_reg+$two_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $two_signal_bn_officer_reg+$two_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $two_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $two_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $two_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $two_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $two_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $two_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == '3SBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $three_signal_bn_officer_reg+$three_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $three_signal_bn_officer_reg+$three_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $three_signal_bn_officer_reg+$three_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $three_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $three_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $three_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $three_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $three_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $three_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == '4SBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $four_signal_bn_officer_reg+$four_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $four_signal_bn_officer_reg+$four_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $four_signal_bn_officer_reg+$four_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $four_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $four_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $four_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $four_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $four_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $four_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == '5SBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $five_signal_bn_officer_reg+$five_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $five_signal_bn_officer_reg+$five_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $five_signal_bn_officer_reg+$five_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $five_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $five_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $five_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $five_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $five_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $five_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == '6SBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $six_signal_bn_officer_reg+$six_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $six_signal_bn_officer_reg+$six_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $six_signal_bn_officer_reg+$six_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $six_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $six_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $six_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $six_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $six_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $six_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == '7SBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $seven_signal_bn_officer_reg+$seven_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $seven_signal_bn_officer_reg+$seven_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $seven_signal_bn_officer_reg+$seven_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $seven_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $seven_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $seven_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $seven_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $seven_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $seven_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == '8SBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $eight_signal_bn_officer_reg+$eight_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $eight_signal_bn_officer_reg+$eight_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $eight_signal_bn_officer_reg+$eight_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $eight_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $eight_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $eight_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $eight_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $eight_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $eight_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == '9SBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $nine_signal_bn_officer_reg+$nine_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $nine_signal_bn_officer_reg+$nine_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $nine_signal_bn_officer_reg+$nine_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $nine_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $nine_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $nine_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $nine_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $nine_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $nine_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == '10SBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $ten_signal_bn_officer_reg+$ten_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $ten_signal_bn_officer_reg+$ten_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $ten_signal_bn_officer_reg+$ten_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $ten_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $ten_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $ten_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $ten_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $ten_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $ten_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == '11SBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $eleven_signal_bn_officer_reg+$eleven_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $eleven_signal_bn_officer_reg+$eleven_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $eleven_signal_bn_officer_reg+$eleven_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $eleven_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $eleven_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $eleven_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $eleven_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $eleven_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $eleven_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == 'CSBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $csbn_signal_bn_officer_reg+$csbn_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $csbn_signal_bn_officer_reg+$csbn_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $csbn_signal_bn_officer_reg+$csbn_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $csbn_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $csbn_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $csbn_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $csbn_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $csbn_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $csbn_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == 'SIMBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $simbn_signal_bn_officer_reg+$simbn_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $simbn_signal_bn_officer_reg+$simbn_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $simbn_signal_bn_officer_reg+$simbn_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $simbn_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $simbn_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $simbn_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $simbn_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $simbn_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $simbn_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == 'NETB')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $netbn_signal_bn_officer_reg+$netbn_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $netbn_signal_bn_officer_reg+$netbn_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $netbn_signal_bn_officer_reg+$netbn_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $netbn_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $netbn_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $netbn_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $netbn_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $netbn_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $netbn_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == 'CYBBN')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $cybn_signal_bn_officer_reg+$cybn_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $cybn_signal_bn_officer_reg+$cybn_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $cybn_signal_bn_officer_reg+$cybn_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $cybn_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $cybn_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $cybn_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $cybn_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $cybn_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $cybn_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @elseif($signal_battalion->UnitCode == 'TSS')
                                                    <h5 class="mt-2">Officers <font class="text-danger">{{ $tss_signal_bn_officer_reg+$tss_signal_bn_officer_res }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $tss_signal_bn_officer_reg+$tss_signal_bn_officer_res }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $tss_signal_bn_officer_reg+$tss_signal_bn_officer_res }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Enlisted Personnels <font class="text-danger">{{ $tss_signal_bn_enlisted }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $tss_signal_bn_enlisted }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $tss_signal_bn_enlisted }}%;"></div>
                                                    </div>
                                                    <h5 class="mt-2">Civilian Employees <font class="text-danger">{{ $tss_signal_bn_officer_civ }}</font></h5>
                                                    <div class="progress progress-xs mb-0" style="height: 5px;">
                                                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="{{ $tss_signal_bn_officer_civ }}" aria-valuemin="0" aria-valuemax="500" style="width: {{ $tss_signal_bn_officer_civ }}%;"></div>
                                                    </div>
                                                @endif                                            
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        @endforeach
    </div>
</div>