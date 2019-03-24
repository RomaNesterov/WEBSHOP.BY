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

    <main style="width: 1461px;">

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

            <div class="fixed-overlay">
                <div class="modal">
                    <div style="height: 700px !important;" class="modal_container">

                        <div class="closeModal" style="margin: 0 0 0 955px !important;"><img src="img/close.png"
                                                                                             width="20"
                                                                                             height="20" alt="">
                        </div>

                        <form action="" method="post" class="formApplication">

                            <br>

                            <label for="">Name</label><br>
                            <input class="nameApplication" placeholder="Your name..." name="nameApplication" type="text"><br><br>

                            <label for="">Surname</label><br>
                            <input class="surnameApplication" placeholder="Your surname..." name="surnameApplication" type="text"><br><br>

                            <label for="">Patronymic</label><br>
                            <input class="patronymicApplication" placeholder="Your patronymic..." name="patronymicApplication" type="text"><br><br>

                            <label for="">Phone</label><br>
                            <input class="phoneApplication" placeholder="Your phone..." name="phoneApplication" type="text"><br><br>

                            <label for="">Email</label><br>
                            <input class="emailApplication" placeholder="Your email..." name="emailApplication" type="text"><br><br>

                            <div style="margin-left: 611px; margin-top: -306px;" class="totalSumForm">Total: <span
                                        style="color: red !important">&#36;</span></div>

                            <label for="">Text</label><br>
                            <textarea name="application" placeholder="Your text..." class="textApplication" cols="85"
                                      rows="7"></textarea><br><br>


                        </form>
                        <input type="submit" value="SEND" class="sendApplication">

                    </div>
                </div>
            </div>

            <div class="box">
                <br>

                <table class="table">
                    <tr class="first">
                        <td>Image</td>
                        <td>Product Name</td>
                        <td>Year</td>
                        <td>Quantity</td>
                        <td>Unit Price</td>
                        <td>Total</td>
                    </tr>
                </table>
                <br>
                <br>

                <div class="totalSum">Total: <span style="color: red !important">&#36;0</span></div>


                <input style="margin: 0 0 0 820px !important;" type="submit" value="SEND ORDER" class="cartButton">


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

                <div class="title">
                    <p>BRANDS</p>
                </div>
                <br>
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

</main  >

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