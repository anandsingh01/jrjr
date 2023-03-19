@extends('layouts.header')

@section('css')
    <title>Causes</title>
    <style>
        /* filter  */
        /* .all_filters {
    margin-top: 100px;
    } */

        .cause-avatar img {
            float: left;
            width: 100%;
            height: 200px;
        }

        .filter_box {
            border: 1px solid #e9e9e9;
            box-shadow: 0 10px 10px -3px rgba(0, 0, 0, 0.274);
            padding-left: 15px;
            border-radius: 5px;
            padding-top: 15px;
        }

        .filter_box.place {
            margin-top: 20px;
        }

        .container1 {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 10px;
            cursor: pointer;
            font-size: 16px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .filter_head i {
            padding: 4px 9px;
            font-size: 18px;
            color: #000;
        }

        .filter_categories {
            margin-top: 20px;
        }


        /* Hide the browser's default checkbox */
        .container1 input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container1:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container1 input:checked~.checkmark {
            background-color: #00A859;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container1 input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container1 .checkmark:after {
            left: 7px;
            top: 2px;
            width: 7px;
            height: 13px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }


        .read_more,
        .read_more1 {
            display: none;

        }

        .read_btn,
        .read_btn1 {
            background-color: transparent !important;
            border: none !important;
            color: #00A859;
            padding: 2px 5px;
        }

        ul.term-list {
            padding: 15px 0;
        }
    </style>
@stop

@section('content')


<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading-2">
                        <!-- <span>Latest causes</span> -->
                        <h4>Recent <span>Causes</span></h4>
                    </div>
                </div>

                <div class="col-sm-2 filter-mr" style="padding: 0;">

                    <!-- <div class="dropdown" data-control="checkbox-dropdown">
                        <label class="dropdown-label">Select</label>

                        <div class="dropdown-list">
                            <a href="#" data-toggle="check-all" class="dropdown-option">
                                Check All
                            </a>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 1" />
                                Diabetes

                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 2" />
                                Trachea

                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 3" />
                                Stroke
                            </label>
                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 3" />
                                Cancer
                            </label>
                        </div>
                    </div>
                    <div class="dropdown" style="margin-top: 20px;" data-control="checkbox-dropdown">
                        <label class="dropdown-label1">Select</label>

                        <div class="dropdown-list">
                            <a href="#" data-toggle="check-all" class="dropdown-option">
                                Check All
                            </a>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 1" />
                                Mumabi

                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 2" />
                                Surat

                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 3" />
                                Pune
                            </label>
                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 3" />
                                Banglore
                            </label>
                        </div>
                    </div> -->


                    <div class="filter_box disease">
                        <div class="filter_head d-flex justify-content-between">
                            <h4>Categories</h4>
                        </div>
                        <ul class=" term-list">
                            <li class="container1">All
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </li>
                            <?php
                            $categories = getAllCategories();
                            ?>
                            @if(!empty($categories))
                                @foreach($categories as $category)
                                    <li class="container1">{{$category->category}}
                                        <input type="checkbox" class="getcategoryData{{$category->id}}"
                                               style="display: inline-block; height:20px;width: 48px; opacity:1; left: -14px;
    top: -4px;"
                                               data-id="{{$category->id}}">
{{--                                        <span class="checkmark"></span>--}}
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="filter_box place">
                        <div class="filter_head d-flex justify-content-between">
                            <h4>City</h4>
                        </div>
                        <div class="filter_categories place_filter">
                            <label class="container1">All
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container1">Mumbai
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container1">Pune
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container1">Banglore
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container1">Surat
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <div class="read_more1">
                                <!-- All other cities will come inside this div -->
                                <label class="container1">Mumbai
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container1">Pune
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container1">Banglore
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container1">Surat
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button class="read_btn1" onclick="read1()">Show More...</button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10">
                    <div class="our-cause remove-ext-50 loader-data" id="itemContainer">

                        @foreach ($causes as $cause)
                            <div class="col-sm-4">
                                <div class="caro-unit fadein">
                                    <div class="cause-avatar">
                                        <a href="{{ url('cause-details', $cause->slug) }}">
                                            <img src="{{ asset($cause->feature_image) }}">
                                        </a>
                                        <div class="required-amount">
                                          <span>{{ $cause->amount ?? 'N/A'}}</span>
                                            <i>Target Donation</i>
                                        </div>
                                    </div>
                                    <div class="cause-meta">
                                        <?php
                                            $getReceivedAmount = getReceivedAmount($cause->id , $cause->amount);
                                            ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                                aria-valuenow="{{$getReceivedAmount}}" aria-valuemin="0"
                                                 aria-valuemax="{{$cause->amount}}"
                                                style="width:{{$getReceivedAmount}}%">
                                            </div>
                                        </div>
                                        <span>{{number_format($getReceivedAmount,2)}}%</span>
                                        <h2><a href="{{ url('cause-details', $cause->slug) }}">
{{--                                                {{ $cause->cause_title ?? 'N/A' }}--}}
                                                <?php
                                                    $projectcontent = \Str::limit( strip_tags($cause->cause_title), 30, $end='...') ;
                                                    echo $projectcontent;
                                                    ?>
                                            </a></h2>
                                        <p>
                                                <?php
                                                $projectcontent = \Str::limit( strip_tags($cause->cause_description), 100, $end='...') ;
                                                echo $projectcontent;
                                                ?>
                                        </p>
                                        <a href="{{ url('cause-details', $cause->slug) }}" title=""
                                            class="donate-me" data-ripple="">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="holder"></div>
            </div>
        </div>
    </div>
</section>
<style>
    .more{color:green; cursor:pointer;}
</style>

@endsection

@section('js')
    <script>
        var categoryid;
        $('.getcategoryData'+categoryid).change(function() {
            var checkboxvalue =  $('.getcategoryData'+categoryid).attr('data-id');
            alert(checkboxvalue);
        });
        // $(document).ready(function() {
        //     // alert('ac');
        //     //set initial state.
        //    var checkboxvalue =  $('.getcategoryData').attr('data-id');
        //    alert(checkboxvalue);
        // });

        $('ul.term-list').each(function(){
            var LiN = $(this).find('li').length;
            if( LiN > 3){
                $('li', this).eq(2).nextAll().hide().addClass('toggleable');
                $(this).append('<li class="more container1 ">More...</li>');
            }
        });
        $('ul.term-list').on('click','.more', function(){
            if( $(this).hasClass('less') ){
                $(this).text('More...').removeClass('less');
            }else{
                $(this).text('Less...').addClass('less');
            }
            $(this).siblings('li.toggleable').slideToggle();
        });
    </script>
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
{{--    <script>--}}

{{--        (function($) {--}}
{{--            var CheckboxDropdown = function(el) {--}}
{{--                var _this = this;--}}
{{--                this.isOpen = false;--}}
{{--                this.areAllChecked = false;--}}
{{--                this.$el = $(el);--}}
{{--                this.$label = this.$el.find('.dropdown-label');--}}
{{--                this.$label1 = this.$el.find('.dropdown-label1');--}}
{{--                this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();--}}
{{--                this.$inputs = this.$el.find('[type="checkbox"]');--}}

{{--                this.onCheckBox();--}}

{{--                this.$label.on('click', function(e) {--}}
{{--                    e.preventDefault();--}}
{{--                    _this.toggleOpen();--}}
{{--                });--}}
{{--                this.$label1.on('click', function(e) {--}}
{{--                    e.preventDefault();--}}
{{--                    _this.toggleOpen();--}}
{{--                });--}}

{{--                this.$checkAll.on('click', function(e) {--}}
{{--                    e.preventDefault();--}}
{{--                    _this.onCheckAll();--}}
{{--                });--}}

{{--                this.$inputs.on('change', function(e) {--}}
{{--                    _this.onCheckBox();--}}
{{--                });--}}
{{--            };--}}

{{--            CheckboxDropdown.prototype.onCheckBox = function() {--}}
{{--                this.updateStatus();--}}
{{--            };--}}

{{--            CheckboxDropdown.prototype.updateStatus = function() {--}}
{{--                var checked = this.$el.find(':checked');--}}

{{--                this.areAllChecked = false;--}}
{{--                this.$checkAll.html('Check All');--}}

{{--                if (checked.length <= 0) {--}}
{{--                    this.$label.html('Select Category');--}}
{{--                    this.$label1.html('Select City');--}}
{{--                } else if (checked.length === 1) {--}}
{{--                    this.$label.html(checked.parent('label').text());--}}
{{--                    this.$label1.html(checked.parent('label').text());--}}
{{--                } else if (checked.length === this.$inputs.length) {--}}
{{--                    this.$label.html('All Selected');--}}
{{--                    this.$label1.html('All Selected');--}}
{{--                    this.areAllChecked = true;--}}
{{--                    this.$checkAll.html('Uncheck All');--}}
{{--                } else {--}}
{{--                    this.$label.html(checked.length + ' Selected');--}}
{{--                    this.$label1.html(checked.length + ' Selected');--}}
{{--                }--}}
{{--            };--}}

{{--            CheckboxDropdown.prototype.onCheckAll = function(checkAll) {--}}
{{--                if (!this.areAllChecked || checkAll) {--}}
{{--                    this.areAllChecked = true;--}}
{{--                    this.$checkAll.html('Uncheck All');--}}
{{--                    this.$inputs.prop('checked', true);--}}
{{--                } else {--}}
{{--                    this.areAllChecked = false;--}}
{{--                    this.$checkAll.html('Check All');--}}
{{--                    this.$inputs.prop('checked', false);--}}
{{--                }--}}

{{--                this.updateStatus();--}}
{{--            };--}}

{{--            CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {--}}
{{--                var _this = this;--}}

{{--                if (!this.isOpen || forceOpen) {--}}
{{--                    this.isOpen = true;--}}
{{--                    this.$el.addClass('on');--}}
{{--                    $(document).on('click', function(e) {--}}
{{--                        if (!$(e.target).closest('[data-control]').length) {--}}
{{--                            _this.toggleOpen();--}}
{{--                        }--}}
{{--                    });--}}
{{--                } else {--}}
{{--                    this.isOpen = false;--}}
{{--                    this.$el.removeClass('on');--}}
{{--                    $(document).off('click');--}}
{{--                }--}}
{{--            };--}}

{{--            var checkboxesDropdowns = document.querySelectorAll('[data-control="checkbox-dropdown"]');--}}
{{--            for (var i = 0, length = checkboxesDropdowns.length; i < length; i++) {--}}
{{--                new CheckboxDropdown(checkboxesDropdowns[i]);--}}
{{--            }--}}
{{--        })(jQuery);--}}



{{--        let more = document.querySelector('.read_more');--}}
{{--        let read_btn = document.querySelector('.read_btn');--}}

{{--        let read = () => {--}}

{{--            if (more.style.display === "block") {--}}

{{--                more.style.display = "none";--}}


{{--                read_btn.innerHTML = "Show More...";--}}
{{--            } else {--}}
{{--                more.style.display = "block";--}}
{{--                read_btn.innerHTML = "Show Less...";--}}
{{--            }--}}
{{--        }--}}



{{--        let more1 = document.querySelector('.read_more1');--}}
{{--        let read_btn1 = document.querySelector('.read_btn1');--}}

{{--        let read1 = () => {--}}

{{--            if (more1.style.display === "block") {--}}

{{--                more1.style.display = "none";--}}


{{--                read_btn1.innerHTML = "Show More...";--}}
{{--            } else {--}}
{{--                more1.style.display = "block";--}}
{{--                read_btn1.innerHTML = "Show Less...";--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
@stop
