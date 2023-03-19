<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminEventsController extends Controller
{
    public function index()
    {
        try {
            $events = Events::get();
            return view('backend.admin.events.list', compact('events'));
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }
    public function create()
    {
        try {
            return view('backend.admin.events.add');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('feature_image') && $request->hasFile('banner_image')) {

                $featureImage = $request->file('feature_image');
                $destinationPath = public_path('events/feature_images');
                $featureImage->move($destinationPath, $featureImage->getClientOriginalName());

                $bannerImage = $request->file('banner_image');
                $destinationPath = public_path('events/banner_images');
                $bannerImage->move($destinationPath, $bannerImage->getClientOriginalName());


                $event = Events::create([
                    'name' => $request->event_name ?? null,
                    'location' => $request->event_location ?? null,
                    'event_date' => $request->event_date ?? null,
                    'event_time' => $request->event_time ?? null,
                    'desc' => $request->event_desc ?? null,
                    'feature_img' => $featureImage->getClientOriginalName(),
                    'banner_img' => $bannerImage->getClientOriginalName(),
                ]);
            }
            return redirect()->route('admin-events-list')->with(['success' => 'Category created successfully']);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function edit($token)
    {
        try {
            $eventId = decrypt($token);
            $event = Events::find($eventId);
            return view('backend.admin.events.edit', compact('event'));
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }
    public function update(Request $request, $token)
    {
        try {
            $eventId = decrypt($token);
            $event = Events::find($eventId);

            if ($request->hasFile('feature_image') && $request->hasFile('banner_image')) {

                $featureImage = $request->file('feature_image');
                $destinationPath = public_path('events/feature_images');
                $featureImage->move($destinationPath, $featureImage->getClientOriginalName());

                $bannerImage = $request->file('banner_image');
                $destinationPath = public_path('events/banner_images');
                $bannerImage->move($destinationPath, $bannerImage->getClientOriginalName());

                $event = tap($event)->update([
                    'name' => $request->event_name ?? null,
                    'location' => $request->event_location ?? null,
                    'event_date' => $request->event_date ?? null,
                    'event_time' => $request->event_time ?? null,
                    'desc' => $request->event_desc ?? null,
                    'feature_img' => $featureImage->getClientOriginalName(),
                    'banner_img' => $bannerImage->getClientOriginalName(),
                ]);
            }
            return redirect()->route('admin-events-list')->with(['success' => 'Category updated successfully']);
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }

    public function delete($token)
    {
        try {
            $eventId = decrypt($token);
            $event = Events::find($eventId);
            $event->delete();
            return redirect()->route('admin-events-list')->with(['success' => 'Category deleted successfully']);
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
