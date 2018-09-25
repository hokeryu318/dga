<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    //
    protected $table = 'workers';
    public function area(){
        return $this->belongsTo(Area::class, "area_id");
    }
}
