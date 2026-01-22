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
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('cars.update', $cars->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

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

                            <div class="form-group">
                                <label class="font-weight-bold">MERK</label>
                                <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk', $cars->merk) }}" placeholder="Masukkan Merk Mobil">
                            
                                <!-- error message untuk title -->
                                @error('merk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label class="font-weight-bold">TIPE</label>
                                <input type="text" class="form-control @error('tipe') is-invalid @enderror" name="tipe" value="{{ old('tipe', $cars->tipe) }}" placeholder="Masukkan Tipe Mobil">
                                
                                <!-- error message untuk title -->
                                @error('tipe')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">STOCK</label>
                                <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $cars->stock) }}" placeholder="Masukkan Stock Mobil">
                            
                                <!-- error message untuk title -->
                                @error('stock')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">WARNA</label>
                                <input type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" value="{{ old('warna', $cars->warna) }}" placeholder="Masukkan Warna Mobil">
                                
                                <!-- error message untuk title -->
                                @error('warna')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">     
                                <label for="status" class="form-label">STATUS :</label>
                                <br><input type="radio" name="status" value="tersedia" required="" /> TERSEDIA
                                <br><input type="radio" name="status" value="tidaktersedia" required="" /> TIDAK TERSEDIA
                            
                            <!-- error message untuk title -->
                            @error('status')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                            
                        <div class="form-group">
                            <label class="font-weight-bold">DESKRIPSI</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi', $cars->deskripsi) }}" placeholder="Masukkan Deskripsi Mobil">
                        
                            <!-- error message untuk content -->
                            @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label class="font-weight-bold">NO SERI</label>
                                <input type="text" class="form-control @error('no_seri') is-invalid @enderror" name="no_seri" value="{{ old('no_seri', $cars->no_seri) }}" placeholder="Masukkan No Seri Mobil">
                                
                                <!-- error message untuk title -->
                                @error('no_seri')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            

                            <button type="submit" class="btn btn-md btn-outline-primary">UPDATE</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>