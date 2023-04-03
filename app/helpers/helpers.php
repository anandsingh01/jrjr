<?php

use App\Models\Payment;

function getReceivedAmount($id, $get_amount_needed){
    $sumamount = \App\Models\Payment::where('cause_id',$id)->sum('amount');
    $amount = $sumamount * 100 / $get_amount_needed;
    return $amount;
}

function sumOfReceivedAmount($id){
    $sumamount = \App\Models\Payment::where('cause_id',$id)->sum('amount');
    return $sumamount;
}

function getTotalUser($id){
    $usercount = \App\Models\Payment::where('cause_id',$id)->count();
    return $usercount;
}
function getTotalPaymentDetails($id){
    $usercount = \App\Models\Payment::where('cause_id',$id)->get();
    return $usercount;
}

function getAllCategories(){
    $categories = \App\Models\CauseCategory::get();
    return $categories;
}

function getAllCities(){
    $city = \App\Models\City::get();
    return $city;
}

function getTopDonor($causeid){
    $donated_amount = Payment::select('payments.*','users.name as donor_name')
        ->leftJoin('users','payments.donar_id','=','users.id')
        ->orderBy('payments.amount','DESC')
        ->where('cause_id',$causeid)
        ->get();

//    print_r($donated_amount);
//    die;

    return $donated_amount;
}

function getRecentDonor($causeid){
    $recentDonor = Payment::select('payments.*','users.name as donor_name')
        ->leftJoin('users','payments.donar_id','=','users.id')
        ->orderBy('payments.amount','DESC')
        ->where('cause_id',$causeid)
        ->get();

    return $recentDonor;
}

function getBloodRequirement(){
    $bloodCount = \App\Models\Requirement::where('status',1)->count();
    return $bloodCount;
}

