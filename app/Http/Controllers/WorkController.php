<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        $work = Work::find($id);
        $equips = Equip::all();
        $workers = Worker::all();
        return view('admin.work.edit')
            ->with('work', $work)
            ->with('equips', $equips)
            ->with('workers', $workers);
    }

    public function add_post(Request $request){
        $work = new Work();
        $work->name = $request->name;
        $work->worker_id = $request->worker;
        $work->equip_id = $request->equip;
        $work->plan_at = $request->date;
        $work->save();
        return Redirect::to(route('admin.work.index'));
    }

    public function edit_post(Request $request){
        $work = Work::find($request->work_id);
        $work->name = $request->name;
        $work->worker_id = $request->worker;
        $work->equip_id = $request->equip;
        $work->plan_at = $request->date;
        $work->save();
        return Redirect::to(route('admin.work.index'));
    }
}
