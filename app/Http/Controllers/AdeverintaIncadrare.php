<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdeverintaIncadrareRequest;
use App\Models\Teacher;
use PDF;
use Illuminate\Http\Request;

class AdeverintaIncadrare extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Teacher $teacher)
    {
        return view('teachers.adeverinta.create', compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdeverintaIncadrareRequest $request)
    {
        $data = $request->validated();

        $teacher = Teacher::where('id', $data['teacher_id'])->first();

        $teacher->nr_inregistrare = $data['nr_inregistrare'];
        $teacher->data_generare = $data['data_generare'];
        $teacher->foloseste_la = $data['foloseste_la'];
        $teacher->denumire_unitate = str_replace('-', ' ', $teacher->denumire_unitate);

        $pdf = PDF::loadView('teachers.adeverinta.adeverinta_incadrare', compact('teacher'));
        $pdf->save(storage_path('adeverinta.pdf'), 'UTF-8');
        return response()->download(storage_path('adeverinta.pdf'));


        return view('teachers.adeverinta.adeverinta_incadrare', compact('teacher'));
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
