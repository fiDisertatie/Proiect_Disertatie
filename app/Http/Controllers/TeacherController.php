<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportExcelRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();

        return view('teachers.index', compact('teachers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_import()
    {
        return view('teachers.create');
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
            $column_range = range( 'H', $column_limit );
            $startcount = 1;
            $data = array();

            foreach ( $row_range as $row )
            {
                $data[] = [
                    'an' => $sheet->getCell('A' . $row)->getValue(),
                    'denumire_unitate' => $sheet->getCell('B' . $row)->getValue(),
                    'nume' => $sheet->getCell('C' . $row)->getValue(),
                    'initiala' => $sheet->getCell('D' . $row)->getValue(),
                    'prenume' => $sheet->getCell('E' . $row)->getValue(),
                    'statut' => $sheet->getCell('F' . $row)->getValue(),
                    'categorie_personal' => $sheet->getCell('G' . $row)->getValue(),
                    'disciplina_incadrare' => $sheet->getCell('H' . $row)->getValue(),
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
            return redirect()->route('teachers.create.import')->with('danger', "Structura fișierului este incorectă!");
        }

        array_shift($data);

        if (!count($data))
        {
            return redirect()->route('teachers.create.import')->with('danger', "Fișierul ales nu conține date!");
        }

        foreach ($data as $row)
        {
            if (!$this->checkEmptyField($row))
            {
                continue;
            }

            $hash = md5($row['nume'] . $row['initiala'] . $row['prenume']);

            $exists = Teacher::where('hash_unic', $hash)->first();

            if (isset($exists->id))
            {
                continue;
            }

            Teacher::create([
                'an' => $row['an'],
                'denumire_unitate' => $row['denumire_unitate'],
                'nume' => $row['nume'],
                'initiala' => $row['initiala'],
                'prenume' => $row['prenume'],
                'statut' => $row['statut'],
                'categorie_personal' => $row['categorie_personal'],
                'disciplina_incadrare' => $row['disciplina_incadrare'],
                'hash_unic' => $hash
            ]);
        }

        return redirect()->route('teachers.index')->with('success', "Fișier Excel Cadre Didactice importat cu succes");
    }

    public function checkExcelStructure($data)
    {
        if (
            strtolower($data['an']) !== "an" ||
            strtolower($data['denumire_unitate']) !== "denumire unitate" ||
            strtolower($data['nume']) !== "nume" ||
            strtolower($data['initiala']) !== "init." ||
            strtolower($data['prenume']) !== "prenume" ||
            strtolower($data['statut']) !== "statut" ||
            strtolower($data['categorie_personal']) !== "categorie personal" ||
            strtolower($data['disciplina_incadrare']) !== "disciplina post incadrare"
        )
        {
            return false;
        }

        return true;
    }

    public function checkEmptyField($data)
    {
        if (
            $data['an'] == "" ||
            $data['denumire_unitate'] == "" ||
            $data['nume'] == "" ||
            $data['initiala'] == "" ||
            $data['prenume'] == "" ||
            $data['statut'] == "" ||
            $data['categorie_personal'] == "" ||
            $data['disciplina_incadrare'] == ""
        )
        {
            return false;
        }

        return true;
    }

    public function truncate()
    {
        Teacher::truncate();

        return redirect()->route('teachers.create.import')->with('warning', "Datele din tabelul Cadre Didactice au fost șterse");
    }
}
