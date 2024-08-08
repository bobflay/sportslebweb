<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function isActive()
    {
        $subscriptions = $this->subscriptions;
        foreach ($subscriptions as $subscription) {
            if ($subscription->remaining_days > 0) {
                return true;
            }
        }
        return false;
    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPhotoAttribute($photo)
    {
        if (request()->is('api/*')) {
            return 'https://threesixty.xpertbotacademy.online/storage/'.$photo;
        }

        // For non-API requests, return the normal value
        return $photo;
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function createorUpdate($deviceData)
    {
        // Check if the device with the provided device_id already exists
        $device = $this->devices()->where('device_id', $deviceData['device_id'])->first();

        if ($device) {
            // If the device exists, update its attributes
            $device->update($deviceData);
            return $device;
        } else {
            // If the device doesn't exist, create a new one
            return $this->devices()->create($deviceData);
        }
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
