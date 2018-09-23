<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IForm;

class IformController extends Controller
{
    public function index(){
        $iforms = IForm::all();
        return view('admin.iform.index')->with('iforms', $iforms);
    }
}
