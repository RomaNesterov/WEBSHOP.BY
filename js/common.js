$(document).ready(function () {

    // Активный пункт меню

    $(".menu ul li ").each(function () {

        var location = window.location.href;
        var url = location.split('/').pop();
        var link = $(this).find('a').attr('href');

        if (url === link) {
            $(".menu ul li").removeClass('currentItemTwo');
            $(".currentItemTwo").find('a').css('color', 'white');
            $(this).addClass('currentItem');
            $(this).find('a').css('color', 'black');

        }

    });

// Активный пункт меню конец

//Счетчик просмотров

    $(' .readMore').live('click', function () {

        var idArticle = $(this).attr('id').match(/\d+/);
        var viewsArticl = $(this).val();

        var viewsArticle = ++viewsArticl;

        $.ajax({
            url: 'class/informationOutput.php',
            type: 'POST',
            data: {
                idArticle: idArticle,
                viewsArticle: viewsArticle
            },
            success: function () {

            }
        });

    })

//Счетчик просмотров конец

//Кнопка наверх

    $(window).scroll(function () {

        if ($(this).scrollTop() > 50) {
            $('#button-up').fadeIn();
        } else {
            $('#button-up').fadeOut();
        }
    });


    $('#button-up').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });

//Кнопка наверх конец

//Погода

    (function (a, f, g) {
        var e = a.createElement(f);
        e.async = 1;
        e.src = g;
        a = a.getElementsByTagName(f)[0];
        a.parentNode.insertBefore(e, a)
    })(document, 'script', '//nuipogoda.ru/informer/nuipogoda.js');

//Погода конец

//Рейтинг

    $('#rating_1').rating({
        fx: 'full',
        image: 'vote/images/stars.png'
    });


    $('#rating_2').rating({
        fx: 'full',
        image: 'vote/images/stars.png'
    });

    $('#rating_3').rating({
        fx: 'full',
        image: 'vote/images/stars.png'
    });

    $('#rating_4').rating({
        fx: 'full',
        image: 'vote/images/stars.png'
    });

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-3866000-4']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

//Рейтинг конец

//Слайдер

    function currentSlide(current) {
        $(".current_slide").text(current + " of " + $("#slides").slides("status", "total"));
    }

    $(function () {

        $("#slides").slides({
            navigateEnd: function (current) {
                currentSlide(current);
            },
            loaded: function () {
                currentSlide(1);
            }
        });


        $(".controls").click(function (e) {

            e.preventDefault();

            var slidesStatus = $("#slides").slides("status", "state");

            if (!slidesStatus || slidesStatus === "stopped") {

                $("#slides").slides("play");
                $(this).text("Stop");

            } else {

                $("#slides").slides("stop");
                $(this).text("Play");

            }
        });
    });

//Слайдер конец

//Банер

    $('#auto').bbslider({auto: true, timer: 3000, controls: true, loop: true, pauseOnHit: false});

//Банер конец

//Реклама

    $(window).scroll(function () {

        if ($(this).scrollTop() > 1000) {
            $('.banner').addClass('animated fadeInLeft').css('display', 'block');
        }

        if ($(this).scrollTop() > 1200) {
            $('.weather').addClass('animated fadeInLeft').css('visibility', 'visible');
        }

    });

    $('.banner').click(function () {
        $('.banner').addClass('animated fadeOutLeft');
    });

//Реклама конец

//Эффект добавления в корзину

    $('.effectCart').slideUp();

    $('.goods li').hover(
        function () {
            $(this).find('.effectCart').slideDown(400).css({
                'box-shadow': '5px 5px 10px black',
                'border': '2px solid black'
            });

        },
        function () {
            $(this).find('.effectCart').slideUp(400);
        });

//Эффект добавления в корзину конец

//Проверка подписки

    $('.subscribe').click(function () {

        if (!(/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i.test($('.field').val()))) {
            alert("Введите правильный E-Mail адрес");
            $('.field').val('');
            return false;
        }

        var field = $('.field').val();

        $.ajax({
            url: "class/informationInput.php",
            type: "POST",
            data: {
                field: field
            },
            success: function () {
                $('.field').val('');
            }
        });
    });

//Проверка подписки конец

//Проверка формы+отправка сообщения на почту

    $('.nameForm1').val('');
    $('.textArea').val('');
    $('.email').val('');


    $('.send').click(function () {

        if (!(/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i.test($('.email').val()))) {
            alert("Введите правильный E-Mail адрес");
            $('.form').find('input,textarea').val('');
            return false;
        }

        if ($('.nameForm1').val().length == 0 ||
            $('.textArea').val().length == 0 ||
            $('.email').val().length == 0
        ) {

            alert('Заполните все поля!');
            return false;
        }

        if ($('.email').val().length < 6) {
            alert('слишком короткий "email"');
            $('.form').find('input,textarea').val('');
            return false;
        }


        var form = $('.form').serialize();

        $.ajax({
            url: "class/informationInput.php",
            type: "POST",
            data: {
                form: form,
            },
            success: function () {
                $('.form').find('input,textarea').val('');
            }
        });


    });

//Проверка формы конец+отправка сообщения на почту конец

//Увеличение картинки

    $('.increase').click(function () {

        $('.fixed-overlay').addClass('animated bounceIn ').css('display', 'block');

        var img = $(this).parent('.newProducts').find('img').attr('src');
        var paragraph = $(this).parent('.newProducts').find('.paragraph').html();
        var price = $(this).parent('.newProducts').find('.price').html();
        var text = $(this).parent('.newProducts').find('.text').html();
        var year = $(this).parent('.newProducts').find('.year').html();


        $('.modal_container').find('.img').attr('src', img);
        $('.modal_container').find('.paragraph').html(paragraph);
        $('.modal_container').find('.price').html(price);
        $('.modal_container').find('.text ').html(text);
        $('.modal_container').find('.year ').html(year);

    });


    $('.closeModal').click(function () {
        $('.fixed-overlay').css('display', 'none');
    });

//Увеличение картинки конец

//Добавление в список корзины + количество товаров+переход

    $('.cart').live('click', function () {

        var img = $(this).parent('.newProducts').find('img').attr('src');
        var paragraph = $(this).parent('.newProducts').find('.paragraph').html();
        var price = $(this).parent('.newProducts').find('.price').html().match(/\d+/);
        var year = $(this).parent('.newProducts').find('.year').html().match(/\d+/);


        $(".boxCartWrapper").append('' +
            '<div class="ret"><img src=' + img + ' width="120" height="120" alt="">' +
            '<p style="padding-top: 5px;">' + paragraph + '</p>' +
            '<p style="color: red !important">' + '&#36;' + price + '</p>' +
            '<p>' + year + 'г.' + '</p>' +
            '<p class="closeCart">' +
            '<img src="img/close.png" width="20" height="20" alt=""></p>' +
            '</div>');


        var length = $('.ret').length;
        $('.amountOfGoods').html(length);

        var param = $(".boxCartWrapper").html();
        localStorage.setItem('name', param);

        var numberOfGoods = $(".amountOfGoods").html();
        localStorage.setItem('goods', numberOfGoods);

    });

    $('.add').live('click', function () {

        var img = $(this).parent('.goods li').find('img').attr('src');
        var name = $(this).parent('.goods li').find('.name').html();
        var price = $(this).parent('.goods li').find('.price').html().match(/\d+/);
        var year = $(this).parent('.goods li').find('.year').html().match(/\d+/);


        $(".boxCartWrapper").append(
            '<div class="ret"><img src=' + img + ' width="120" height="120" alt="">' +
            '<p style="padding-top: 5px;">' + name + '</p>' +
            '<p style="color: red !important">' + '&#36;' + price + '</p>' +
            '<p>' + year + 'г.' + '</p>' +
            '<p class="closeCart">' +
            '<img src="img/close.png" width="20" height="20" alt=""></p>' +
            '</div>');

        var length = $('.ret').length;
        $('.amountOfGoods').html(length);

        var param = $(".boxCartWrapper").html();
        localStorage.setItem('name', param);

        var numberOfGoods = $(".amountOfGoods").html();
        localStorage.setItem('goods', numberOfGoods);

    });

//Добавление в список корзины + количество товаров+переход конец

//Удаление из списка корзины+количество товаров в корзине

    $('.closeCart').live('click', function () {

        $(this).parent('.ret').remove();

        var length = $('.ret').length;

        $('.amountOfGoods').html(length);


        $(this).parent('.ret').remove();

        var number = $('.boxCartWrapper').find('.ret').find('p:eq(1)');
        var total = 0;

        for (var i = 0; i < number.length; i++) {

            total -= number[i].innerHTML.match(/\d+/) << 0;

        }

        $('.totalWrapper').find('p:eq(1)').html('&#36;' + total * (-1));


        localStorage.clear();

        var param = $(".boxCartWrapper").html();
        localStorage.setItem('name', param);

        var numberOfGoods = $(".amountOfGoods").html();
        localStorage.setItem('goods', numberOfGoods);


    });

//Удаление из списка корзины+количество товаров в корзине конец

//Сумма покупки

    $('.boxCart').slideUp();

    $('.boxCart').mouseleave(function () {
        $('.boxCart').slideUp();
    });

    $('.shopCart').hover(function () {

        $('.boxCart').slideDown(400);

        var number = $('.boxCartWrapper').find('.ret').find('p:eq(1)');
        var total = 0;

        for (var i = 0; i < number.length; i++) {

            total += number[i].innerHTML.match(/\d+/) << 0;

        }

        $('.totalWrapper').find('p:eq(1)').html('&#36;' + total);

    });

//Сумма покупки конец

//Увеличение лайков

    $('.like').click(function () {

        var like = $(this).parent('.newProducts').find('.numberLike').html();
        var id = $(this).parent('.newProducts').find('.numberLike').attr('id');

        like = ++like;

        $(this).parent('.newProducts').find('.numberLike').html(like);

        $.ajax({
            url: "class/informationInput.php",
            type: "POST",
            data: {
                like: like,
                id: id
            },
            success: function (data) {
                $(this).html(data);
            }
        });
    });

//Увеличение лайков конец

//Оформление заявки

    $('.cartButton').click(function () {

        $('.fixed-overlay').addClass('animated bounceIn ').css('display', 'block');


        var img = $(this).parent('.newProducts').find('img').attr('src');
        var paragraph = $(this).parent('.newProducts').find('.paragraph').html();
        var price = $(this).parent('.newProducts').find('.price').html();
        var text = $(this).parent('.newProducts').find('.text').html();
        var year = $(this).parent('.newProducts').find('.year').html();


        var number = $('.table').find('.sum').find('p');
        var total = 0;

        for (var i = 0; i < number.length; i++) {

            total += number[i].innerHTML.match(/\d+/) << 0;

        }


        $('.totalSum').html('Total: <span style="color: red !important">&#36;' + total);
        $('.totalSumForm').html('Total: <span style="color: red !important">&#36;' + total);

        $('.modal_container').find('.img').attr('src', img);
        $('.modal_container').find('.paragraph').html(paragraph);
        $('.modal_container').find('.price').html(price);
        $('.modal_container').find('.text ').html(text);
        $('.modal_container').find('.year ').html(year);

    });

//Оформление заявки конец

//Проверка формы заказа+отправка

    $('.formApplication').find('input,textarea').val('');


    $('.sendApplication').click(function () {

        if (!(/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i.test($('.emailApplication').val()))) {
            alert("Введите правильный E-Mail адрес");
            return false;
        }

        if ($('.nameApplication').val().length == 0 ||
            $('.surnameApplication').val().length == 0 ||
            $('.patronymicApplication').val().length == 0 ||
            $('.phoneApplication').val().length == 0 ||
            $('.emailApplication').val().length == 0 ||
            $('.textApplication').val().length == 0) {

            alert('Заполните все поля!');
            return false;
        }

        if ($('.emailApplication').val().length < 6) {
            alert('Cлишком короткий "email"');
            return false;
        }


        var sending = $('.formApplication').serialize();
        var totalSumForm = $('.totalSumForm').html().match(/\d+/);
        var number = $('.currentLine').length;
        var priceOrder = $('.totalSumForm').find('span').html();

        var arrayImg = [];
        var arrayProduct = [];
        var arrayYear = [];
        var arrayQuantity = [];
        var arrayTotal = [];


        $('.currentLine').each(function () {

            var img = $(this).children('.retreat').find('img').attr('src');
            arrayImg.push(img);

            var product = $(this).children('td').eq(1).find('p').html();
            arrayProduct.push(product);

            var year = $(this).children('td').eq(2).find('p').html();
            arrayYear.push(year);

            var quantity = $(this).children('td').eq(3).find('input').val();
            arrayQuantity.push(quantity);

            var total = $(this).children('td').eq(5).find('p').html();
            arrayTotal.push(total);

        });

        var arraySum = [];
        arraySum.push(arrayImg, arrayProduct, arrayYear, arrayQuantity, arrayTotal);

        $.ajax({
            url: "class/informationInput.php",
            type: "POST",
            data: {
                arraySum: arraySum,
                number: number,
                sending: sending,
                priceOrder: priceOrder
            },
            success: function () {
                $('.formApplication').val('');
                $('.fixed-overlay').css('display', 'none');
            }
        });

    });

//Проверка формы заказа+отправка конец

//Сохранение данных корзины при переходе

    $(".boxCartWrapper").html(0);

    var test = localStorage.getItem('name');
    $(".boxCartWrapper").html(test);

    var goods = localStorage.getItem('goods');
    $(".amountOfGoods").html(goods);

//Сохранение данных корзины при переходе конец

//Вывод товаров

    var location = window.location.href;
    var url = location.split('/').pop();
    var pageOfGoods = 'shoppingCart.php';


    if (url == pageOfGoods) {

        $(".boxCartWrapper").find('div').each(function () {

            var src = $(this).find('img').attr('src');
            var product = $(this).find('p:eq(0)').html();
            var price = $(this).find('p:eq(1)').html().match(/\d+/);
            var year = $(this).find('p:eq(2)').html();


            $(".table").append(
                '<tr class="currentLine">' +
                '<td class="retreat">' +
                '<img src=' + src + ' width="120" height="120" alt="">' +
                '</td>' +
                '<td>' +
                '<p style="margin-top: 14px;">' + product + '</p>' +
                '</td>' +
                '<td>' +
                '<p style="margin-top: 14px;">' + year + '</p>' +
                '</td>' +
                '<td class="blockPrice">' +
                '<input class="tableCart" min="0" value="1" type="number">' +
                '<div class="blockCart">' +
                '<img src="img/remove.png" width="40" height="40" alt="">' +
                '<div class="triangle">' +
                '<div class="remove">REMOVE</div>' +
                '</td><td class="currentTd">' +
                '<p class="currentPrice" style="margin-top: 14px;">&#36;' + price + '</p>' +
                '</td>' +
                '<td class="sum">' +
                '<p class=totalPrice style="margin-top: 14px;">' +
                '</p>' +
                '</td>' +
                '</tr>'
            );
        });
    }

//Вывод товаров конец

//Заявка товаров+сумма покупки

    $('.tableCart').val('1');


    $('.blockPrice').each(function () {

        var number = $('.tableCart').val();
        var currentPrice = $(this).siblings('.currentTd').find('.currentPrice').html().match(/\d+/);
        var totalPrice = number * currentPrice;

        $(this).siblings('.sum').find('.totalPrice').html('&#36;' + totalPrice);

    });


    $('.tableCart').live('click', function () {

        var number = $(this).val();
        var currentPrice = $(this).parent(".blockPrice").siblings('.currentTd').find('.currentPrice').html().match(/\d+/);
        var totalPrice = number * currentPrice;

        $(this).parent(".blockPrice").siblings('.sum').find('.totalPrice').html('&#36;' + totalPrice);

        var numb = $('.table').find('.sum').find('p');

        var total = 0;

        for (var i = 0; i < numb.length; i++) {

            total += numb[i].innerHTML.match(/\d+/) << 0;

        }

        $('.totalSum').html('Total: <span style="color: red !important">&#36;' + total);

    });


    $('.sum').each(function () {

        var number = $(this).val();
        var currentPrice = $(this).siblings('.currentTd').find('.currentPrice').html().match(/\d+/);
        var totalPrice = number * currentPrice;

        $(this).parent(".blockPrice").siblings('.sum').find('.totalPrice').html('&#36;' + totalPrice);

        var numb = $('.table').find('.sum').find('p');

        var total = 0;

        for (var i = 0; i < numb.length; i++) {

            total += numb[i].innerHTML.match(/\d+/) << 0;

        }

        $('.totalSum').html('Total: <span style="color: red !important">&#36;' + total);

    });


//Заявка товаров +сумма покупки конец

//Кнопка удалить

    $('.blockCart ').hover(function () {

        $(this).find('.triangle, .remove').addClass('animated fadeIn').css('display', 'block');

    }, function () {

        $(this).find('.triangle, .remove').css('display', 'none');

    });


    $('.blockCart').live('click', function () {

        $(this).parent('.blockPrice').find('input').val('0');
        $(this).parent('.blockPrice').siblings('.sum').find('.totalPrice').html('&#36;0');
        $(this).parents('.currentLine').remove();

        var sum = $('.sum').find('p');
        var total = 0;

        for (var i = 0; i < sum.length; i++) {

            total += sum[i].innerHTML.match(/\d+/) << 0;

            $('.totalSum').html('Total: <span style="color: red !important">&#36;' + total);

        }
    });

//Кнопка удалить конец

//Подписка

    $('.but').click(function () {

        var formId = $('.formId').serialize();

        $.ajax({
            url: 'class/informationInput.php',
            type: 'POST',
            dataType: 'json',
            data: {
                formId: formId,
            },
            success: function () {
            }
        });

    });

//Подписка конец

//Вывод первого комментария

    $('.commentButton').live('click', function () {

        var commentForm = $('.commentForm').serialize();

        var commentName = $('.commentName').val();
        var commentTextarea = $('.commentTextarea').val();
        var commentPost = $('.commentForm').find('.hiddenAuthor').html();

        var data = new Date();
        var hour = data.getHours();
        var minutes = data.getMinutes();
        var seconds = data.getSeconds();

        var year = data.getFullYear();
        var month = data.getMonth();
        var day = data.getDate();

        switch (month) {
            case 0:
                fMonth = "january";
                break;
            case 1:
                fMonth = "february";
                break;
            case 2:
                fMonth = "march";
                break;
            case 3:
                fMonth = "april";
                break;
            case 4:
                fMonth = "may";
                break;
            case 5:
                fMonth = "june";
                break;
            case 6:
                fMonth = "july";
                break;
            case 7:
                fMonth = "august";
                break;
            case 8:
                fMonth = "september";
                break;
            case 9:
                fMonth = "october";
                break;
            case 10:
                fMonth = "november";
                break;
            case 11:
                fMonth = "december";
                break;
        }

        var time = 'Time:' + '  ' + seconds + 's ' + minutes + 'м ' + hour + 'h' + '  ' + '/' + '  ' + '' + 'Date:' + '  ' + day + ' ' + fMonth + ' ' + year + 'y';


        $.ajax({
            url: 'class/informationInput.php',
            type: 'POST',
            cache: false,
            data: {
                commentForm: commentForm,
                time: time,
                commentPost: commentPost
            },
            success: function (data) {

                var result = JSON.parse(data);
                $(".updateComment").load('class/commentOutput.php', {post: result[3]});
                $('.commentForm').find('input,textarea').val('');

            }
        });


    });

    var location = window.location.href;
    var post = location.split('=').pop();

    $(".updateComment").load('class/commentOutput.php', {post: post});

//Вывод первого комментария конец

//Ответ на комментарий

    $('.replyForm').live('click', function () {

        var parentId = $(this).parent().find('p:eq(0)').attr('id');
        var commentPost = $(this).parent().find('p:eq(1)').attr('id');
        var name = $(this).parent().find('p:eq(5)').html().split('<').shift();

        $('.replyForm').prop("disabled", true);

        $(this).parent().after(
            '<div style="background: #5d5d5d; left: 0 !important" class="commentFormAnswer">'

            + '<br>'
            + '<p>' + 'Comments' + '</p>'
            + '<br>'

            + '&nbsp; <label for="">Your name</label><br>'
            + '<input name="commentName" class="commentName" required type="text"><br><br>'

            + '&nbsp; <label for="">Your message</label><br>'
            + '<textarea required name="commentTextarea" class="commentTextarea"  cols="93" rows="5"></textarea>'

            + '<p class="hiddenAuthor">' + commentPost + '</p>'
            + '<p class="hiddenAuthor">' + parentId + '</p>'
            + '<p class="hiddenAuthor">' + name + '</p>'

            + '<button  type="submit" class="commentButtonAnswer" name="commentButtonAnswer">SEND</button>'
            + '<button class="cancelFormAnswer">Cancel comment</button>'

            + '</div>'
        )
    });

//Ответ на комментарий конец

//Ответ на комментарий отправка

    $('.commentButtonAnswer').live('click', function () {

        var data = new Date();
        var hour = data.getHours();
        var minutes = data.getMinutes();
        var seconds = data.getSeconds();

        var year = data.getFullYear();
        var month = data.getMonth();
        var day = data.getDate();

        switch (month) {
            case 0:
                fMonth = "january";
                break;
            case 1:
                fMonth = "february";
                break;
            case 2:
                fMonth = "march";
                break;
            case 3:
                fMonth = "april";
                break;
            case 4:
                fMonth = "may";
                break;
            case 5:
                fMonth = "june";
                break;
            case 6:
                fMonth = "july";
                break;
            case 7:
                fMonth = "august";
                break;
            case 8:
                fMonth = "september";
                break;
            case 9:
                fMonth = "october";
                break;
            case 10:
                fMonth = "november";
                break;
            case 11:
                fMonth = "december";
                break;
        }

        var time = 'Time:' + '  ' + seconds + 's ' + minutes + 'м ' + hour + 'h' + '  ' + '/' + '  ' + '' + 'Date:' + '  ' + day + ' ' + fMonth + ' ' + year + 'y';

        var commentPost = $(this).parent().find('p:eq(1)').html();
        var parentId = $(this).parent().find('p:eq(2)').html();

        var name = $(this).parent().find('p:eq(3)').text();
        var commentName = $(this).parent().find('.commentName').val();
        var commentTextarea = $(this).parent().find('.commentTextarea').val();

        var responseName = commentName + ' ' + '<span style="color: darkred">ответил</span>' + ' ' + name;

        $('.replyForm').prop("disabled", false);

        $.ajax({
            url: 'class/informationInput.php',
            type: 'POST',
            data: {
                commentPost: commentPost,
                parentId: parentId,
                responseName: responseName,
                commentTextarea: commentTextarea,
                time: time
            },
            success: function (data) {

                var result = JSON.parse(data);
                $(".updateComment").load('class/commentOutput.php', {post: result[3]});
                $('.commentFormAnswer').find('input,textarea').val('');
                $('.commentFormAnswer').remove();

            }
        });
    });

//Ответ на комментарий отправка конец

//Скрыть ответ на коментарий

    $('.cancelFormAnswer').live('click', function () {

        $(this).parent().fadeOut(300);
        $('.replyForm').prop("disabled", false);

    })

//Скрыть ответ на коментарий конец

//Вставка голосов

    $('.nameFor li').live('click', function () {

        var idVoice = $(this).find('div:eq(1)').attr('id').match(/\d+/);
        var voice = $(this).children('.vote-result').html().match(/\d+/);
        var voices = ++voice;

        $.ajax({
            url: 'class/informationInput.php',
            type: 'POST',
            data: {
                voices: voices,
                idVoice: idVoice
            },
            success: function (data) {

                $('#rating_' + idVoice + '').siblings('.vote-result').html(data + ' голосов');

            }
        });
    })

//Вставка голосов конец


//Вывод значение таблиц

    $('.update').live('click', function () {

        var location = window.location.href;
        var url = location.split('=').pop();

        var arrayOfTrValues = [];

        $('td').each(function () {

            var massiv = $(this).find('textarea').val();
            arrayOfTrValues.push(massiv);

        });

        var lineNumber = $("table > tbody > tr:first > td").length;
        var subarray = [];

        for (var i = 0; i < Math.ceil(arrayOfTrValues.length / lineNumber); i++) {
            subarray[i] = arrayOfTrValues.slice((i * lineNumber), (i * lineNumber) + lineNumber);
        }

        $.ajax({
            url: 'class/informationInput.php',
            type: 'POST',
            data: {
                subarray: subarray,
                url: url
            },
            success: function (data) {

            }
        });

    })

//Вывод значение таблиц конец

//Кнопка назад

    $('.back').live('click', function () {
        history.go(-1)
    })

//Кнопка назад  конец

//Запрет пустого поиска

    $('.searchButton').live('click', function () {

        var search = $('.search').val();

        if (search == '') {
            alert('Enter a word or phrase to search for');
            return false;
        }

    })

//Запрет пустого поиска конец

//Добаление в корзину из поиска

    $('.addSearch').live('click', function () {

        var img = $(this).siblings('p:eq(1)').find('img').attr('src');
        var name = $(this).siblings('p:eq(0)').html();
        var price = $(this).siblings('p:eq(2)').html().match(/\d+/);
        var year = $(this).siblings('p:eq(3)').html().match(/\d+/);


        $(".boxCartWrapper").append(
            '<div class="ret">' +
            '<img src=' + img + ' width="120" height="120" alt="">' +
            '<p style="padding-top: 5px;">' + name + '</p>' +
            '<p style="color: red !important">' + '&#36;' + price + '</p>' +
            '<p>' + year + 'г.' + '</p>' +
            '<p class="closeCart">' +
            '<img src="img/close.png" width="20" height="20" alt=""></p>' +
            '</div>');

        var length = $('.ret').length;
        $('.amountOfGoods').html(length);

        var param = $(".boxCartWrapper").html();
        localStorage.setItem('name', param);

        var numberOfGoods = $(".amountOfGoods").html();
        localStorage.setItem('goods', numberOfGoods);

    });

//Добаление в корзину из поиска конец





});