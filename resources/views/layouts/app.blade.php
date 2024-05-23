<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- FontAwsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	{{-- thumbnail --}}
    <link rel="shortcut icon" href="{{ url('assets/img/icons/sews.png') }}" />

	{{-- <link rel="canonical" href="https://demo-basic.adminkit.io/" /> --}}

    <title>QCM test</title>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="{{ url('assets/css/app.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ url('assets/css/dashboard.css') }}" type="text/css" rel="stylesheet">
	{{-- <link href="{{ asset('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap') }}" rel="stylesheet"> --}}
    <style>
        .form-section{
            display: none;
        }
        .form-section.current{
            display: inline;
        }
        .img-ronde {
      border-radius: 9999px;
      width: 2rem;
      height: 2rem;}
    
    </style>
</head>
<body>

    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ route('tests.index') }}">
                    <span class="align-middle"><img src={{ url('assets/img/photos/sews.png') }} width="25px" height="25px" alt="sews">&nbsp; Quizzy</span>
                <hr>
                </a>
            <ul class="sidebar-nav">
                <li class="sidebar-item mx-4 mt-0 text-light">
                    Start The Test
                    <hr class="m-0">
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link fs-5" href="{{ route('tests.index') }}">
                        <i class="fa-solid fa-chart-simple"></i><span class="align-middle">Test Page</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('admin/Static') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('Static.index') }}">
                        <i class="fa-solid  fa-chart-bar"></i><span class="align-middle">Statistiques</span>
                    </a>
                </li>
                <li class="sidebar-item mx-4 mt-0 text-light">
                    Test Management
                    <hr class="m-0">
                </li>

                <li class="sidebar-item {{ Request::is('admin/categories') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('categories.index') }}">
                        <i class="fa-solid fa-list"></i><span class="align-middle">Categories</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/questions') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('questions.index') }}">
                        <i class="fa-solid fa-question-circle"></i><span class="align-middle">Questions</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/options') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('options.index') }}">
                        <i class="fa-solid fa-list-check"></i><span class="align-middle">Options</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/import') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('import.index') }}">
                        <i class="fa-solid fa-upload"></i><span class="align-middle">Import Data</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('admin/import') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('results.index')}} ">
                        <i class="fa-solid fa-square-poll-horizontal"></i><span class="align-middle">Results</span>
                    </a>
                </li>

                {{-- @if(Auth::check() && Auth::user()->user_type == 'user')
                <li class="sidebar-item">
                    <a class="sidebar-link fs-5" href="{{ route('result.showResult', ['userId' => Auth::id()]) }}">
                        <i class="fa-solid fa-square-poll-horizontal"></i><span class="align-middle">Results</span>
                    </a>
                </li>
            @endif
            
            @if(Auth::check() && (Auth::user()->user_type == 'admin' || Auth::user()->user_type == "owner"))
                <li class="sidebar-item">
                    <a class="sidebar-link fs-5" href="{{ route('results.index') }}">
                        <i class="fa-solid fa-square-poll-horizontal"></i><span class="align-middle">Results</span>
                    </a>
                </li>
            @endif --}}

                <li class="sidebar-item mx-4 mt-2 text-light">
                    Users Management
                    <hr class="m-0">
                </li>

                <li class="sidebar-item {{ Request::is('admin/users') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('users.index') }}">
                        <i class="fa-solid fa-users"></i><span class="align-middle">Users</span>
                    </a>
                </li>

            </ul>


        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">

                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        @guest
                            @if (Route::has('login'))
                                <button class="nav-item btnn">
                                    <a class=" butt nav-link"  href="{{ route('login') }}">{{ __('Login') }}</a>
                                </button>
                            @endif

                            @if (Route::has('register'))
                                <button class="nav-item btnn">
                                    <a class=" butt nav-link"  href="{{ route('register') }}">{{ __('Register') }}</a>
                                </button>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                    <span class="text-dark">
                                        <img  class="img-ronde" src="{{ 'http://127.0.0.1:8887/storage/app/'.Auth::user()->image }}" alt="image">&nbsp; {{ Auth::user()->name }}
                                    </span>
                                    {{-- <span class="text-dark"><i class="fa-solid fa-user text-primary"></i>&nbsp; {{ Auth::user()->name }}</span> --}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    {{-- <a class="dropdown-item text-secondary" href="pages-profile.html"><i class="fa-solid fa-user text-secondary"></i>&nbsp; Profile</a> --}}

                                    {{-- <div class="dropdown-divider"></div> --}}
                                    <div>
                                        <a class="dropdown-item text-secondary" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            <i class="fa-solid fa-right-from-bracket text-secondary"></i>&nbsp;
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>

            @yield('content')

           

        </div>
    </div>


	<script src="{{ url('assets/js/app.js') }}" ></script>
    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0/dist/js.cookie.min.js"></script>
    <script>
    
            // executer du code js 
        $(document).ready(function(){
            let timer;
            let timeRemaining; // Ajout de la variable timeRemaining

            // selection tous les formsection
            var $sections = $('.form-section');
            //fct navigato pour afficher la section 
            function navigateTo(index){
                
                    if(index < $sections.length){
                $sections.removeClass('current').eq(index).addClass('current');
                // $('.form-navigation .previous').toggle (index>0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation .submit').toggle(atTheEnd);
                $('#index').text(index + 1);

                displayTimer();
                 // Enregistrer l'index de la section actuelle dans un cookie
                Cookies.set('currentSectionIndex', index);

            }}
                //rnevoie  l index de la section actuelle
            // function curIndex() {
            //     return $sections.index($sections.filter('.current'));
            // }
                            function curIndex() {
                    // Récupérer l'index de la section actuelle à partir du cookie
                    var index = Cookies.get('currentSectionIndex');
                    if (index) {
                        return parseInt(index);
                    } else {
                        return $sections.index($sections.filter('.current'));
                    }
                }
                //evenement  pour next
            $('.form-navigation .next').click(function() {
             
                //arrecte  le timer actul
                    clearInterval(timer);

                    // Update must be here 
                    //passer a la section suivante
                    navigateTo(curIndex() + 1);
            });


    
            console.log($sections);
            navigateTo(0);
            
            function displayTimer() {

                $('#timer').each(function(){
                    let timeLimit = $(this).data('time-limit');
                    let timerElement = $(this);

                    timer = setInterval(function() {
                        
                        // Decrement the duration
                        timeLimit--;
                        if (timeLimit < 0) {
                            clearInterval(timer);

                            setTimeout(function() {
                                $('#next_question').trigger('click');
                            }, timer);
                        }else{
                            timerElement.text(timeLimit);
                               // Enregistrer la durée restante du timer dans un cookie
                          Cookies.set('remainingTime', timeLimit);
                        }
                
                 }, 1000);
                });
            }        
        });
                

                function showConfirmationExit(){
                    let confirmed = confirm('Are you sure you want to exit the test ?');
                    if(confirmed){
                        window.location.href = '/';
                    }
                }

                $('#exit_test').click(function(e){
                    e.preventDefault();
                    showConfirmationExit();
                });
                // bloquer la button du retour 
                function disableBackBtn() {
                    window.history.forward();
                }
                disableBackBtn();
                // lorsque la page est charge
                window.onload = disableBackBtn;


                
       
    </script>
</body>
</html>
