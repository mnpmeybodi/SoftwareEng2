
@extends('admin.layouts.adminlayout')

@section('Content')
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">You Are in Here </h1>
            <p class="description">Report Page</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="/admin"><i class="fa-home"></i>Dashboard</a>
                </li>
                <li>
                    <a href="#"><strong>Report</strong></a>
                </li>
            </ol>

        </div>

    </div>
    <input type="hidden" value="{{  $i = 0 }}">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Reports</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">–</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">
                    ×
                </a>
            </div>
        </div>
        <div class="panel-body">
            <!--            begin:Search            -->
            <div class="row">
                {!! Form::open(array('url' => 'admin/report/date/sub', 'method' => "post",
                 'role'=> "form", 'id' =>"addDriver" , 'class'=>"form-horizontal")) !!}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="field-2">Selected Date Range To Search</label>

                        <div class="col-sm-4">
                            <div class="date-and-time">
                                <input type="text" name="startdate" class="form-control datepicker" data-format="yyyy-mm-dd">
                                <input type="text" name="starttime" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="08:00 AM" data-show-meridian="true" data-minute-step="1" data-second-step="5">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="date-and-time">
                                <input type="text" name="enddate" class="form-control datepicker" data-format="yyyy-mm-dd">
                                <input type="text" name="endtime" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="20:00 AM" data-show-meridian="true" data-minute-step="1" data-second-step="5">
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <button type="submit" class="btn btn-blue right"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <!--            end:Search              -->
            <hr>
            <div id="example-2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <table class="table table-bordered table-striped dataTable no-footer" id="example-2" role="grid"
                       aria-describedby="example-2_info">
                    <thead>
                    <tr role="row">
                        <th class="no-sorting sorting_disabled" rowspan="1" colspan="1" aria-label=""
                            style="width: 22px;">
                            No
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1"
                            aria-label="Name: activate to sort column ascending" style="width: 140px;">Name
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1"
                            aria-label="username: activate to sort column ascending" aria-sort="ascending"
                            style="width: 90px;">username
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1"
                            aria-label="Phone Number: activate to sort column ascending"
                            style="width: 100px;">Phone Number
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1"
                                 aria-label="Email: activate to sort column ascending"
                                 style="width: 130px;">Email
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1"
                            aria-label="Actions: activate to sort column ascending" style="width: 90px;">Actions
                        </th>
                    </tr>
                    </thead>

                    <tbody class="middle-align">

                    @foreach($drivers as $driver)

                        @if($i % 2 == 0)
                            <tr role="row" class="odd">
                        @else
                            <tr role="row" class="even">
                                @endif
                                <td class="">
                                    {{ $i++ }}
                                </td>
                                <td>{{ $driver->name . " " . $driver->family }} <span class="badge badge-secondary pull-right">{{ $driver->user_count }}</span></td>
                                <td class="sorting_1">{{ $driver->username }}</td>
                                <td>{{ $driver->phonenumber }}</td>
                                <td>{{ $driver->email }}</td>
                                <!-- TODO: Create Button Links -->
                                <td>
                                    <a href="/admin/Drivers/view/edit/{{ $driver->uid }}" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>

                                    <a href="/admin/report/{{ $driver->uid }}" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="example-2_info" role="status" aria-live="polite">Showing 1 to
                            {{ $i }} entries
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@stop

@section('Username')
    {{ $userD->name . " " .  $userD->family }}
    @stop

@section('Email')
    {{ $userD->email }}
    @stop

@section('EventNum')
    <!-- TODO: set Event Number -->
    5
@stop

@section('BottomScript')
            <!-- POPUP Form to Confirm -->
    <div class="modal fade" id="popupDlete">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong class="text-danger">Are You Sure to Delete? </strong></h4>
                </div>

                <div class="modal-body">
                    if Delete Driver, all detail has been delete, if want to Delete This Driver Click to
                    <strong class="text-danger">Delete</strong>
                    else Click <strong class="text-primary">Cancel</strong>
                </div>
                <div class="driver-detail">
                </div>

                <div class="modal-footer">
                    {!! Form::open(array('url' => '', 'method'
                                => "post", 'role'=> "form" , 'class'=>"formdeleteaction")) !!}

                    <input type="hidden" value="" id="usernamedeleteform" name="username">
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="button" class="btn btn-primary col-xs-12" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-xs-6">
                            <button type="submit"  class="btn btn-danger col-xs-12">Delete</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{ url('assets') }}/js/datatables/dataTables.bootstrap.css">
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{ url('assets') }}/js/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="{{ url('assets') }}/js/select2/select2.css">
    <link rel="stylesheet" href="{{ url('assets') }}/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="{{ url('assets') }}/js/multiselect/css/multi-select.css">

    <!-- Bottom Scripts -->
    <script src="{{ url('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('assets') }}/js/TweenMax.min.js"></script>
    <script src="{{ url('assets') }}/js/resizeable.js"></script>
    <script src="{{ url('assets') }}/js/joinable.js"></script>
    <script src="{{ url('assets') }}/js/xenon-api.js"></script>
    <script src="{{ url('assets') }}/js/xenon-toggles.js"></script>
    <script src="{{ url('assets') }}/js/datatables/js/jquery.dataTables.min.js"></script>


    <!-- Imported scripts on this page -->
    <script src="{{ url('assets') }}/js/datatables/dataTables.bootstrap.js"></script>
    <script src="{{ url('assets') }}/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
    <script src="{{ url('assets') }}/js/datatables/tabletools/dataTables.tableTools.min.js"></script>

    <!-- Imported scripts on this page -->
    <script src="{{ url('assets') }}/js/daterangepicker/daterangepicker.js"></script>
    <script src="{{ url('assets') }}/js/datepicker/bootstrap-datepicker.js"></script>
    <script src="{{ url('assets') }}/js/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="{{ url('assets') }}/js/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="{{ url('assets') }}/js/select2/select2.min.js"></script>
    <script src="{{ url('assets') }}/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{ url('assets') }}/js/selectboxit/jquery.selectBoxIt.min.js"></script>
    <script src="{{ url('assets') }}/js/tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="{{ url('assets') }}/js/typeahead.bundle.js"></script>
    <script src="{{ url('assets') }}/js/handlebars.min.js"></script>
    <script src="{{ url('assets') }}/js/multiselect/js/jquery.multi-select.js"></script>
    <script src="{{ url('assets') }}/js/toastr/toastr.min.js"></script>


    <!-- JavaScripts initializations and stuff -->
    <script src="{{ url('assets') }}/js/xenon-custom.js"></script>
    <script>
        $(document).ready(function(){

            var msgT =  '{{ \Session::get('_msgT') }}';
            var msg =  '{{ \Session::get('_msg') }}';
            var title = '';
            @if(\Session::get('_msgT') == 1)
                    title = 'Successfully';
            var opts = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-bottom-right",
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ \Session::get('_msg') }}.", title, opts);
            @elseif(\Session::get('_msgT') == 2)
                    title = 'Error';
            var opts = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-full-width",
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("{{ \Session::get('_msg') }}.", title, opts);
            @endif

            {{ \Session::put('_msg','') }}
            {{ \Session::put('_msgT',0) }}

            $("a.btn-danger").click(function(){
                var href     = $(this).attr('val1');
                var username = $(this).attr('val2');
                $('form.formdeleteaction').attr("action", href);
                $('#usernamedeleteform').attr("value", username);
                $('#popupDlete').modal('show', {backdrop: 'fade'});

            });
            //-----------------------------------------------------
            $("button.btn-danger").click(function(){
                var txt = $("input").val();
                $.post("Drivers/view/del",
                        {suggest: txt},
                        function(result){
                            alert(result);
                        });
            });
        });
    </script>

@stop