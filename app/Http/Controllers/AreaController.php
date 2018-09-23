<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Area;

class AreaController extends Controller
{
    //
    public function index(){
        $areas = Area::where('parent_id', '0')->orWhere('parent_id', null)->get();
        return view('admin.area.index')->with('areas', $areas);
    }

    public function list($id){
        $areas = Area::where('parent_id', $id)->get();
        return view('admin.area.index')->with('areas', $areas);
    }

    public function add(){
        $areas = Area::all();
        return view('admin.area.add')->with('parents', $areas);
    }

    public function add_post(Request $request){
        $area = new Area();
        $area->name = $request->areaname;
        $area->parent_id = $request->parent;
        $area->save();
        return Redirect::to(url('admin/area/list/'.$request->parent));
    }

    public function edit($id){
        $areas = Area::where('id', '<>', $id)->get();
        $area = Area::find($id);
        return view('admin.area.edit')
            ->with('obj', $area)
            ->with('parents', $areas);
    }

    public function edit_post(Request $request){
        $area = Area::find($request->area_id);
        $area->name = $request->areaname;
        $area->parent_id = $request->parent;
        $area->save();
        return Redirect::to(url('admin/area/list/'.$request->parent));
    }
}
