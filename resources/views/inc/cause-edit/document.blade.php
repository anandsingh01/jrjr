<!-- Begin Total Number of Donors in Year 1 Field -->
<div class="form-item webform-component webform-component-textfield hs_total_number_of_donors_in_year_1 field hs-form-field" id="webform-component-acquisition--amount-1">
    <label for="edit-submitted-acquisition-amount-1">Description *</label>
    <textarea id="editor" class="form-text hs-input" name="description" required="required">{{$cause->cause_description}}</textarea>
    <span class="error1" style="display: none;"><i class="error-log fa fa-exclamation-triangle"></i></span>
</div>
<!-- End Total Number of Donors in Year 1 Field -->
<!-- Begin Total Number of Donors in Year 2 Field -->
<div class="form-item webform-component webform-component-textfield hs_total_number_of_donors_in_year_2
hs_total_number_of_donors_in_year_Setp1 field hs-form-field" id="webform-component-acquisition--amount-2">
    <label for="Documents">Featured Image</label>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Upload File</label>
                <div class="preview-zone hidden">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <div><b>Preview</b></div>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-danger btn-xs remove-preview">
                                    <i class="fa fa-times"></i> Reset This Form
                                </button>
                            </div>
                        </div>
                        <div class="box-body"></div>
                    </div>
                </div>
                <div class="dropzone-wrapper">
                    <div class="dropzone-desc">
                        <i class="glyphicon glyphicon-download-alt"></i>
                        <p>Choose an image file or drag it here.</p>
                    </div>
                    <input type="file" name="image" class="dropzone">
                </div>
            </div>

            <img src="{{asset($cause->feature_image)}}" style="width:100px;">
        </div>
    </div>

</div>

<!-- Begin Total Number of Donors in Year 2 Field -->
<div class="form-item webform-component webform-component-textfield hs_total_number_of_donors_in_year_2 hs_total_number_of_donors_in_year_2_Setp2
 field hs-form-field" id="webform-component-acquisition--amount-3">

    <label for="Documents">Documents</label>
    <style>

        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
        .upload__btn {
            display: inline-block;
            font-weight: 600;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: transparent;
            border-color: #4045ba;
            border-radius: 10px;
            font-size: 14px;
        }
        .upload__btn:hover {
            background-color: unset;
            color: #4045ba;
            transition: all 0.3s ease;
        }
        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }
        .upload__img-box {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 12px;
        }
        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }
        .upload__img-close:after {
            content: '\2716';
            font-size: 14px;
            color: white;
        }
        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }

    </style>


    <div class="upload__box">
        <div class="upload__btn-box">
            <label class="upload__btn">
                <p>Upload documents</p>
                <input type="file" name="documents[]" multiple="" data-max_length="20" class=" form-control  upload__inputfile">

            </label>
        </div>
        <div class="upload__img-wrap"></div>
    </div>

    @if(!empty($cause->causeDocuments))
        @foreach($cause->causeDocuments as $documents)
            <img src="{{asset($documents->file)}}" style="width:100px;">
            <span><a href="javascript:void(0)" data-id="{{$documents->id}}" class="deletefiles">X</a></span>
        @endforeach
    @endif

</div>

<!-- Begin Total Number of Donors in Year 2 Field -->
<div class="form-item webform-component webform-component-textfield hs_total_number_of_donors_in_year_2 field hs-form-field" id="webform-component-acquisition--amount-2">

    <label for="Documents">Documents</label>
    <style>

        .upload__inputfile2 {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
        .upload__btn2 {
            display: inline-block;
            font-weight: 600;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: transparent;
            border-color: #4045ba;
            border-radius: 10px;
            font-size: 14px;
        }
        .upload__btn2:hover {
            background-color: unset;
            color: #4045ba;
            transition: all 0.3s ease;
        }
        .upload__img-wrap2 {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }
        .upload__img-box2 {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 12px;
            display:inline-block;
        }
        .upload__img-close2 {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }
        .upload__img-close:after {
            content: '\2716';
            font-size: 14px;
            color: white;
        }
        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }

    </style>


    <div class="upload__box2">
        <div class="upload__img-box2">
            <label class="upload__btn2">
                <p>Upload Gallery Images</p>
                <input type="file" name="gallery_images[]" multiple="" data-max_length="20" class=" form-control  upload__inputfile2">
            </label>
        </div>
        <div class="upload__img-wrap2"></div>


        @if(!empty($cause->causeImages))
            @foreach($cause->causeImages as $gallery)
                <img src="{{asset($gallery->file)}}" style="width:100px;">
                <span><a href="javascript:void(0)" data-id="{{$gallery->id}}" class="deletefiles">X</a></span>
            @endforeach
        @endif
    </div>


</div>


<!-- Begin What's Your Email Field -->
<div class="hs_email field hs-form-field">
    <div class="form-group">
        <label>Raising For Someone Else?</label>
        <select class="form-select nice-select form-select-solid form-select-lg" name="raising_for_someone_else">
            <option value="1" {{$cause->raising_for_someone_else == '1' ? 'selected' : ''}}>Yes</option>
            <option value="0" {{$cause->raising_for_someone_else == '0' ? 'selected' : ''}}>No</option>
        </select>
    </div>
</div>
<!-- End What's Your Email Field -->
