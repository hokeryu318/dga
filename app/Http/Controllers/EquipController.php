<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Equip;
use App\Models\IForm;

class EquipController extends Controller
{
    //
    public function index()
    {
        $equips = Equip::all();
        return view('admin.equip.index')->with('equips', $equips);
    }

    public function add(){
        $iforms = IForm::all();
        return view('admin.equip.add')->with('iforms', $iforms);
    }

    public function add_post(Request $request){
        $size = sizeof($_REQUEST['label']);
        $result = array();
        for($i = 0; $i < $size; $i++){
            $result[$_REQUEST['label'][$i]] = $_REQUEST['value'][$i];
        }
        $equip = new Equip();
        $equip->name = $request->name;
        $equip->iform_id = $request->iform;
        $equip->save();
        $id = $equip->id;
        $equip->content = 'equip_'.$id.'.json';
        $equip->save();
        Storage::disk('local')->put($equip->content, json_encode($result));
        return Redirect::to(route('admin.equip.index'));
    }

    public function edit($id){
        $equip = Equip::find($id);
        $iforms = IForm::all();
        $content = Storage::disk('local')->get($equip->content);
        // dd($content);
        return view('admin.equip.edit')->with('equip', $equip)->with('content', $content)->with('iforms', $iforms);
    }

    public function edit_post(Request $request){
        $size = sizeof($_REQUEST['label']);
        $equip = Equip::find($request->equip_id);
        $content = Storage::disk('local')->get($equip->content);
        $result = json_decode($content, true);
        for($i = 0; $i < $size; $i++){
            $result[$_REQUEST['label'][$i]] = $_REQUEST['value'][$i];
        }
        $equip->name = $request->name;
        $equip->iform_id = $request->iform;
        $equip->save();
        $equip->content = 'equip_'.$equip->id.'.json';
        Storage::disk('local')->put($equip->content, json_encode($result));
        return Redirect::to(route('admin.equip.index'));
    }

    public function csv(){
        return view('admin.equip.csv');
    }

    public function csvpost(Request $request){
        $file = $request->file('file-input');
        $csv = file_get_contents($file);
        // dd($csv);
        // $csv = str_replace(PHP_EOL, '', $csv);
        $lines = explode(PHP_EOL, $csv);
        $lineCt = count($lines);
        $headers = explode(',', $lines[0]);
        $headerCt = count($headers);
        $result = array();
        for($i = 1; $i < $lineCt; $i++){
            if($lines[$i] == '') continue;
            $values = explode(',', $lines[$i]);
            $item = array();
            for($j = 0; $j < $headerCt; $j++){
                $item[$headers[$j]] = $values[$j];
            }
            $equip = new Equip();
            $equip->name = "Equipment".$i;
            $equip->iform_id = 1;
            $equip->save();
            $equip->content = "equip_".$equip->id.".json";
            $equip->save();
            Storage::disk('local')->put($equip->content, json_encode($item));
        }
        return Redirect::to(route('admin.equip.csv'));
    }
}
