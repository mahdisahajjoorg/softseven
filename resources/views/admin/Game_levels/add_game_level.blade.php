@extends('master')

@section('title','Add Game Level')

@section('css_js_up')
@endsection

@section('main_content')

<div class="row">
    <div class="col-md-12">
    <form action="{{route('game.add_game_level_form_submit')}}" method="post" class="form-horizontal" id="summary-form">			    
            @csrf						    
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Game Level Add</h2>
                    
                </header>
                <div class="panel-body">
                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                @endif
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Game Name <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select class="form-control input-lg" name="game">
                            @if($games->count()>0)
                            @foreach($games as $g)
                             <option value="{{$g->id}}">{{$g->game_name}}</option>
                            @endforeach
                            @endif
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Game Level<span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="level">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Level Low<span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="low">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Level High<span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="high">
                        </div>
                    </div>
                   
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </footer>
            </section>
     </form> 
    </div>
</div>
@endsection

@section('css_js_down')
@endsection