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
use Session;
class SettingsController extends Controller
{
    public function headerBanner()
    {
        try {
            $slider = Slider::get();
            return view("backend.admin.sliders.list",compact('slider'));
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

        if ($request->hasFile('image')) {
            $featureImage = $request->file('image');
            $destinationPath = 'banner';
            $featureImageRename = rand(1,9999).rand(1,9999).'.'.$featureImage->getClientOriginalExtension();
            $featureImage->move($destinationPath, $featureImageRename );
            $uploadedFileName = $destinationPath.'/'.$featureImageRename;

        }

        $slider = new Slider;
        $slider->image = $uploadedFileName;
        $slider->heading_one = $request->heading_one;
        $slider->heading_two = $request->heading_two;
        $slider->link = $request->link;
        $slider->status = '1';
        $slider->save();
        return redirect(url('admin/settings/header-banner'))->with(['success' => 'Cause added successfully']);

    }

    function deleteBannner($id){
        $deleteBanner = Slider::where('id',$id)->delete();
        Session::flash('deleted','Banner Slider Delete');
        return redirect($_SERVER['HTTP_REFERER']);
    }

    function slider_edit($id){
        $data['slider'] = Slider::find($id);
        return view('backend.admin.sliders.edit',$data);
    }
    function slider_update(Request $request){
        $slider = Slider::find($request->id);

        if ($request->hasFile('image')) {
            $featureImage = $request->file('image');

            $destinationPath = 'banner';
            $featureImageRename = rand(1,9999).rand(1,9999).'.'.$featureImage->getClientOriginalExtension();
            $featureImage->move($destinationPath, $featureImageRename );
            $uploadedFileName = $destinationPath.'/'.$featureImageRename;
            $slider->image = $uploadedFileName;

        }

        $slider->heading_one = $request->heading_one;
        $slider->heading_two = $request->heading_two;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->save();

        return redirect(url('admin/settings/header-banner'))->with(['success' => 'Cause added successfully']);

    }
}
