<?php

namespace App\Http\Controllers;

use App\Models\CauseCategory;
use Exception;
use Illuminate\Http\Request;
use App\Models\CauseSubCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                $subcategories = CauseSubCategory::with('category')->paginate(10);
                return view('backend.admin.cause.subcategory.list', compact('subcategories'));
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
                $categories = CauseCategory::all();
                return view('backend.admin.cause.subcategory.create', compact('categories'));
            }

            return redirect()->route('admin-login')->withSuccess('Login details are not valid');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }
    public function store(Request $request)
    {
        try {
            $subcategory = CauseSubCategory::create([
                'category_id'  => $request->category,
                'sub_category'  => $request->sub_category,

            ]);
            return redirect()->route('admin-cause-sub-category-list')->with(['success' => 'Sub category created successfully']);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function edit($token)
    {

        try {
            if (Auth::check()) {
                $categories = CauseCategory::all();
                $subcategoryId = decrypt($token);
                $subcategory = CauseSubCategory::find($subcategoryId);
                return view('backend.admin.cause.subcategory.edit', compact('categories', 'subcategory'));
            }

            return redirect()->route('admin-login')->withSuccess('Login details are not valid');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function update(Request $request, $token)
    {
        try {

            $subcategoryId = decrypt($token);
            $subcategory = CauseSubCategory::find($subcategoryId);


            $subcategory = tap($subcategory)->update([
                'category_id'  => $request->category,
                'sub_category'  => $request->sub_category,

            ]);

            return redirect()->route('admin-cause-sub-category-list')->with(['success' => 'Sub category updated successfully']);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function delete($token)
    {
        try {
            $subcategoryId = decrypt($token);
            $subcategory = CauseCategory::find($subcategoryId);
            $subcategory->delete();
            return redirect()->route('admin-cause-category-list')->with(['success' => 'Sub category updated successfully']);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
