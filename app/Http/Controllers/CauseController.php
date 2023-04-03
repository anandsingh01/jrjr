<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cause;
use App\Models\Media;
use App\Models\CausePatient;
use Illuminate\Http\Request;
use App\Models\CauseCategory;
use App\Models\CauseSubCategory;
use App\Service\FileUploadService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Session;
class CauseController extends Controller
{
    public $fileUploadService;
    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function index()
    {
        try {
            $causesCategory = CauseCategory::all();
            $causes = Cause::where('status','1')->with('causeImages', 'causeDocuments')->get();
            return view('frontend.cause.causes', compact('causes','causesCategory'));
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }
    public function create()
    {
        if(!Auth::check()){
            return redirect(url('/login'));
        }

        try {
            $categories = CauseCategory::all();
            $subCategories = CauseSubCategory::all();
            return view('backend.cause.add', compact('categories', 'subCategories'));
        } catch (Exception $e) {
            dd($e->getMessage());
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                if ($request->hasFile('image')) {
                    $featureImage = $request->file('image');
                    $destinationPath = 'cause/feature_images';
                    $featureImageRename = rand(1,9999).rand(1,9999).'.'.$featureImage->getClientOriginalExtension();
                     $featureImage->move($destinationPath, $featureImageRename );
                    $uploadedFileName = $destinationPath.'/'.$featureImageRename;
                }

                $urlSlug = str_replace(' ','-', strtolower($request->title));
                $checkSlug = Cause::where('slug',$urlSlug)->get();
                if(!empty($checkSlug)){
                    $urlSlug = $urlSlug.'-'.rand(111,999);
                }

                $cause = Cause::create([
                    'title' => $request->title ?? null,
                    'slug' => $urlSlug,
                    'category_id' => $request->category ?? null,
                    'sub_category_id' => $request->subcategory ?? null,
                    'cause_title' => $request->title ?? null,
                    'date_by_when_you_need' => $request->date_by_when_you_need ?? null,
                    'amount' => $request->amount ?? null,
                    'cause_description' => $request->description ?? null,
                    'feature_image' => $uploadedFileName,
                    'raising_for_someone_else' => $request->raising_for_someone_else ?? 0,
                    'apply_terms' => $request->apply_terms,
                    'status' => 0,
                    'added_by' => Auth::user()->id
                ]);

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

                $cause_patient = CausePatient::create([
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

            }

            DB::commit();

            return redirect()->route('cause-causes')->with(['success' => 'Cause added successfully']);
        } catch (Exception $e) {

            DB::rollBack();
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }

    public function show($url)
    {
        try {
            $cause = Cause::with('causeImages','causeDocuments','causePatient','causeCategory','causeSubCategory','Campaigner')
                ->where('slug',$url)
                ->where('status',1)
                ->first();
            $lastestCauses = Cause::latest()->take(3)->orderBy('id', 'asc')->get();
            if(!empty($cause)){
                return view('frontend.cause.causes_details', compact('cause', 'lastestCauses'));
            }else{
                return view('errors.404');
            }
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['error' => 'Somthing is wrong', 'error_msg' => $e->getMessage()]);
        }
    }


}
