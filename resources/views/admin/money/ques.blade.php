@extends('master')

@section('title','Settings')

@section('css_js_up')
@endsection

@section('main_content')

<header class="page-header">
    <h2>Questions</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="">
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
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
       <div class="col-sm-6 text-right">
           <form action="" mentho="post">
            <select class="browser-default custom-select" id="mySelect"  onchange="myFunction()">
                <option selected  value="all">all</option>
                @foreach($contest_name as $cont_name)
                <option value="<?php echo $cont_name->id; ?>"><?php echo $cont_name->money_contest_name; ?></option>
                @endforeach
            </select>
               
           </form>
    
        </div>
        <div class="col-sm-6 text-right">
             <a href="{{route('question.add_money_question_form')}}" class="btn btn-primary">Add Money Qustion</a>                      
        </div>
        
     </div>    
        
        
      <br>
      <br>
      <br>
       </div>
       
       <div id="pr_all_div">
       
        <table class="table table-bordered table-striped mb-none" id="datatable-buttons">
            <thead>
                <tr>
                    <th>Image </th>
                    <th>Answer </th>
                    <th>Hint</th>
                    <th>Contest Name</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>

            	@foreach($ques as $q)
                
                <tr> 
                     <td>
                         <img src="{{ url('assets/question/img/'.$q->Image) }}" class="img-responsive" alt="" />
                     </td>
		             <td><?php echo $q->answer1; ?></td>
		             <td><?php echo $q->hint; ?></td>
		             <td><?php echo $q->money_contest_name; ?></td>
		             <td>
                    <a href="{{route('money.edit_money_submit_form',['id'=>$q->id])}}" class="btn btn-primary">Edit</a>
                    <a href="javascript:;" onclick="deleteMoney_ques({{$q->id}})" class="btn btn-danger">Delete</a>                                          
                     </td>
               </tr>
               @endforeach
            </tbody>
        </table>
        
        </div>

    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        //Buttons examples
        $('#pr_state_div').hide();
        var table = $('#datatable-buttons').DataTable({
            lengthChange: true,
            lengthMenu: [100,200,500,1000],          
        });  
        
    } );
    function myFunction() {
  var x = document.getElementById("mySelect").value;
     $.ajax({
    url: 'https://softseven.org/admin/questions/single_money_qustion/'+x,
    success: function (result) {
          jQuery('#pr_all_div').html(''); 
          jQuery('#pr_all_div').html(result);
    }
    });


}
</script>



         </section>
   
</div>   

@endsection

@section('css_js_down')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteMoney_ques(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this employee info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "GET",
            url: "{{route('question.del_money_question_form')}}",
            data: {id:id},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Employee deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('question.all_money_question')}}';                                                  
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