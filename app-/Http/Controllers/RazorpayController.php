<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use Session;
use Redirect;
use App\Models\DonateFund;
use Auth;
class RazorpayController extends Controller
{
    public function razorpay(Request $request)
    {
        try {
            $data['amount'] = $request->amount ?? null;
            $data['name'] = $request->name ?? null;
            $data['email'] = $request->email ?? null;
            $data['number'] = $request->number ?? null;
            $data['address'] = $request->address ?? null;
            $data['fundraiser_title'] = $request->fundraiser_title ?? null;
            $data['fundraiser_id'] = $request->fundraiser_id ?? null;
            return view('frontend.payments.razorpay_payment', $data);
        } catch (Exception $e) {
            dd($e->getMessage());
            Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function payment(Request $request)
    {
//        print_r($request->all());die;
        $input = $request->all();
        $api = new Api('rzp_test_ZB8GMwDqEm40nX', 'lI2c1QX2hJWWXYERboK8IQL7');

        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        $donatefund = new Payment;
        if(Auth::check()){
            $userid = Auth::user()->id;
        }else{
            $userid = $payment['contact'];
        }
//        print_r($payment);die;
        $donatefund->order_id = '#JR'.rand(11111,99999);
        $donatefund->payment_id = $payment['id'];
        $donatefund->amount = $payment['amount'];
        $donatefund->cause_id = $payment['description'];
        $donatefund->contact = $payment['contact'];
        $donatefund->email = $payment['email'];
        $donatefund->payment_status = $payment['status'];
        $donatefund->payment_reference = $payment['method'];
        $donatefund->razorpay_order_id = $payment['id'];
        $donatefund->payment_method = $payment['method'];
        $donatefund->card_id = $payment['card_id'];
        $donatefund->bank = $payment['bank'];
        $donatefund->wallet = $payment['wallet'];
        $donatefund->vpa = $payment['vpa'];
        $donatefund->customer_ip = \Request::ip();
        $donatefund->donar_id = $userid;
        if($donatefund->save()){
            \Session::put('recent_payment_details',$payment);
            \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
            return redirect(url('/payment-response'));
        }else{
            \Session::put('danger', 'Payment successful, your order will be despatched in the next 48 hours.');
            return redirect(url('/payment-response'));
        }
        die;

        \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        return redirect()->back();
    }

    function payment_response(Request $request){
        if(Session::has('recent_payment_details')){
            $getPaymentDetails = Session::get('recent_payment_details');
            return view('frontend.payments.payment_response',compact('getPaymentDetails'));
        }else{
            $somethingWentWrong = 'Something went wrong';
            return view('frontend.payments.payment_response',compact('somethingWentWrong'));
        }
//        print_r($request->all());
    }
}
