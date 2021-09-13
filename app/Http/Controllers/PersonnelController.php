<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Sll;
use App\Models\EpSll;
use App\Models\DutyCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Personnel $personnels)
    {
        $officer_index = "PEROFFREG";
        if($officer_index == "PEROFFREG")
        {
            $title_card_header = "Regular Officers";

            $total_personnels = Personnel::join('rf_unitcode', 'rf_unitcode.cg_unitcode', '=', 'tr_master.UnitCode')            
                                    ->where('rf_unitcode.unitgroup_code', 'ASR')
                                    ->where('tr_master.pergroupname', 'PEROFFREG')
                                    ->where('tr_master.UnitCode', Auth::user()->unitcode)
                                    ->count();

            $personnels = Personnel::leftJoin('tr_sll', 'tr_master.afpsn', '=', 'tr_sll.afpsn')  
                                    ->leftJoin('rf_unitcode', 'tr_master.UnitCode', '=', 'rf_unitcode.cg_unitcode')  
                                    ->leftJoin('rf_rank', 'tr_master.rankcode', '=', 'rf_rank.rankcode')          
                                    ->where('rf_unitcode.unitgroup_code', 'ASR')
                                    ->where('tr_master.pergroupname', $officer_index)
                                    ->where('tr_master.UnitCode', Auth::user()->unitcode)
                                    ->groupBy('tr_master.PMCode',
                                            'tr_master.afpsn',
                                            'tr_master.rankcode',
                                            'tr_master.dutycode',
                                            'tr_master.pisunitcode',
                                            'tr_master.middleinitials',
                                            'tr_master.birthday',
                                            'tr_master.dutymodecode',
                                            'tr_master.sllnumber',
                                            'tr_master.pergroupname',
                                            'tr_master.firstname',
                                            'tr_master.middlename',
                                            'tr_master.lastname',
                                            'tr_master.appendage',
                                            'tr_master.afposmoscode',
                                            'tr_master.UnitCode',
                                            'tr_master.shoesize',
                                            'tr_master.shoewidth',
                                            'tr_master.headgear',
                                            'tr_master.bda',
                                            'tr_master.goa',
                                            'tr_master.goachest',
                                            'tr_master.goawaist',
                                            'tr_master.shoesizecombat',
                                            'tr_master.shoewidthcombat',
                                            'tr_master.shirtsize',
                                            'tr_master.pamu_code',
                                            'tr_master.date_updated',
                                            'tr_master.reg_status',
                                            'tr_master.pmcode (1)',
                                            'tr_master.unitcode (1)',
                                            'tr_sll.seniority',
                                            'tr_sll.pmcode',
                                            'tr_sll.fullname',
                                            'tr_sll.rank',
                                            'tr_sll.afpsn',
                                            'tr_sll.afpos',
                                            'tr_sll.sig',
                                            'tr_sll.dor',
                                            'tr_sll.tacs',
                                            'tr_sll.doc',
                                            'tr_sll.dob',
                                            'tr_sll.doret_orig',
                                            'tr_sll.hcc',
                                            'tr_sll.source',
                                            'tr_sll.officer_type',
                                            'tr_sll.authority',
                                            'tr_sll.isDelete',
                                            'tr_sll.remarks',
                                            'tr_sll.remarksdelete',
                                            'tr_sll.remarksalter',
                                            'tr_sll.remarksrestore',
                                            'tr_sll.remarksafpos',
                                            'tr_sll.dau',
                                            'tr_sll.gender',
                                            'tr_sll.dapda',
                                            'tr_sll.designation',
                                            'tr_sll.remarkschooling',
                                            'tr_sll.UnitCode',
                                            'tr_sll.civilstatus',
                                            'tr_sll.specialization',
                                            'tr_sll.integree',
                                            'tr_sll.reg_status',
                                            'tr_sll.date_promoted',
                                            'tr_sll.ethniccode',
                                            'tr_sll.religioncode',
                                            'tr_sll.regioncode',
                                            'tr_sll.date_updated',
                                            'rf_unitcode.cg_unitcode',
                                            'rf_unitcode.recordnumber',
                                            'rf_unitcode.unit_description',
                                            'rf_unitcode.unitgroup_code',
                                            'rf_unitcode.camp_id',
                                            'rf_rank.rankcode',
                                            'rf_rank.rank',
                                            'rf_rank.rankdesc',
                                            'rf_rank.ranking',
                                            'rf_rank.ranktype'
                                            )  
                                    ->orderBy('rf_rank.ranking');

            $dutycodes = DutyCode::orderby('dutycode')->distinct()->get();
        }

        $search = $request->get('search');

        if ($search != "") {
            $personnels = Personnel::join('rf_unitcode', 'rf_unitcode.cg_unitcode', '=', 'tr_master.UnitCode')
                                   ->where('rf_unitcode.unitgroup_code', 'ASR')
                                   ->where('tr_master.pergroupname', $officer_index)
                                   ->where('tr_master.UnitCode', Auth::user()->unitcode)
                                   ->where('afpsn', 'LIKE', '%' . $search . '%')
                                   ->paginate(10)
                                   ->setPath('');
            if (isset($personnels)) {
                $pagination = $personnels->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($personnels) > 0) {
                    return view('pages.personnels.index', 
                    [
                        'title_card_header' => $title_card_header,
                        'total_personnels' => $total_personnels,
                        'dutycodes' => $dutycodes,
                        'personnels' => $personnels
                    ])
                    ->withStatus($personnels)->withQuery($search);
                }
                $records = 'No';
                return view('pages.personnels.index', 
                [
                    'records' => $records, 
                    'title_card_header' => $title_card_header,
                    'total_personnels' => $total_personnels,
                    'dutycodes' => $dutycodes,
                    'personnels' => $personnels
                ])
                ->withStatus($personnels)
                ->withQuery($search);
            }
        }

        return view('pages.personnels.index', 
        [
            'title_card_header' => $title_card_header,
            'total_personnels' => $total_personnels,
            'dutycodes' => $dutycodes,
            'personnels' => $personnels->paginate(10)
        ]);
    }

    public function officer(Request $request, Personnel $personnels)
    { 
        $officer = $request->officer;
        if($officer == "PEROFFREG")
        {
            $title_card_header = "Regular Officers";

            $total_personnels = Personnel::join('rf_unitcode', 'rf_unitcode.cg_unitcode', '=', 'tr_master.UnitCode')            
                                ->where('rf_unitcode.unitgroup_code', 'ASR')
                                ->where('tr_master.pergroupname', 'PEROFFREG')
                                ->where('tr_master.UnitCode', Auth::user()->unitcode)
                                ->count();

            $personnels = Personnel::leftJoin('tr_sll', 'tr_master.afpsn', '=', 'tr_sll.afpsn')  
                                ->leftJoin('rf_unitcode', 'tr_master.UnitCode', '=', 'rf_unitcode.cg_unitcode')  
                                ->leftJoin('rf_rank', 'tr_master.rankcode', '=', 'rf_rank.rankcode')          
                                ->where('rf_unitcode.unitgroup_code', 'ASR')
                                ->where('tr_master.pergroupname', $officer)
                                ->where('tr_master.UnitCode', Auth::user()->unitcode)
                                ->groupBy('tr_master.PMCode',
                                            'tr_master.afpsn',
                                            'tr_master.rankcode',
                                            'tr_master.dutycode',
                                            'tr_master.pisunitcode',
                                            'tr_master.middleinitials',
                                            'tr_master.birthday',
                                            'tr_master.dutymodecode',
                                            'tr_master.sllnumber',
                                            'tr_master.pergroupname',
                                            'tr_master.firstname',
                                            'tr_master.middlename',
                                            'tr_master.lastname',
                                            'tr_master.appendage',
                                            'tr_master.afposmoscode',
                                            'tr_master.UnitCode',
                                            'tr_master.shoesize',
                                            'tr_master.shoewidth',
                                            'tr_master.headgear',
                                            'tr_master.bda',
                                            'tr_master.goa',
                                            'tr_master.goachest',
                                            'tr_master.goawaist',
                                            'tr_master.shoesizecombat',
                                            'tr_master.shoewidthcombat',
                                            'tr_master.shirtsize',
                                            'tr_master.pamu_code',
                                            'tr_master.date_updated',
                                            'tr_master.reg_status',
                                            'tr_master.pmcode (1)',
                                            'tr_master.unitcode (1)',
                                            'tr_sll.seniority',
                                            'tr_sll.pmcode',
                                            'tr_sll.fullname',
                                            'tr_sll.rank',
                                            'tr_sll.afpsn',
                                            'tr_sll.afpos',
                                            'tr_sll.sig',
                                            'tr_sll.dor',
                                            'tr_sll.tacs',
                                            'tr_sll.doc',
                                            'tr_sll.dob',
                                            'tr_sll.doret_orig',
                                            'tr_sll.hcc',
                                            'tr_sll.source',
                                            'tr_sll.officer_type',
                                            'tr_sll.authority',
                                            'tr_sll.isDelete',
                                            'tr_sll.remarks',
                                            'tr_sll.remarksdelete',
                                            'tr_sll.remarksalter',
                                            'tr_sll.remarksrestore',
                                            'tr_sll.remarksafpos',
                                            'tr_sll.dau',
                                            'tr_sll.gender',
                                            'tr_sll.dapda',
                                            'tr_sll.designation',
                                            'tr_sll.remarkschooling',
                                            'tr_sll.UnitCode',
                                            'tr_sll.civilstatus',
                                            'tr_sll.specialization',
                                            'tr_sll.integree',
                                            'tr_sll.reg_status',
                                            'tr_sll.date_promoted',
                                            'tr_sll.ethniccode',
                                            'tr_sll.religioncode',
                                            'tr_sll.regioncode',
                                            'tr_sll.date_updated',
                                            'rf_unitcode.cg_unitcode',
                                            'rf_unitcode.recordnumber',
                                            'rf_unitcode.unit_description',
                                            'rf_unitcode.unitgroup_code',
                                            'rf_unitcode.camp_id',
                                            'rf_rank.rankcode',
                                            'rf_rank.rank',
                                            'rf_rank.rankdesc',
                                            'rf_rank.ranking',
                                            'rf_rank.ranktype'
                                            )   
                                ->orderBy('rf_rank.ranking');

            $dutycodes = DutyCode::orderby('dutycode')->distinct()->get();
        }
        elseif($officer == "PEROFFRES")
        {
            $title_card_header = "Reserve Officers";

            $total_personnels = Personnel::join('rf_unitcode', 'rf_unitcode.cg_unitcode', '=', 'tr_master.UnitCode')            
                                ->where('rf_unitcode.unitgroup_code', 'ASR')
                                ->where('tr_master.pergroupname', 'PEROFFRES')
                                ->where('tr_master.UnitCode', Auth::user()->unitcode)
                                ->count();

            $personnels = Personnel::leftJoin('tr_sll', 'tr_master.afpsn', '=', 'tr_sll.afpsn')  
                                ->leftJoin('rf_unitcode', 'tr_master.UnitCode', '=', 'rf_unitcode.cg_unitcode')  
                                ->leftJoin('rf_rank', 'tr_master.rankcode', '=', 'rf_rank.rankcode')          
                                ->where('rf_unitcode.unitgroup_code', 'ASR')
                                ->where('tr_master.pergroupname', $officer)
                                ->where('tr_master.UnitCode', Auth::user()->unitcode)
                                ->groupBy('tr_master.PMCode',
                                            'tr_master.afpsn',
                                            'tr_master.rankcode',
                                            'tr_master.dutycode',
                                            'tr_master.pisunitcode',
                                            'tr_master.middleinitials',
                                            'tr_master.birthday',
                                            'tr_master.dutymodecode',
                                            'tr_master.sllnumber',
                                            'tr_master.pergroupname',
                                            'tr_master.firstname',
                                            'tr_master.middlename',
                                            'tr_master.lastname',
                                            'tr_master.appendage',
                                            'tr_master.afposmoscode',
                                            'tr_master.UnitCode',
                                            'tr_master.shoesize',
                                            'tr_master.shoewidth',
                                            'tr_master.headgear',
                                            'tr_master.bda',
                                            'tr_master.goa',
                                            'tr_master.goachest',
                                            'tr_master.goawaist',
                                            'tr_master.shoesizecombat',
                                            'tr_master.shoewidthcombat',
                                            'tr_master.shirtsize',
                                            'tr_master.pamu_code',
                                            'tr_master.date_updated',
                                            'tr_master.reg_status',
                                            'tr_master.pmcode (1)',
                                            'tr_master.unitcode (1)',
                                            'tr_sll.seniority',
                                            'tr_sll.pmcode',
                                            'tr_sll.fullname',
                                            'tr_sll.rank',
                                            'tr_sll.afpsn',
                                            'tr_sll.afpos',
                                            'tr_sll.sig',
                                            'tr_sll.dor',
                                            'tr_sll.tacs',
                                            'tr_sll.doc',
                                            'tr_sll.dob',
                                            'tr_sll.doret_orig',
                                            'tr_sll.hcc',
                                            'tr_sll.source',
                                            'tr_sll.officer_type',
                                            'tr_sll.authority',
                                            'tr_sll.isDelete',
                                            'tr_sll.remarks',
                                            'tr_sll.remarksdelete',
                                            'tr_sll.remarksalter',
                                            'tr_sll.remarksrestore',
                                            'tr_sll.remarksafpos',
                                            'tr_sll.dau',
                                            'tr_sll.gender',
                                            'tr_sll.dapda',
                                            'tr_sll.designation',
                                            'tr_sll.remarkschooling',
                                            'tr_sll.UnitCode',
                                            'tr_sll.civilstatus',
                                            'tr_sll.specialization',
                                            'tr_sll.integree',
                                            'tr_sll.reg_status',
                                            'tr_sll.date_promoted',
                                            'tr_sll.ethniccode',
                                            'tr_sll.religioncode',
                                            'tr_sll.regioncode',
                                            'tr_sll.date_updated',
                                            'rf_unitcode.cg_unitcode',
                                            'rf_unitcode.recordnumber',
                                            'rf_unitcode.unit_description',
                                            'rf_unitcode.unitgroup_code',
                                            'rf_unitcode.camp_id',
                                            'rf_rank.rankcode',
                                            'rf_rank.rank',
                                            'rf_rank.rankdesc',
                                            'rf_rank.ranking',
                                            'rf_rank.ranktype'
                                            )   
                                ->orderBy('rf_rank.ranking');

            $dutycodes = DutyCode::orderby('dutycode')->distinct()->get();
        }

        $search = $request->get('search');

        if ($search != "") {
            $personnels = Personnel::join('rf_unitcode', 'rf_unitcode.cg_unitcode', '=', 'tr_master.UnitCode')
                                   ->where('rf_unitcode.unitgroup_code', 'ASR')
                                   ->where('tr_master.pergroupname', $officer)
                                   ->where('tr_master.UnitCode', Auth::user()->unitcode)
                                   ->where('afpsn', 'LIKE', '%' . $search . '%')
                                   ->paginate(10)
                                   ->setPath('');
            if (isset($personnels)) {
                $pagination = $personnels->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($personnels) > 0) {
                    return view('pages.personnels.index', 
                    [
                        'title_card_header' => $title_card_header,
                        'total_personnels' => $total_personnels,
                        'dutycodes' => $dutycodes,
                        'personnels' => $personnels
                    ])
                    ->withStatus($personnels)->withQuery($search);
                }
                $records = 'No';
                return view('pages.personnels.index', 
                [
                    'records' => $records, 
                    'title_card_header' => $title_card_header,
                    'total_personnels' => $total_personnels,
                    'dutycodes' => $dutycodes,
                    'personnels' => $personnels
                ])
                ->withStatus($personnels)
                ->withQuery($search);
            }
        }
        return view('pages.personnels.index', 
        [
            'title_card_header' => $title_card_header,
            'total_personnels' => $total_personnels,
            'dutycodes' => $dutycodes,
            'personnels' => $personnels->paginate(10)
        ]);
    }

    public function enlisted(Request $request, Personnel $personnels)
    {
        $title_card_header = "Enlisted Personnels";        

        $enlisted = $request->enlisted;
        if($enlisted == "PERENL")
        {
            $total_personnels = Personnel::join('rf_unitcode', 'rf_unitcode.cg_unitcode', '=', 'tr_master.UnitCode')            
                                ->where('rf_unitcode.unitgroup_code', 'ASR')
                                ->where('tr_master.pergroupname', 'PERENL')
                                ->where('tr_master.UnitCode', Auth::user()->unitcode)
                                ->count();

            $personnels = Personnel::leftJoin('tr_ep_sll_final', 'tr_master.afpsn', '=', 'tr_ep_sll_final.afpsn')  
                                ->leftJoin('rf_unitcode', 'tr_master.UnitCode', '=', 'rf_unitcode.cg_unitcode')  
                                ->leftJoin('rf_rank', 'tr_master.rankcode', '=', 'rf_rank.rankcode')          
                                ->where('rf_unitcode.unitgroup_code', 'ASR')
                                ->where('tr_master.pergroupname', $enlisted)
                                ->where('tr_master.UnitCode', Auth::user()->unitcode)
                                ->groupBy('tr_master.PMCode',
                                        'tr_master.afpsn',
                                        'tr_master.rankcode',
                                        'tr_master.dutycode',
                                        'tr_master.pisunitcode',
                                        'tr_master.middleinitials',
                                        'tr_master.birthday',
                                        'tr_master.dutymodecode',
                                        'tr_master.sllnumber',
                                        'tr_master.pergroupname',
                                        'tr_master.firstname',
                                        'tr_master.middlename',
                                        'tr_master.lastname',
                                        'tr_master.appendage',
                                        'tr_master.afposmoscode',
                                        'tr_master.UnitCode',
                                        'tr_master.shoesize',
                                        'tr_master.shoewidth',
                                        'tr_master.headgear',
                                        'tr_master.bda',
                                        'tr_master.goa',
                                        'tr_master.goachest',
                                        'tr_master.goawaist',
                                        'tr_master.shoesizecombat',
                                        'tr_master.shoewidthcombat',
                                        'tr_master.shirtsize',
                                        'tr_master.pamu_code',
                                        'tr_master.date_updated',
                                        'tr_master.reg_status',
                                        'tr_master.pmcode (1)',
                                        'tr_master.unitcode (1)',
                                        'tr_ep_sll_final.seniority',
                                        'tr_ep_sll_final.pmcode',
                                        'tr_ep_sll_final.name',
                                        'tr_ep_sll_final.rankcode',
                                        'tr_ep_sll_final.afpsn',
                                        'tr_ep_sll_final.mos',
                                        'tr_ep_sll_final.UnitCode',
                                        'tr_ep_sll_final.dor',
                                        'tr_ep_sll_final.type',
                                        'tr_ep_sll_final.tig',
                                        'tr_ep_sll_final.hcc',
                                        'tr_ep_sll_final.promex',
                                        'tr_ep_sll_final.date_taken',
                                        'tr_ep_sll_final.hea',
                                        'tr_ep_sll_final.dems',
                                        'tr_ep_sll_final.doe',
                                        'tr_ep_sll_final.ete',
                                        'tr_ep_sll_final.dod',
                                        'tr_ep_sll_final.dore',
                                        'tr_ep_sll_final.tges',
                                        'tr_ep_sll_final.taes',
                                        'tr_ep_sll_final.dob',
                                        'tr_ep_sll_final.date_ret',
                                        'tr_ep_sll_final.designation',
                                        'tr_ep_sll_final.dapda',
                                        'tr_ep_sll_final.dorc',
                                        'tr_ep_sll_final.isDelete',
                                        'tr_ep_sll_final.remarks',
                                        'tr_ep_sll_final.remarksdelete',
                                        'tr_ep_sll_final.remarksalter',
                                        'tr_ep_sll_final.remarksrestore',
                                        'tr_ep_sll_final.remarksafpos',
                                        'tr_ep_sll_final.dau',
                                        'tr_ep_sll_final.gender',
                                        'tr_ep_sll_final.date_promoted',
                                        'tr_ep_sll_final.date_demoted',
                                        'tr_ep_sll_final.remarksdemote',
                                        'tr_ep_sll_final.remarkschooling',
                                        'tr_ep_sll_final.civilstatus',
                                        'tr_ep_sll_final.specialization',
                                        'tr_ep_sll_final.hea_course',
                                        'tr_ep_sll_final.hea_course_graduate',
                                        'tr_ep_sll_final.competency_profile',
                                        'tr_ep_sll_final.reg_status',
                                        'tr_ep_sll_final.ethniccode',
                                        'tr_ep_sll_final.religioncode',
                                        'tr_ep_sll_final.regioncode',
                                        'tr_ep_sll_final.date_updated',
                                        'rf_unitcode.cg_unitcode',
                                        'rf_unitcode.recordnumber',
                                        'rf_unitcode.unit_description',
                                        'rf_unitcode.unitgroup_code',
                                        'rf_unitcode.camp_id',
                                        'rf_rank.rankcode',
                                        'rf_rank.rank',
                                        'rf_rank.rankdesc',
                                        'rf_rank.ranking',
                                        'rf_rank.ranktype'
                                        )  
                                ->orderBy('rf_rank.ranking');

            $dutycodes = DutyCode::orderby('dutycode')->distinct()->get();
        }

        $search = $request->get('search');

        if ($search != "") {
            $personnels = Personnel::join('rf_unitcode', 'rf_unitcode.cg_unitcode', '=', 'tr_master.UnitCode')
                                   ->where('rf_unitcode.unitgroup_code', 'ASR')
                                   ->where('tr_master.pergroupname', $enlisted)
                                   ->where('tr_master.UnitCode', Auth::user()->unitcode)
                                   ->where('afpsn', 'LIKE', '%' . $search . '%')
                                   ->paginate(10)
                                   ->setPath('');
            if (isset($personnels)) {
                $pagination = $personnels->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($personnels) > 0) {
                    return view('pages.personnels.index', 
                    [
                        'title_card_header' => $title_card_header,
                        'total_personnels' => $total_personnels,
                        'dutycodes' => $dutycodes,
                        'personnels' => $personnels
                    ])
                    ->withStatus($personnels)->withQuery($search);
                }
                $records = 'No';
                return view('pages.personnels.index', 
                [
                    'records' => $records, 
                    'title_card_header' => $title_card_header,
                    'total_personnels' => $total_personnels,
                    'dutycodes' => $dutycodes,
                    'personnels' => $personnels
                ])
                ->withStatus($personnels)
                ->withQuery($search);
            }
        }
        return view('pages.personnels.index', 
        [
            'title_card_header' => $title_card_header,
            'total_personnels' => $total_personnels,
            'dutycodes' => $dutycodes,
            'personnels' => $personnels->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(Personnel $personnel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnel $personnel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnel $personnel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnel $personnel)
    {
        //
    }
}
