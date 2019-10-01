@extends('master')

@section('title','Score')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Scores</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            
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

        <h2 class="panel-title">
            Scores
        </h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th><span>Screen Name
                            </span></th>
                    <th><span>School Code
                            </span></th>
                    <th><span>Game Name</span></th>
                    <th><span>Game Level</span></th>
                    
                    <th><span>Score</span></th>
                    <th><span>Jump Badge</span></th>
                    <th><span>Score Certificate</span></th>
                    <th><span>Jump Badge Certificate</span></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($score as $score) {//echo $score['Score']['id'];die(); ?>
                    <tr>
                        <?php //echo $this->Paginator->sort('title', 'Title'); ?>
                        <td>
                            
                            <?php echo $score->screen_name; ?></td>
                        <td><?php echo $score->school_code; ?></td>
                        <td><?php echo $score->game_name; ?></td>
                        <td><?php echo $score->game_level; ?></td>
                        <td><?php echo $score->score; ?></td>
                        <td><?php echo $score->jump_badge; ?></td>
                        <td><?php
                        if($score->game_name=='auditory' || $score->game_name=='visual')
                        $gmnm='wordrace';
                        else $gmnm=$score->game_name;
                            $gmlv=$score->game_level;
                            $scoress=$score->score;
                            foreach($certificates as $k=>$v){//debug($v);
                              //echo   key($v['Certificate']).'<br>';
                                if($v->$gmnm!=0 && $scoress >= $v->$gmnm){
                                    ?>
                                    <a href="{{route('score.scores_award',['c_id'=>$v->id,'s_id'=>$score->id])}}">{{$v->title}}</a>
                                    <?php
                                  break;
                                }
                            }
                        ?>
                            
                            
                            
                            
                            
                            
                            <?php 
                            /*
                            if($gmnm=='addition'){
                                if($scoress>300)
                                      echo $this->Html->link("Newton Award", array('controller' => 'scores', 'action' => 'newtonaward', $score['Score']['id']), array('escape' => false)); 
                                   // echo '';
                                if($scoress>600)//echo 'Double Newton Award';
                                echo $this->Html->link("Double Newton Award", array('controller' => 'scores', 'action' => 'doublenewtonaward', $score['Score']['id']), array('escape' => false)); 
                            }else if($gmnm=='multiplication'){
                               if( $scoress>2000){
                                //echo 'Einstein Award';
                                 echo $this->Html->link("Einstein Award", array('controller' => 'scores', 'action' => 'einsteinaward', $score['Score']['id']), array('escape' => false)); 
                                }
                            }
                            else if($gmnm=='auditory' || $gmnm=='visual' ){
                               if( $scoress>2000){
                               // echo 'Einstein Award';
                                 echo $this->Html->link("Einstein Award", array('controller' => 'scores', 'action' => 'einsteinaward',$score['Score']['id']), array('escape' => false)); 
                                }
                            }
                            
                            */
                            
                            ?>
                        </td>
<td><?php
                        if($score->game_name=='auditory' || $score->game_name=='visual')
                        $gmnm='wordrace';
                        else $gmnm=$score->game_name;
                            $gmlv=$score->game_level;
                            $scoress=$score->score;
                            $jump_badge=$score->jump_badge;
                            foreach($certificates as $k=>$v){//debug($v);
                              //echo   key($v['Certificate']).'<br>';
                               if($jump_badge >= $v->jampbage && $v->jampbage != 0 && $v->type == 2){
                                   ?>
                                    <a href="{{route('score.scores_award',['c_id'=>$v->id,'s_id'=>$score->id])}}">{{$v->title}}</a>
                                   <?php
                                  break;
                                }
                             }
                        ?>
                             
                        </td>

                    </tr>
                <?php } ?>


            </tbody>
        </table>

    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#datatable-default_paginate').hide();

    });
</script>
<style>
    .prev, .next{padding:10px;}
</style>
@endsection

@section('css_js_down')
@endsection