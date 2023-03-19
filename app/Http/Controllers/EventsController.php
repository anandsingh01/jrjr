<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventsController extends Controller
{
    public function index()
    {
        try {
            $events = Events::all();
            return view('frontend.events.list', compact('events'));
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }
}
