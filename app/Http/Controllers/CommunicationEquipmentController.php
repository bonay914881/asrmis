<?php

namespace App\Http\Controllers;

use App\Models\CommunicationEquipment;
use App\Models\CommunicationNomenclature;
use App\Models\UnitCode;
use Illuminate\Http\Request;
use App\Http\Requests\CommunicationEquipmentRequest;

class CommunicationEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CommunicationEquipment $equipments)
    {
        $total_equipments = CommunicationEquipment::count();
        $search = $request->get('search');

        if ($search != "") {
            $equipments = CommunicationEquipment::where('serial_number', 'LIKE', '%' . $search . '%')->latest()->paginate(10)->setPath('');
            if (isset($equipments)) {
                $pagination = $equipments->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($equipments) > 0) {
                    return view('pages.logistics.c4sequipment.index', 
                    [
                        'total_equipments' => $total_equipments,
                        'equipments' => $equipments
                    ])
                    ->withStatus($equipments)->withQuery($search);
                }
                $records = 'No';
                return view('pages.logistics.c4sequipment.index', 
                [
                    'records' => $records, 
                    'total_equipments' => $total_equipments,
                    'equipments' => $equipments
                ])
                ->withStatus($equipments)->withQuery($search);
            }
        }
        return view('pages.logistics.c4sequipment.index', 
        [
            'total_equipments' => $total_equipments,
            'equipments' => $equipments->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unitcodes = UnitCode::where('unitgroup_code', '=', 'ASR')->get();
        $nomenclatures = CommunicationNomenclature::get();
        return view('pages.logistics.c4sequipment.create',compact('unitcodes','nomenclatures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommunicationEquipmentRequest $request)
    {
        $this->validate($request, [
            'serial_number' => 'required|unique:c4s_equipment,serial_number',
            'unitcode' => 'required',
            'pamu' => 'required',
            'status' => 'required',
            'specification' => 'required',
            'nomenclature_id' => 'required',
        ]);

        $equipments = CommunicationEquipment::create([
            'serial_number' => $request->input('serial_number'),
            'unitcode' => $request->input('unitcode'),
            'pamu' => $request->input('pamu'),
            'status' => $request->input('status'),
            'specification' => $request->input('specification'),
            'remarks' => $request->input('remarks'),
            'date_acquired' => $request->input('date_acquired'),
            'cost_acquired' => $request->input('cost_acquired'),
            'nomenclature_id' => $request->input('nomenclature_id'),
        ]);

        return redirect()->route('c4s equipment - create')->withStatus(__('C4s Equipment Successfully Created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommunicationEquipment  $communicationEquipment
     * @return \Illuminate\Http\Response
     */
    public function show(CommunicationEquipment $communicationEquipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommunicationEquipment  $communicationEquipment
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunicationEquipment $equipment)
    {
        $unitcodes = UnitCode::where('unitgroup_code', '=', 'ASR')->get();
        $nomenclatures = CommunicationNomenclature::get();
        $equipment = CommunicationEquipment::find($equipment->id);
        return view('pages.logistics.c4sequipment.edit',compact('unitcodes','nomenclatures','equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommunicationEquipment  $communicationEquipment
     * @return \Illuminate\Http\Response
     */
    public function update(CommunicationEquipmentRequest $request, CommunicationEquipment $equipment)
    {
        $this->validate($request, [
            'serial_number' => 'required',
            'unitcode' => 'required',
            'status' => 'required',
            'specification' => 'required',
            'nomenclature_id' => 'required',
        ]);

        $equipment = CommunicationEquipment::find($equipment->id);
        $equipment->serial_number = $request->input('serial_number');
        $equipment->unitcode = $request->input('unitcode');
        $equipment->status = $request->input('status');
        $equipment->specification = $request->input('specification');
        $equipment->remarks = $request->input('remarks');
        $equipment->date_acquired = $request->input('date_acquired');
        $equipment->cost_acquired = $request->input('cost_acquired');
        $equipment->nomenclature_id = $request->input('nomenclature_id');
        $equipment->save();

        return redirect()->route('c4s equipment')->withStatus(__('Equipment Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommunicationEquipment  $communicationEquipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunicationEquipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('c4s equipment')->withStatus(__('Equipment Successfully Deleted.'));
    }
}
