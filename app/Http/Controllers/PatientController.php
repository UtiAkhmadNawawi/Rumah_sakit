<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\InpatientRecord;
use Carbon\Carbon;


class PatientController extends Controller
{
   public function index()
    {
        // menampilkan data pasien dan nama dokter
        $patients = Patient::select('patients.*', 'doctors.nama as nama_dokter')
        ->join('doctors', 'patients.dokter_id', '=', 'doctors.id')
        ->latest()->paginate(5);
        
        // var_dump($patients)&& exit();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('patients.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'nama' => 'required|max:255',
        'umur' => 'required|max:2',
        'jenis_kelamin' => 'required|min:1',
        'no_telpon' => 'required|no_telpon|unique:patients',
        'alamat' => 'required|min:3',
        'dokter_id' => 'required|min:1',
    ]);

        $patient = new Patient();
        $patient->nama = $request->input('nama');
        $patient->umur = $request->input('umur');
        $patient->jenis_kelamin = $request->input('jenis_kelamin');
        $patient->alamat = $request->input('alamat');
        $patient->no_telpon = $request->input('no_telpon');
        $patient->dokter_id = $request->input('dokter_id');
        $patient->save();
        return redirect()->route('patients.index')->with('success','Data Berhasil Disimpan');
    }

    public function show(Request $request,$id)
    {
        //
    }

    public function edit($id)
    {
        $patients = Patient::find($id);
        $doctors = Doctor::all();

        return view ('patients.edit',compact('patients','doctors'));
    }
        public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->nama = $request->input('name');
        $patient->umur = $request->input('age');
        $patient->jenis_kelamin = $request->input('gender');
        $patient->alamat = $request->input('address');
        $patient->no_telpon = $request->input('phone');
        $patient->dokter_id = $request->input('doctor_id');
        $patient->save();
        return redirect()->route('patients.index');
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect()->route('patients.index');
    }
}