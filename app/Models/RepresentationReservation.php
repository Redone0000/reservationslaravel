<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentationReservation extends Model
{
    use HasFactory;

    protected $table = 'representation_reservation';

    protected $fillable = [
        'representation_id',
        'reservation_id',
        'price_id',
        'quantity',
    ];

    public $timestamps = false;


    public function representation()
    {
        return $this->belongsTo(Representation::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
