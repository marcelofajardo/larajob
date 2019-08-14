<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        <script  src="{{ asset('js/app.js') }}" ></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        
        <!-- Date Picker -->
        <script  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        $( function() {
        $( "#datepicker" ).datepicker();
        } );
        </script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Styles -->
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('employer.register') }}">{{ __('Employer Register') }}</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Job Seeker Register') }}</a>
                            </li>
                            
                            @elseif(Auth::user()->usertype == 'employer')
                            <li class="nav-item">
                                <a class="nav-link" href="/company/create">
                                    {{ __('Company Info') }}
                                </a>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('company.index',[Auth::user()->company->id, Auth::user()->company->slug])}}">
                                        {{ __('Company Page') }}
                                    </a>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('company.myjobs',[Auth::user()->company->id, Auth::user()->company->slug])}}">
                                            {{ __('My jobs') }}
                                        </a>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/jobs/create">
                                                {{ __('Create Job') }}
                                            </a>
                                            <li class="nav-item dropdown">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/jobs/applications">
                                                        {{ __('My Applicants') }}
                                                    </a>
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            @if((Auth::user()->usertype) == 'employer')
                                                            {{ Auth::user()->company->name }}
                                                            @elseif((Auth::user()->usertype) == 'seeker')
                                                            {{ Auth::user()->name}}
                                                            @endif
                                                            <span class="caret"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            
                                                            @if(Auth::user()->usertype == 'employer')
                                                            <a class="dropdown-item" href="/company/create">
                                                                {{ __('Company Info') }}
                                                            </a>
                                                            <a class="dropdown-item" href="{{route('company.index',[Auth::user()->company->id, Auth::user()->company->slug])}}">
                                                                {{ __('Company Page') }}
                                                            </a>
                                                            <a class="dropdown-item" href="{{route('company.myjobs',[Auth::user()->company->id, Auth::user()->company->slug])}}">
                                                                {{ __('My jobs') }}
                                                            </a>
                                                            <a class="dropdown-item" href="/jobs/create">
                                                                {{ __('Create Job') }}
                                                            </a>
                                                            <a class="dropdown-item" href="/jobs/applications">
                                                                {{ __('My Applicants') }}
                                                            </a>
                                                            @elseif(Auth::user()->usertype == 'seeker')
                                                            <a class="dropdown-item" href="/user/profile">
                                                                {{ __('Profile') }}
                                                            </a>
                                                            <a class="dropdown-item" href="{{route('jobs.myapp')}}">
                                                                {{ __('My Applications') }}
                                                            </a>
                                                            @endif
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </li>
                                                    @elseif(Auth::user()->usertype == 'seeker')
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="/user/profile">
                                                            {{ __('Profile') }}
                                                        </a>
                                                    </li>
                                                    
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{route('jobs.myapp')}}">
                                                            {{ __('My Applications') }}
                                                        </a>
                                                    </li>
                                                    
                                                    
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            @if((Auth::user()->usertype) == 'employer')
                                                            {{ Auth::user()->company->name }}
                                                            @elseif((Auth::user()->usertype) == 'seeker')
                                                            {{ Auth::user()->name}}
                                                            @endif
                                                            <span class="caret"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            
                                                            @if(Auth::user()->usertype == 'employer')
                                                            <a class="dropdown-item" href="/company/create">
                                                                {{ __('Company Info') }}
                                                            </a>
                                                            <a class="dropdown-item" href="{{route('company.index',[Auth::user()->company->id, Auth::user()->company->slug])}}">
                                                                {{ __('Company Page') }}
                                                            </a>
                                                            <a class="dropdown-item" href="{{route('company.myjobs',[Auth::user()->company->id, Auth::user()->company->slug])}}">
                                                                {{ __('My jobs') }}
                                                            </a>
                                                            <a class="dropdown-item" href="/jobs/create">
                                                                {{ __('Create Job') }}
                                                            </a>
                                                            @elseif(Auth::user()->usertype == 'seeker')
                                                            <a class="dropdown-item" href="/user/profile">
                                                                {{ __('Profile') }}
                                                            </a>
                                                            <a class="dropdown-item" href="{{route('jobs.myapp')}}">
                                                                {{ __('My Applications') }}
                                                            </a>
                                                            @endif
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </li>
                                                    @endguest
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                    <main class="py-4">
                                        @yield('content')
                                    </main>
                                </div>
                            </body>
                        </html>