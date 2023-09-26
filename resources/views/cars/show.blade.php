<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyRent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: #D27685">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/cars/'.$cars->gambar) }}" class="w-100 rounded">
                        <hr>
                        <h4>{{ $cars-> merk }}</h4>
                        <h4>{{ $cars-> tipe }}</h4>
                        <h4>{{ $cars-> stock }}</h4>
                        <h4>{{ $cars-> warna }}</h4>
                        <h4>{{ $cars-> status }}</h4>
                        <h4>{{ $cars-> deskripsi }}</h4>
                        <h4>{{ $cars-> no_seri }}</h4>   
                    </div>
                    <!-- <button type="submit" class="btn btn-md btn-outline-primary">BACK</button> -->

                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>