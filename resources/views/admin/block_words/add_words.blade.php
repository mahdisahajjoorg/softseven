@extends('master')

@section('title','Add Word')

@section('css_js_up')
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12">
    <form id="summary-form" class="form-horizontal"  method="post" action="{{route('blockwords.add_word_form_submit')}}">		    
            @csrf				    
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Word Add</h2>
                    
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
                        <label class="col-sm-3 control-label">Type <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select class="form-control input-lg" name="type">
                            <option value="noun">Noun</option>
                            <option value="adjective">Adjective</option>
                            <option value="animal">Animal</option>
                            <option value="plant">Plant</option>
                            <option value="name">Name</option>
                        </select>
                        </div>
                    </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Block Words <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" name="word" class="form-control input-lg" id="e23">
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
    <script type="text/javascript">
                        $("#e23").select2({
                          tags:["red", "green", "blue"],
                          maximumInputLength: 10
                      });
</script>
@endsection

@section('css_js_down')
@endsection