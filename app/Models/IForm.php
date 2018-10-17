<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IForm extends Model
{
    //
    protected $table = 'iforms';
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
