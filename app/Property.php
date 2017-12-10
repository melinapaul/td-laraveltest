<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Tenant;

class Property extends Model
{
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function tenants()
    {	
        return $this->hasMany(Tenant::class);
    }
}
