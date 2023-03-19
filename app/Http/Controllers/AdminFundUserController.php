<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\FundUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminFundUserController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (Auth::check()) {
                $fundusers = FundUser::paginate(10);
                return view('backend.admin.fund_user.list', compact('fundusers'));
            }

            return redirect()->route('admin-login')->withSuccess('Login details are not valid');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }
}
