<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Booking;

class Car extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
            'gambar',    
            'tipe',     
            'merk',      
            'stock',     
            'warna',     
            'status',
            'deskripsi' ,
            'no_seri'  
    ];
    
    public function bookings()
    {
    return $this->hasMany(bookings::class);
    }
}
