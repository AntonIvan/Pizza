<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"><head>
        <link href="/css/main.css" rel="stylesheet">
        <link href="/css/materialize.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/js/materialize.js"></script>
        <script src="/js/main.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Pizza</title>
    </head>
<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="/" class="brand-logo">Pizza</a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">

                    @if ($user)
                        <li><span class="name_user">Hello, {{$user->name}}</span></li>
                        <li><a href="/history">History</a></li>
                    @else
                        <li><a class="modal-trigger" href="#sign">Sign in</a></li>
                        <li><a class="modal-trigger" href="#reg">Registration</a></li>
                    @endif
                    <li><a href="/">Menu</a></li>
                </ul>

                <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="sidenav" id="mobile-menu">
                    <li><a href="/">Menu</a></li>
                    <li><a href="/history">History</a></li>
                    <li><a class="modal-trigger" href="#sign">Sign in/Sign up</a></li>
                    <li><a class="modal-trigger" href="#reg">Registration</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="top-picture">
    <img class="responsive-img top_banner" src="http://pizza.webtm.ru/top.png">
</div>
<div class="container medium_block">
    @if ($user)
        @foreach ($goods as $key => $good)
            <div class="row history_block">
                <div class="col m4 s4 l4">
                    <p class="upperTitle">Number order {{$key+1}}</p>
                </div>
                <div class="col m4 s4 l4">
                    <p class="upperTitle">Order structure</p>
                    @foreach ($good->goods as $name => $count)
                        <p>{{$name}} - {{$count}}</p>
                    @endforeach
                </div>
                <div class="col m4 s4 l4">
                    <p><o class="upperTitle">Sum</o> - {{$good->sum}} @if ($good->currency == "dollar") &#36; @else &euro; @endif</p>
                    <p><o class="upperTitle">Location</o> - {{$good->location}}</p>
                </div>
            </div>
        @endforeach
    @else
        <h3 class="flow-text">Please register or authorize</h3>
    @endif
</div>
<div id="sign" class="modal">
    <div class="modal-content">
        <h4>Welcome</h4>
        <form class="col s12" id="signin_form">
            <div class="row">
                <div class="input-field col s6">
                    <input id="phone_sign" name="phone_sign" type="text" class="validate">
                    <label for="phone_sign">Phone</label>
                    <span class="helper-text" data-error="The phone or password is incorrect" data-success="Right"></span>
                </div>
                <div class="input-field col s6">
                    <input id="pass" name="pass" type="password" class="validate">
                    <label for="pass">Password</label>
                </div>
            </div>
            <div class="row">
                <a id="signin" class="waves-effect waves-light btn">Sing in</a>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>
<div id="reg" class="modal">
    <div class="modal-content">
        <h4>Welcome</h4>
        <form class="col s12" id="registration_form" >
            <div class="row">
                <div class="input-field col s6">
                    <input name="first_name" id="first_name" type="text" class="validate">
                    <label for="first_name">Name</label>
                </div>
                <div class="input-field col s6">
                    <input name="phone" id="phone" type="text" class="validate">
                    <label for="phone">Phone</label>
                    <span class="helper-text" data-error="This phone already exists" data-success="Right"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                    <span class="helper-text" data-error="error" data-success="Right"></span>
                </div>
                <div class="input-field col s6">
                    <input id="password2" name="password2" type="password" class="validate">
                    <label for="password2">Repeat Password</label>
                </div>
            </div>
            <div class="row">
                <a class="waves-effect waves-light btn" id="registration">Registration</a>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>
<div id="congratulation" class="modal">
    <div class="modal-content">
        <h4>Сongratulation! New user added.</h4>
    </div>
</div>
</body>
</html>
