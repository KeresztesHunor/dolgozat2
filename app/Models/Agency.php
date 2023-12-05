<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'type'
    ];

    public function event()
    {
        return $this->hasMany(Event::class, 'agency_id', 'agency_id');
    }
}
