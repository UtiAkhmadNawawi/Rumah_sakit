<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        // $doctors = Doctor::all();
        $doctors = Doctor::latest()->paginate(5);
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $doctor = new Doctor();
        $doctor->nama = $request->input('name');
        $doctor->spesialisasi = $request->input('specialization');
        $doctor->tarif = $request->input('fee');
        $doctor->save();
        return redirect()->route('doctors.index');
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.show', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->nama = $request->input('name');
        $doctor->spesialisasi = $request->input('specialization');
        $doctor->tarif = $request->input('fee');
        $doctor->save();
        return redirect()->route('doctors.index');
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect()->route('doctors.index');
    }
}