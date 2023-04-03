<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \App\Models\Hospital;
use \App\Models\Requirement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HospitalController extends Controller
{

    function login(){
        return view('backend.hospital_raisers.auth.login');
    }

    public function loginVerify(Request $request)
    {
        $checkHospitalAuth = Hospital::where('hospital_id',$request->hospital_id)
            ->where('password',$request->password)
            ->get();

        if(!empty($checkHospitalAuth)){
            Session::put('hospital_logged_in',$checkHospitalAuth);
            return redirect(url('hospital/dashboard/'.$request->hospital_id));
        }else{
            return redirect(url('hospital/login'));
        }

    }

    public function dashboard($id = null)
    {
        if(Session::has('hospital_logged_in')){
            $hospital_data = Session::get('hospital_logged_in');
            return view('layouts.dashboard',compact('hospital_data'));
        }
        return redirect(url('hospital/login'));
    }

    public function requirement_list($id){
        $data['hospital_data'] = Session::get('hospital_logged_in');
        $data['requirement'] = Requirement::where('hospital_id',$id)->get();
        return view('backend.hospital_raisers.requirement.index',$data);
    }

    public function requirement_create($id){
        $data['hospital_data'] = Session::get('hospital_logged_in');
        return view('backend.hospital_raisers.requirement.create',$data);
    }

    public function requirement_edit($hospitalid, $requirement_id){
        $data['hospital_data'] = Session::get('hospital_logged_in');
        $data['requirement_edit'] = Requirement::find($requirement_id);
        return view('backend.hospital_raisers.requirement.edit',$data);
    }

    public function requirement_delete($hospitalid, $requirement_id){
        $data['hospital_data'] = Session::get('hospital_logged_in');
        $requirement_delete = Requirement::find($requirement_id);
        $requirement_delete->delete();
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function requirement_save(Request $request){
//        print_r($request->all());die;
        $data['hospital_data'] = Session::get('hospital_logged_in');
        $requirement = new Requirement;
        $requirement->email = $request->email;
        $requirement->hospital_id = $request->hospital_id;
        $requirement->patient_name = $request->patient_name;
        $requirement->blood_group = $request->blood_group;
        $requirement->unit = $request->unit;
        $requirement->mobile = $request->mobile;
        $requirement->needed_by = $request->needed_by;
        $requirement->status = '1';

        if($requirement->save()){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','Requirement updated');
        }
    }

    public function requirement_update(Request $request){
        $data['hospital_data'] = Session::get('hospital_logged_in');
        $requirement = Requirement::find($request->id);
        $requirement->email = $request->email;
        $requirement->hospital_id = $request->hospital_id;
        $requirement->patient_name = $request->patient_name;
        $requirement->blood_group = $request->blood_group;
        $requirement->unit = $request->unit;
        $requirement->mobile = $request->mobile;
        $requirement->needed_by = $request->needed_by;

        if($requirement->save()){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','Requirement updated');
        }
    }

    public function requirement_view($hospitalid, $requirement_id){
        $data['hospital_data'] = Session::get('hospital_logged_in');
        $data['requirement_edit'] = Requirement::find($requirement_id);
        $data['requirement_view'] = User::where('blood_group',$data['requirement_edit']->blood_group)->get();
        return view('backend.hospital_raisers.requirement.view',$data);
    }

    /***
        Admin Hospital Access
     ***/

    public function all_requirement_list (){
        $data['hospital_data'] = Session::get('hospital_logged_in');
        $data['requirement'] = Requirement::get();
        return view('backend.admin.hospital_raisers.requirement.index',$data);
    }

    public function admin_blood_requirement_edit($hospitalid, $requirement_id){
        $data['hospital_data'] = Session::get('hospital_logged_in');
        $data['requirement_edit'] = Requirement::find($requirement_id);
        return view('backend.admin.hospital_raisers.requirement.edit',$data);
    }

    public function admin_blood_requirement_update(Request $request){
//        print_r($request->all());
//        die;
        $data['hospital_data'] = Session::get('hospital_logged_in');
        $requirement = Requirement::find($request->id);

        $requirement->arranged = $request->arranged;

        if($requirement->save()){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','Requirement updated');
        }
    }

    function hospitals_details($id){
        $data['data'] = Hospital::with('getRequirements')->find($id);
        return view('backend.admin.hospital_raisers.view_details',$data);
    }


}
