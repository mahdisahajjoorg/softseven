@extends('master')

@section('title','Edit Certificate')

@section('css_js_up')
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12">
    <form id="summary-form" class="form-horizontal"  method="post" action="{{route('certificate.edit_certificate_form_submit')}}" enctype="multipart/form-data">		    
            @csrf			    
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Certificate Edit</h2>
                    
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
                        <input type="text" class="form-control input-lg" name="title" value="{{$certificate->title}}">
                
                        </div>
                    </div>
                    
                </div>
                
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Certificate</label>
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
                        @if($certificate->type==1)
                         <option value="1" selected>Point</option>
                         <option value="2">Jump badge</option>
                         @endif
                         @if($certificate->type==2)
                         <option value="1">Point</option>
                         <option value="2" selected>Jump badge</option>
                         @endif
                        </select>
                        </div>
                    </div>
                    
                </div>
                <?php if($certificate->type == 2){ ?>
                 <div id="parentPermission" style="display: block">
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jump badge(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" value="{{$certificate->jampbage}}" name="jumpbage">
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
                        <input type="text" class="form-control input-lg" value="{{$certificate->addition}}" name="addition">
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
                        <input type="text" class="form-control input-lg" value="{{$certificate->multiplication}}" name="addition">
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
                        <input type="text" class="form-control input-lg" value="{{$certificate->subtraction}}" name="subtraction">
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
                        <input type="text" class="form-control input-lg" value="{{$certificate->division}}" name="division">
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
                        <input type="text" class="form-control input-lg" value="{{$certificate->wordrace}}" name="wordrace">
                        </div>
                    </div>
                 </div></div>
                <?php }else if($certificate->type == 1) {?>
                <div id="parentPermission" style="display: none">
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jump badge(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" value="{{$certificate->jampbage}}" name="jampbage">
                        </div>
                    </div>
                 </div>
                    </div>
                 <div id="parentPermission2" style="display: block">
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Addition(number will greater than) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" value="{{$certificate->addition}}" name="addition">
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
                        <input type="text" class="form-control input-lg" value="{{$certificate->multiplication}}" name="multiplication">
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
                        <input type="text" class="form-control input-lg" value="{{$certificate->subtraction}}" name="subtraction">
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
                        <input type="text" class="form-control input-lg" value="{{$certificate->division}}" name="division">
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
                        <input type="text" class="form-control input-lg" value="{{$certificate->wordrace}}" name="wordrace">
                        </div>
                    </div>
                 </div></div>
                <?php }?>
                        <div style="display:none;">
<input type="hidden" value="POST" name="_method">
</div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="hidden" name="cert_id" value="{{$certificate->id}}">
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