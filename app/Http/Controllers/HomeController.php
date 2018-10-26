<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Equip;
use App\Models\Worker;
use App\Models\Work;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Redirect::to(route('admin.dashboard'));
    }

    public function dashboard(){
        $equipCount = Equip::count();
        $workerCount = Worker::count();
        $workmcount = Work::where('status', '!=', '1')->count();
        $workfcount = Work::where('status', '1')->count();
        return view('admin.dashboard')
            ->with('equipct', $equipCount)
            ->with('workerct', $workerCount)
            ->with('workmcount', $workmcount)
            ->with('workfcount', $workfcount);
    }
}
