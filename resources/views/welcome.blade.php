<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"><head>
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
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
                    <li style="position: relative;"><a class="waves-effect waves-light btn" id="button_cart">Cart <span id="all_object_in_cart">{{ $cart ?? ''}}</span></a>
                        <div class="cart_block z-depth-2">

                        </div>
                    </li>
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
    <div class="row">
        <h3 class="flow-text">Best Pizza in world</h3>
        <div class="row">
            <div class="col m12 l12 s12">
                <form id="change_currency">
                <label>
                    <input class="with-gap" name="currency" value="dollar" type="radio" @if ($currency == "dollar") checked @endif />
                    <span>Dollar</span>
                </label>
                <label>
                    <input class="with-gap" name="currency" value="euro" type="radio" @if ($currency == "euro") checked @endif />
                    <span>Euro</span>
                </label>
                </form>
            </div>
        </div>
        @foreach ($goods as $good)
        <div class="col m12 l4">
            <div class="card" pizza="{{$good->id}}">
                <div class="card-image">
                    <img src="{{$good->images}}">
                </div>
                <div class="card-title">{{$good->name}}</div>
                <div class="card-content">{{$good->description}}</div>
                <div class="card-title">Price:
                    <o class="page_price">{{$good->price}}&#36;</o>
                    <o class="page_price_euro">{{$good->price_euro}}&euro;</o>
                </div>
                <div class="buy_pizza btn">In cart</div>
            </div>
        </div>
        @endforeach
    </div>
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
