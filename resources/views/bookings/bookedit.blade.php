<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Rent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: #D27685">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            
                            <div class="form-group">
                                <label class="font-weight-bold">NAMA CUSTOMER</label>
                                <input type="text" class="form-control @error('nama_customer') is-invalid @enderror" name="nama_customer" value="{{ old('nama_customer') }}" placeholder="Masukkan Nama Customer">
                            
                                <!-- error message untuk title -->
                                @error('nama_customer')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label class="font-weight-bold">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK Customer">
                                
                                <!-- error message untuk title -->
                                @error('nik')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">MERK</label>
                                <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk') }}" placeholder="Masukkan Merk Mobil">
                                
                                <!-- error message untuk title -->
                                @error('merk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="font-weight-bold">TANGGAL PESAN</label>
                                    <input type="date" class="form-control @error('tanggal_pesan') is-invalid @enderror" name="tanggal_pesan" value="{{ old('tanggal_pesan') }}" placeholder="Masukkan Tanggal Pesan">
                                    
                                    <!-- error message untuk title -->
                                    @error('tanggal_pesan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL KEMBALI</label>
                                <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}" placeholder="Masukkan Tanggal Kembali">
                                
                                <!-- error message untuk title -->
                                @error('tanggal_kembali')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">JUMLAH</label>
                                <textarea class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" rows="5" placeholder="Masukkan Jumlah Sewa Mobil">{{ old('jumlah') }}</textarea>
                                
                                <!-- error message untuk content -->
                                @error('jumlah')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                            
                                <!-- error message untuk title -->
                                @error('gambar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
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
</script>
</body>
</html>