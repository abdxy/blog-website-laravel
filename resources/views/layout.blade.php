<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body >
              <nav class="navbar">
                    <div class="container">

                        <div class="navbar-brand">
                            <a class="navbar-item" href="/">
                               
                                <div class="title" style="color:#c41345;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;margin-top:10px;">BLOGO</div>
                            <span class="navbar-burger burger" data-target="navbarMenu">
                                    <span></span>
                            <span></span>
                            <span></span>
                            </span>
                          
                        </div>
                        <div id="navbarMenu" class="navbar-menu">

                                <div class="navbar-start">
                                <a class="navbar-item" href="{{route('Users.all')}}">
                                          Users
                                        </a>
                                        <a class="navbar-item" href="/tags">
                                         Tags
                                        </a>

                                      <a class="navbar-item" href="{{route("categories")}}">
                                          Categories
                                        </a>
                                </div>
                            <div class="navbar-end">
                                @if (auth()->check())
                          
                                <div class="navbar-item has-dropdown is-hoverable">
                                        <a class="navbar-link" >
                                                Hi
                                                {{auth()->user()->username}}
                                            </a>
                                        <div class="navbar-dropdown">

                                            @auth('users')
                                            <a class="navbar-item" href="/users/{{auth()->user()->username}}">
                                              Profile
                                            </a>
                                            @endauth

                                            @auth('admin')
                                           <a class="navbar-item" href="/admin-dashboard/{{auth()->user()->id}}">
                                            Profile
                                          </a>
                                            @endauth
                                            @auth('supervisor')
                                    
                                           <a class="navbar-item" href="/supervisor-dashboard/{{auth()->user()->id}}">
                                            Profile
                                        </a>
                                        @endauth
                                        
                                        
                                            <hr class="navbar-divider">
                                            <a class="navbar-item" href="{{route("user.logout")}}">
                                                Logout
                                            </a>
                                        </div>
                                    </div>
                                
                               @else <a class="navbar-item" href="/login">
                                        login
                                    </a><a class="navbar-item" href="/register">
                                            register
                                        </a>
                                 
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </nav>
  <section class="section" style="background-color:#c41345;">
    <div class="container"  >
        <div class="card">
            <div class="card-content">
      @yield('content')
    </div></div>
    </div>
    @include('error')
  </section>

  </body>

</html>