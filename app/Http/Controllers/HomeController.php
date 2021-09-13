<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rank;
use App\Models\Personnel;
use App\Models\Unit;
use App\Models\UnitCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $routeName = Route::currentRouteName();     

        $battalion_descriptions = Personnel::join('rf_unitcode', 'rf_unitcode.cg_unitcode', '=', 'tr_master.UnitCode')                            
                            ->select('tr_master.UnitCode', 'rf_unitcode.cg_unitcode', 'rf_unitcode.unit_description', UnitCode::raw('count(cg_unitcode) as cnt'))
                            ->where('rf_unitcode.unitgroup_code', 'ASR')
                            ->where('tr_master.dutymodecode', 'ACTIVE')
                            ->where('tr_master.UnitCode', Auth::user()->unitcode)
                            ->groupBy('tr_master.UnitCode', 'rf_unitcode.cg_unitcode', 'rf_unitcode.unit_description', 'rf_unitcode.recordnumber')
                            ->orderBy('rf_unitcode.recordnumber', 'asc')
                            ->get();

        $signal_battalions = Personnel::join('rf_unitcode', 'rf_unitcode.cg_unitcode', '=', 'tr_master.UnitCode')                            
                            ->select('tr_master.UnitCode', 'rf_unitcode.cg_unitcode', 'rf_unitcode.unit_description', UnitCode::raw('count(cg_unitcode) as cnt'))
                            ->where('rf_unitcode.unitgroup_code', 'ASR')
                            ->where('tr_master.dutymodecode', 'ACTIVE')
                            ->groupBy('tr_master.UnitCode', 'rf_unitcode.cg_unitcode', 'rf_unitcode.unit_description', 'rf_unitcode.recordnumber')
                            ->orderBy('rf_unitcode.recordnumber', 'asc')
                            ->get();

        $bgen_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'BGEN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $col_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'COL')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $ltc_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'LTC')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $maj_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'MAJ')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $cpt_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'CPT')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $firstlt_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', '1LT')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $secondlt_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', '2LT')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $fcms_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'FCMS')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $cms_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'CMS')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $sms_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'SMS')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $msg_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'MSg')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $tsg_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'TSg')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $ssg_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'SSg')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $sgt_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'Sgt')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $cpl_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'Cpl')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $pfc_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'PFC')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $pvt_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'Pvt')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $reg_battalions = Personnel::where('tr_master.UnitCode', Auth::user()->unitcode)->where('rankcode', '=', 'REG')->where('tr_master.dutymodecode', 'ACTIVE')->count();        

        $asrh_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', 'ASRH')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $asrh_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', 'ASRH')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $asrh_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', 'ASRH')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $asrh_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', 'ASRH')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $one_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', '1SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $one_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', '1SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $one_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', '1SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $one_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', '1SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        
        $two_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', '2SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $two_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', '2SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $two_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', '2SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $two_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', '2SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $three_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', '3SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $three_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', '3SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $three_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', '3SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $three_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', '3SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $four_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', '4SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $four_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', '4SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $four_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', '4SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $four_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', '4SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $five_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', '5SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $five_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', '5SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $five_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', '5SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $five_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', '5SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $six_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', '6SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $six_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', '6SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $six_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', '6SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $six_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', '6SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $seven_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', '7SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $seven_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', '7SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $seven_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', '7SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $seven_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', '7SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $eight_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', '8SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $eight_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', '8SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $eight_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', '8SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $eight_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', '8SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $nine_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', '9SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $nine_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', '9SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $nine_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', '9SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $nine_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', '9SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $ten_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', '10SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $ten_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', '10SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $ten_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', '10SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $ten_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', '10SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $eleven_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', '11SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $eleven_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', '11SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $eleven_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', '11SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $eleven_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', '11SBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $csbn_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', 'CSBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $csbn_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', 'CSBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $csbn_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', 'CSBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $csbn_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', 'CSBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $simbn_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', 'SIMBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $simbn_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', 'SIMBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $simbn_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', 'SIMBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $simbn_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', 'SIMBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $netbn_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', 'NETB')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $netbn_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', 'NETB')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $netbn_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', 'NETB')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $netbn_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', 'NETB')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $cybn_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', 'CYBBN')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $cybn_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', 'CYBBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $cybn_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', 'CYBBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $cybn_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', 'CYBBN')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        $tss_signal_bn_enlisted = Personnel::where('pergroupname', '=', 'PERENL')->where('UnitCode', '=', 'TSS')->where('tr_master.dutymodecode', 'ACTIVE')->count(); 
        $tss_signal_bn_officer_reg = Personnel::where('pergroupname', '=', 'PEROFFREG')->where('UnitCode', '=', 'TSS')->where('tr_master.dutymodecode', 'ACTIVE')->count();
        $tss_signal_bn_officer_res = Personnel::where('pergroupname', '=', 'PEROFFRES')->where('UnitCode', '=', 'TSS')->where('tr_master.dutymodecode', 'ACTIVE')->count();   
        $tss_signal_bn_officer_civ = Personnel::where('pergroupname', '=', 'PERCIV')->where('UnitCode', '=', 'TSS')->where('tr_master.dutymodecode', 'ACTIVE')->count();

        return view('dashboard', 
        [
            'routeName' => $routeName,
            'battalion_descriptions' => $battalion_descriptions,
            'bgen_battalions' => $bgen_battalions,
            'col_battalions' => $col_battalions,
            'ltc_battalions' => $ltc_battalions,
            'maj_battalions' => $maj_battalions,
            'cpt_battalions' => $cpt_battalions,
            'firstlt_battalions' => $firstlt_battalions,
            'secondlt_battalions' => $secondlt_battalions,
            'fcms_battalions' => $fcms_battalions,
            'cms_battalions' => $cms_battalions,
            'sms_battalions' => $sms_battalions,
            'msg_battalions' => $msg_battalions,
            'tsg_battalions' => $tsg_battalions,
            'ssg_battalions' => $ssg_battalions,
            'sgt_battalions' => $sgt_battalions,
            'cpl_battalions' => $cpl_battalions,
            'pfc_battalions' => $pfc_battalions,
            'pvt_battalions' => $pvt_battalions,
            'reg_battalions' => $reg_battalions,
            'signal_battalions' => $signal_battalions, 
            'asrh_signal_bn_enlisted' => $asrh_signal_bn_enlisted,
            'asrh_signal_bn_officer_reg' => $asrh_signal_bn_officer_reg,
            'asrh_signal_bn_officer_res' => $asrh_signal_bn_officer_res,
            'asrh_signal_bn_officer_civ' => $asrh_signal_bn_officer_civ,
            'one_signal_bn_enlisted' => $one_signal_bn_enlisted,
            'one_signal_bn_officer_reg' => $one_signal_bn_officer_reg,
            'one_signal_bn_officer_res' => $one_signal_bn_officer_res,
            'one_signal_bn_officer_civ' => $one_signal_bn_officer_civ,
            'two_signal_bn_enlisted' => $two_signal_bn_enlisted,
            'two_signal_bn_officer_reg' => $two_signal_bn_officer_reg,
            'two_signal_bn_officer_res' => $two_signal_bn_officer_res,
            'two_signal_bn_officer_civ' => $two_signal_bn_officer_civ,
            'three_signal_bn_enlisted' => $three_signal_bn_enlisted,
            'three_signal_bn_officer_reg' => $three_signal_bn_officer_reg,
            'three_signal_bn_officer_res' => $three_signal_bn_officer_res,
            'three_signal_bn_officer_civ' => $three_signal_bn_officer_civ,
            'four_signal_bn_enlisted' => $four_signal_bn_enlisted,
            'four_signal_bn_officer_reg' => $four_signal_bn_officer_reg,
            'four_signal_bn_officer_res' => $four_signal_bn_officer_res,
            'four_signal_bn_officer_civ' => $four_signal_bn_officer_civ,
            'five_signal_bn_enlisted' => $five_signal_bn_enlisted,
            'five_signal_bn_officer_reg' => $five_signal_bn_officer_reg,
            'five_signal_bn_officer_res' => $five_signal_bn_officer_res,
            'five_signal_bn_officer_civ' => $five_signal_bn_officer_civ,
            'six_signal_bn_enlisted' => $six_signal_bn_enlisted,
            'six_signal_bn_officer_reg' => $six_signal_bn_officer_reg,
            'six_signal_bn_officer_res' => $six_signal_bn_officer_res,
            'six_signal_bn_officer_civ' => $six_signal_bn_officer_civ,
            'seven_signal_bn_enlisted' => $seven_signal_bn_enlisted,
            'seven_signal_bn_officer_reg' => $seven_signal_bn_officer_reg,
            'seven_signal_bn_officer_res' => $seven_signal_bn_officer_res,
            'seven_signal_bn_officer_civ' => $seven_signal_bn_officer_civ,
            'eight_signal_bn_enlisted' => $eight_signal_bn_enlisted,
            'eight_signal_bn_officer_reg' => $eight_signal_bn_officer_reg,
            'eight_signal_bn_officer_res' => $eight_signal_bn_officer_res,
            'eight_signal_bn_officer_civ' => $eight_signal_bn_officer_civ,
            'nine_signal_bn_enlisted' => $nine_signal_bn_enlisted,
            'nine_signal_bn_officer_reg' => $nine_signal_bn_officer_reg,
            'nine_signal_bn_officer_res' => $nine_signal_bn_officer_res,
            'nine_signal_bn_officer_civ' => $nine_signal_bn_officer_civ,
            'ten_signal_bn_enlisted' => $ten_signal_bn_enlisted,
            'ten_signal_bn_officer_reg' => $ten_signal_bn_officer_reg,
            'ten_signal_bn_officer_res' => $ten_signal_bn_officer_res,
            'ten_signal_bn_officer_civ' => $ten_signal_bn_officer_civ,
            'eleven_signal_bn_enlisted' => $eleven_signal_bn_enlisted,
            'eleven_signal_bn_officer_reg' => $eleven_signal_bn_officer_reg,
            'eleven_signal_bn_officer_res' => $eleven_signal_bn_officer_res,
            'eleven_signal_bn_officer_civ' => $eleven_signal_bn_officer_civ,
            'csbn_signal_bn_enlisted' => $csbn_signal_bn_enlisted,
            'csbn_signal_bn_officer_reg' => $csbn_signal_bn_officer_reg,
            'csbn_signal_bn_officer_res' => $csbn_signal_bn_officer_res,
            'csbn_signal_bn_officer_civ' => $csbn_signal_bn_officer_civ,
            'simbn_signal_bn_enlisted' => $simbn_signal_bn_enlisted,
            'simbn_signal_bn_officer_reg' => $simbn_signal_bn_officer_reg,
            'simbn_signal_bn_officer_res' => $simbn_signal_bn_officer_res,
            'simbn_signal_bn_officer_civ' => $simbn_signal_bn_officer_civ,
            'netbn_signal_bn_enlisted' => $netbn_signal_bn_enlisted,
            'netbn_signal_bn_officer_reg' => $netbn_signal_bn_officer_reg,
            'netbn_signal_bn_officer_res' => $netbn_signal_bn_officer_res,
            'netbn_signal_bn_officer_civ' => $netbn_signal_bn_officer_civ,
            'cybn_signal_bn_enlisted' => $cybn_signal_bn_enlisted,
            'cybn_signal_bn_officer_reg' => $cybn_signal_bn_officer_reg,
            'cybn_signal_bn_officer_res' => $cybn_signal_bn_officer_res,
            'cybn_signal_bn_officer_civ' => $cybn_signal_bn_officer_civ,
            'tss_signal_bn_enlisted' => $tss_signal_bn_enlisted,
            'tss_signal_bn_officer_reg' => $tss_signal_bn_officer_reg,
            'tss_signal_bn_officer_res' => $tss_signal_bn_officer_res,
            'tss_signal_bn_officer_civ' => $tss_signal_bn_officer_civ
        ]);
    }
}
