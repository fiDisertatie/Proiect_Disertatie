<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdeverintaElevRequest;
use App\Models\Student;
use PDF;

class AdeverintaElevController extends Controller
{
    public function create(Student $student)
    {
        return view('students.adeverinta.elev.create', compact('student'));
    }

    public function store(AdeverintaElevRequest $request)
    {
        $data = $request->validated();

        $student = Student::where('id', $data['student_id'])->first();

        $student->nr_inregistrare = $data['nr_inregistrare'];
        $student->data_generare = $data['data_generare'];
        $student->foloseste_la = $data['foloseste_la'];

        $pdf = PDF::loadView('students.adeverinta.elev.adeverinta_elev', compact('student'));

        return $pdf->download($this->denumireFisierAdeverinta($student));
    }

    public function denumireFisierAdeverinta($student)
    {
        return "Adeverinta_Elev_{$student->nume}_{$student->prenume1}.pdf";
    }
}
