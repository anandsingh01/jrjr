<?php

namespace App\Http\Controllers;

use App\Models\FundUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
//use Session;
class FundUsersController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'number' => 'required|digits:10',
        ]);
        $FundUser_number = $request->number;

//        $Candidate = $request->session()->put('Number', $FundUser_number);

        $Candidate = Session::put('otp_number', $FundUser_number);

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => "https://2factor.in/API/V1/b3014f3e-2e06-11ea-9fa5-0200cd936042/SMS/$FundUser_number/AUTOGEN3",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
        }
        $response = json_decode($response);
//        print_r($response);die;

        $c = Session::put('funduser', $response->Details);

        return view('frontend.fund_users.verify_users');
    }
    public function verify(Request $request)
    {

        $getOtpForm = implode('',$request->otp);

//        print_r($getOtpForm);die;
        $c = Session::get('funduser');
//        print_r($c);die;

        $fund_user_number_sec = Session::get('otp_number');

        $otp = $request->otp;

        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => "https://2factor.in/API/V1/b3014f3e-2e06-11ea-9fa5-0200cd936042/SMS/VERIFY/$c/$getOtpForm",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response;
        }

//        print_r($response);die;
        $fund_user_response = json_decode($response);
        if ($fund_user_response->Status == 'Error') {
            session()->flash('messages', 'Invalid OTP, Please Enter Correct OTP');
//            return view('backend.fund_users.verify_users');
            return view('frontend.fund_users.verify_users');

        } else {
//            print_r($fund_user_number_sec);die;
            $fund_user = User::where('number', $fund_user_number_sec)
                ->where('status', '1')
                ->first();

            if (is_null($fund_user)) {
//                echo "is null";
//                die;
                session()->put($request->number);
                return redirect()->route('fund-users-create');
            } else {
                Auth::loginUsingId($fund_user->id);
                $fund_user_id = $fund_user->id;
//                session()->flush();
                session()->put('fund_user_id', $fund_user_id);
                session()->put($request->number);
                // session()->put('candidate_id', $candidate_id);
                // session()->forget('company_id');
                return redirect('/');
            }
        }
    }
    public function create(Request $request)
    {
        return view('frontend.fund_users.register');
    }
    public function store(Request $request)
    {
//        print_r($request->all());die;
        try {
            if(Session::has('otp_number')){
                $number =  Session::get('otp_number');
            }

            $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
            ]);

            $fandUser = new User();
            $fandUser->name = $request->fname;
            $fandUser->fName = $request->fname;
            $fandUser->lName = $request->lname;
            $fandUser->email = $request->email;
            $fandUser->blood_group = $request->blood_group;
            $fandUser->dob = $request->dob;
            $fandUser->address_1 = $request->address_1;
            $fandUser->address_2 = $request->address_2;
            $fandUser->city = $request->city;
            $fandUser->zipcode = $request->zipcode;
            $fandUser->number = $number;
            $fandUser->role = '2';
            $fandUser->status = 1;
            if ($fandUser->save()) {
                $credentials = User::where('number',$fandUser->number)->first();

                if( Auth::loginUsingId($credentials->id)){
                    Session::put('fund_user_id', $credentials->id);
                    return redirect('home');
                }else{
                    return redirect('home');
                }
            }

        } catch (\Exception $e) {
            print_r($e->getMessage());
            \Log::error($e);

//            return redirect()->back()->with(['message' => $e->getMessage()]);
        }
    }
}
