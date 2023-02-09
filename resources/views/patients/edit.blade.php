<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('patients.update',$patients->id) }}" method="POST">
                        
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label class="font-weight-bold" for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama">
                            
                                <!-- error message untuk title -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="age">Umur</label>
                                <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" placeholder="Masukkan Umur">
                            
                                <!-- error message untuk title -->
                                @error('age')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="gender">Jenis kelamin</label>
                                <select name="gender" id="gender" class="form-control" placeholder="gender">
                                    <option disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="phone">Telepon</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Masukkan Telepon">
                            
                                <!-- error message untuk title -->
                                @error('phone')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="address">Alamat</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Masukkan Alamat">
                            
                                <!-- error message untuk title -->
                                @error('address')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="doctor_id">Dokter</label>
                                <select name="doctor_id" id="doctor_id" class="form-control" placeholder="doctor_id">
                                    <option disabled selected>Pilih Dokter</option>
                                    @foreach ($doctors as $dokter)
                                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
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