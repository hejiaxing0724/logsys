@extends('themes.default1.agent.layout.agent')

@section('Transactions')
    class="active"
@stop

@section('transaction-bar')
    active
@stop


@section('PageHeader')
    <h1>{{Lang::get('lang.transactions')}}</h1>
    <style>
        .tooltip1 {
            position: relative;
            /*display: inline-block;*/
            /*border-bottom: 1px dotted black;*/
        }

        .tooltip1 .tooltiptext {
            visibility: hidden;
            width: 100%;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;

            /* Position the tooltip */
            position: absolute;
            z-index: 1;
        }

        .tooltip1:hover .tooltiptext {
            visibility: visible;
        }
    </style>
@stop
@section('content')
    <?php
    $date_time_format = UTC::getDateTimeFormat();
    if (Auth::user()->role == 'agent') {
        $user_id = Auth::user()->id;
        $transactions= App\Model\helpdesk\Transaction\Transactions::where('user_id', '=', $user_id)->orderBy('id', 'DESC')->count();
    } else {
        $transactions = App\Model\helpdesk\Transaction\Transactions::orderBy('id', 'DESC')->count();
    }
    ?>
    <!-- Main content -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{!! Lang::get('lang.transactions') !!} </h3> <small id="title_refresh">{!! $transactions !!} {!! Lang::get('lang.transactions') !!}</small>
        </div><!-- /.box-header -->

        <div class="box-body ">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check-circle"> </i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('success')}}
                </div>
            @endif
        <!-- failure message -->
            @if(Session::has('fails'))
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"> </i> <b> {!! Lang::get('lang.alert') !!}! </b>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('fails')}}
                </div>
            @endif
            {!! Form::open(['id'=>'modalpopup', 'route'=>'select_all','method'=>'post']) !!}
        <!--<div class="mailbox-controls">-->
            <!-- Check all button -->
            <a class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></a>
            {{-- <a class="btn btn-default btn-sm" id="click"><i class="fa fa-refresh"></i></a> --}}
            <input type="submit" class="submit btn btn-default text-orange btn-sm" id="delete" name="submit" value="{!! Lang::get('lang.delete') !!}" onclick="appendValue(id)">
            <input type="submit" class="submit btn btn-default text-yellow btn-sm" id="close" name="submit" value="{!! Lang::get('lang.close') !!}" onclick="appendValue(id)">
            <!--</div>-->
            <p><p/>
            <div class="mailbox-messages" id="refresh">
                <!--datatable-->
            {!!$table->render('vendor.Chumper.template')!!}

            <!-- /.datatable -->
            </div><!-- /.mail-box-messages -->
            {!! Form::close() !!}
        </div><!-- /.box-body -->
    </div><!-- /. box -->


    {!! $table->script('vendor.Chumper.ticket-javascript') !!}
    <script>

        var t_id = [];
        var option = null;
        $(function () {
            //Enable check and uncheck all functionality
            $(".checkbox-toggle").click(function () {
                var clicks = $(this).data('clicks');
                if (clicks) {
                    //Uncheck all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                    $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
                } else {
                    //Check all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("check");
                    $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
                }
                $(this).data("clicks", !clicks);
            });
        });

        $(function () {
            // Enable check and uncheck all functionality

            $(".checkbox-toggle").click(function () {
                var clicks = $(this).data('clicks');
                if (clicks) {
                    //Uncheck all checkboxes
                    $("input[type='checkbox']", ".mailbox-messages").iCheck("uncheck");
                    // alert($("input[type='checkbox']").val());
                    t_id = $('.selectval').map(function () {
                        return $(this).val();
                    }).get();
                    showAssign(t_id);
                    // alert(checkboxValues);
                } else {
                    //Check all checkboxes
                    $("input[type='checkbox']", ".mailbox-messages").iCheck("check");
                    // alert('Hallo');
                    t_id = [];
                    showAssign(t_id);
                }
                $(this).data("clicks", !clicks);

            });


        });


        $(document).ready(function () { /// Wait till page is loaded
            $('#click').click(function () {
                $('#refresh').load('inbox #refresh');
                $('#title_refresh').load('inbox #title_refresh');
                $('#count_refresh').load('inbox #count_refresh');
                $("#show").show();
            });

            $(".select2").select2();

            $('#delete').on('click', function () {
                option = 0;
                $('#myModalLabel').html("{{Lang::get('lang.delete-tickets')}}");
            });

            $('#close').on('click', function () {
                option = 1;
                $('#myModalLabel').html("{{Lang::get('lang.close-tickets')}}");
            });

            $("#modalpopup").on('submit', function (e) {
                e.preventDefault();
                var msg = "{{Lang::get('lang.confirm')}}";
                var values = getValues();
                if (values == "") {
                    msg = "{{Lang::get('lang.select-ticket')}}";
                    $('.yes').html("{{Lang::get('lang.ok')}}");
                    $('#myModalLabel').html("{{Lang::get('lang.alert')}}");
                } else {
                    $('.yes').html("Yes");
                }
                $('#custom-alert-body').html(msg);
                $("#myModal").css("display", "block");
            });

            $(".closemodal, .no").click(function () {
                $("#myModal").css("display", "none");
            });

            $(".closemodal, .no").click(function () {
                $("#myModal").css("display", "none");
            });

            $('.yes').click(function () {
                var values = getValues();
                if (values == "") {
                    $("#myModal").css("display", "none");
                } else {
                    $("#myModal").css("display", "none");
                    $("#modalpopup").unbind('submit');
                    if (option == 0) {
                        //alert('delete');
                        $('#delete').click();
                    } else {
                        //alert('close');
                        $('#close').click();
                    }
                }
            });

            function getValues() {
                var values = $('.selectval:checked').map(function () {
                    return $(this).val();
                }).get();
                return values;
            }


        });


    </script>
@stop