<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participates extends Model
{
    use HasFactory;

    protected $primaryKey = [
        'event_id',
        'user_id'
    ];

    protected $fillable = [
        'event_id',
        'user_id',
        'present'
    ];

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('event_id', '=', $this->getAttribute('event_id'))
        ;
        return $query;
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'event_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}
