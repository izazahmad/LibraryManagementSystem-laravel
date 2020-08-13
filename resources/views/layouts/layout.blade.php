<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tag -->
    <meta charset="UTF-8">
    <meta name="description" content="Library, inline Library">
    <meta name="keywords" content="PHP, MySql, Laravel Framework, HTML5, CSS3, javaScript, Bootstrap4, jQuery, Web Design, Web Development, Responsive Website, Online Library management system , Library, Books, Student, Librarian">
    <meta name="author" content="Izaz Shaikh">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="veiwport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap minified CSS-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!-- Fontawesome CSS-->
    <link rel="stylesheet" href="css/fontawsome/css/all.min.css">
    <!-- Custome CSS for the site -->
    <link rel="stylesheet" href="css/lms.css">
    <title>Online Library Management System</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark back-black">
            <a class="navbar-brand text-center" href="index.php"><img src="images/WhiteLogo.png"><br>
                <p>ONLINE LIBRARY MANAGEMENT SYSTEM</p>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#lms-nav-content" aria-controls="lms-nav-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="lms-nav-content">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">HOME</a>
                    </li>
                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">FEEDBACK
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="books.php">BOOKS</a>
                    </li>
                    @endif
                </ul>
                <ul class="navbar-nav ml-auto">

                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link">
                            Hi, {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">PROFILE</a></li>
                    @if(Auth::user()->hasRole('admin'))
                    <li class="nav-item"><a class="nav-link" href="student.php">STUDENT-INFO</a></li>
                    <li class="nav-item"><a class="nav-link" href="student.php">LIBRARIAN-INFO</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">USER-REGISTER</a>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole('librarian'))
                    <li class="nav-item"><a class="nav-link" href="student.php">STUDENT-INFO</a>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">STUDENT-REGISTER</a>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole('admin'))
                    @endif                
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('LOGOUT') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @else
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                    </li>
                    @endif
                </ul>

            </div>
        </nav>
    </header>
    <!-------sidenav-------->
    @if (Auth::check())
    <div id="mySidenav" class="sidenav back-black">
        <div class="h"> <a href="books.php">Books</a> </div> 
        <div class="h"> <a href="request.php">Book Request</a></div>
        <div class="h"> <a href="issue_info.php">Borrowed Books</a></div>
        <div class="h"><a href="fine.php">FINES</a></div>
    </div>
    @endif
    @yield('data')
    <footer>
   
        <p>
            Email: php.online@library.com<br>
            Mobile: +116*******
        </p>
    </footer>
    <!-- jQuery library-->
    <script src="js/jquery-3.5.1.min.js"></script>
    <!-- Fontawesome-->
    <script src="js/fontawsome/all.min.js"></script>
    <!-- Popper JS-->

    <!-- Bootstrap JavaScript-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- Custom JS-->
    <script src="js/lms.js"></script>
</body>

</html>