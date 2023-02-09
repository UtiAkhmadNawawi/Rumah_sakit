

<form action="{{ route('inpatient_records.store') }}" method="POST">
    @csrf
    
    @isset($patients)
    <h2>Data Pasien</h2>
    <div>
        <label for="patient_id">Nama Pasien:</label> 
        <input type="text" name="patient_id" id="patient_id" value="{{ $patients->id }}">
    </div>
    
    <div>
        <label for="dokter_id">Nama Dokter:</label> 
        <input type="text" name="dokter_id" id="dokter_id" value="{{ $patients->dokter_id }}" >
    </div>

    <div>
        <label for="lama_inap">Lama Inap:</label>
        <input type="text" name="lama_inap" id="lama_inap" value="{{ $duration }}" >
    </div>
        <button type="submit">Bayar</button>
        {{-- <table>
            <tr>
                <td>Nama Pasien:</td>
                <td>{{ $patient->nama }}</td>
            </tr>
            <tr>
                <td>Lama Inap:</td>
                <td>{{ $duration }} hari</td>
            </tr>
        </table> --}}
</form>
@endisset
