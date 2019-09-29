@extends('master')

@section('title','Mathrace : Firstname')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Firstname</h2>

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
</header>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>


    </header>
    <div class="panel-body">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
       <div class="dropdown">
             <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">A---Z  <span class="caret"></span></button>
                 <ul class="dropdown-menu">
                     <li class="alp-drop"><a href="#" alphattr="a" class="alphabate">A</a></li>
                     <li class="alp-drop"><a href="#" alphattr="b" class="alphabate">B</a></li>
                     <li class="alp-drop"><a href="#" alphattr="c" class="alphabate">C</a></li>
                     <li class="alp-drop"><a href="#" alphattr="d" class="alphabate">D</a></li>
                     <li class="alp-drop"><a href="#" alphattr="e" class="alphabate">E</a></li>
                     <li class="alp-drop"><a href="#" alphattr="f" class="alphabate">F</a></li>
                     <li class="alp-drop"><a href="#" alphattr="g" class="alphabate">G</a></li>
                     <li class="alp-drop"><a href="#" alphattr="h" class="alphabate">H</a></li>
                     <li class="alp-drop"><a href="#" alphattr="i" class="alphabate">I</a></li>
                     <li class="alp-drop"><a href="#" alphattr="j" class="alphabate">J</a></li>
                     <li class="alp-drop"><a href="#" alphattr="k" class="alphabate">K</a></li>
                     <li class="alp-drop"><a href="#" alphattr="l" class="alphabate">L</a></li>
                     <li class="alp-drop"><a href="#" alphattr="m" class="alphabate">M</a></li>
                     <li class="alp-drop"><a href="#" alphattr="n" class="alphabate">N</a></li>
                     <li class="alp-drop"><a href="#" alphattr="o" class="alphabate">O</a></li>
                     <li class="alp-drop"><a href="#" alphattr="p" class="alphabate">P</a></li>
                     <li class="alp-drop"><a href="#" alphattr="q" class="alphabate">Q</a></li>
                     <li class="alp-drop"><a href="#" alphattr="r" class="alphabate">R</a></li>
                     <li class="alp-drop"><a href="#" alphattr="s" class="alphabate">S</a></li>
                     <li class="alp-drop"><a href="#" alphattr="t" class="alphabate">T</a></li>
                     <li class="alp-drop"><a href="#" alphattr="u" class="alphabate">U</a></li>
                     <li class="alp-drop"><a href="#" alphattr="v" class="alphabate">V</a></li>
                     <li class="alp-drop"><a href="#" alphattr="w" class="alphabate">W</a></li>
                     <li class="alp-drop"><a href="#" alphattr="x" class="alphabate">X</a></li>
                     <li class="alp-drop"><a href="#" alphattr="y" class="alphabate">Y</a></li>
                     <li class="alp-drop"><a href="#" alphattr="z" class="alphabate">Z</a></li>
                 </ul>
       </div>
</div>
<div class="col-md-4"></div>
</div>
        @if(Session::get('success'))
       <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
        </div>
        @endif
       <div class="row">
      <br>
      <br>
      <br>
       </div>
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

 <tbody>

            <?php foreach ($alluser as $con) {?>
         <tr>
            <td> <?php echo $con['id']; ?></td>
            <td><?php echo $con['firstname']; ?></td>
            <td><span class="btn btn-<?php echo $con['status']==1?'success':'danger'; ?>"><?php echo $con['status']==1?'Yes':'No'; ?></span></td>
            <td>
                <a href="{{route('firstname_list.edit',['id'=>$con->id])}}" class="btn btn-primary">Edit</a>

            </td>

         </tr>



<?php }?>


</tbody>
</table>
</div>
</section>
@endsection

@section('css_js_down')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteSpellingBee(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "GET",
            url: "{{route('spelling_bee.delete_grade')}}",
            data: {id:id},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Grade deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('allgrade.index')}}';                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The employee is not deleted!");
  }
});
  }
</script>
@endsection