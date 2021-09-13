<?php

namespace App\Http\Controllers;

use App\Models\CommunicationNomenclature;
use App\Models\CommoCategory;
use Illuminate\Http\Request;
use App\Http\Requests\CommunicationNomenclatureRequest;

class CommunicationNomenclatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CommunicationNomenclature $nomenclatures)
    {
        $total_nomenclatures = CommunicationNomenclature::count();
        $search = $request->get('search');

        if ($search != "") {
            $nomenclatures = CommunicationNomenclature::where('equipment_code', 'LIKE', '%' . $search . '%')->latest()->paginate(10)->setPath('');
            if (isset($nomenclatures)) {
                $pagination = $nomenclatures->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($nomenclatures) > 0) {
                    return view('references.c4s.nomenclature.index', 
                    [
                        'total_nomenclatures' => $total_nomenclatures,
                        'nomenclatures' => $nomenclatures
                    ])
                    ->withStatus($nomenclatures)->withQuery($search);
                }
                $records = 'No';
                return view('references.c4s.nomenclature.index', 
                [
                    'records' => $records, 
                    'total_nomenclatures' => $total_nomenclatures,
                    'nomenclatures' => $nomenclatures
                ])
                ->withStatus($nomenclatures)->withQuery($search);
            }
        }
        return view('references.c4s.nomenclature.index', 
        [
            'total_nomenclatures' => $total_nomenclatures,
            'nomenclatures' => $nomenclatures->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commocategories = CommoCategory::get();
        return view('references.c4s.nomenclature.create',compact('commocategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommunicationNomenclatureRequest $request)
    {
        $this->validate($request, [
            'equipment_code' => 'required|unique:c4s_nomenclature,equipment_code',
            'nomenclature' => 'required',
            'classification' => 'required',
            'commo_category_id' => 'required',
        ]);

        $nomenclatures = CommunicationNomenclature::create([
            'equipment_code' => $request->input('equipment_code'),
            'nomenclature' => $request->input('nomenclature'),
            'classification' => $request->input('classification'),
            'commo_category_id' => $request->input('commo_category_id'),
        ]);

        return redirect()->route('c4s nomenclature - create')->withStatus(__('Nomenclature Successfully Created.'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommunicationNomenclature  $communicationNomenclature
     * @return \Illuminate\Http\Response
     */
    public function show(CommunicationNomenclature $communicationNomenclature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommunicationNomenclature  $communicationNomenclature
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunicationNomenclature $nomenclature)
    {
        $commocategories = CommoCategory::get();
        $nomenclature = CommunicationNomenclature::find($nomenclature->id);
        return view('references.c4s.nomenclature.edit',compact('commocategories','nomenclature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommunicationNomenclature  $communicationNomenclature
     * @return \Illuminate\Http\Response
     */
    public function update(CommunicationNomenclatureRequest $request, CommunicationNomenclature $nomenclature)
    {
        $this->validate($request, [
            'equipment_code' => 'required',
            'nomenclature' => 'required',
            'classification' => 'required',
            'commo_category_id' => 'required',
        ]);

        $nomenclature = CommunicationNomenclature::find($nomenclature->id);
        $nomenclature->equipment_code = $request->input('equipment_code');
        $nomenclature->nomenclature = $request->input('nomenclature');
        $nomenclature->classification = $request->input('classification');
        $nomenclature->commo_category_id = $request->input('commo_category_id');
        $nomenclature->save();

        return redirect()->route('c4s nomenclature')->withStatus(__('Nomenclature Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommunicationNomenclature  $communicationNomenclature
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunicationNomenclature $nomenclature)
    {
        $nomenclature->delete();
        return redirect()->route('c4s nomenclature')->withStatus(__('Nomenclature Successfully Deleted.'));
    }
}
