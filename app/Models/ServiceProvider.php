<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ServiceProvider extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

    public function types()
    {
        return $this->belongsToMany(ServiceProviderType::class, 'service_provider_type_pivot')->withTimestamps();
    }
}
