<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use App\Models\CauseCategory;
use App\Models\HeaderBanner;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
{
    public function headerBanner()
    {
        try {
            return view("backend.admin.sliders.create");
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function headerBannerSave(Request $request)
    {
        try {
            $data = HeaderBanner::first();
            if ($data) {

                $data = HeaderBanner::find($data->id);
                $data->header_text = $request->header_banner;
                $data->save();
            } else {
                $data = new HeaderBanner();
                $data->header_text = $request->header_banner;
                $data->save();
            }
            return redirect()->route('admin-settings-header-banner')->with(['success' => 'Header Banner Updated successfully']);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    function sliders(){
        try {
            $slider = Slider::all();
            return view('backend.admin.sliders.list', compact('slider'));
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }

    function slider_create(){
        return view('backend.admin.sliders.create');
    }

    function slider_save(Request $request){
//        print_r($request->all());die;

        if ($request->hasFile('image')) {
            $featureImage = $request->file('image');
            $destinationPath = 'banner';
            $featureImageRename = rand(1,9999).rand(1,9999).'.'.$featureImage->getClientOriginalExtension();
            $featureImage->move($destinationPath, $featureImageRename );
            $uploadedFileName = $destinationPath.'/'.$featureImageRename;

            $cause = Slider::create([
                'image' => $uploadedFileName,
                'status' => 0
            ]);
            return redirect(url('admin/dashboard/header-home-slider-Create'))->with(['success' => 'Cause added successfully']);

        }else{
            return redirect(url('admin/dashboard/header-home-slider-Create'))->with(['success' => 'Cause added successfully']);

        }





    }
}
