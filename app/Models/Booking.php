<?php

namespace App\Models;

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
            'gambar' ,
            'nama_customer',    
            'nik',     
            'merk',     
            'tanggal_pesan',     
            'tanggal_kembali',
            'jumlah' ,
            'CarId'
    ];
       
    public function Car()
    {
    return $this->BelongsTo(Car::class, 'CarId');
    }
}