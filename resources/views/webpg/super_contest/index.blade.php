@extends('master_webpg')

@section('title','Super Contest')

@section('css_js_up')
<style>
table#example tr th:nth-child(3) {
min-width: 240px !important;
}
table#example tr th:nth-child(4) {
min-width: 125px !important;
}
</style>
@endsection

@section('nav')
<nav style="margin-bottom:25px;" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="color: red; font-size: 33px; line-height: 60px;" class="navbar-brand imgband" href="index.php">SuperContest - Multiplication - Einstein</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul  class="nav navbar-nav menu">
                    <li>
                        <a href="index.php">Student List</a>
                    </li>
                    <li>
                        <a href="grandtotal.php">Top Schools</a>
                    </li>
                    <!--<li>
                        <a href="highsore.php">High Scores</a>
                    </li>-->
                   <!--<li>
                        <a href="jumpbadge.php">Jump Badges</a>
                    </li>-->
                   <li>
                        <a href="grandtotal_per_students.php">Grand Totals</a>
                    </li>
                    <li>
                        <a href="{{route('outer_super.index')}}" class="active">Super Contest</a>
                    </li>
					 <li>
                        <a href="mobilescores.php">Mobile Scores</a>
                    </li>
                    <li>
                        <a href="addschool.php">Contact SoftSeven</a>
                    </li>
		    <li>
                        <a href="http://softseven.com">Home Page</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div style="margin-top: 50px;"></div>
<style>
    .menu li a{
        color: yellow !important;
        font-size: 18px;
    }
    .imgband{
        padding: 2px 15px !important;
    }
	.active{
		border-bottom: 2px solid yellow;
		padding-bottom:2px !important;
	}
</style>
<script>
$(document).ready(function () {
$(function() {
     var pgurl = window.location.href.substr(window.location.href
.lastIndexOf("/")+1);
     $("nav ul a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("active");
     })
});
});
</script>
@endsection

@section('main_content')

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <div class="col-md-2">
                    <form action="{{route('outer_super.super_contest_post')}}" method="post" id='grandtotal'>
                        @csrf
                        <div class="form-group">
                            <label for="usr">Game Type:</label>
                            <select class="form-control" id="game" name="game_type">
                                <?php foreach ($games as $k => $game) { ?>
                                <?php if($k=="multiplication"){ ?>
                                    <option data-id="<?php echo $game; ?>" value="<?php echo $k; ?>" selected> <?php echo $game; ?></option>                                    
                                <?php } else{ ?>
                                    <option data-id="<?php echo $game; ?>" value="<?php echo $k; ?>"> <?php echo $game; ?></option>
                                        <?php }} ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usr">Game Name:</label>
                          <select class="form-control" id="level" name="game">
                                <option value="">All Games</option>
                                        <?php foreach ($gamecontest as $k => $games) { ?>
                                    <option value="<?php echo $games->id; ?>"><?php echo $games->name_problem ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="usr">Options:</label>
                            <select class="form-control" id="options" name="options">
                                <?php foreach($options as $o=>$option) { ?>
                                <?php if($opt==$option){?>
                                    <option data-id="<?php echo $option; ?>" value="<?php echo $o; ?>" selected> <?php echo $option; ?></option>                                                                                                              
                                <?php } else{ ?>
                                    <option data-id="<?php echo $option; ?>" value="<?php echo $o; ?>"> <?php echo $option; ?></option>                                                                          
                                <?php }}?>       
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usr">State:</label>
                          <select class="form-control" id="level" name="state">
                               <option value="">All State</option>
                               @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usr">School:</label>
                          <select class="form-control" id="level" name="school">
                               <option value="">All Schools</option>
                               @foreach($schools as $school)
                                <option value="{{$school->school_code}}">{{$school->school_name}}</option>
                               @endforeach
                            </select>
                        </div>

                        <!--<button type="submit" name="data[submit]" class="btn btn-default">Submit</button>-->
                    </form>
                </div>

                <div class="col-md-9">
                    <div class="row">

                    </div>
                    <br>
                    <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Screen Name</th>
                                    <th>School Name</th>
                                    <th>Add City,State</th>
                                    <th>High Score</th>
                                    
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>Rank</th>
                                    <th>Screen Name</th>
                                    <th>School Name</th>
                                    <th>Add City,State</th>
                                    <th>High Score</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                
                               
                                
                                <?php // print_r($schoolcodes);exit;
                                foreach ($schoolcodes as $k => $v) { 
                                   
                                       if($v->maxscore != 0) {
                                   ?>
                                    <tr>
                                        <td><?php echo $k + 1; ?></td>
                                        <td><?php echo $v->screen_name; ?></td>
                                        <td><?php echo $v->school_name; ?></td>
                                        <td><?php echo $v->city;?> , <?php if($v->state){echo $v->state;}else{echo $v->country;}?></td>
                                        <td><?php echo $v->maxscore; ?></td>
                                       
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                </div>

            </div>

        </div>
        <!-- /.container -->
@endsection

@section('css_js_down')
<script type="text/javascript">

$(document).ready(function () {

    $('body').delegate('#options', 'change', function (e) {
        e.preventDefault();
        $("#grandtotal").submit();
    });
    $('body').delegate('#level', 'change', function (e) {
        e.preventDefault();
        $("#grandtotal").submit();
    });
    $('body').delegate('#game', 'change', function (e) {
        e.preventDefault();
        var game = $(this).val();
        console.log(game);
        
        $("#grandtotal").submit();
    });


    $('#example').dataTable({
        "order": [[4, "desc"]],
        "paging": true,
        "lengthMenu": [[100, 1000, 10000], [100, 1000, 10000]]
    });
});
</script>
@endsection