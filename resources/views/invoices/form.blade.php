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
                        <div class="form-group">
                        <h1>Form Checkout</h1>
                        @foreach ($patients as $pasien)
                            <form action="{{ route('inpatient_records.show',$pasien->id) }}" method="GET">
                            @csrf
                            <label class="font-weight-bold" for="id">Pasien</label>
                            <select name="id" id="id" class="form-control" placeholder="id_pasien">
                                <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                            </select>
                            <label class="font-weight-bold" for="lama_inap">Lama Inap</label>
                            <input type="text" class="form-control" value="{{ $pasien->created_at }}">
                            <div>
                                <button type="submit" class="btn btn-md btn-primary">BAYAR</button>
                            </div>
                        </form>
                        @endforeach
                        </div>    
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