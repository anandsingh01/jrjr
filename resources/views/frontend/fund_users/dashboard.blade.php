@extends('layouts.header')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css"/>
    <script src="https://use.typekit.net/naf7ivh.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
<style>
    #accordion .card {
        border-top: none;
        border-left: none;
        border-right: none;
        border-radius: 0;
        border-bottom: 1px solid #d1d3d4;
    }
    #accordion .card .card-header {
        background: none;
        border: none;
        padding: 25px 0;
    }
    #accordion .card .card-header.top-headline {
        padding: 0 0 25px;
    }
    #accordion .card .card-body {
        padding: 0 0 25px;
    }
    .vertical-tabs .nav-link {
        text-transform: uppercase;
        color: #939598;
        font-family: "azo-sans-web", sans-serif;
        font-size: 12px;
        font-weight: 500;
        border-radius: 0;
        padding: 10px;
    }
    @media (min-width: 768px) {
        .vertical-tabs .nav-link {
            border-bottom: 1px solid #d1d3d4;
        }
    }
    .vertical-tabs .nav-link.active {
        background: #fca500;
        color: #fff;
        border-bottom: none;
    }
    .vertical-tabs .tab-content {
        margin-top: 0px;
    }
    @media (min-width: 768px) {
        .vertical-tabs .tab-content {
            margin-top: 0px;
        }
    }



    .rwd-table {
        margin: 0;
        min-width: 300px;
        max-width: 100%;
        border-collapse: collapse;
        width:100%;
    }

    .rwd-table tr:first-child {
        border-top: none;
        background: #428bca;
        color: #fff;
    }

    .rwd-table tr {
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        background-color: #f5f9fc;
    }

    .rwd-table tr:nth-child(odd):not(:first-child) {
        background-color: #ebf3f9;
    }

    .rwd-table th {
        display: none;
    }

    .rwd-table td {
        display: block;
    }

    .rwd-table td:first-child {
        margin-top: .5em;
    }

    .rwd-table td:last-child {
        margin-bottom: .5em;
    }

    .rwd-table td:before {
        content: attr(data-th) ": ";
        font-weight: bold;
        width: 120px;
        display: inline-block;
        color: #000;
    }

    .rwd-table th,
    .rwd-table td {
        text-align: left;
    }

    .rwd-table {
        color: #333;
        border-radius: .4em;
        overflow: hidden;
    }

    .rwd-table tr {
        border-color: #bfbfbf;
    }

    .rwd-table th,
    .rwd-table td {
        padding: .5em 1em;
    }
    @media screen and (max-width: 601px) {
        .rwd-table tr:nth-child(2) {
            border-top: none;
        }
    }
    @media screen and (min-width: 600px) {
        .rwd-table tr:hover:not(:first-child) {
            background-color: #d8e7f3;
        }
        .rwd-table td:before {
            display: none;
        }
        .rwd-table th,
        .rwd-table td {
            display: table-cell;
            padding: .25em .5em;
        }
        .rwd-table th:first-child,
        .rwd-table td:first-child {
            padding-left: 0;
        }
        .rwd-table th:last-child,
        .rwd-table td:last-child {
            padding-right: 0;
        }
        .rwd-table th,
        .rwd-table td {
            padding: 1em !important;
        }
    }

    div#v-pills-tabContent {
        padding: 5em;
        box-shadow: 2px 7px 30px #ddd;
    }

    h3.form-title.text-dark {
        text-align: center;
        margin: 20px 0;
    }

</style>
@stop
@section('content')
    <section>
        <div class="gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mt-5 mb-5">
                        <h2>Welcome, {{Auth::user()->name}}</h2>
                    </div>
                    <div class="col-md-5 mt-5 mb-5">
                        <a href="{{url('causes/create')}}" class="btn btn-success btn-lg pull-right">Add Fundraiser</a>
                    </div>
                    <section>

                        <div class="container vertical-tabs">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-one-tab" data-toggle="pill" href="#v-pills-one" role="tab" aria-controls="v-pills-one" aria-selected="true">Profile</a>
                                        <a class="nav-link" id="v-pills-two-tab" data-toggle="pill" href="#v-pills-two" role="tab" aria-controls="v-pills-two" aria-selected="false">Fundaraiser</a>
                                        <a class="nav-link" id="v-pills-three-tab" data-toggle="pill" href="#v-pills-three" role="tab"
                                           aria-controls="v-pills-three" aria-selected="false">
                                            Donated Amount
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-one" role="tabpanel" aria-labelledby="v-pills-one-tab">
                                            <div id="accordion" role="tablist">
                                                <div class="card">
                                                    <main class="flexbox-col">

                                                        <div class="form-wrapper">
                                                            <form id="form" method="post" name="emailform" action="{{url('update-profile')}}">
                                                                @csrf
                                                                <h3 class="form-title text-dark">Profile Update</h3>
{{--                                                                <p class="form-undertitle">Fields marked "*" are required.</p>--}}
                                                                <div class="form-input-grid">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <p class="form-text">Name*</p>
                                                                            <div class="form-input-wrapper flexbox-left">
                                                                                <i class="uil uil-user"></i>
                                                                                <input class="form-input form-control" id="uname" name="name" type="text" placeholder="name" aria-label="" value="{{$user_data->name}}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <p class="form-text">Password*</p>
                                                                            <div class="form-input-wrapper flexbox-left">
                                                                                <i class="uil uil-asterisk"></i>
                                                                                <input class="form-input form-control" id="pword" name="pword" type="password" placeholder="Password" aria-label=""  required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <p class="form-text">Email*</p>
                                                                            <div class="form-input-wrapper flexbox-left">
                                                                                <i class="uil uil-at"></i>
                                                                                <input class="form-input form-control" value="{{$user_data->email}}" readonly id="email" name="email" type="email" placeholder="Email" aria-label="" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p class="form-text">Phone*</p>
                                                                            <div class="form-input-wrapper flexbox-left">
                                                                                <i class="uil uil-at"></i>
                                                                                <input class="form-input form-control" id="phone" value="{{$user_data->number}}"  name="number" type="number" placeholder="Phone" aria-label="" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-input-max flexbox-left">
                                                                    <div class="button-wrapper">
                                                                        <button id="form-button" type="submit" class="button btn-primary"><i class="uil uil-envelope-heart"></i> Send<div class="btn-secondary"></div></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </main>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-two" role="tabpanel" aria-labelledby="v-pills-two-tab">
                                            <h3 class="form-title text-dark">Fundraisers</h3>

                                        @if($fundraiser)
                                                <table class="rwd-table">
                                                    <tbody>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Title</th>
                                                        <th>When Needed</th>
                                                        <th>Amount</th>
                                                        <th>Collected Amount</th>
                                                        <th>View</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                    @foreach($fundraiser as $fundraisers)
                                                    <tr>
                                                        <td data-th="Supplier Code">
                                                            {{$fundraisers->id}}
                                                        </td>
                                                        <td data-th="Supplier Name">
                                                            {{$fundraisers->cause_title}}
                                                        </td>
                                                        <td data-th="Invoice Number">
                                                             {{$fundraisers->date_by_when_you_need}}
                                                        </td>
                                                        <td data-th="Invoice Date">
                                                            Rs. {{number_format($fundraisers->amount,2)}}
                                                        </td>
                                                        <td data-th="Due Date">
                                                            <?php
                                                               $totalAmountReceived =  sumOfReceivedAmount($fundraisers->id);
                                                                ?>
                                                            {{number_format($totalAmountReceived,2)}}
                                                        </td>
                                                        <td data-th="Net Amount">
                                                            <a href="{{url('users/view-all-donors/'.encrypt($fundraisers->id))}}" type="button" class="btn btn-info btn-lg">View</a>
                                                        </td>
                                                        <td data-th="Net Amount">
                                                            <a href="{{url('users/edit-fundraiser/'.$fundraisers->id.'/'.$fundraisers->slug)}}" type="button" class="btn btn-info btn-lg">Edit</a>
                                                        </td>

                                                        <!-- Modal -->
{{--                                                        <div id="myModal{{$fundraisers->id}}" class="modal fade" role="dialog">--}}
{{--                                                            <div class="modal-dialog">--}}
{{--                                                                <!-- Modal content-->--}}
{{--                                                                <div class="modal-content">--}}
{{--                                                                    <div class="modal-header">--}}
{{--                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                                                                        <h4 class="modal-title">Modal Header</h4>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="modal-body">--}}
{{--                                                                        --}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="modal-footer">--}}
{{--                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    --}}
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-three" role="tabpanel" aria-labelledby="v-pills-three-tab">
                                            <h3 class="form-title text-dark">Donations</h3>


                                        @if($donated_amount)
                                                <table class="rwd-table">
                                                    <tbody>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Title</th>
                                                        <th>Payment Id</th>
                                                        <th>Amount</th>
                                                        <th>View</th>
                                                    </tr>
                                                    @foreach($donated_amount as $damounts)
                                                        <tr>
                                                            <td data-th="Supplier Code">
                                                                {{$damounts->getCauses[0]->id}}
                                                            </td>
                                                            <td data-th="Supplier Name">
                                                                {{$damounts->getCauses[0]->cause_title}}
                                                            </td>
                                                            <td data-th="Invoice Number">
                                                                {{$damounts->order_id}}
                                                            </td>
                                                            <td data-th="Invoice Date">
                                                                Rs. {{number_format($damounts->amount,2)}}
                                                            </td>
                                                            <td data-th="Net Amount">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                                                        data-target="#myModalTwo{{$damounts->id}}">View</button>
                                                            </td>

                                                            <!-- Modal -->
                                                            <div id="myModalTwo{{$damounts->id}}" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">X</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Some text in the modal.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section><!-- volunteer info section -->

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            vert_tabs();
        });

        $(window).resize(function(){
            if($('.vertical-tabs').innerWidth() > 608) {
                if($('div.selected').length){
                }else{
                    $('div.box:first').addClass('selected');
                }
            }
        });

        function vert_tabs(){
            $('ul.checklist-select li').click(function() {
                var selectID = $(this).attr('id');
                $('ul.checklist-select li').removeClass('active');
                $(this).addClass('active');
                $('div.box').removeClass('selected');
                $('.' + selectID + '-box').addClass('selected');
            });
        }


    </script>
    @endsection
