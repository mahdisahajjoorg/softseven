@extends('master')

@section('title','School Contact List')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>School</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>School</span></li>
            <li><span>Index</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

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

        <h2 class="panel-title">
            School Contacts
        </h2>
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
    <form action="{{route('school_contact.email_update')}}" method="post" class="form-horizontal" id="summary-form">			    
            @csrf
            <div class="row">
                <div class="col-md-8">  
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Emails</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" value="{{$emailsetting->email}}" name="email">
                        </div>
                    </div>
                </div> 
                <div class="col-md-3 "><button class="btn btn-primary">Submit</button></div>
            </div>


      </form> 
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>School Name</th>

                    <th>City, State</th>
                    <th>School Phone</th>

                    <th>Email</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

                <?php foreach ($school_contacts as $school) { ?>
                    <tr>
                        <td><?php echo $school->id; ?></td>
                        <td><?php echo $school->school_name; ?></td>

                        <td><?php
                            $citystate = '';
                            if (isset($school->state) && !empty($school->state)) {
                                $citystate = $school->city . ' ' . $school->sta->state_abbr;
                            } else
                                $citystate = $school->city;
                            echo $citystate;
                            ?></td>
                        <td><?php echo $school->school_phone; ?></td>


                        <td><?php echo $school->school_email; ?></td>
                        <td>
                        <a href="{{route('school_contact.school_contact_edit_form',['id'=>$school->id])}}" class="btn btn-primary">Edit</a>
                        <a href="javascript:;" onclick="deleteContact({{$school->id}})" class="btn btn-primary">Delete</a>
                        <a href="{{route('school_contact.send_mail',['id'=>$school->id])}}" class="btn btn-primary">Send Mail</a>
                        </td>
                        </tr>
                <?php } ?>


            </tbody>
        </table>
    </div>
</section>
@endsection

@section('css_js_down')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteContact(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this contact info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "POST",
            url: "{{route('school_contact.contact_delete')}}",
            data: {id:id,"_token": "{{ csrf_token() }}"},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("School Contact deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = "{{route('school_contact.index')}}";                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The School Contact is not deleted!");
  }
});
  }
</script>
@endsection