@extends('master')

@section('title','Employees')

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
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>
        <h2 class="panel-title">Add Speeling Grade</h2>
    </header>

    <form action="{{ route('allgrade.store') }}" method="POST">
        @csrf
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
            <label class="col-sm-3 control-label">SpellingBee Grade</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="grade" value="{{old('grade')}}">
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
</form>
</section>
@endsection

@section('css_js_down')

@endsection