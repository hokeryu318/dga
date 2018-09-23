<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IForm;

class Equip extends Model
{
    //
    protected $table = 'equips';

    public function iform(){
        return $this->belongsTo(IForm::class);
    }
}
