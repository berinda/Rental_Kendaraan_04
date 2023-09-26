<?php

namespace App\Models;
use App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Booking extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
            'nama_customer',    
            'nik',     
            'merk',     
            'tanggal_pesan',     
            'tanggal_kembali',
            'jumlah' ,
            'gambar' ,
            'CarId'
    ];
       
    public function Car()
    {
    return $this->belolngsTo(cars::class, 'CarId');
    }
}