<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use App\Models\IForm;

class Category extends Model
{
    //
    protected $table = 'categories';

    public function iforms(){
        return $this->hasMany(IForm::class, 'category_id');
    }
}
