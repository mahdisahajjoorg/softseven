<html>
    <head>
           <title>Certificate</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style type="text/css">
            .nrcontainer{margin:4% 8%;}
            p .nrfirst{font-size: 18px; font-weight: 600;}
            p {font-size: 16px; font-weight: 600;}
            @media print {   .print_button, .editbtn { display: none; }
                 .nrcontainer { display:block; background-color:#FFFFFF;   
border: solid 1px black ;  
margin: 0px;   }
                .nrcontainer a:link:after, a:visited:after {  
                 display: none;
                 content: ""; 
             }
             @page { size: auto;  margin: 0mm; }
            }
            .font1{
                font-size: 45px;
            }
            .font2{
                font-size:40px;
            }
            .font3{
                font-size:30px;
             }
        </style>
    </head>
    <body>
        
        <FORM>
        <br>
<input class='print_button' type="button" onClick="window.print()" value='Print'>
<a href="#" id="editbtn" class="btn btn-primary editbtn">Edit</a>
<a href="{{route('score.score_award_pdf',['c_id'=>$certificate->id,'s_id'=>$score->id])}}"  class="btn btn-primary editbtn">Download</a> 
</FORM> 
        <div class="container nrcontainer print_div">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6"><h4  id='dateh4'><?php echo date('l, F d, Y'); ?></h4></div>
            </div>
            <div class="row">
                <div class="col-md-12"><h2 class='font1'>Softseven's</h2></div>
                <div class="col-md-6"><h2 class="font2"><?php echo $certificate->title; ?></h2></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="{{url('')}}/assets/upload/certificates/{{$certificate->image_file_name}}" height="270" width="270"/>
                </div>
                <div class="col-md-12">
                    <h1 id='nameh1' class="font2"><?php if(isset($score->student->firstname)){ echo $score->student->firstname.' '.$score->student->lastname;}?></h1> 
                </div>
                <div class="col-md-12">
                    <?php 
                     if($score->game_name=='auditory' || $score->game_name=='visual')
                      $gamee='Wordrace';
                     else $gamee=ucfirst($score->game_name);
                     
                     ?>
                    


                    <p class='nrfirst font3'>Scored <span id='scorespan'><?php echo $score->score; ?></span> on  <span id='gamespan'><?php echo $gamee;?></span></p>
                    <p class="font3">Presented At <span id='schoolspan'><?php echo $score->school->school_name;?></span></p>
                    <p class="font3">By <span id='principalspan'> <?php echo $score->school->principal; ?></span> <?php if(isset($score->student->teacher_id)){ ?> and <span id='teacherspan'><?php echo $score->student->teacher_id;?></span><?php } ?></p>
               

                </div>
                
             </div>
        </div>
        <div class="container nrcontainer edit_div">
            <div class="row">
                
                <div class="col-md-6">
                    <label class="col-md-2">Date</label>
                    <input id="date"  class="col-md-4" type="text" maxlength="255"  value="<?php echo date('l, F d, Y'); ?>">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><h3>Softseven's</h3></div>
                <div class="col-md-6"><h2 class="font2"><?php echo $certificate->title; ?></h2></div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                <img src="{{url('')}}/assets/upload/certificates/{{$certificate->image_file_name}}" height="180" width="180"/>
                </div>
                <div class="row nrfirst">
                    <label class="col-md-2">Name</label> <input id="name" class="col-md-6" type="text" maxlength="255"  value="<?php if(isset($score->student->firstname)){  echo $score->student->firstname.' '.$score->student->lastname; }?>">
                   
                    <h1></h1> 
                </div>
                <div class="col-md-12">
                    <?php 
                     if($score->game_name=='auditory' || $score->game_name=='visual')
                      $gamee='Wordrace';
                     else $gamee=ucfirst($score->game_name);
                     
                     ?>
                    <div class='row nrfirst'><label class="col-md-2">Score </label> <input id="score" class="col-md-2" type="text" maxlength="255"  value="<?php echo $score->score; ?>" > </div>
                    <div class='row nrfirst'><label class="col-md-2">Game Name </label> <input id="gamename" class="col-md-2" type="text" maxlength="255"  value="<?php echo $gamee; ?>"> </div>
                    <div class='row nrfirst'><label class="col-md-2">School Name </label>  <input id="schoolname" class="col-md-5" type="text" maxlength="255"  value="<?php echo $score->school->school_name; ?>" ></div>
                    <div class='row nrfirst'><label class="col-md-2">Principal</label> <input id="principal" class="col-md-2" type="text" maxlength="255"  value="<?php echo $score->school->principal; ?>" >  </div>
                    <div class='row nrfirst'><label class="col-md-2">Teacher</label> <input id="teacher" class="col-md-2" type="text" maxlength="255"  value="<?php if(isset($score->student->teacher_id)){  echo $score->student->teacher_id; } ?>" > </div>
                </div>
                
             </div>
        </div>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $(".edit_div").hide();
                $('body').delegate('#editbtn', 'click',function(e){
                //$("#editbtn").click(function(e){
                    e.preventDefault();

                    alert('{{url("")}}');
                    $(".print_div").hide();
                    $(".edit_div").show();
                    $(this).attr('id', 'editedbtn');
                    $(this).html('Save Edit');
                    
                });
                $('body').delegate('#editedbtn', 'click',function(e){
                //$("#editedbtn").click(function(e){
                    e.preventDefault();
                    
                    
                    alert('nandita');
                    var date=$("#date").val();
                    var name=$("#name").val();
                    var score=$("#score").val();
                    var gamename=$("#gamename").val();
                    var schoolname=$("#schoolname").val();
                    var principal=$("#principal").val();
                    var teacher=$("#teacher").val();
                    $("#dateh4").html(date);
                    $("#nameh1").html(name);
                    $("#scorespan").html(score);
                    $("#gamespan").html(gamename);
                    $("#schoolspan").html(schoolname);
                    $("#principalspan").html(principal);
                    $("#teacherspan").html(teacher);

                    $(".print_div").show();
                    $(".edit_div").hide();
                    $(this).attr('id', 'editbtn');
                });
            });
        </script>
    </body>
</html>