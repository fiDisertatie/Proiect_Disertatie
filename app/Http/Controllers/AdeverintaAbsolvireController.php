<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdeverintaAbsolvireRequest;
use App\Models\Student;
use PDF;

class AdeverintaAbsolvireController extends Controller
{
    public function create(Student $student)
    {
        return view('students.adeverinta.absolvire.create', compact('student'));
    }

    public function store(AdeverintaAbsolvireRequest $request)
    {
        $data = $request->validated();

        $student = Student::where('id', $data['student_id'])->first();

        $student->nr_inregistrare = $data['nr_inregistrare'];
        $student->data_generare = $data['data_generare'];
        $student->foloseste_la = $data['foloseste_la'];

        //dd($student);

        $pdf = PDF::loadView('students.adeverinta.absolvire.adeverinta_absolvire', compact('student'));

        return $pdf->download($this->denumireFisierAdeverinta($student));
        return view('students.adeverinta.absolvire.adeverinta_absolvire', compact('student'));
    }

    public function denumireFisierAdeverinta($student)
    {
        return "Adeverinta_Absolvire_{$student->nume}_{$student->prenume1}.pdf";
    }
}
