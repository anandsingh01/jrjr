<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use App\Models\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminCausesController extends Controller
{
    public function index()
    {
        try {
            $causes = Cause::with('causeCategory','causeSubCategory','causeImages', 'causeDocuments')
                ->orderBy('id','DESC')->paginate(10);
            return view('backend.admin.causes.list', compact('causes'));
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }

    public function show($id){
        try {
            $cause = Cause::with('getdonatedamount','causeCategory','causeSubCategory','causePatient','causeImages','causeDocuments')->find($id);
//             print_r($cause);die;
            return view('backend.admin.causes.details', compact('cause'));
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }

    public function changeFundraiserStatus(Request $request){
        $cause = Cause::find($request->id);
        $cause->status = $request->status;
        if($cause->save()){
            return redirect()->back()->with(['success' => 'Status Updated']);
        }
    }

    public function delete_fundraiser_row(Request $request){
        $causes = Cause::where('id',$request->id)->delete();
        $deleteMedia = Media::where('media_id',$request->id)->delete();
        return json_encode(array('status' => 1));

    }
}
