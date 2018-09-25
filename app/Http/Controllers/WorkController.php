<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Work;
use App\Models\Worker;
use App\Models\Equip;

class WorkController extends Controller
{
    //
    public function index(){
        $works = Work::all();
        return view('admin.work.index')->with('works', $works);
    }

    public function add(){
        $equips = Equip::all();
        $workers = Worker::all();
        return view('admin.work.add')->with('equips', $equips)->with('workers', $workers);
    }

    public function edit($id){

    }

    public function add_post(Request $request){

    }

    public function edit_post(Request $request){

    }
}
