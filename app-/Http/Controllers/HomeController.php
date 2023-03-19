<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use App\Models\Events;
use App\Models\Slider;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function home(Request $request)
    {
        try {
            $causes = Cause::orderBy('created_at', 'asc')->take(3)->get();
            $events = Events::orderBy('created_at', 'asc')->take(3)->get();
            $sliders = Slider::where('status','1')->orderBy('created_at', 'asc')->take(3)->get();

            return view('frontend.index', compact('causes', 'events','sliders'));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    function login(){
        if(Auth::check()){
            return redirect('/');
        }else{
            return view('frontend.login');
        }
    }
}
