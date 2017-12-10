<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Property;

class Tenant extends Model
{
    protected $guarded = [];

    public function property()
    {
        return $this->hasOne(Property::class, 'property_id');
    }
}
