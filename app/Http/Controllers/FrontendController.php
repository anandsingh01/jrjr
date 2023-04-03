<?php

namespace App\Http\Controllers;

use App\Models\Cause;
use App\Models\CauseSubCategory;
use App\Models\Events;
use App\Models\Hospital;
use App\Models\FundUser;
use App\Models\Payment;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home()
    {
        $causes = Cause::orderBy('created_at', 'asc')->take(3)->get();
        $events = Events::orderBy('created_at', 'asc')->take(3)->get();
        $sliders = Slider::where('status','1')->orderBy('created_at', 'asc')->take(3)->get();

        return view('frontend.index', compact('causes', 'events','sliders'));
        // $fandUser = FundUser::where('status', '1')->where('id', session()->get('candidate_id'))->first();
//        return view('frontend.index');
    }
    // public function causes()
    // {
    //     return view('frontend.cause.causes');
    // }
    public function causes_details()
    {
        return view('frontend.causes_details');
    }
    public function events()
    {
        return view('frontend.events');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function about()
    {
        return view('frontend.about');
    }





    // blood doner
    public function blood_doner_add()
    {
        return view('backend.blood_doners.add');
    }
    public function blood_doner_edit()
    {
        return view('backend.blood_doners.edit');
    }
    public function blood_doner_manage()
    {
        return view('backend.blood_doners.manage');
    }
    public function blood_doner_view()
    {
        return view('backend.blood_doners.view');
    }




    // fund doner
    public function fund_doner_add()
    {
        return view('backend.fund_doners.add');
    }
    public function fund_doner_edit()
    {
        return view('backend.fund_doners.edit');
    }
    public function fund_doner_manage()
    {
        return view('backend.fund_doners.manage');
    }
    public function fund_doner_view()
    {
        return view('backend.fund_doners.view');
    }



    // fund raisers
    public function fund_raiser_add()
    {
        return view('backend.fundraisercategory.add');
    }
    public function fund_raiser_edit()
    {
        return view('backend.fundraisercategory.edit');
    }
    public function fund_raiser_manage()
    {
        return view('backend.fundraisercategory.manage');
    }
    public function fund_raiser_view()
    {
        return view('backend.fundraisercategory.view');
    }




    // fund raiser category
    public function fund_raisers_add()
    {
        return view('backend.fundraisers.add');
    }
    public function fund_raisers_edit()
    {
        return view('backend.fundraisers.edit');
    }
    public function fund_raisers_manage()
    {
        return view('backend.fundraisers.manage');
    }
    public function fund_raisers_view()
    {
        return view('backend.fundraisers.view');
    }



    // hospital raisers
    public function hospital_raisers_add()
    {
        if (Auth::check()) {
            if(Auth::user()->role == '1'){
                return view('backend.hospital_raisers.add');
            }else{
                return abort(403);
            }
        }else{
            return redirect('admin/login');
        }

    }
    public function hospital_raisers_edit()
    {
        return view('backend.hospital_raisers.edit');
    }
    public function hospital_raisers_manage()
    {
        return view('backend.hospital_raisers.manage');
    }
    public function hospital_raisers_view()
    {

    }




    // hospitals
    public function hospitals_add()
    {
        return view('backend.hospitals.add');
    }


    public function hospitals_edit($id)
    {
        $data['data'] = Hospital::find($id);
        return view('backend.hospitals.edit',$data);
    }
    public function hospitals_manage()
    {
        return view('backend.hospitals.manage');
    }
    public function hospitals_view()
    {
        $data['hospital'] = Hospital::get();
        return view('backend.hospitals.view',$data);
    }

    public function hospitals_save(Request $request)
    {
        $hospital_save = new Hospital();
        $hospital_save->hospital_id = $request->hospital_id;
        $hospital_save->hospital_name = $request->hospital_name;
        $hospital_save->hospital_address = $request->hospital_address;
        $hospital_save->hospital_landline = $request->hospital_landline;
        $hospital_save->hospital_no = $request->hospital_no;
        $hospital_save->password = $request->password;

        $hospital_save->save();
        return redirect(url('admin/hospitals-view'));
    }

    public function hospitals_update(Request $request)
    {
        $hospital_save = Hospital::find($request->id);
        $hospital_save->hospital_id = $request->hospital_id;
        $hospital_save->hospital_name = $request->hospital_name;
        $hospital_save->hospital_address = $request->hospital_address;
        $hospital_save->hospital_landline = $request->hospital_landline;
        $hospital_save->hospital_no = $request->hospital_no;
        $hospital_save->password = $request->password;

        $hospital_save->save();
        return redirect(url('admin/hospitals-view'));
    }


    // hospitals
    public function my_fundraisers_add()
    {
        return view('backend.my_fundraisers.add');
    }
    public function my_fundraisers_edit()
    {
        return view('backend.my_fundraisers.edit');
    }
    public function my_fundraisers_manage()
    {
        return view('backend.my_fundraisers.manage');
    }
    public function my_fundraisers_view()
    {
        return view('backend.my_fundraisers.view');
    }



    // settings
    public function settings_add()
    {
        return view('backend.settings.add');
    }
    public function settings_edit()
    {
        return view('backend.settings.edit');
    }
    public function settings_manage()
    {
        return view('backend.settings.manage');
    }
    public function settings_view()
    {
        return view('backend.settings.view');
    }
    public function settings_marque()
    {
        return view('backend.settings.marque');
    }
    public function settings_footer()
    {
        return view('backend.settings.footer');
    }



    // sips
    public function sip_add()
    {
        return view('backend.sips.add');
    }
    public function sip_edit()
    {
        return view('backend.sips.edit');
    }
    public function sip_manage()
    {
        return view('backend.sips.manage');
    }
    public function sip_view()
    {
        return view('backend.sips.view');
    }

    function getcauseSubcat(Request $request){
        $subcategories = CauseSubCategory::where('category_id',$request->cat_id)->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }


}
