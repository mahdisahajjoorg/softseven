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
        <table class="table table-bordered table-striped mb-none" id="approve_student">
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
<script type="text/javascript">
    var oTable;

    $(document).ready(function() {
        oTable = $('#approve_student').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": "{!!route('score.score_list')!!}",
            "columns": [
                {data: 'screen_name',  name: 'screen_name'},
                {data: 'school_code',  name: 'school_code'},
                {data: 'game_name',  name: 'game_name'},
                {data: 'game_level',  name: 'game_level'},
                {data: 'score',  name: 'score'},
                {data: 'jump_badge',  name: 'jump_badge'},
                {data: 'score_certificate',  name: 'score_certificate'},
                {data: 'jump_badge_certificate',  name: 'jump_badge_certificate'},
            ]
        });
    });
</script>
@endsection