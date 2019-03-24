<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Bitter|Raleway|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="slaider/css/style.css">
    <link href="vote/styles/styles.css" rel="stylesheet" type="text/css"/>
    <link href="vote/styles/jquery.rating.css" rel="stylesheet" type="text/css"/>
    <link type="text/css" href="css/jquery.bbslider.css" rel="stylesheet" media="screen"/>
    <link rel="stylesheet" href="css/animate.min.css"/>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src='js/common.js'></script>
    <script type="text/javascript" src="vote/js/jquery.rating.js"></script>

    <script src="slaider/js/slides.js"></script>
    <script type="text/javascript" src="js/jquery.bbslider.js"></script>


    <title>website shop</title>
</head>
<body>

<div class="wrapper">

    <header>

        <?php
        /*Вывод шапки*/
        require 'class/informationOutput.php';
        require 'cap.php';
        /*Вывод шапки конец*/
        ?>

    </header>

    <div class="menu">

        <?php
        /*Вывод шапки*/
        require 'menu.php';
        /*Вывод шапки конец*/
        ?>

    </div>

    <main>

        <div class="clock">
            <!-- clock widget start -->

            <script type="text/javascript"> var css_file = document.createElement("link");
                css_file.setAttribute("rel", "stylesheet");
                css_file.setAttribute("type", "text/css");
                css_file.setAttribute("href", "//s.bookcdn.com//css/cl/bw-cl-150x100t.css");
                document.getElementsByTagName("head")[0].appendChild(css_file);
            </script>

            <div id="tw_8_183596843">
                <div style="width:150px; height:100px; margin: 0 auto ;">
                    <a href="https://nochi.com/time/mahilyow-w497204">Могилёв</a>
                    <br/>
                </div>
            </div>

            <script type="text/javascript"> function setWidgetData_183596843(data) {
                    if (typeof(data) != 'undefined' && data.results.length > 0) {
                        for (var i = 0; i < data.results.length; ++i) {
                            var objMainBlock = '';
                            var params = data.results[i];
                            objMainBlock = document.getElementById('tw_' + params.widget_type + '_' + params.widget_id);
                            if (objMainBlock !== null) objMainBlock.innerHTML = params.html_code;
                        }
                    }
                }
                var clock_timer_183596843 = -1; </script>

            <script type="text/javascript" charset="UTF-8"
                    src="https://widgets.booked.net/time/info?ver=2&domid=589&type=8&id=183596843&scode=2&city_id=w497204&wlangid=20&mode=1&details=0&background=rgba(0,0,0,0.6)&color=ffffff&add_background=ffffff&add_color=ffffff&head_color=ffffff&border=0&transparent=1"></script>
            <!-- clock widget end -->
        </div>

        <section>


            <div class="centerBlock">


                <ul class="goods">

                    <?php
                    /*Вывод товаров*/
                    $myrow = $info->conclusionGoods(0);
                    /*Вывод товаров конец*/
                    ?>

                </ul>
            </div>

            <br>
            <div class="indent">
                <hr>
            </div>


            <div class="centerBlock">
                <ul class="goods">

                    <?php
                    /*Вывод товаров*/
                    $myrow = $info->conclusionGoods(3);
                    /*Вывод товаров конец*/
                    ?>

                </ul>
            </div>

            <br>
            <div class="indent">
                <hr>
            </div>


            <div class="centerBlock">
                <ul class="goods">

                    <?php
                    /*Вывод товаров*/
                    $myrow = $info->conclusionGoods(6);
                    /*Вывод товаров конец*/
                    ?>

                </ul>
            </div>


            <br>
            <div class="indent">
                <hr>
            </div>


            <div class="centerBlock">
                <ul class="goods">

                    <?php
                    /*Вывод товаров*/
                    $myrow = $info->conclusionGoods(9);
                    /*Вывод товаров конец*/
                    ?>
                </ul>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="navigation">
                <ul>
                    <li class="page">
                        <a href="">1</a>
                    </li>
                    <li>
                        <a href="page2.php">2</a>
                    </li>
                    <li>
                        <a href="page3.php">3</a>
                    </li>
                    <li>
                        <a href="page4.php">4</a>
                    </li>
                    <li>
                        <a href="page5.php">5</a>
                    </li>
                </ul>
            </div>

        </section>

        <aside>

            <div class="categories">

                <h2 class="title">
                    <p>CATEGORIES</p>

                </h2>

                <ul class="list">
                    <li>
                        <a href="">Cameras & Photography</a>
                    </li>
                    <li>
                        <a href="">Tv & Audio</a>
                    </li>
                    <li>
                        <a href="">SmartPhones & Tablets</a>
                    </li>
                    <li>
                        <a href="">Laptop & Computer</a>
                    </li>
                    <li>
                        <a href="">Sony</a>
                    </li>
                    <li>
                        <a href="">Mobile</a>
                    </li>
                    <li>
                        <a href="">Sports</a>
                    </li>
                </ul>

            </div>
            <div class="hotDeals">

                <div class="title">
                    <p>BESTSELLER</p>
                </div>


                <ul class="nameFor">

                    <?php
                    /*Вывод товаров и голосов*/
                    $myrow = $info->outputVoices();
                    /*Вывод товаров и голосов конец*/
                    ?>

                </ul>


            </div>
            <br>

            <div class="bestseller">

                <div class="banner"><h1>Here could be your advertisements.</h1>
                    <br><br>
                    <h1>Which can help you.</h1>
                    <br>
                    <h1>If you don't want to see the ad unit click on me.</h1>
                </div>

                <div class="weather">
                    <a class="nuipogoda-iframe-informer" data-nuipogoda="informer1"
                       href="https://mogilev.nuipogoda.ru"></a>
                </div>

                <div class="title">
                    <p>BRANDS</p>
                </div>

                <br>

                <ul>
                    <li>
                        <a href="">Samsung</a>
                        <p class="views">(26)</p>
                    </li>

                    <br>
                    <li>
                        <a href="">LG Electronics</a>
                        <p class="views">(32)</p>
                    </li>

                    <br>
                    <li>
                        <a href="">Xiaomi</a>
                        <p class="views">(21)</p>
                    </li>

                    <br>
                    <li>
                        <a href="">Apple</a>
                        <p class="views">(17)</p>
                    </li>

                    <br>
                    <li>
                        <a href="">Huawei</a>
                        <p class="views">(53)</p>
                    </li>

                    <br></ul>

            </div>

            <div class="bestseller" style="border: none;">

                <div class="title">
                    <p>ТОР</p>

                </div>
                <br>

                <div id="auto">
                    <div title="iphone"><img src="img/111.jpg" alt="glasses" width="380" height="480"/></div>
                    <div title="iphone"><img src="img/222.jpg" alt="mouse" width="380" height="480"/></div>
                </div>


        </aside>
</div>

</main>

<div id="button-up">
    <span>Наверх</span>
</div>

<footer>

    <?php
    /*Подключение футера*/
    require 'footer.php';
    /*Подключение футера конец*/
    ?>

</footer>

</div>

</body>
</html>