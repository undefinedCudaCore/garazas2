<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    public function mechanicTrucks()
    {
        return $this->hasMany('App\Truck', 'mechanic_id', 'id');
    }
 
}
