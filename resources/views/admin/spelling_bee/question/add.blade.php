@extends('master')

@section('title','Add Weeks')

@section('css_js_up')
@endsection

@section('main_content')
{{-- <header class="page-header">
    <h2>SpellingBee Weeks</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Questions</span></li>
            <li><span>Index</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header> --}}

<section class="panel">

<form action="{{ route('questions.save') }}" id="summary-form" class="form-horizontal" enctype="multipart/form-data" method="POST" accept-charset="utf-8">

@csrf
    <div style="display:none;"><input type="hidden" name="_method" value="POST"></div><section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>
        <h2 class="panel-title">Add Speeling Week</h2>
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
            <label class="col-sm-3 control-label">Game<span class="required">*</span></label>
            <div class="col-sm-9">
                <select class="form-control" name="game_id">
                    <option value="9">SpeelingBee</option>
                </select>
            </div>
        </div>

        <div class="form-group" id="pr_grade">
            <label class="col-sm-3 control-label">SpellingBee Grade<span class="required">*</span></label>
            <div class="col-sm-9">
                <select class="form-control" name="grade" id="grade_id">
                <option value="1">Grade 1</option><option value="2">Grade 2</option><option value="3">Grade 3</option><option value="4">Grade 4</option><option value="5">Grade 5</option>                </select>
            </div>
        </div>





        <div class="form-group">
            <label class="col-sm-3 control-label">SpellingBee week<span class="required">*</span></label>
            <div class="col-sm-9">
                <select class="form-control" name="week" id="weekid" style="border: 1px solid rgb(204, 204, 204);"><option value="1">Week 1</option><option value="2">Week 2</option><option value="3">Week 3</option><option value="4">Week 4</option></select>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">SpellingBee Word</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="word">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">SpellingBee Definition</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="definition">
            </div>
        </div>

    <div class="form-group">
    <label class="col-sm-3 control-label">Attach Mp3 File<span class="required">*</span></label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="music">
            </div>
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
</section>
@endsection

@section('css_js_down')

@endsection