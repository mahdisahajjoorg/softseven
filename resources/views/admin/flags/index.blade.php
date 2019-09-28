@extends('master')

@section('title','Flags')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Flags</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Flags</span></li>
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

        
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Code</th>
                    <th>Flag</th>
                    
                    <th>Remove</th>
                    
                </tr>
            </thead>
            <tbody>
            @if($countries->count()>0)
            @foreach($countries as $s)
                <tr>
                    <td>Country</td>
                    <td>
                     {{$s->name}}
                    </td>
                    <td>
                      <img src="{{url('')}}/assets/flag/country/{{$s->flag_file_name}}" class="shadow" height="70" width="170">  
                    </td>
                    <td>
                    <a href="javascript:;" onclick="deleteFlag({{$s->id}},'Country')" class="btn btn-primary delete">Remove</a>
                      
                    </td>
                    
                </tr>
                @endforeach
            @endif  
                 
            @if($states->count()>0)
            @foreach($states as $s)
                <tr>
                    <td>Usa State</td>
                    <td>
                     {{$s->name}}
                    </td>
                    <td>
                      <img src="{{url('')}}/assets/flag/state/{{$s->flag_file_name}}" class="shadow" height="70" width="170">  
                    </td>
                    <td>
                    <a href="javascript:;" onclick="deleteFlag({{$s->id}},'State')" class="btn btn-primary delete">Remove</a>
                      
                    </td>
                    
                </tr>
                @endforeach
            @endif
            @if($schools->count()>0)
            @foreach($schools as $s)
                <tr>
                    <td>School</td>
                    <td>
                     {{$s->school_name}}
                    </td>
                    <td>
                      <img src="{{url('')}}/assets/flag/school/{{$s->flag_file_name}}" class="shadow" height="70" width="170">  
                    </td>
                    <td>
                    <a href="javascript:;" onclick="deleteFlag({{$s->id}},'School')" class="btn btn-primary delete">Remove</a>
                      
                    </td>
                    
                </tr>
                @endforeach
            @endif 

                
            </tbody>
        </table>
    </div>
</section>
@endsection

@section('css_js_down')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteFlag(id,type){
    swal({
    title: "Are you sure?",
    text: "Once removed, you will not be able to recover this flag info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "POST",
            url: "{{route('flag.remove_flag')}}",
            data: {id:id,type:type,"_token": "{{ csrf_token() }}"},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Flag removed successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = "{{route('flag.index')}}";                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The flag is not removed!");
  }
});
  }
</script>
@endsection