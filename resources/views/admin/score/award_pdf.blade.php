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
                <br>
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
        
        
    </body>
</html>