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
                                @if($getAllPayments)
                                    <table class="rwd-table">
                                        <tbody>
                                        <tr>
                                            <th>Id</th>
                                            <th>Order Id</th>
                                            <th>Amount</th>
                                            <th>Cause</th>
                                            <th>Donor</th>
                                            <th>Date</th>
                                        </tr>
                                        @foreach($getAllPayments as $key => $getAll_Payments)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td data-th="Supplier Code">
                                                    {{$getAll_Payments->order_id}}
                                                </td>
                                                <td data-th="Supplier Name">
                                                    {{number_format($getAll_Payments->amount,2)}}
                                                </td>
                                                <td data-th="Invoice Number">
                                                    {{$getAll_Payments->getCauses[0]->cause_title}}
                                                </td>
                                                <td data-th="Invoice Date">
                                                   {{$getAll_Payments->getDonors[0]->name}}
                                                </td>

                                                <td data-th="Net Amount">
                                                    {{$getAll_Payments->created_at}}
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
