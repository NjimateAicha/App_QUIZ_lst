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
</head>
<body>

    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ route('tests.index') }}">
                    <span class="align-middle"><img src={{ url('assets/img/photos/sews.png') }} width="25px" height="25px" alt="sews">&nbsp;Quizzy</span>
                <hr>

                </a>
            <ul class="sidebar-nav">

                <li class="sidebar-item mx-4 mt-0 text-light">
                    Start The Test
                    <hr class="m-0">
                </li>

                <li class="sidebar-item {{ Request::is('/') ? 'active':'' }}">
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
               
                <li class="sidebar-item {{ Request::is('admin/import') ? 'active' : '' }}">
                    @if(Auth::check() && Auth::user()->user_type == 'user')
                    <a class="sidebar-link fs-5" href="{{ route('result.showResult', ['userId' => Auth::id()]) }}"
                     onclick="event.preventDefault();
                     document.getElementById('showResultForm').submit();">
                        {{-- <a class="sidebar-link fs-5" href="{{ route('result.showResult', ['userId' => Auth::id()]) }}"> --}}
                            <i class="fa-solid fa-square-poll-horizontal"></i><span class="align-middle">Results</span>
                        </a>
                    @elseif(Auth::check() && (Auth::user()->user_type == 'admin' || Auth::user()->user_type == "owner"))
                        <a class="sidebar-link fs-5" href="{{ route('results.index') }}">
                            <i class="fa-solid fa-square-poll-horizontal"></i><span class="align-middle">Results</span>
                        </a>
                    @else
                        <a class="sidebar-link fs-5" href="{{ route('results.index') }}">
                            <i class="fa-solid fa-square-poll-horizontal"></i><span class="align-middle">Results</span>
                        </a>
                    @endif
                </li>


                <li class="sidebar-item mx-4 mt-2 text-light">
                    Users Management
                    <hr class="m-0">
                </li>

                <li class="sidebar-item mb-5 pb-5 {{ Request::is('admin/users') ? 'active':'' }}">
                    <a class="sidebar-link fs-5" href="{{ route('users.index') }}">
                        <i class="fa-solid fa-users"></i><span class="align-middle">Users</span>
                    </a>
                </li>

                @if (Auth::check())
                    <li class="sidebar-item mt-5 pt-5">
                        <a class="sidebar-link fs-5" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket text-secondary"></i>&nbsp;
                            {{ __('Logout') }}
                        </a>
                    </li>
                @endif
            </ul>


        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">

                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                @if (Auth::check())
                    <div class="sidebar-brand text-dark">
                        Welcome <span class="text-primary">{{ Auth::user()->name }}</span>
                    </div>
                @endif

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        @guest
                            @if (Route::has('login'))
                                 
                                <button class="nav-item btnn">
                                    <a class=" butt nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </button>
                             @endif

                            @if (Route::has('register'))
                                <button class="nav-item btnn">
                                    <a class=" butt nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </button>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                    <span class="text-dark">
                                        <img class="img-ronde " src="{{ 'http://127.0.0.1:8887/storage/app/'.Auth::user()->image }}" alt="image">&nbsp; {{ Auth::user()->name }}
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
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

            @yield('dashboard')

          
        </div>
    </div>


	<script src="{{ url('assets/js/app.js') }}" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{--  cocher ou décocher ts cases avec biblio jquery  --}}
    <script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
   
<script>
        // Attend que le document soit prêt pour exécuter le code
        $(document).ready(function () {
            // Ajoute un écouteur d'événement au clic sur l'élément avec l'id 'select_all_id'
            $('#select_all_id').click(function (event) {
                if (this.checked) {
                    $(':checkbox').each(function () {
                        this.checked = true;
                    });
                }else {
                    $(':checkbox').each(function () {
                        this.checked = false;
                    });
                }
            });
        });
       
    </script>
</body>
</html>
