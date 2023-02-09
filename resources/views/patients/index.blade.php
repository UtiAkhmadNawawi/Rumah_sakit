<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('patients.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PASIEN</a>
                        <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Umur</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Telpon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">Checkin</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                                </thead>
                            <tbody>
                                @forelse ($patients as $pasien)
                                    <tr>
                                        <td>{{ $pasien->nama }}</td>
                                        <td>{!! $pasien->umur !!}</td>
                                        @if ($pasien->jenis_kelamin == 'L')
                                            <td>Laki-laki</td>
                                        @else
                                            <td>Perempuan</td>
                                        @endif
                                        <td>{!! $pasien->no_telpon !!}</td>
                                        <td>{!! $pasien->alamat !!}</td>
                                        <td>{!! $pasien->nama_dokter !!}</td>
                                        <td>{!! date("d-m-Y", strtotime($pasien->created_at)) !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" 
                                            action="{{ route('patients.destroy', $pasien->id) }}" method="POST">
                                                <a href="{{ route('patients.edit', $pasien->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Pasien belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>  
                        <a href="{{'/'}}" class="btn btn-md btn-success mb-3">Kembali</a>
                        {{ $patients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>