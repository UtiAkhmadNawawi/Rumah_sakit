<!-- file: resources/views/patient/index.blade.php -->

<h1>Pilih Pasien</h1>

<form action="{{ route('inpatient_records.show',$patient->id) }}" method="post">
  @csrf
  <label for="id">ID Pasien:</label>
  <input type="text" name="id" id="id" value="1">
  <button type="submit">Tampilkan</button>
</form>

@isset($patient)
  <h2>Data Pasien</h2>
  <table>
    <tr>
      <td>Nama Pasien:</td>
      <td>{{ $patient->name }}</td>
    </tr>
    <tr>
      <td>Lama Inap:</td>
      <td>{{ $duration }} hari</td>
    </tr>
  </table>
@endisset
