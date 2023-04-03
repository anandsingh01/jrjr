@extends('layouts.dashboard')
@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <style>
        .date_by_when_you_need{
            line-height: 0 !important;
        }
        /*form styles*/
        .steps {
            width: 675px;
            margin: 20px auto;
            position: relative;
        }
        .steps fieldset {
            background: white;
            border: 0 none;
            border-radius: 3px;
            box-shadow: 0 17px 41px -21px rgb(0, 0, 0);
            padding: 20px 30px;
            border-top: 9px solid #00a35c;
            box-sizing: border-box;
            width: 100%;
            /*margin: 0 10%;*/
            /*stacking fieldsets above each other*/
            position: absolute;
        }
        /*Hide all except first fieldset*/
        .steps fieldset:not(:first-of-type) {
            display: none;
        }
        /*inputs*/
        .steps label{
            color: #333333;
            text-align: left !important;
            font-size: 15px;
            font-weight: 600;
            padding-bottom: 7px;
            padding-top: 12px;
            display: inline-block;
        }
        .steps input, .steps textarea {
            outline: none;
            display: block;
            width: 100%;
            margin: 0 0 20px;
            padding: 10px 15px;
            border: 1px solid #d9d9d9;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            color: #837E7E;
            /*font-family: "Roboto";*/
            -webkti-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            font-size: 14px;
            font-wieght: 400;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-transition: all 0.3s linear 0s;
            -moz-transition: all 0.3s linear 0s;
            -ms-transition: all 0.3s linear 0s;
            -o-transition: all 0.3s linear 0s;
            transition: all 0.3s linear 0s;
        }
        .steps input:focus, .steps textarea:focus{
            color: #333333;
            border: 1px solid #00a35c;
        }
        .error1{
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            -moz-box-shadow: 0 0 0 transparent;
            -webkit-box-shadow: 0 0 0 transparent;
            box-shadow: 0 0 0 transparent;
            position: absolute;
            left: 525px;
            margin-top: -58px;
            padding: 0 10px;
            height: 39px;
            display: block;
            color: #ffffff;
            background: #e62163;
            border: 0;
            font: 14px Corbel, "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", "Bitstream Vera Sans", "Liberation Sans", Verdana, "Verdana Ref", sans-serif;
            line-height: 39px;
            white-space: nowrap;
        }
        .error1:before{
            width: 0;
            height: 0;
            left: -8px;
            top: 14px;
            content: '';
            position: absolute;
            border-top: 6px solid transparent;
            border-right: 8px solid #e62163;
            border-bottom: 6px solid transparent;
        }
        .error-log{
            margin: 5px 5px 5px 0;
            font-size: 19px;
            position: relative;
            bottom: -2px;
        }
        .question-log {
            margin: 5px 1px 5px 0;
            font-size: 15px;
            position: relative;
            bottom: -2px;
        }
        /*buttons*/
        .steps .action-button, .action-button {
            width: 100px !important;
            background: #00a35c;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 1px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px auto;
            -webkit-transition: all 0.3s linear 0s;
            -moz-transition: all 0.3s linear 0s;
            -ms-transition: all 0.3s linear 0s;
            -o-transition: all 0.3s linear 0s;
            transition: all 0.3s linear 0s;
            display: block;
        }
        .steps .next, .steps .submit{
            float: right;
        }
        .steps .previous{
            float:left;
        }
        .steps .action-button:hover, .steps .action-button:focus, .action-button:hover, .action-button:focus {
            background:#00a35c;;
        }
        .steps .explanation{
            display: block;
            clear: both;
            width: 540px;
            background: #f2f2f2;
            position: relative;
            margin-left: -30px;
            padding: 22px 0px;
            margin-bottom: -10px;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
            top: 10px;
            text-align: center;
            color: #333333;
            font-size: 12px;
            font-weight: 200;
            cursor:pointer;
        }
        /*headings*/
        .fs-title {
            text-transform: uppercase;
            margin: 0 0 5px;
            line-height: 1;
            color: #00a35c;
            font-size: 18px;
            font-weight: 400;
            text-align:center;
        }
        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #837E7E;
            margin-bottom: 20px;
            text-align: center;
        }
        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
            width:100%;
            text-align: center;
        }
        #progressbar li {
            list-style-type: none;
            color: rgb(51, 51, 51);
            text-transform: uppercase;
            font-size: 11px;
            width: 20%;
            float: left;
            position: relative;
        }
        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 20px;
            line-height: 20px;
            display: block;
            font-size: 11px;
            color: #333;
            background: white;
            border-radius: 3px;
            margin: 0 auto 5px auto;
        }
        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1; /*put it behind the numbers*/
        }
        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }
        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before,  #progressbar li.active:after{
            background: #00a35c;
            color: white;
        }

        /* RESPONSIVE */
        /* moves error logs in tablet/smaller screens */
        @media (max-width:1000px){
            /*brings inputs down in size */
            .steps input, .steps textarea {
                outline: none;
                display: block;
                width: 100% !important;
            }
            /*brings errors in */
            .error1 {
                left: 345px;
                margin-top: -58px;
            }
        }
        @media (max-width:675px){
            /*mobile phone: uncollapse all fields: remove progress bar*/
            .steps {
                width: 100%;
                margin: 50px auto;
                position: relative;
            }
            #progressbar{
                display:none;
            }
            /*move error logs */
            .error1 {
                position: relative;
                left: 0 !important;
                margin-top: 24px;
                top: -11px;
            }
            .error1:before {
                width: 0;
                height: 0;
                left: 14px;
                top: -14px;
                content: '';
                position: absolute;
                border-left: 6px solid transparent;
                border-bottom: 8px solid #e62163;
                border-right: 6px solid transparent;
            }
            /*show hidden fieldsets */
            .steps fieldset:not(:first-of-type) {
                display: block;
            }
            .steps fieldset{
                position:relative;
                width: 100%;
                margin:0 auto;
                margin-top: 45px;
            }
            .steps .next, .steps .previous{
                display:none;
            }
            .steps .explanation{
                display:none;
            }
            .steps .submit {
                float: right;
                margin: 28px auto 10px;
                width: 100% !important;
            }
        }
        /* Info */
        .info {
            width: 300px;
            margin: 10px auto;
            text-align: center;
            font-family: 'roboto', sans-serif;
        }
        .info h1 {
            margin: 0;
            padding: 0;
            font-size: 28px;
            font-weight: 400;
            color: #333333;
            padding-bottom: 5px;
        }
        .info span {
            color:#666666;
            font-size: 13px;
            margin-top:20px;
        }
        .info span a {
            color: #666666;
            text-decoration: none;
        }
        .info span .fa {
            color: rgb(226, 168, 16);
            font-size: 19px;
            position: relative;
            left: -2px;
        }
        .info span .spoilers {
            color: #999999;
            margin-top: 5px;
            font-size: 10px;
        }
        .nogap {
            padding: 0;
            display: none;
        }
        footer.light {
            background: #f7f7f7 none repeat scroll 0 0;
            display: none;
        }





    /*  cause  */
        .box {
            position: relative;
            background: #ffffff;
            width: 100%;
        }

        .box-header {
            color: #444;
            display: block;
            padding: 10px;
            position: relative;
            border-bottom: 1px solid #f4f4f4;
            margin-bottom: 10px;
        }

        .box-tools {
            position: absolute;
            right: 10px;
            top: 5px;
        }

        .dropzone-wrapper {
            border: 2px dashed #91b0b3;
            color: #92b0b3;
            position: relative;
            height: 150px;
        }

        .dropzone-desc {
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            text-align: center;
            width: 40%;
            top: 50px;
            font-size: 16px;
        }

        .dropzone,
        .dropzone:focus {
            position: absolute;
            outline: none !important;
            width: 100%;
            height: 150px;
            cursor: pointer;
            opacity: 0;
        }

        .dropzone-wrapper:hover,
        .dropzone-wrapper.dragover {
            background: #ecf0f5;
        }

        .preview-zone {
            text-align: center;
        }

        .preview-zone .box {
            box-shadow: none;
            border-radius: 0;
            margin-bottom: 0;
        }
        .footer {
            display: none !important;
        }
        label.upload__btn2 p {
            margin: 0;
        }

    </style>
@stop
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (session()->has('messages'))
                    <p class="alert {{ session('alert-class') }}">{{ session('messages') }}</p>
                @endif
                <div class="info">
                            <h1>Add Fundraiser</h1>
                        </div>

                @if(Auth::check())
                    <form method="post" action="{{ route('cause-add') }}" class="steps" accept-charset="UTF-8" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <ul id="progressbar">
                            <li class="active">Basic Information</li>
                            <li>Documents</li>
                            <li>Patient's Details</li>
                            <li>Address</li>
                        </ul>
                        <!-- USER INFORMATION FIELD SET -->
                        <fieldset>
                            <h2 class="fs-title">Basic Information</h2>
                            <h3 class="fs-subtitle">We just need some basic information to begin your scoring</h3>
                            @include('inc.cause.basic_info')

                            <input type="button" data-page="1" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <!-- ACQUISITION FIELD SET -->
                        <fieldset>
                            <h2 class="fs-title">Documents & Briefs</h2>
                            <h3 class="fs-subtitle">Descriptions</h3>
                            @include('inc.cause.document')
                            <!-- End Calc of Total Number of Donors Fields -->
                            <input type="button" data-page="2" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" data-page="2" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <!-- Cultivation FIELD SET -->
                        <fieldset>
                            <h2 class="fs-title">Patient's Details</h2>
                            @include('inc.cause.patientDetails')

                            <input type="button" data-page="3" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" data-page="3" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <!-- Cultivation2 FIELD SET -->
                        <fieldset>
                            <h2 class="fs-title">Details</h2>
                            @include('inc.cause.details')

                            <input type="button" data-page="4" name="previous" class="previous action-button" value="Previous" />
                            <input id="submit" class="hs-button primary large action-button next" type="submit" value="Submit">
                        </fieldset>

                        <div class="verify-infolist1">
                            <div class="px-0 pt-4 pb-0 mt-3 mb-3">
                                @if (session()->has('messages'))
                                    <p class="alert {{ session('alert-class') }}">{{ session('messages') }}</p>
                                @endif
                            </div>
                        </div>
                    </form>
                @else
                    <style>
                        .loginmodalbtn{
                            text-align: center;
                            width: 36%;
                            margin: 0 auto;
                            display: block;
                        }
                    </style>
                    <a href="#"  data-toggle="modal" data-target="#loginmodal" id="loginmodal" class="loginmodalbtn btn btn-success btn-lg text-center">Login</a>
                @endif
            </div>

        </div>
    </div>
@endsection
@section('js')

    <script language="javascript">
        // var today = new Date();
        // var dd = String(today.getDate()).padStart(2, '0');
        // var mm = String(today.getMonth() + 1).padStart(2, '0');
        // var yyyy = today.getFullYear();
        //
        // today = yyyy + '-' + mm + '-' + dd;
        // $('#date_by_when_you_need').attr('min',today);
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#raising_for_someone').on('change', function(){
                var for_someone = $(this).val();
                if(for_someone == '1'){
                    $('#relation_with_patient').removeClass('d-none');
                }else{
                    $('#relation_with_patient').addClass('d-none');
                }
            });
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#category').on('change',function(e) {
                var cat_id = e.target.value;
                $.ajax({
                    url:"{{ url('get-cause-subcat') }}",
                    type:"GET",
                    data: {
                        cat_id: cat_id
                    },
                    success:function (data) {
                        $('#subcategory').empty();
                        $.each(data.subcategories,function(index,subcategory){
                            $('#subcategory').append('<option value="'+subcategory.id+'">'+subcategory.sub_category+'</option>');
                        })
                    }
                })
            });
        });
    </script>
    <script src="{{ asset('dist/js/jquery.js') }}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="{{asset('custom-assets/add-cause.js')}}"></script>
@stop
