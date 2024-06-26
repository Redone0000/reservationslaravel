<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
    ];
    public $table = 'types';
    public $timestamps = false;

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }
}
