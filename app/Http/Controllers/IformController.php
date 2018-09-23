<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\IForm;
use App\Models\Category;

class IformController extends Controller
{
    public function index(){
        $iforms = IForm::all();
        return view('admin.iform.index')->with('iforms', $iforms);
    }

    public function add(){
        $categories = Category::all();
        return view('admin.iform.add')->with('categories', $categories);
    }

    public function add_post(Request $request){
        $size = sizeof($_REQUEST['label']);
        $result = array();
        for($i = 0; $i < $size; $i++){
            $item['label'] = $_REQUEST['label'][$i];
            $item['type'] = $_REQUEST['select'][$i];
            array_push($result, $item);
        }
        $iform = new IForm();
        $iform->name = $request->name;
        $iform->category_id = $request->category;
        $iform->save();
        $id = $iform->id;
        $iform->content = 'iform_'.$id.'.json';
        $iform->save();
        Storage::disk('local')->put($iform->content, json_encode($result));
        return Redirect::to(route('admin.iform.index'));
    }

    public function edit($id){
        $iform = IForm::find($id);
        $categories = Category::all();
        $content = Storage::disk('local')->get($iform->content);
        return view('admin.iform.edit')
            ->with('categories', $categories)
            ->with('iform', $iform)
            ->with('content', $content);
    }

    public function edit_post(Request $request){
        $iform = IForm::find($request->iform_id);
        $size = sizeof($_REQUEST['label']);
        $result = array();
        for($i = 0; $i < $size; $i++){
            $item['label'] = $_REQUEST['label'][$i];
            $item['type'] = $_REQUEST['select'][$i];
            array_push($result, $item);
        }
        $iform->name = $request->name;
        $iform->category_id = $request->category;
        $id = $iform->id;
        $iform->content = 'iform_'.$id.'.json';
        $iform->save();
        Storage::disk('local')->put($iform->content, json_encode($result));
        return Redirect::to(route('admin.iform.index'));
    }
}
