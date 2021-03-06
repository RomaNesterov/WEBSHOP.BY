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
                document.getElementsByTagName("head")[0].appendChild(css_file); </script>
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

            <h1 class="quote">About Us</h1>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <p class="paragraph">The standard lorem ipsum passage</p>
            <br>
            <br>
            <br>

            <p class="text">
                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad
                minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
                commodi consequatur?
            </p>
            <br>

            <div class="inscription">
                Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
                vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
            </div>
            <br>

            <p class="text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi malesuada vestibulum.
                Phasellus tempor nunc eleifend cursus molestie. Mauris lectus arcu, pellentesque at sodales sit amet,
                condimentum id nunc. Donec ornare mattis suscipit. Praesent fermentum accumsan vulputate.
            </p>
            <br>
            <br>
            <br>

            <div class="ourTeam">Meet the team</div>


            <ul class="listy">
                <li>
                    <img src="img/avatar/1.png" width="230" height="230" alt="">
                    <br>
                    <p class="nametext">Havier Macherano</p>
                    <br>
                    <p class="profession">Developer</p>

                </li>
                <li>
                    <img src="img/avatar/2.png" width="230" height="230" alt="">
                    <br>
                    <p class="nametext">Luka Biglia</p>
                    <br>
                    <p class="profession">Programmer</p>
                </li>
                <li>
                    <img src="img/avatar/3.png" width="230" height="230" alt="">
                    <br>
                    <p class="nametext">Anzo Perez</p>
                    <br>
                    <p class="profession">Designe</p>
                </li>
                <li>
                    <img src="img/avatar/4.png" width="230" height="230" alt="">
                    <br>
                    <p class="nametext">Jennifer Andrews</p>
                    <br>
                    <p class="profession">PHP Developer</p>
                </li>
            </ul>

            <br><br>

            <p class="brand">Brand Logo</p>


            <ul class="brandLogo">
                <li><img src="img/brand/1.png" alt=""></li>
                <li><img src="img/brand/2.png" alt=""></li>
                <li><img src="img/brand/3.png" alt=""></li>
                <li><img src="img/brand/4.png" alt=""></li>
                <li><img src="img/brand/5.png" alt=""></li>
            </ul>


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


        </aside>
</div>

</main>

<div id="button-up">
    <span>Наверх</span>
</div>

<footer style="margin: 1244px auto 0 auto">

    <?php
    /*Подключение футера*/
    require 'footer.php';
    /*Подключение футера конец*/
    ?>


</footer>

</div>

</body>
</html>