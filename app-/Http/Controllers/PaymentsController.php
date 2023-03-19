<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentsController extends Controller
{
    public function razorpay(Request $request)
    {
//        print_r($request->all());die;
        try {

            $data['amount'] = $request->amount  ?? null;
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
        // $input = $request->all();

        // //old code
        // // $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        // $api = new Api(env('key_id'), env('key_secret'));
        // $payment = $api->payment->fetch($input['razorpay_payment_id']);

        // if (count($input)  && !empty($input['razorpay_payment_id'])) {
        //     try {
        //         $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
        //         $order = Order::find($request->order_id);
        //         $order->payment_status = $response->status;
        //         $order->payment_reference = $input['razorpay_payment_id'];
        //         // $order->razorpay_order_id =  $input['razorpay_order_id'];
        //         $order->save();
        //         #$order_products = OrderProduct::where('order_id', $request->order_id);
        //         $order_products = DB::table('order_products')
        //             ->leftJoin('products', 'order_products.product_id', '=', 'products.id')
        //             ->where('order_products.order_id', '=', $order->id)
        //             ->get();
        //         foreach ($order_products as $o_product) {
        //             $product = Product::find($o_product->product_id);
        //             $product->stock = ($product->stock > 0 && $o_product->quantity < $product->stock) ? ($product->stock - $o_product->quantity) : 0;
        //             if ($product->stock == 0) {
        //                 $product->availability = 'sold-out';
        //             }
        //             $product->save();
        //         }
        //         $order->user_name = Auth::guard('customer')->user()->name;

        //         $shipping_address = CustomerAddress::where(['id' => $order->shipping_address_id, 'customer_id' => Auth::guard('customer')->user()->id])->first();
        //         $billing_address = CustomerAddress::where(['id' => $order->billing_address_id, 'customer_id' => Auth::guard('customer')->user()->id])->first();

        //         /*$order_products = DB::table('order_products')
        //             ->leftJoin('products', 'order_products.product_id', '=', 'products.id')
        //             ->where('order_products.order_id', '=', $order->id)
        //             ->get();*/

        //         $order->shipping_address = $shipping_address;
        //         $order->billing_address = $billing_address;
        //         $order->order_products = $order_products;

        //         Session::forget('cart');
        //         // Mail::to(Auth::guard('customer')->user()->email)->send(new OrderPlaced($order));
        //     } catch (\Exception $e) {
        //         return  $e->getMessage();
        //         Session::flash('error', $e->getMessage());
        //         return Redirect::route('orderdetails', [$request->order_id]);
        //     }
        // }

        // Session::flash('success', 'Payment successful!');
        // return Redirect::route('orderdetails', [$request->order_id]);
        dd($request->all());
    }
}
