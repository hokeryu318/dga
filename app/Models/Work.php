<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $table = 'works';

    public function worker(){
        return $this->belongsTo(Worker::class, "worker_id");
    }

    public function equip(){
        return $this->belongsTo(Equip::class, "equip_id");
    }
}
