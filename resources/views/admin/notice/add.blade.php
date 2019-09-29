@extends('master')

@section('title','Notice')

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

<form action="{{ route('notice.store') }}" id="summary-form" class="form-horizontal" enctype="multipart/form-data" method="POST" accept-charset="utf-8">

@csrf
    <div style="display:none;"><input type="hidden" name="_method" value="POST"></div><section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>
        <h2 class="panel-title">Notice Add</h2>
    </header>
<div class="panel-body">
        @if(Session::get('success'))
       <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
        </div>
        @endif


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
                        <label class="col-sm-3 control-label">Message<span class="required">*</span></label>
                        <div class="col-sm-9">
                          <textarea name="notice" class="form-control input-lg" required="required" cols="30" rows="6" id="NoticeMessage"></textarea>                        </div>
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