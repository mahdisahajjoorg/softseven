<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Softseven Employee</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                            <a href="{{route('employee.add_employee_form')}}">Add Employee</a>
                            </li>
                            <li>
                              <a href="{{route('employee.index')}}">Employees</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>School Contact</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                             <a href="">School Contact</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a><i class="fa fa-copy" aria-hidden="true"></i><span>WordRace Questions</span></a>
                        <ul class="nav nav-children">
                            <li>
                            <a href="{{route('question.add_question_form')}}">Add WordRace Question</a>
                            </li>
                            <li>
                            <a href="{{route('question.question')}}">WordRace Questions</a>
                            </li>
                            <li>
                            <a href="{{route('question.ques_settions_form')}}">WordRace Settings</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a><i class="fa fa-copy" aria-hidden="true"></i><span>Money SuperContest</span></a>
                        <ul class="nav nav-children">
                
                            <li>
                            <a href="{{route('question.all_money_level_question_form')}}">All Mony Level</a>
                            </li>

                            <li>
                            <a href="{{route('question.all_money_question')}}">All Question</a>
                            </li>
                        </ul>
                    </li> 
                 <li class="nav-parent">
                        <a><i class="fa fa-copy" aria-hidden="true"></i><span>Time SuperContest</span></a>
                        <ul class="nav nav-children">
                            <li>
                            <a href="">All Time Level</a>                            
                            </li>

                            <li>
                            <a href="">All Question</a>                                                        
                            </li>
                        </ul>
                    </li> 
                  <li class="nav-parent">
                        <a><i class="fa fa-copy" aria-hidden="true"></i><span>GeoRace SuperContest</span></a>
                        <ul class="nav nav-children">
                            <li>
                            <a href="{{route('question.all_geo_level_view')}}">All Geo Level</a>                                                                                    
                            </li>
                             <li>
                            <a href="{{route('question.all_geo_q_view')}}">All Question</a>                                                                                                                 
                            </li>
                        </ul>
                    </li> 
                    

                    
                    <li class="nav-parent">
                        <a><i class="fa fa-copy" aria-hidden="true"></i><span>Super Contest Questions</span></a>
                        <ul class="nav nav-children">
                            <li>
                            <a href="">Add Question</a>                                                                                                                                             
                            <li>
                            <a href="">All Questions</a>                                                                                                                                                                        
                         </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Schools</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                            <a href="{{route('school.add_school_form')}}">Add School</a>                                                                                                                                                                        
                            </li>
                            <li>
                            <a href="{{route('school.add_memo_form')}}">Add Memo</a>                                                                                                                                                                        
                            </li>
                            <li>
                            <a href="{{route('school.index')}}">Schools</a>                                                                                                                                                                        

                            </li>
                             <li>
                            <a href="{{route('school.school_expired')}}">Expired</a>                                                                                                                                                                        
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a><i class="fa fa-copy" aria-hidden="true"></i><span>Spelling Bee</span></a>
                        <ul class="nav nav-children">
                             <li>
                            <a href="{{ route('allgrade.index') }}">All Grade</a>                                                                                                                                                                                                     
                            </li>
                            <li>
                            <a href="{{ route('all_week') }}">All Week</a>                                                                                                                                                                                                     
                            
                            </li>
                             <li>
                            <a href="">All Qustion</a>                                                                                                                                                                                                     
                            </li>
                        </ul>
                    </li> 


                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Game Levels</span>
                        </a>
                        <ul class="nav nav-children">

                            <li>
                            <a href="{{route('game.index')}}">Game Level</a>                                                                                                                                                                                                     
                            </li>
                            <li>
                            <a href="{{route('game.add_game_level_form')}}">Add Game Level</a>                                                                                                                                                                                                     

                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Non-student</span>
                        </a>
                        <ul class="nav nav-children">

                            <li>
                            <a href="">Non-student Payment Word</a>                                                                                                                                                                                                     

                            </li>
                            <li>
                            <a href="">Non-student Payment Add</a>                                                                                                                                                                                                     

                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Flag</span>
                        </a>
                        <ul class="nav nav-children">

                            <li>
                            <a href="{{route('flag.index')}}">Flags</a>                                                                                                                                                                                                     

                            </li>
                            <li>
                            <a href="{{route('flag.add_flag_form')}}">Flag Add</a>                                                                                                                                                                                                     

                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Prohibited Words</span>
                        </a>
                        <ul class="nav nav-children">

                            <li>
                            <a href="{{route('blockwords.index')}}">Prohibited Word</a>                                                                                                                                                                                                     

                            </li>
                            
                            <li>
                            <a href="{{route('blockwords.add_block_words_form')}}">Prohibited Word Add</a>                                                                                                                                                                                                     

                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Words</span>
                        </a>
                        <ul class="nav nav-children">

                            
                            <li>
                            <a href="{{route('blockwords.add_word_form')}}">Words Add</a>                                                                                                                                                                                                     

                            </li>
                            <li>
                            <a href="{{route('blockwords.words')}}">Words</a>                                                                                                                                                                                                     

                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                    <a href="">All Students</a>                                                                                                                                                                                                     

                    </li>
                    <li class="nav-parent">
                    <a href="">Accepted Students</a>                                                                                                                                                                                                     

                    </li>
                    <li class="nav-parent">
                    <a href="{{route('student.unapproved_students')}}">Unaccepted Students</a>                                                                                                                                                                                                     

                    </li>
                    <li class="nav-parent">
                    <a href="">Database statistics</a>                                                                                                                                                                                                     

                    </li>
                    <li class="nav-parent">
                    <a href="">Send Mail to Students</a>                                                                                                                                                                                                     

                    </li>
                    <li class="nav-parent">
                    <a href="">Send Mail to Schools</a>                                                                                                                                                                                                     

                    </li>

<li class="nav-parent">
                         <a>
                            <i class="fa fa-certificate" aria-hidden="true"></i>
                            <span>Certificates</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                    <a href="">Certificate Add</a>                                                                                                                                                                                                     
                           </li>
                            <li>
                    <a href="{{route('certificate.index')}}">Certificates</a>                                                                                                                                                                                                                                 
                                </li>
                            <li>
                    <a href="">Certificates Show</a>                                                                                                                                                                                                                                 
                            
                           </li>
                        </ul>
                        
                    </li>
					<li class="nav-parent">
                    <a href="">Notice</a>                                                                                                                                                                                                                                 

                       
                    </li>
					
					 <li class="nav-parent">
                    <a href="">Current First Name List</a>                                                                                                                                                                                                                                 

                    </li>

                   <li class="nav-parent">
                   <a href="">Unique First Name List</a>                                                                                                                                                                                                                                 

                    </li>
                            <li class="nav-parent">
                   <a href="">Settings</a>                                                                                                                                                                                                                                 
                    </li>

                </ul>

            </nav>

        </div>

    </div>

</aside>
<script>
// Navigation
    (function ($) {

        'use strict';

        var $items = $('.nav-main li.nav-parent');

        function expand(li) {

            li.children('ul.nav-children').slideDown('fast', function () {
                li.addClass('nav-expanded');
                $(this).css('display', '');
                ensureVisible(li);
            });
        }

        function collapse(li) {
            li.children('ul.nav-children').slideUp('fast', function () {
                $(this).css('display', '');
                li.removeClass('nav-expanded');
            });
        }

        function ensureVisible(li) {
            var scroller = li.offsetParent();
            if (!scroller.get(0)) {
                return false;
            }

            var top = li.position().top;
            if (top < 0) {
                scroller.animate({
                    scrollTop: scroller.scrollTop() + top
                }, 'fast');
            }
        }

        $items.find('> a').on('click', function () {

            var prev = $(this).closest('ul.nav').find('> li.nav-expanded'),
                    next = $(this).closest('li');

            if (prev.get(0) !== next.get(0)) {
                collapse(prev);
                expand(next);
            } else {
                collapse(prev);
            }
        });

    }).apply(this, [jQuery]);

</script>