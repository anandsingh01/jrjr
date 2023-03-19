<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CauseCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                $categories = CauseCategory::paginate(10);
                return view('backend.admin.cause.category.list', compact('categories'));
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
                return view('backend.admin.cause.category.create');
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
            $category = CauseCategory::create([
                'category'  => $request->category,
            ]);
            return redirect()->route('admin-cause-category-list')->with(['success' => 'Category created successfully']);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function edit($token)
    {

        try {
            if (Auth::check()) {
                $categoryId = decrypt($token);
                $category = CauseCategory::find($categoryId);
                return view('backend.admin.cause.category.edit', compact('category'));
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

            $categoryId = decrypt($token);
            $category = CauseCategory::find($categoryId);


            $category = tap($category)->update([
                'category' => $request->category,
            ]);

            return redirect()->route('admin-cause-category-list')->with(['success' => 'Category updated successfully']);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function delete($token)
    {
        try {
            $categoryId = decrypt($token);
            $category = CauseCategory::find($categoryId);
            $category->delete();
            return redirect()->route('admin-cause-category-list')->with(['success' => 'Category updated successfully']);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
