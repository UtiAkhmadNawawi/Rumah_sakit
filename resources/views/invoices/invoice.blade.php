<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Umur Pasien</th>
                                    <th scope="col">Lama Inap</th>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">Biaya Rumah sakit</th>
                                    <th scope="col">Pajak</th>
                                    <th scope="col">Total Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $item['nama_pasien'] }}</td>
                                        <td>{{ $item['umur_pasien'] }}</td>
                                        <td>{{ $item['lama_inap'] }}</td>
                                        <td>{{ $item['nama_dokter'] }}</td>
                                        <td>{{ number_format($item['biaya_rs'], 0, ',', '.') }}</td>
                                        <td>{{ number_format($item['pajak'], 0, ',', '.') }}</td>
                                        <td>{{ number_format($item['total'], 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data invoice belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>  
                        <a href="#" class="btn btn-md btn-success mb-3">CETAK</a>
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