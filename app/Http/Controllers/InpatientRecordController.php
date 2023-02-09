<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InpatientRecord;
use App\Models\Patient;
use App\Models\Doctor;
use Carbon\Carbon;

class InpatientRecordController extends Controller
{
    public function index(Request $request)
    {
        

        $records = Patient::select('patients.*', 'doctors.nama as nama_dokter', 'inpatient_records.lama_inap as inap',
                            'inpatient_records.biaya as biaya_rs', 'inpatient_records.pajak as pajak_rs',
                            'inpatient_records.total_bayar as total','inpatient_records.created_at as tgl_transaksi')
                            ->join('doctors', 'patients.dokter_id', '=', 'doctors.id')
                            ->join('inpatient_records', 'patients.id', '=', 'inpatient_records.patient_id')
                            ->latest()->paginate(5);
        // $records = Patient::with('inpatient_records')->find(3);
        // var_dump($records);
        return view('invoices.index', compact('records'));
    }

    public function create(Request $request)
    {

        $patients = Patient::all('id','nama','created_at');
        // var_dump($patients);
        return view ('invoices.create',compact('patients'));

    }
    public function getDuration($patient_id)
    {
        $patient = Patient::find($patient_id);
        $now = Carbon::now();
        $duration = $now->diffInDays($patient->created_at);
        if ($duration == 0) {
            $duration =1;
        }
        return [
            'lama_inap' => $duration
        ];
    }

    public function store(Request $request)
    {
        $patients = Patient::select('patients.*', 'doctors.id as doctor_id', 'doctors.tarif as harga' )
            ->join('doctors', 'patients.dokter_id', '=', 'doctors.id')
            ->find($request->input('id'));

        // $createdAt = Carbon::parse($patients->created_at);
        // var_dump($patients);
        $now = Carbon::now();
        $duration = $now->diffIndays($patients->created_at);
        if ($duration == 0) {
            $duration = 1;
        }
        $fee = $duration * $patients->harga;
        $tax = $fee * 0.10;
        $total = $fee + $tax ;

        $inpatient_record = new InpatientRecord();
        $inpatient_record->patient_id = $patients->id;
        $inpatient_record->dokter_id = $patients->doctor_id;
        $inpatient_record->lama_inap = $duration;
        $inpatient_record->biaya = $fee;
        $inpatient_record->pajak = $tax;
        $inpatient_record->total_bayar = $total;
        $inpatient_record->save();

        return redirect()->route('inpatient_records.show',$id = $patients->id);
    }

    public function show(Request $request,$id)
    {
        // $patient = Patient::where('id', $request->input('id'))->first();
        // $created_at = Carbon::parse($patient->created_at);
        // $now = Carbon::now();
        // $duration = $now->diffInDays($created_at);

        // return view('patient.show', compact('patient', 'duration'));

        // $patients = Patient::find($id);
        $patients = Patient::select('patients.*', 'doctors.nama as doctor_name', 'doctors.tarif as harga' )
            ->join('inpatient_records', 'patients.id', '=', 'inpatient_records.patient_id')
            ->join('doctors', 'patients.dokter_id', '=', 'doctors.id')
            ->find($id);
        $data = [];

        $createdAt = Carbon::parse($patients->created_at);
        $now = Carbon::now();
        $durations = $now->diffInDays($createdAt);
        if ($durations == 0) {
            $durations = 1;
        }
        $fee = $durations * $patients->harga;
        $tax = $fee * 0.1;
        $total = $fee + $tax;

        $data[] = [
            'nama_pasien' => $patients->nama,
            'umur_pasien' => $patients->umur,
            'lama_inap' => $durations,
            'nama_dokter' => $patients->doctor_name,
            'harga' => $patients->harga,
            'biaya_rs' => $fee,
            'pajak' => $tax,
            'total' => $total,
        ];

        if (!$patients) {
            return redirect()->back()->with('error', 'Pasien tidak ditemukan');
        }


        return view('invoices.invoice', compact('data'));
    }

    public function showbyid(Request $request,$id)
    {
        // $id = Patient::find($request->input('id'));
        
        $patients = Patient::select('patients.*', 'doctors.nama as doctor_name', 'doctors.tarif as harga' )
            ->join('inpatient_records', 'patients.id', '=', 'inpatient_records.patient_id')
            ->join('doctors', 'patients.dokter_id', '=', 'doctors.id')
            ->find($id);
        $data = [];

        $createdAt = Carbon::parse($patients->created_at);
        $now = Carbon::now();
        $durations = $now->diffInDays($createdAt);
        if ($durations == 0) {
            $durations = 1;
        }
        $fee = $durations * $patients->harga;
        $tax = $fee * 0.1;
        $total = $fee + $tax;

        $data[] = [
            'nama_pasien' => $patients->nama,
            'umur_pasien' => $patients->umur,
            'lama_inap' => $durations,
            'nama_dokter' => $patients->doctor_name,
            'harga' => $patients->harga,
            'biaya_rs' => $fee,
            'pajak' => $tax,
            'total' => $total,
        ];

        var_dump($data);
        if (!$patients) {
            return redirect()->back()->with('error', 'Pasien tidak ditemukan');
        }


        return view('invoices.invoice', compact('data'));
    }

    public function edit($id)
    {
        $inpatient_record = InpatientRecord::find($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('inpatient_records.edit', compact('inpatient_record', 'patients', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $inpatient_record = InpatientRecord::find($id);
        $inpatient_record->patient_id = $request->input('patient_id');
        $inpatient_record->doctor_id = $request->input('doctor_id');
        $inpatient_record->duration = $request->input('duration');
        $inpatient_record->save();
        return redirect()->route('inpatient_records.index');
    }

    public function destroy($id)
    {
        $inpatient_record = InpatientRecord::find($id);
        $inpatient_record->delete();
        return redirect()->route('inpatient_records.index');
    }
}