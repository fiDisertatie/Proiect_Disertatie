<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportExcelRequest;
use App\Models\Student;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_import()
    {
        return view('students.create');
    }

    public function import_excel(ImportExcelRequest $request)
    {
        $request->validated();
        $the_file = $request->file('excel_file');
        try
        {
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 1, $row_limit );
            $column_range = range( 'M', $column_limit );
            $startcount = 1;
            $data = array();

            foreach ( $row_range as $row )
            {
                $data[] = [
                    'cnp' => $sheet->getCell('A' . $row)->getValue(),
                    'nume' => $sheet->getCell('B' . $row)->getValue(),
                    'initiala' => $sheet->getCell('C' . $row)->getValue(),
                    'prenume1' => $sheet->getCell('D' . $row)->getValue(),
                    'prenume2' => $sheet->getCell('E' . $row)->getValue(),
                    'data_nastere' => $sheet->getCell('F' . $row)->getValue(),
                    'localitate_nastere' => $sheet->getCell('G' . $row)->getValue(),
                    'denumire_unitate' => $sheet->getCell('H' . $row)->getValue(),
                    'nivel_invatamant' => $sheet->getCell('I' . $row)->getValue(),
                    'tip_formatiune' => $sheet->getCell('J' . $row)->getValue(),
                    'nume_clasa' => $sheet->getCell('K' . $row)->getValue(),
                    'forma_invatamant' => $sheet->getCell('L' . $row)->getValue(),
                    'specializare_calificare' => $sheet->getCell('M' . $row)->getValue(),
                ];
                $startcount++;
            }
        }
        catch (Exception $e)
        {
            return redirect()->route('teachers.create.import')->with('danger', $e->errorInfo[1]);
        }

        if (!$this->checkExcelStructure($data[0]))
        {
            return redirect()->route('students.create.import')->with('danger', "Structura fișierului este incorectă!");
        }

        array_shift($data);

        if (!count($data))
        {
            return redirect()->route('students.create.import')->with('danger', "Fișierul ales nu conține date!");
        }

        foreach ($data as $row)
        {
            if (!$this->checkEmptyField($row))
            {
                continue;
            }

            $exists = Student::where('cnp', $row['cnp'])->first();

            if (isset($exists->id))
            {
                continue;
            }

            Student::create([
                'cnp' => $row['cnp'],
                'nume' => $row['nume'],
                'initiala' => $row['initiala'],
                'prenume1' => $row['prenume1'],
                'prenume2' => $row['prenume2'],
                'data_nastere' => $row['data_nastere'],
                'localitate_nastere' => $row['localitate_nastere'],
                'denumire_unitate' => $row['denumire_unitate'],
                'nivel_invatamant' => $row['nivel_invatamant'],
                'tip_formatiune' => $row['tip_formatiune'],
                'nume_clasa' => $row['nume_clasa'],
                'forma_invatamant' => $row['forma_invatamant'],
                'specializare_calificare' => $row['specializare_calificare']
            ]);
        }

        return redirect()->route('students.index')->with('success', "Fișier Excel Elevi importat cu succes");
    }

    public function checkExcelStructure($data)
    {
        if (
            strtolower($data['cnp']) !== "cnp" ||
            strtolower($data['nume']) !== "nume" ||
            strtolower($data['initiala']) !== "initiala tatalui" ||
            strtolower($data['prenume1']) !== "prenume1" ||
            strtolower($data['prenume2']) !== "prenume2" ||
            strtolower($data['data_nastere']) !== "data nastere" ||
            strtolower($data['localitate_nastere']) !== "localitate nastere" ||
            strtolower($data['denumire_unitate']) !== "denumire unitate pj" ||
            strtolower($data['nivel_invatamant']) !== "nivel invatamant" ||
            strtolower($data['tip_formatiune']) !== "tip formatiune" ||
            strtolower($data['nume_clasa']) !== "nume clasa" ||
            strtolower($data['forma_invatamant']) !== "forma invatamant" ||
            strtolower($data['specializare_calificare']) !== "specializare/calificare"
        )
        {
            return false;
        }

        return true;
    }

    public function checkEmptyField($data)
    {
        if (
            $data['cnp'] == "cnp" ||
            $data['nume'] == "nume" ||
            $data['initiala'] == "initiala tatalui" ||
            $data['prenume1'] == "prenume1" ||
            $data['prenume2'] == "prenume2" ||
            $data['data_nastere'] == "data nastere" ||
            $data['localitate_nastere'] == "localitate nastere" ||
            $data['denumire_unitate'] == "denumire unitate pj" ||
            $data['nivel_invatamant'] == "nivel invatamant" ||
            $data['tip_formatiune'] == "tip formatiune" ||
            $data['nume_clasa'] == "nume clasa" ||
            $data['forma_invatamant'] == "forma invatamant" ||
            $data['specializare_calificare'] == "specializare/calificare"
        )
        {
            return false;
        }

        return true;
    }

    public function truncate()
    {
        Student::truncate();

        return redirect()->route('students.create.import')->with('warning', "Datele din tabelul Elevi au fost șterse");
    }
}
