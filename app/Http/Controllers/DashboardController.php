<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use App\Models\CauseCategory;
use App\Models\CausePatient;
use App\Models\CauseSubCategory;
use App\Models\Media;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function dashboard($id = null)
    {
        if (Auth::check()) {
            if(Auth::user()->role == '1'){
                return view('layouts.dashboard');
            }else{

//                 $userid = decrypt($id);
                if (Auth::check()) {
                    return view('layouts.dashboard');
//                     $data['user_data'] = User::find($userid);
//                     $data['fundraiser'] = Cause::where('status','1')->with('causeImages', 'causeDocuments')->get();
//                     $data['donated_amount'] = Payment::with('getCauses')->where('donar_id',$userid)->get();
         //            print_r($data['donated_amount']);die;
//                     return view('backend.users.profile',$data);
// //                    return view('frontend.fund_users.dashboard',$data);
                }else{
                    return redirect('login');
                }
            }

        }

        return redirect()->route('admin-login')->withSuccess('Login details are not valid');
    }

    public function getFundraiser($id, $slug){
//        $id = base64_decode($id);
        $data['cause'] = Cause::with('causeImages','causeDocuments','causePatient','causeCategory','causeSubCategory')
            ->where('slug',$slug)
            ->first();
//        print_r($data['cause']);die;
        $data['categories'] = CauseCategory::all();
        $data['subcategories'] = CauseSubCategory::where('category_id',$data['cause']->category_id)->get();
//        print_r($data['subcategories']);die;
        return view('backend.cause.edit',$data);
    }

    public function edit(Request $request)
    {
//        print_r($request->all());die;


        try {
            DB::beginTransaction();
            $cause = Cause::find($request->id);

            if ($request->hasFile('image')) {
                $featureImage = $request->file('image');
                $destinationPath = 'cause/feature_images';
                $featureImageRename = rand(1,9999).rand(1,9999).'.'.$featureImage->getClientOriginalExtension();
                $featureImage->move($destinationPath, $featureImageRename );
                $uploadedFileName = $destinationPath.'/'.$featureImageRename;
                $cause->feature_image = $uploadedFileName;
            }

            $cause->cause_title  = $request->title ?? null;
//            $cause->slug = $urlSlug;
            $cause->category_id = $request->category ?? null;
            $cause->sub_category_id = $request->sub_category_id ?? null;
            $cause->cause_title = $request->title ?? null;
            $cause->date_by_when_you_need = $request->date_by_when_you_need ?? null;
            $cause->amount = $request->amount ?? null;
            $cause->cause_description = $request->description ?? null;

            $cause->raising_for_someone_else = $request->raising_for_someone_else ?? null;
            $cause->apply_terms = $request->apply_terms ?? null;
            $cause->status = 0;
            $cause->added_by = Auth::user()->id;

            $cause->save();

            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $document) {
                    $destinationPath = 'cause/documents';
                    $documentName = rand(1,999999).time().'.'.$document->getClientOriginalExtension();
                    $document->move($destinationPath, $documentName );
                    $uploadedDocuments = $destinationPath.'/'.$documentName;
                    Media::create([
                        'media_type' => Cause::class,
                        'media_id' => $cause->id,
                        'file' => $uploadedDocuments ?? NULL,
                        'field_name' => Cause::CAUSE_DOCUMENTS_MEDIA_FIELD_NAME
                    ]);
                }
            }

            if ($request->hasFile('gallery_images')) {

                foreach ($request->file('gallery_images') as $gallaryImage) {

                    $destinationPath = 'cause/other_images';
                    $galleryName = rand(1,999999).time().'.'.$gallaryImage->getClientOriginalExtension();
                    $gallaryImage->move($destinationPath, $galleryName );
                    $uploadedDocuments = $destinationPath.'/'.$galleryName;

                    Media::create([
                        'media_type' => Cause::class,
                        'media_id' => $cause->id,
                        'file' => $uploadedFileName ?? NULL,
                        'field_name' => Cause::CAUSE_IMAGES_MEDIA_FIELD_NAME
                    ]);
                }
            }

            $cause_patient = CausePatient::where('cause_id',$cause->id)->update([
                'cause_id' => $cause->id ?? null,
                'fname' => $request->f_name ?? null,
                'lname' => $request->l_name ?? null,
                'mobile_no' => $request->mobile ?? null,
                'whatapp_no' => $request->whatsapp ?? null,
                'email' => $request->email ?? null,
                'relation_with_patient' => $request->relation ?? null,
                'address' => $request->address,
                'locality' => $request->locality,
                'state' => $request->state,
                'city' => $request->city,
                'pincode' => $request->pincode,
            ]);

            DB::commit();

            return redirect()->route('cause-causes')->with(['success' => 'Cause added successfully']);
        } catch (Exception $e) {

            DB::rollBack();
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }

    function deleteFromGallery(Request $request){
        $delete = Media::where('id',$request->imageid)->delete();
        return response()->json(1);
    }

    function viewalldonars($id){
        if(!Auth::check()){
            return redirect('login');
        }
        $causeid = decrypt($id);
        $data['getAllPayments'] = Payment::leftJoin('users', 'payments.donar_id', '=', 'users.id')
        ->with('getCauses')
        ->where('cause_id',$causeid)->get();
        return view('backend.users.getPaymentHistory', $data);
    }

    function getlistFundraiser($id){
        $userid = decrypt($id);
        $data['fundraiser'] = Cause::where('added_by',$userid)->with('causeImages', 'causeDocuments')->get();
        return view('backend.users.fundraiserList',$data);
    }

    function getDonatedList($id){
        $userid = decrypt($id);
        $data['donated_amount'] = Payment::with('getCauses')->where('donar_id',$userid)->get();
        return view('backend.users.getDonatedLists',$data);
    }

    function view_fundraiser($id){
        $data['cause'] = Cause::with('causeImages','causeDocuments','causePatient','causeCategory','causeSubCategory')
            ->where('id',$id)
            ->first();
            // print_r($data);die;
        return view('backend.users.details',$data);
    }


    function profile($id){
        $userid = decrypt($id);
        $data['user_data'] = User::find($userid);
        $data['fundraiser'] = Cause::where('status','1')->with('causeImages', 'causeDocuments')->get();
        $data['donated_amount'] = Payment::with('getCauses')->where('donar_id',$userid)->get();
//        print_r($data['donated_amount']);die;
        return view('backend.users.profile',$data);
    }


    function search_by(Request $request){
        if(!empty($request->filter_category)){
            $getCategory  = CauseCategory::whereIn('category',$request->filter_category)->get();
            $getCategoryId = [];
            foreach ($getCategory as $catIdList){
                array_push($getCategoryId,$catIdList->id);
            }

            $causesCategory = CauseCategory::all();

            $causes = Cause::with('causeImages','causeDocuments','causePatient','causeCategory','causeSubCategory')
                ->where('category_id',$getCategoryId)
                ->where('status',1)
                ->get();

            return view('frontend.cause.causes', compact('causes','causesCategory'));
        }else{
            return redirect(url('cause/causes'));
        }

    }

    function search_by_city(Request $request){
//        print_r($request->all());
//        die;

        if(!empty($request->filter_city)){
//            $getCategory  = CauseCategory::whereIn('category',$request->filter_category)->get();
            $getCategory  = CausePatient::whereIn('city',$request->filter_city)->get();
            $getCategoryId = [];
            foreach ($getCategory as $catIdList){
                array_push($getCategoryId,$catIdList->cause_id);
            }

            $causesCategory = CauseCategory::all();

            $causes = Cause::with('causeImages','causeDocuments','causePatient','causeCategory','causeSubCategory')
                ->where('id',$getCategoryId)
                ->where('status',1)
                ->get();
//            print_r($causes);
//            die;

            return view('frontend.cause.causes', compact('causes','causesCategory'));
        }else{
            return redirect(url('cause/causes'));
        }
    }
}
