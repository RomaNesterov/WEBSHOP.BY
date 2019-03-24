<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Bitter|Raleway|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src='js/common.js'></script>
    <script type="text/javascript" src="vote/js/jquery.rating.js"></script>
    <script src="js/jquery-cookie-master/src/jquery.cookie.js"></script>
    <script src="slaider/js/slides.js"></script>
    <script type="text/javascript" src="js/jquery.bbslider.js"></script>

    <title>website shop</title>
</head>
<body style="background: black">


<?php
/*Вывод всех таблиц*/
require 'class/informationOutput.php';
$myrow = $info->outputTable();
$myrow = $info->outputT();
/*Вывод всех таблиц конец*/
?>




</body>
</html>