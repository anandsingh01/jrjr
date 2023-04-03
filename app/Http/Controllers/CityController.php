<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\City;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                $city = City::paginate(10);
                return view('backend.admin.city.list', compact('city'));
            }

            return redirect()->route('admin-login')->withSuccess('Login details are not valid');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }

    public function create()
    {
        try {
            if (Auth::check()) {
                return view('backend.admin.city.create');
            }

            return redirect()->route('admin-login')->withSuccess('Login details are not valid');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }
    public function store(Request $request)
    {
        $city = new City();
        $city->city = $request->city;
        $city->status = 1;
        $city->save();
        return redirect()->route('admin-city-list')->with(['success' => 'Category created successfully']);

    }
    public function edit($token)
    {

        try {
            if (Auth::check()) {
                $categoryId = decrypt($token);
                $category = City::find($categoryId);
                return view('backend.admin.city.edit', compact('category'));
            }

            return redirect()->route('admin-login')->withSuccess('Login details are not valid');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function update(Request $request, $token)
    {
//        print_r($token);die;
        try {

            $categoryId = decrypt($token);
            $city = City::find($categoryId);
            $city->city = $request->city;
            $city->status = 1;
            $city->save();
            return redirect()->route('admin-city-list')->with(['success' => 'Category created successfully']);

//            print_r($category);die;
//
//
//            $category = tap($category)->update([
//                'city' => $request->category,
//            ]);

//            return redirect()->route('admin-city-list')->with(['success' => 'Category updated successfully']);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function delete($token)
    {
        try {
            $categoryId = decrypt($token);
            $category = City::find($categoryId);
            $category->delete();
            return redirect()->route('admin-city-list')->with(['success' => 'Category updated successfully']);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
