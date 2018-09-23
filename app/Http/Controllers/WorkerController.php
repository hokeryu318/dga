<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Worker;
use App\Models\Area;

class WorkerController extends Controller
{
    //
    public function index(){
        $workers = Worker::all();
        return view('admin.worker.index')->with('workers', $workers);
    }

    public function add(){
        $areas = Area::all();
        return view('admin.worker.add')->with('areas', $areas);
    }

    public function add_post(Request $request){
        // $area = new Area();
        // $area->name = $request->areaname;
        // $area->parent_id = $request->parent;
        // $area->save();
        // return Redirect::to(route('admin.area.index'));
        $worker = new Worker();
        $worker->name = $request->name;
        $worker->area_id = $request->area;
        $worker->save();
        return Redirect::to(route('admin.worker.index'));
    }

    public function edit($id){
        $areas = Area::all();
        $worker = Worker::find($id);
        return view('admin.worker.edit')
            ->with('obj', $worker)
            ->with('areas', $areas);
    }

    public function edit_post(Request $request){
        $worker = Worker::find($request->worker_id);
        $worker->name = $request->name;
        $worker->area_id = $request->area;
        $worker->save();
        return Redirect::to(route('admin.worker.index'));
    }
}
