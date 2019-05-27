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
                               
                                <div class="title">Blogo</div>
                            <span class="navbar-burger burger" data-target="navbarMenu">
                                    <span></span>
                            <span></span>
                            <span></span>
                            </span>
                          
                        </div>
                        <div id="navbarMenu" class="navbar-menu">

                                <div class="navbar-start">
                                        <a class="navbar-item">
                                          Home
                                        </a>
                                  
                                        <a class="navbar-item">
                                          Doc
                                        </a>
                                </div>
                            <div class="navbar-end">
                                @if (auth()->check())
                          
                                <div class="navbar-item has-dropdown is-hoverable">
                                        <a class="navbar-link" >
                                                Hi
                                                {{auth()->user()->name}}
                                            </a>
                                        <div class="navbar-dropdown">
                                           @if (auth("users")->check())
                                           <a class="navbar-item" href="/profile/{{auth()->user()->id}}">
                                            Profile
                                        </a>
                                           @endif
                                           @if (auth("admin")->check())
                                           <a class="navbar-item" href="/admin-dashboard/{{auth()->user()->id}}">
                                            Profile
                                        </a>
                                           @endif
                                           @if (auth("supervisor")->check())
                                           <a class="navbar-item" href="/supervisor-dashboard/{{auth()->user()->id}}">
                                            Profile
                                        </a>
                                           @endif
                                        
                                        
                                            <hr class="navbar-divider">
                                            <a class="navbar-item" href="/logout">
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
  <section class="section" style="background-color:#A9A9A9;">
    <div class="container"  >
   
      @yield('content')
    </div>
  </section>

  </body>

</html>