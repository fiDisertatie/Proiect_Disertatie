<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdeverintaIncadrareRequest;
use App\Models\Teacher;
use PDF;

class AdeverintaIncadrareController extends Controller
{
    public function create(Teacher $teacher)
    {
        return view('teachers.adeverinta.create', compact('teacher'));
    }

    public function store(AdeverintaIncadrareRequest $request)
    {
        $data = $request->validated();

        $teacher = Teacher::where('id', $data['teacher_id'])->first();

        $teacher->nr_inregistrare = $data['nr_inregistrare'];
        $teacher->data_generare = $data['data_generare'];
        $teacher->foloseste_la = $data['foloseste_la'];
        $teacher->denumire_unitate = str_replace('-', ' ', $teacher->denumire_unitate);

        $pdf = PDF::loadView('teachers.adeverinta.adeverinta_incadrare', compact('teacher'));

        return $pdf->download($this->denumireFisierAdeverinta($teacher));
    }

    public function denumireFisierAdeverinta($teacher)
    {
        return "Adeverinta_Incadrare_{$teacher->nume}_{$teacher->prenume}.pdf";
    }
}
