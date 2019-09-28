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

<form action="{{ route('all_week.update', $week['id']) }}" id="summary-form" class="form-horizontal" enctype="multipart/form-data" method="GET" accept-charset="utf-8">

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
        <div class="form-group">
            <label class="col-sm-3 control-label">SpellingBee week<span class="required">*</span></label>
            <div class="col-sm-9">
                <select class="form-control" name="grade">
                   {{--  <option value="1">Grade 1</option><option value="2">Grade 2</option><option value="3">Grade 3</option><option value="4">Grade 4</option><option value="5">Grade 5</option> --}}  
                   @foreach($allgrade as $grade)
                        <option value="{{ $grade['id'] }}" <?php echo ($grade['id'] == $week['grade_id'])?'selected':'' ?>>{{ $grade['grade'] }}</option>
                   @endforeach    
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">SpellingBee week</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="week" value="{{ $week['week'] }}">
            </div>
        </div>
        
                        <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">

                    <div class="radio pull-left">
                    <label>   &nbsp; &nbsp;<input type="radio" value="1" name="status" <?php echo ($week['status'] == 1)?'checked':'' ?>>Yes</label>
                    &nbsp; &nbsp;
                    &nbsp;
                    &nbsp;
                    </div>
                    <div class="radio">
                    <label><input type="radio" value="0" name="status" <?php echo ($week['status'] == 0)?'checked':'' ?>>No</label>
                    </div>
                        
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