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
        <title>Cart</title>
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

                    @else
                        <li><a href="/history">History</a></li>
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
    @if (!$cart)
    <h3 class="flow-text">Sorry, you cart empty</h3>
    @else
    <h3 class="flow-text">One step</h3>
        <div class="row">
            <div class="col m12 l12 s12">
                    <label>
                        <input class="with-gap" name="currency" value="dollar" type="radio" checked />
                        <span>Dollar</span>
                    </label>
                    <label>
                        <input class="with-gap" name="currency" value="euro" type="radio" />
                        <span>Euro</span>
                    </label>
            </div>
        </div>
        <div class="fullcart">
       @foreach ($cart as $one)
            <div class="row fullcart_block cart_block_good" id-pizza="{{$one->id}}">
                <div class="col m4 l4">
                   <img class="responsive-img" src="{{$one->images}}">
                </div>
                <div class="col m4 l4 middle_block_fullcart">
                    <div class="fullcart_block_name_pizza">{{$one->name}}</div>
                    <div class="fullcart_block_content_count">
                        <o class="remove_pizza"><i class="material-icons">remove_circle_outline</i></o>
                            <span class="counter">{{$one->count}}</span>
                        <o class="add_pizza"><i class="material-icons">add_circle_outline</i></o>
                    </div>
                </div>
                <div class="col m4 l4 right_block_fullcart">
                    <div class="delete_pizza"><i class="material-icons">delete</i></div>
                    <div class="cart_block_good_content_price" price="{{$one->price}}" price-euro="{{$one->price_euro}}">
                        <o class="block_price"><o class="sum_price">{{$one->price*$one->count}}</o>&#36;</o>
                        <o class="block_price_euro"><o class="sum_price_euro">{{$one->price_euro*$one->count}}</o>&euro;</o>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="row" style="font-size: 20px">
            <div class="col s6 m6 l6"> Delivery
                <p style="font-size: 15px">If sum order more 50 dollars or euro that delivery free</p>
                <o class="block_delivery_price"><o class="delivery_price"></o><o class="znak">&#36;</o></o>
                <o class="block_delivery_price_euro"><o class="delivery_price_euro"></o><o class="znak">&euro;</o></o>
            </div>
            <div class="col s6 m6 l6"> Sum
                <p style="font-size: 15px">Total order amount</p>
                <o class="block_sum_price"><o class="all_price"></o>&#36;</o>
                <o class="block_sum_price_euro"><o class="all_price_euro"></o>&euro;</o>
            </div>
        </div>
        <div class="row">
            <a id="cart-one-step" class="waves-effect waves-light btn">Next</a>
        </div>
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
<div id="success" class="modal">
    <div class="modal-content">
        <h4>Сongratulation! The order is accepted and will be ready soon.</h4>
    </div>
</div>
</body>
</html>
