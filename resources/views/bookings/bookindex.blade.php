@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent Car</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: #D27685">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">RENT CAR</h3>      
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="card border-0 shadow-sm rounded">
                            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                        <!-- Navbar content -->
                                        <a href="{{ route('bookings.create') }}" class="btn btn-outline-danger">TAMBAH</a>
                                        
                                      </ul>
                                    </nav>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                  <th scope="col">Gambar</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Nik</th>
                                <th scope="col">Merk</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($bookings as $booking)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/bookings/'.$booking->gambar) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $booking-> nama_customer }}</td>
                                    <td>{{ $booking-> nik }}</td>
                                    <td>{{ $booking-> merk }}</td>
                                    <td>{{ $booking-> tanggal_pesan }}</td>
                                    <td>{{ $booking-> tanggal_kembali }}</td>
                                    <td>{{ $booking-> jumlah }}</td>
                                    <td>{{ $booking-> Car-> tipe }}</td>

                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                            <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $bookings->links() }}
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
@endsection
</body>
</html>