@extends('master')

@section('title','Edit School Contact')

@section('css_js_up')
@endsection

@section('main_content')
<section class="content-body" role="main">
     <div class="row">
    <div class="col-md-12">
        <form action="{{route('school_contact.send_mail_submit')}}" id="summary-form" class="form-horizontal" method="post">
        @csrf
        <section class="panel">
        @if(Session::get('success_message'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('success_message')}}
        </div>
    @endif
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Send Mail</h2>

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
                    <label class="col-sm-3 control-label">Subject <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input name="subject" class="form-control input-lg" type="text" id="SchoolContactsSubject">                    </div>
                </div>
               


                <div class="form-group">
                    <label class="col-sm-3 control-label">Message</label>
                    <div class="col-sm-9">
                        <textarea name="message" class="form-control input-lg" cols="30" rows="6" id="SchoolContactsMessage"></textarea>                    </div>
                </div>

                <input type="hidden" name="contact_id" value="{{$id}}">
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </footer>
        </div></section>
        </form> 
    </div>
</div>                
</section>
@endsection

@section('css_js_down')

@endsection