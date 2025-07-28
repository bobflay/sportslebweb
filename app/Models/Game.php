<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Game extends Model
{
    protected $fillable = [
        'title',
        'date_time',
        'location_name',
        'location_latitude',
        'location_longitude',
        'broadcasted_on',
        'broadcast_link',
        'description',
        'status',
        'score_json'
    ];

    protected $casts = [
        'date_time' => 'datetime',
        'score_json' => 'array',
        'location_latitude' => 'decimal:7',
        'location_longitude' => 'decimal:7'
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'game_team');
    }

    /**
     * Set the date_time attribute with proper formatting
     *
     * @param  string  $value
     * @return void
     */
    public function setDateTimeAttribute($value)
    {
        $this->attributes['date_time'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
