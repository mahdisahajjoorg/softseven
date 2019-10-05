@extends('master')

@section('title','Settings')

@section('css_js_up')
@endsection

@section('main_content')

<section class="content-body" role="main" style="margin: -40px;">
     <header class="page-header">
    <h2>Questions</h2>

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
        @if(Session::get('success_message'))
            <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('success_message')}}
            </div>
        @endif
       <div class="row">
       <div class="col-sm-12 text-right">
       <a href="{{route('question.add_money_level_question_form')}}" class="btn btn-primary">Add Money Level</a>                  
       </div>
      <br>
      <br>
      <br>
        <table class="table table-bordered table-striped mb-none" id="datatable-buttons">
            <thead>
                <tr>
                    <th>Contest Name</th>
                    <th>Category Name</th>
                    <th>Number ofproblem</th>
                    <th>Time</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>

                <?php foreach ($data as $key => $value) { ?>
                    <tr> 
                         <td><?php echo $value->money_contest_name; ?></td>
                         <td>{{ $value->money_cat_name}} </td>
                         <td>{{ $value->total_number_problem }}</td>
                         <td>{{ $value->contest_time }}</td>
                         <td>
                            <a href="{{route('ques.edit_money_q_form',['id'=>$value->id])}}" class="btn btn-primary">Edit</a> 
                            <a href="javascript:;" onclick="delete_money_q({{ $value->id}})" class="btn btn-danger">Delete</a> 
                         </td>
                    </tr>
                <?php } ?>
                

            </tbody>
        </table>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: true,
            lengthMenu: [10,25,50,100],          
        });       
    } );

</script>



         </section>
   
</div>

            

@endsection

@section('css_js_down')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function delete_money_q(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Money Question info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "GET",
            url: "{{route('question.del_money_level_question_form')}}",
            data: {id:id},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Money Question  deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('question.all_money_level_question_form')}}';                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The Money Question is not deleted!");
  }
});
  }
</script>

@endsection