<?php

namespace App\Services;

use App\Models\Work;
use App\Models\Worker;
use App\Models\Category;
use App\Models\Equip;
use App\Models\IForm;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WorkService
{
    public static function upcomingWork($day){
        $now = Carbon::now()->format('Y-m-d');
        $till = Carbon::now()->addDays($day)->format('Y-m-d');
        return Work::where('plan_at', '>=', $now)->where('plan_at', '<=', $till)->where('worker_id', Auth::id())->with('equip')->get();
    }

    public static function category($equipid){
        $equip = Equip::find($equipid);
        return $equip->iform->category;
    }

    public static function equipdetail($equipid){
        $equip = Equip::find($equipid);
        $content = Storage::disk('local')->get($equip->content);
        return $content;
    }
}