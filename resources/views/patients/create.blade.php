<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('patients.store') }}" method="POST">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold" for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="umur">Umur</label>
                                <input type="text" class="form-control @error('umur') is-invalid @enderror" name="umur" value="{{ old('umur') }}" placeholder="Masukkan Umur">
                            
                                <!-- error message untuk title -->
                                @error('umur')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="jenis_kelamin">Jenis kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="jenis_kelamin">
                                    <option disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="no_telpon">Telepon</label>
                                <input type="text" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" value="{{ old('no_telpon') }}" placeholder="Masukkan Telepon">
                            
                                <!-- error message untuk title -->
                                @error('no_telpon')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="alamat">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat">
                            
                                <!-- error message untuk title -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="dokter_id">Dokter</label>
                                <select name="dokter_id" id="dokter_id" class="form-control" placeholder="dokter_id">
                                    <option disabled selected>Pilih Dokter</option>
                                    @foreach ($doctors as $dokter)
                                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>