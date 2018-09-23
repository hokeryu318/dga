<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Worker;

class Area extends Model
{
    //
    protected $table = 'areas';

    public function workers(){
        return $this->hasMany(Worker::class, 'area_id');
    }

    public function children(){
        
    }
}
