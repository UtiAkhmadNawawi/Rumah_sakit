<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">                        
                        <h1>Form Checkout</h1><br>
                        <form action="{{ route('inpatient_records.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold" for="id">Pasien</label>
                                <select name="id" id="id" class="form-control" placeholder="Pilih Pasien">
                                    <option disabled selected>Pilih Pasien</option>
                                    @foreach ($patients as $pasien)
                                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                    @endforeach
                                </select>
                            <div>
                            <div class="form-group">
                                <label for="lama_inap" class="font-weight-bold">Lama Inap</label>
                                <input type="text" id="lama_inap" name="lama_inap" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">BAYAR</button>
                        </form>
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
<script>
    $(document).ready(function() {
    $("#id").on("change", function() {
        var patient_id = $(this).val();

        // Gunakan AJAX untuk mengambil data lama inap dari server
        $.ajax({
            url: "/api/inpatient_records/"+ patient_id + "/lama_inap",
            type: "GET",
            success: function(data) {
                $("#lama_inap").val(data.lama_inap);
            }
        });
    });
});
</script>
</html>