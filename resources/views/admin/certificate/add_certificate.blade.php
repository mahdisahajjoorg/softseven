@extends('master')

@section('title','Add Certificate')

@section('css_js_up')
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12">
    <form id="summary-form" class="form-horizontal"  method="post" action="{{route('certificate.add_certificate_form_submit')}}" enctype="multipart/form-data">		    
            @csrf			    
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Certificate Add</h2>
                    
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
                        <label class="col-sm-3 control-label">Certificate Title<span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="title">
                
                        </div>
                    </div>
                    
                </div>
                
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Certificate <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="file" name="image" class="form-control" style="padding:0px;0px;">
                        </div>
                    </div>
                    
                </div>
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Type <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select id="extra" name="type" onclick="test2()">
                         <option value="1" selected>Point</option>
                         <option value="2">Jump badge</option>                        
                        </select>
                        </div>
                    </div>
                    
                </div>
                 <div id="parentPermission" style="display: none">
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jump badge(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg"  name="jumpbage">
                        </div>
                    </div>
                 </div>
                    </div>
                <div id="parentPermission2" style="display: none">
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Addition(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg"  name="addition">
                        </div>
                    </div>
                    
                </div>
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Multiplication(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="addition">
                        </div>
                    </div>
                    
                </div>
                    <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Subtraction(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg"  name="subtraction">
                        </div>
                    </div>
                    
                </div>
                    <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Division(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg"  name="division">
                        </div>
                    </div>
                    
                </div>
                     
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Wordrace(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg"  name="wordrace">
                        </div>
                    </div>
                 </div></div>
                <div id="parentPermission" style="display: none">
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jump badge(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg"  name="jampbage">
                        </div>
                    </div>
                 </div>
                    </div>
                 <div id="parentPermission2" style="display: none">
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Addition(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="addition">
                        </div>
                    </div>
                    
                </div>
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Multiplication(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="multiplication">
                        </div>
                    </div>
                    
                </div>
                    <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Subtraction(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="subtraction">
                        </div>
                    </div>
                    
                </div>
                    <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Division(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg"  name="division">
                        </div>
                    </div>
                    
                </div>
                     
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Wordrace(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg"  name="wordrace">
                        </div>
                    </div>
                 </div></div>
                        <div style="display:none;">
<input type="hidden" value="POST" name="_method">
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
<script>
  
function test2() {
    if (document.getElementById('extra').value == 2) {
        document.getElementById('parentPermission').style.display = 'block';
        document.getElementById('parentPermission2').style.display = 'none';
    } else {
        document.getElementById('parentPermission').style.display = 'none';
        document.getElementById('parentPermission2').style.display = 'block';
    }
}
 
 </script>
@endsection

@section('css_js_down')
@endsection