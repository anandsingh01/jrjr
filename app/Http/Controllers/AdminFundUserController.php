<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminFundUserController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (Auth::check()) {
                $fundusers = User::where('role','2')->paginate(10);
                return view('backend.admin.fund_user.list', compact('fundusers'));
            }

            return redirect()->route('admin-login')->withSuccess('Login details are not valid');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }

    function donors_list(){
        $payments = Payment::select('payments.*','users.fName as userFirstName',
            'users.lName as userLastName',
            'causes.cause_title as  causes_title')
            ->leftJoin('users','payments.donar_id','users.id')
            ->leftJoin('causes','payments.cause_id','causes.id')
            ->get();
        return view('backend.admin.fund_user.donors',compact('payments'));
    }
}
