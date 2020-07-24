<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProviderType::class);
    }
}
