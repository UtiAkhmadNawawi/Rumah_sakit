<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Dokter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('doctors.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DOKTER</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">Spesialis</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($doctors as $dokter)
                                    <tr>
                                        <td>{{ $dokter->nama }}</td>
                                        <td>{!! $dokter->spesialisasi !!}</td>
                                        <td>{!! $dokter->tarif !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" 
                                            action="{{ route('doctors.destroy', $dokter->id) }}" method="POST">
                                                <a href="{{ route('doctors.edit', $dokter->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Dokter belum Tersedia.
                                    </div>
                                @endforelse
                                </tbody>
                            </table>  
                            {{ $doctors->links() }}
                            <a href="{{'/'}}" class="btn btn-md btn-success mb-3">Kembali</a>
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