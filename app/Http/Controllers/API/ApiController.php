<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Services\WorkService;

class ApiController extends Controller
{
    //
    public $successStatus = 200;

    public function __construct()
    {
        
    }

    public function logout(){
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
         }
    }
    
    public function get_upcoming_works(Request $request){
        return response()->json(WorkService::upcomingWork($request->day));
    }

    public function get_category_from_equip(Request $request){
        return response()->json(WorkService::category($request->equip));
    }

    public function get_equip_detail(Request $request){
        return WorkService::equipdetail($request->equip);
    }
}
