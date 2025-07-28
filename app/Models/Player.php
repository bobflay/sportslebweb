<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'team_id',
        'first_name',
        'last_name',
        'position',
        'number',
        'photo_url',
        'date_of_birth'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'number' => 'integer'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Set the photo URL attribute
     *
     * @param  string  $value
     * @return void
     */
    public function setPhotoUrlAttribute($value)
    {
        if (!$value) {
            $this->attributes['photo_url'] = null;
            return;
        }

        // If it's a full URL, extract just the path after storage/
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            $parsed = parse_url($value);
            $path = $parsed['path'] ?? '';
            
            // Remove /storage/ prefix if present
            if (str_starts_with($path, '/storage/')) {
                $value = substr($path, 9); // Remove '/storage/'
            }
        }

        $this->attributes['photo_url'] = $value;
    }

    /**
     * Get the photo URL attribute
     *
     * @param  string  $value
     * @return string
     */
    public function getPhotoUrlAttribute($value)
    {
        if (!$value) {
            return null;
        }

        // If it's already a full URL, return as is
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        // If it starts with 'storage/', prepend the app URL
        if (str_starts_with($value, 'storage/')) {
            return config('app.url') . '/' . $value;
        }

        // Otherwise, prepend app URL and storage path
        return config('app.url') . '/storage/' . $value;
    }
}
