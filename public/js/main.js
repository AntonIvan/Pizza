$(document).ready(function(){
    $('.sidenav').sidenav();

    $('.modal').modal();

    changeCurrnecy();

    function changeCurrnecy() {
        $('input[type=radio][name=currency]').change(function() {
            if (this.value == 'dollar') {
                hideEuro();
            }
            else if (this.value == 'euro') {
                hideDollar();
            }
        });
    }


    function allPrice() {
        sum_price_euro = 0;
        sum_price = 0;
        $.each($(".cart_block").find('.sum_price_euro'), function (i, item) {
            sum_price_euro += parseInt($(item).text());
        });
        $.each($(".cart_block").find('.sum_price'), function (i, item) {
            sum_price += parseInt($(item).text());
        });
        $.each($(".fullcart").find('.sum_price_euro'), function (i, item) {
            sum_price_euro += parseInt($(item).text());
        });
        $.each($(".fullcart").find('.sum_price'), function (i, item) {
            sum_price += parseInt($(item).text());
        });
        if(sum_price < 50) {
            sum_price += 10;
            $('.delivery_price').text(10);
            $('.znak').show();
        } else {
            $('.delivery_price').text("free");
            $('.znak').hide();
        }
        if(sum_price_euro < 50) {
            sum_price_euro += 10;
            $('.delivery_price_euro').text(10);
            $('.znak').show();
        } else {
            $('.delivery_price_euro').text("free");
            $('.znak').hide();
        }
        $('.all_price').text(sum_price);
        $('.all_price_euro').text(sum_price_euro);
    }

    function renderCart() {
        $.ajax({
            type: 'GET',
            url: '/api/cart',
            success: function (data) {
                string = '';
                $.each(JSON.parse(data), function (i, item) {
                    string += "<div class=\"cart_block_good\">\n" +
                        "                                <div class=\"cart_block_good_picture\">\n" +
                        "                                    <img class=\"responsive-img\" src=\"" + item.images + "\">\n" +
                        "                                </div>\n" +
                        "                                <div class=\"cart_block_good_content\" id-pizza=\"" + item.id + "\">\n" +
                        "                                    <div class=\"cart_block_good_content_left\">\n" +
                        "                                        <div class=\"cart_block_good_content_name\">" + item.name + "</div>\n" +
                        "                                        <div class=\"cart_block_good_content_count\">\n" +
                        "                                            <o class=\"remove_pizza\"><i class=\"material-icons\">remove_circle_outline</i></o>\n" +
                        "                                            <span class=\"counter\">" + item.count + "</span>\n" +
                        "                                            <o class=\"add_pizza\"><i class=\"material-icons\">add_circle_outline</i></o>\n" +
                        "                                        </div>\n" +
                        "                                    </div>\n" +
                        "                                    <div class=\"cart_block_good_content_right\">\n" +
                        "                                        <div class=\"delete_pizza\"><i class=\"material-icons\">delete</i></div>\n" +
                        "                                        <div class=\"cart_block_good_content_price\" price=\""+item.price+"\" price-euro=\""+item.price_euro+"\">" +
                        "<o class=\"block_price\"><o class=\"sum_price\">" + item.price*item.count + "</o>&#36;</o>" +
                        "<o class=\"block_price_euro\"><o class=\"sum_price_euro\">" + item.price_euro*item.count + "</o>&euro;</o></div>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                            </div>"
                });
                sum_price_euro = 0;
                sum_price = 0;

                string += "<div class=\"row\" style=\"color: black;font-size: 25px;\">\n" +
                    "<div class=\"col s9\"> Sum <o class=\"block_sum_price\"><o class=\"all_price\"></o>&#36;</o>" +
                    "<o class=\"block_sum_price_euro\"><o class=\"all_price_euro\"></o>&euro;</o></div>" +
                    "<div class=\"col s3\"><a href=\"\cart\" class=\"waves-effect waves-light btn right\" id=\"buy_cart\">Order</a></div>" +
                "                            </div>"
                $(".cart_block").html(string);
                setCurrency();
                allPrice();
                $(".cart_block").show(300);

            }
        });
    }
    $('#button_cart').click( function () {
        if ($(".cart_block").is(':visible')) {
            $(".cart_block").hide(300);
        } else {
            renderCart();
        }
    });

    $(document).on( "mouseenter", ".add_pizza .material-icons",function() {
        $( this ).text("add_circle");
    });
    $(document).on("mouseout", ".add_pizza .material-icons", function () {
        $( this ).text("add_circle_outline");
    });
    $(document).on( "mouseenter", ".remove_pizza .material-icons",function() {
        $( this ).text("remove_circle");
    });
    $(document).on("mouseout", ".remove_pizza .material-icons", function () {
        $( this ).text("remove_circle_outline");
    });

    //add count in cart
    $(document).on( "click", ".add_pizza .material-icons",function() {
        count = parseInt($(this).parent().parent().find('.counter').text()) + 1;
        $(this).parent().parent().find('.counter').text(count);
        block = $(this).parents('.cart_block_good').find('.cart_block_good_content_price')
        price = block.attr('price') * count;
        price_euro = block.attr('price-euro') * count;
        block.html("<o class=\"block_price\"><o class=\"sum_price\">" + price + "</o>&#36;</o><o class=\"block_price_euro\"><o class=\"sum_price_euro\">" + price_euro + "</o>&euro;</o>");
        pizza = $(this).parent().parent().parent().parent().attr("id-pizza");
        setCurrency();
        $.ajax({
            type:'GET',
            url:'/api/add',
            data: "pizza=" + pizza,
            success:function(data){
                allPrice()
            }
        });
    });
    //remove count in cart
    $(document).on( "click", ".remove_pizza .material-icons",function() {
        if(parseInt($(this).parent().parent().find('.counter').text()) === 1) {
            if(parseInt($('#all_object_in_cart').text()) === 1) {
                $('.cart_block').hide();
            }
            $(this).parents('.cart_block_good').remove();
            $(this).parents('.fullcart_block').remove();

        } else {
            count = parseInt($(this).parent().parent().find('.counter').text()) - 1;
            $(this).parent().parent().find('.counter').text(count);
            block = $(this).parents('.cart_block_good').find('.cart_block_good_content_price')
            price = block.attr('price') * count;
            price_euro = block.attr('price-euro') * count;
            block.html("<o class=\"block_price\"><o class=\"sum_price\">" + price + "</o>&#36;</o><o class=\"block_price_euro\"><o class=\"sum_price_euro\">" + price_euro + "</o>&euro;</o>");
        }
        setCurrency();
        pizza = $(this).parent().parent().parent().parent().attr("id-pizza");
        $.ajax({
            type: 'GET',
            url: '/api/remove',
            data: "pizza=" + pizza,
            success: function (data) {
                $('#all_object_in_cart').html(data);
                allPrice()
            }
        });
    });

    //delete in cart
    $(document).on( "click", ".delete_pizza .material-icons",function() {
        pizza = $(this).parent().parent().parent().attr("id-pizza");
        $(this).parents('.cart_block_good').remove();
        $(this).parents('.fullcart_block').remove();
        $.ajax({
            type: 'GET',
            url: '/api/delete',
            data: "pizza=" + pizza,
            success: function (data) {
                $('#all_object_in_cart').html(data);
                if(data === "") {
                    $('.cart_block').hide();
                }
                allPrice()
            }
        });

    });

    //add cart in full cart




    //registration user
    $('#registration').click( function () {
        if($('#password').val() !== $('#password2').val()) {
            $('#password').next().next().attr("data-error", "Passwords don't match");
            $('#password').addClass('invalid');
            $('#password2').addClass('invalid');
        } else if($('#password').val().length < 3 || $('#password2').val().length < 3) {
            $('#password').next().next().attr("data-error", "Password minimum 3 characters");
            $('#password').addClass('invalid');
            $('#password2').addClass('invalid');
        } else {
            $('#registration_form').submit();
        }
    })

    $('#registration_form').submit( function (event) {
        user = $(this).serialize();
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/api/adduser',
            data: user,
            success: function (data) {
                if(data === "This phone already exists") {
                    $('#phone').addClass('invalid');
                } else {
                    $('#reg').modal('close');
                    $('#congratulation').modal('open');
                    setTimeout(function() { $('#congratulation').modal('close') }, 1500);
                    location.reload();
                }
            }
        });
    })

    //auth user

    $('#signin').click( function () {
        $('#signin_form').submit();
    });

    $('#signin_form').submit( function (event) {
        user = $(this).serialize();
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/api/login',
            data: user,
            success: function (data) {
                if(data === "Error") {
                    $('#phone_sign').addClass('invalid');
                    $('#pass').addClass('invalid');
                } else {
                    location.reload();
                }
            }
        });
    })

    //functional add on cart
    $(".buy_pizza").click( function () {
        pizza = ($(this).parent().attr("pizza"));
        $.ajax({
            type:'GET',
            url:'/api/add',
            data: "pizza=" + pizza,
            success:function(data){
                $('#all_object_in_cart').html(data);
                if ($(".cart_block").is(':visible')) {
                    renderCart();
                    allPrice();
                }
            }
        });
    });

    //change currency
    $("#change_currency").on("change", "input[name=currency]", function(){
        $.ajax({
            type: 'POST',
            url: '/api/currency',
            data: "currency=" + $(this).val(),
            success: function (data) {

            }
        });
    });
    allPrice();
    setCurrency();

    function setCurrency() {
        currency = $("input[name=currency]:checked").val();
        if(currency === "dollar") {
            hideEuro();
        } else {
            hideDollar();
        }
    }


    function hideEuro() {
        $('.page_price_euro').css("display", "none");
        $('.block_price_euro').css("display", "none");
        $('.block_sum_price_euro').css("display", "none");
        $('.block_delivery_price_euro').css("display", "none");
        $('.page_price').css("display", "inline");
        $('.block_price').css("display", "inline");
        $('.block_sum_price').css("display", "inline");
        $('.block_delivery_price').css("display", "inline");
    }

    function hideDollar() {
        $('.page_price_euro').css("display", "inline");
        $('.block_price_euro').css("display", "inline");
        $('.block_sum_price_euro').css("display", "inline");
        $('.block_delivery_price_euro').css("display", "inline");
        $('.page_price').css("display", "none");
        $('.block_price').css("display", "none");
        $('.block_sum_price').css("display", "none");
        $('.block_delivery_price').css("display", "none");
    }

    $('#order').click( function () {
        order = {};
        order['name'] = $('#order_form #order_name').val();
        order['phone'] = encodeURIComponent($('#order_form #order_phone').val());
        order['address'] = $('#order_form #order_address').val();
        if($(".block_sum_price").is(':visible')) {
            order['sum'] = $('.all_price').text();
            order['currency'] = "dollar";
        } else {
            order['sum'] = $('.all_price_euro').text();
            order['currency'] = "euro";
        }
        goods = {};
        $.each($('.fullcart').find('.fullcart_block'), function (i, item) {
            goods[$(item).find('.fullcart_block_name_pizza').text()] = $(item).find('.counter').text();
        });
        order['goods'] = goods;
        $.ajax({
            type: 'POST',
            url: '/api/order',
            data: "order=" + JSON.stringify(order),
            success: function (data) {
                if(data === "Success") {
                    $('#success').modal('open');
                    setTimeout(function() { $('#success').modal('close') }, 1500);
                    location.replace('/');
                }
            }
        });
    });



});
