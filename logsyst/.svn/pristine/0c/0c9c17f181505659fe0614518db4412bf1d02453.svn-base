
<!-- Assign transaction model-->
<div class="modal fade" id="Assigntransactions">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="assign-close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{!! Lang::get('lang.assign-transaction') !!} </h4>
            </div><!-- /.modal-header-->
            <div class ="modal-body">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-6" id="assign_loader"  style="display:none;">
                        <img src="{{asset("lb-faveo/media/images/gifloader.gif")}}"><br/><br/><br/>
                    </div><!-- /.merge-loader -->
                </div>
                <div id="assign_body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="assign-form">
                                {{ csrf_field() }}
                                <label>{!! Lang::get('lang.whome_do_you_want_to_assign_transaction') !!}</label>
                                <select id="assign" class="form-control" name="assign_to">

                                    <?php
                                    $teams        = App\Model\helpdesk\Agent\Teams::where('status', '=', '1')->where('team_lead', '!=', null)->get();
                                    $count_teams  = count($teams);
                                    $assign       = App\User::where('role', '!=', 'user')->select('id', 'first_name', 'last_name')->where('active', '=', 1)->where('is_delete', '!=', 1)->where('ban', '!=', 1)->orderBy('first_name')->get();
                                    $count_assign = count($assign);
                                    ?>
                                    <optgroup label="Teams ( {!! $count_teams !!} )">
                                        @foreach($teams as $team)
                                        <option  value="team_{{$team->id}}">{!! $team->name !!}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Agents ( {!! $count_assign !!} )">
                                        @foreach($assign as $user)
                                        <option  value="user_{{$user->id}}">{{$user->first_name." ".$user->last_name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>

                        </div>
                    </div>
                </div><!-- mereg-body-form -->
            </div><!-- merge-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="dismis2">{!! Lang::get('lang.close') !!}</button>
                <input  type="submit" id="merge-btn" class="btn btn-primary pull-right" value="{!! Lang::get('lang.assign') !!}"></input>
                {!! Form::close() !!}
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Assign transaction model-->