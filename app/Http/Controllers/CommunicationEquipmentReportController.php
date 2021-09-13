<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\CommunicationEquipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunicationEquipmentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.c4sequipment.index');
    }

    public function serviceable()
    {
        return view('reports.c4sequipment.serviceable');
    }

    public function unserviceable()
    {
        return view('reports.c4sequipment.unserviceable');
    }

    public function lost()
    {
        return view('reports.c4sequipment.lost');
    }

    public function unknown()
    {
        return view('reports.c4sequipment.unknown');
    }

    public function military()
    {
        return view('reports.c4sequipment.military');
    }

    public function commercial()
    {
        return view('reports.c4sequipment.commercial');
    }

    public function allc4sreportsPDF() 
    {
        $equipments = CommunicationEquipment::all();
        $pdf = PDF::loadView('reports.c4sequipment.pdf.allreportsPDF', compact('equipments'))->setPaper('a4', 'landscape');
        return $pdf->stream('c4sequipmentreports.pdf');
    }

    public function c4sreportsserviceablePDF() 
    {
        $equipments = CommunicationEquipment::where('status', '=', 'SERVICEABLE')->get();
        $pdf = PDF::loadView('reports.c4sequipment.pdf.allreportsPDF', compact('equipments'))->setPaper('a4', 'landscape');
        return $pdf->stream('c4sequipmentreports.pdf');
    }

    public function c4sreportsunserviceablePDF() 
    {
        $equipments = CommunicationEquipment::where('status', '=', 'UNSERVICEABLE')->get();
        $pdf = PDF::loadView('reports.c4sequipment.pdf.allreportsPDF', compact('equipments'))->setPaper('a4', 'landscape');
        return $pdf->stream('c4sequipmentreports.pdf');
    }

    public function c4sreportslostPDF() 
    {
        $equipments = CommunicationEquipment::where('status', '=', 'LOST')->get();
        $pdf = PDF::loadView('reports.c4sequipment.pdf.allreportsPDF', compact('equipments'))->setPaper('a4', 'landscape');
        return $pdf->stream('c4sequipmentreports.pdf');
    }

    public function c4sreportsunknownPDF() 
    {
        $equipments = CommunicationEquipment::where('status', '=', 'UNKNOWN')->get();
        $pdf = PDF::loadView('reports.c4sequipment.pdf.allreportsPDF', compact('equipments'))->setPaper('a4', 'landscape');
        return $pdf->stream('c4sequipmentreports.pdf');
    }

    public function c4sreportsmilitaryPDF() 
    {
        $equipments = CommunicationEquipment::where('specification', '=', 'Military')->get();
        $pdf = PDF::loadView('reports.c4sequipment.pdf.allreportsPDF', compact('equipments'))->setPaper('a4', 'landscape');
        return $pdf->stream('c4sequipmentreports.pdf');
    }

    public function c4sreportscommercialPDF() 
    {
        $equipments = CommunicationEquipment::where('specification', '=', 'Commercial')->get();
        $pdf = PDF::loadView('reports.c4sequipment.pdf.allreportsPDF', compact('equipments'))->setPaper('a4', 'landscape');
        return $pdf->stream('c4sequipmentreports.pdf');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
