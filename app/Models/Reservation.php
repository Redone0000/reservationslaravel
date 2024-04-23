<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'booking_date',
        'status',
    ];

   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reservations';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function representationReservations()
    {
        return $this->hasMany(RepresentationReservation::class);
    }
}
