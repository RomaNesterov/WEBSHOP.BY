<?php

require 'db.php';

class informationInput extends db
{


    public $name;
    public $email;
    public $textArea;
    public $headers;
    public $nameApplication;
    public $surnameApplication;
    public $patronymicApplication;
    public $phoneApplication;
    public $emailApplication;
    public $textApplication;
    public $totalSumForm;
    public $arrayImg;
    public $arrayProduct;
    public $arrayYear;
    public $arrayQuantity;
    public $arrayTotal;
    public $number;
    public $arraySum;
    public $title;
    public $message;
    public $to;
    public $priceOrder;
    public $like;
    public $id;
    public $num;
    public $field;

    public function __construct()
    {
        parent::connectionDb();
    }


    public function insertMessage()  //Вставка сообщений формы
    {
        if (isset($_POST['form'])) {

            parse_str($_POST['form'], $variable);


            $this->textArea = htmlspecialchars(trim($variable['textArea']));
            $this->email = htmlspecialchars(trim($variable['email']));
            $this->name = htmlspecialchars(trim($variable['name']));


            $this->connect->query("INSERT INTO message (name,email,text) VALUES
                                                                               ('$this->name',
                                                                                '$this->email',
                                                                                '$this->textArea')");

            $this->to = "r.nesterow2013@yandex.ru";
            $this->title = 'Сообщение';
            $this->message = '<p>' . $this->name . '<p></br>';
            $this->message .= '<p>' . $this->email . '<p></br>';
            $this->message .= '<p>' . $this->textArea . '<p></br>';

            $this->headers = "From:$this->email";
            $this->headers .= "Replay to nesterow2013@yandex.ru";
            $this->headers .= "MIME-Version: 1.0' . \"\r\n";
            $this->headers .= "Content-type: text/html; charset=utf-8 \r\n";
            $this->headers .= "X-Mailer: PHP mail script";

            mail($this->to, $this->title, $this->message, $this->headers);

        }
    }


    public function insertOrder()  //Вставка заказа
    {
        if (isset($_POST['sending'])) {

            parse_str($_POST['sending'], $variable);

            $this->nameApplication = htmlspecialchars(trim($variable['nameApplication']));
            $this->surnameApplication = htmlspecialchars(trim($variable['surnameApplication']));
            $this->patronymicApplication = htmlspecialchars(trim($variable['patronymicApplication']));
            $this->phoneApplication = htmlspecialchars(trim($variable['phoneApplication']));
            $this->emailApplication = htmlspecialchars(trim($variable['emailApplication']));
            $this->textApplication = htmlspecialchars(trim($variable['application']));


            $this->connect->query("INSERT INTO orders (name,surname,patronymic,phone,email,text) VALUES
                                                                                                       ('$this->nameApplication',
                                                                                                        '$this->surnameApplication',
                                                                                                        '$this->patronymicApplication',
                                                                                                        '$this->phoneApplication',
                                                                                                        '$this->emailApplication',
                                                                                                        '$this->textApplication')");


            $idOrder = $this->connect->query("SELECT id FROM orders ORDER BY id DESC LIMIT 1");

            $id = implode(",", $idOrder->fetch_assoc());

            $this->priceOrder = $_POST['priceOrder'];
            $this->number = $_POST['number'];
            $this->arraySum = $_POST['arraySum'];


            for ($i = 0; $i < $this->number; $i++) {

                $this->arrayImg = $this->arraySum[0][$i];
                $this->arrayProduct = $this->arraySum[1][$i];
                $this->arrayYear = $this->arraySum[2][$i];
                $this->arrayQuantity = $this->arraySum[3][$i];
                $this->arrayTotal = $this->arraySum[4][$i];

                $this->connect->query("INSERT INTO orderTable (img,product,year,quantity,total,idOrder) VALUES ('$this->arrayImg','$this->arrayProduct','$this->arrayYear','$this->arrayQuantity','$this->arrayTotal', '$id')");

            }


            $this->to = "r.nesterow2013@yandex.ru";
            $this->title = 'Order';

            $this->headers = "From:$this->emailApplication";
            $this->headers .= "Replay to nesterow2013@yandex.ru";
            $this->headers .= "MIME-Version: 1.0\r\n";
            $this->headers .= "Content-type: text/html\r\n";

            $this->message = '<p>' . $this->nameApplication . '</p></br>';
            $this->message .= '<p>' . $this->surnameApplication . '</p></br>';
            $this->message .= '<p>' . $this->patronymicApplication . '</p></br>';
            $this->message .= '<p>' . $this->phoneApplication . '</p></br>';
            $this->message .= '<p>' . $this->emailApplication . '</p></br>';
            $this->message .= '<p>' . $this->textApplication . '</p></br></br></br>';

            for ($i = 0; $i < $this->number; $i++) {

                $this->message .= '<p>' . $this->arraySum[0][$i] . '--</p></br>';
                $this->message .= '<p>' . $this->arraySum[1][$i] . '--</p></br>';
                $this->message .= '<p>' . $this->arraySum[2][$i] . '--</p></br>';
                $this->message .= '<p>' . $this->arraySum[3][$i] . 'шт--</p></br>';
                $this->message .= '<p>' . $this->arraySum[4][$i] . '</p></br></br>';

            }

            $this->message .= '<p>Order amount:' . $this->priceOrder . '</p>';

            mail($this->to, $this->title, $this->message, $this->headers);

        }


    }


    public function outputLike()  //Вставка лайков
    {
        if (isset($_POST['like']) and isset($_POST['id'])) {

            $this->like = htmlspecialchars(trim($_POST['like']));
            $this->id = htmlspecialchars(trim($_POST['id']));


            $this->number = $this->connect->query("SELECT id FROM newGoods WHERE id='$this->id'") or die(mysqli_error($this->connect));

            $like = $this->number->fetch_assoc();

            $likes = implode(",", $like);

            if ($likes == $this->id) {

                $this->connect->query("UPDATE newGoods SET numberLike = '$this->like' WHERE id ='$this->id'");

            } else {

                $this->connect->query("INSERT INTO newGoods (numberLike) VALUES ('$this->id')") or die(mysqli_error($this->connect));

            }

            $this->num = $this->connect->query("SELECT numberLike FROM newGoods WHERE id='$this->id' ") or die(mysqli_error($this->connect));

            $inputLike = $this->num->fetch_assoc();

            echo implode(",", $inputLike);

        }
    }


    public function insertSubscribe()  //Вставка подписки
    {
        if (isset($_POST['field'])) {

            $this->field = htmlspecialchars(trim($_POST['field']));

            $this->connect->query("INSERT INTO subscribe (email) VALUES ('$this->field')") or die(mysqli_error($this->connect));

        }
    }


    public function insertComment()  //Вставка комментариев
    {
        if (isset($_POST['commentForm'])) {


            parse_str($_POST['commentForm'], $variable);


            $this->commentName = htmlspecialchars(trim($variable['commentName']));
            $this->commentTextarea = htmlspecialchars(trim($variable['commentTextarea']));
            $this->commentPost = htmlspecialchars(trim($_POST['commentPost']));
            $this->time = htmlspecialchars(trim($_POST['time']));


            $this->connect->query("INSERT INTO commentBlock (author,text,post,parentId,date) VALUES (
                                                                                                    '$this->commentName',
                                                                                                    '$this->commentTextarea',
                                                                                                    '$this->commentPost',
                                                                                                    '$this->commentPost',
                                                                                                    '$this->time')");

            $masiv = $this->connect->query("SELECT * FROM commentBlock ORDER BY id DESC LIMIT 1");
            $row = json_encode($masiv->fetch_array());

            echo $row;

        } elseif (isset($_POST['parentId'])) {


            $commentPost = htmlspecialchars(trim($_POST['commentPost']));
            $parentId = htmlspecialchars(trim($_POST['parentId']));
            $responseName = trim($_POST['responseName']);
            $commentTextarea = htmlspecialchars(trim($_POST['commentTextarea']));
            $time = htmlspecialchars(trim($_POST['time']));


            $this->connect->query("INSERT INTO commentBlock (author,text,post,parentId,date) VALUES (
                                                                                                    '$responseName',
                                                                                                    '$commentTextarea',
                                                                                                    '$commentPost',
                                                                                                    '$parentId',
                                                                                                    '$time')");

            $masiv = $this->connect->query("SELECT * FROM commentBlock WHERE
                                                                              author='$responseName' AND
                                                                              text='$commentTextarea' AND
                                                                              parentId='$parentId' ");
            $row = json_encode($masiv->fetch_array());

            echo $row;

        }
    }


    public function insertVoices()  //Вставка голосов
    {
        if (isset($_POST['voices'])) {


            $voices = htmlspecialchars(trim($_POST['voices']));
            $idVoice = htmlspecialchars(trim(implode(",", $_POST['idVoice'])));


            $this->connect->query("UPDATE voices SET goods = '$voices' WHERE id = '$idVoice' ") or die(mysqli_error($this->connect));

            $result = $this->connect->query("SELECT * FROM voices WHERE id='$idVoice'");

            $masiv = $result->fetch_array();

            echo $masiv['goods'];

        }
    }


    public function insertUpdate()  //Вставка обновениий базы
    {
        if (isset($_POST['subarray'])) {


            $mas = $_POST['subarray'];


            if ('subscribe' == $_POST['url']) {

                for ($i = 0; $i <= count($mas); $i++) {

                    $id = $mas[$i][0];
                    $email = $mas[$i][1];

                    $this->connect->query("UPDATE subscribe SET
                                                               email='$email'
                                                               WHERE id='$id' ");
                }

            } else if ('commentBlock' == $_POST['url']) {
                echo 'Привет commentBlock';

                for ($i = 0; $i <= count($mas); $i++) {

                    $id = $mas[$i][0];
                    $author = $mas[$i][1];
                    $text = $mas[$i][2];
                    $post = $mas[$i][3];
                    $parentId = $mas[$i][4];
                    $date = $mas[$i][5];


                    $this->connect->query("UPDATE commentBlock SET 
                                                                    author='$author',
                                                                    text='$text',
                                                                    post='$post',
                                                                    parentId='$parentId',
                                                                    date='$date'
                                                                    WHERE id='$id' ");
                }

            } else if ('goods' == $_POST['url']) {
                echo 'Привет goods';

                for ($i = 0; $i <= count($mas); $i++) {

                    $id = $mas[$i][0];
                    $name = $mas[$i][1];
                    $price = $mas[$i][2];
                    $year = $mas[$i][3];
                    $image = $mas[$i][4];
                    print_r($mas);

                    $this->connect->query("UPDATE goods SET 
                                                           name='$name',
                                                           price='$price',
                                                           year='$year',
                                                           image='$image'
                                                           WHERE id='$id' ");
                }

            } else if ('message' == $_POST['url']) {
                echo 'Привет message';

                for ($i = 0; $i <= count($mas); $i++) {

                    $id = $mas[$i][0];
                    $name = $mas[$i][1];
                    $email = $mas[$i][2];
                    $text = $mas[$i][3];

                    print_r($mas);

                    $this->connect->query("UPDATE message SET 
                                                           name='$name',
                                                           email='$email',
                                                           text='$text'
                                                           WHERE id='$id' ");
                }

            } else if ('newGoods' == $_POST['url']) {
                echo 'Привет newGoods';

                for ($i = 0; $i <= count($mas); $i++) {

                    $id = $mas[$i][0];
                    $name = $mas[$i][1];
                    $image = $mas[$i][2];
                    $text = $mas[$i][3];
                    $price = $mas[$i][4];
                    $year = $mas[$i][5];
                    $numberLike = $mas[$i][6];

                    print_r($mas);

                    $this->connect->query("UPDATE newGoods SET 
                                                           name='$name',
                                                           image='$image',
                                                           text='$text',
                                                           price='$price',
                                                           year='$year',
                                                           numberLike='$numberLike'
                                                           WHERE id='$id' ");
                }

            } else if ('orderTable' == $_POST['url']) {
                echo 'Привет orderTable';

                for ($i = 0; $i <= count($mas); $i++) {

                    $id = $mas[$i][0];
                    $img = $mas[$i][1];
                    $product = $mas[$i][2];
                    $year = $mas[$i][3];
                    $quantity = $mas[$i][4];
                    $total = $mas[$i][5];
                    $idOrder = $mas[$i][6];

                    print_r($mas);

                    $this->connect->query("UPDATE orderTable SET 
                                                           img='$img',
                                                           product='$product',
                                                           year='$year',
                                                           quantity='$quantity',
                                                           total='$total',
                                                           idOrder='$idOrder'
                                                           WHERE id='$id' ");
                }

            } else if ('orders' == $_POST['url']) {
                echo 'Привет orders';

                for ($i = 0; $i <= count($mas); $i++) {

                    $id = $mas[$i][0];
                    $name = $mas[$i][1];
                    $surname = $mas[$i][2];
                    $patronymic = $mas[$i][3];
                    $phone = $mas[$i][4];
                    $email = $mas[$i][5];
                    $text = $mas[$i][6];

                    print_r($mas);

                    $this->connect->query("UPDATE orders SET 
                                                           name='$name',
                                                           surname='$surname',
                                                           patronymic='$patronymic',
                                                           phone='$phone',
                                                           email='$email',
                                                           text='$text'
                                                           WHERE id='$id' ");
                }

            } else if ('passwords' == $_POST['url']) {
                echo 'Привет passwords';

                for ($i = 0; $i <= count($mas); $i++) {

                    $id = $mas[$i][0];
                    $login = $mas[$i][1];
                    $password = $mas[$i][2];

                    print_r($mas);

                    $this->connect->query("UPDATE passwords SET 
                                                               login='$login',
                                                               password='$password'
                                                               WHERE id='$id' ");
                }

            } else if ('search' == $_POST['url']) {
                echo 'Привет search';

                for ($i = 0; $i <= count($mas); $i++) {

                    $id = $mas[$i][0];
                    $image = $mas[$i][1];
                    $name = $mas[$i][2];
                    $year = $mas[$i][3];
                    $price = $mas[$i][4];

                    print_r($mas);

                    $this->connect->query("UPDATE search SET 
                                                           image='$image',
                                                           name='$name',
                                                           year='$year',
                                                           price ='$price '
                                                           WHERE id='$id' ");
                }

            } else if (isset($_POST['url']) == 'titleBlog') {
                echo 'Привет titleBlog';

                for ($i = 0; $i <= count($mas); $i++) {

                    $id = $mas[$i][0];
                    $title = $mas[$i][1];
                    $text = $mas[$i][2];
                    $date = $mas[$i][3];
                    $views = $mas[$i][4];
                    $comments = $mas[$i][5];
                    $author = $mas[$i][6];
                    $image = $mas[$i][7];

                    print_r($mas);

                    $this->connect->query("UPDATE titleBlog SET 
                                                           title ='$title ',
                                                           text='$text',
                                                           date='$date',
                                                           views='$views',
                                                           comments='$comments',
                                                           author='$author',
                                                           image='$image'
                                                           WHERE id='$id' ");
                }

            } else if (isset($_POST['url']) == 'voices') {
                echo 'Привет voices';

                for ($i = 0; $i <= count($mas); $i++) {

                    $id = $mas[$i][0];
                    $goods = $mas[$i][1];
                    $img = $mas[$i][2];
                    $price = $mas[$i][3];
                    $oldPrice = $mas[$i][4];
                    $name = $mas[$i][5];

                    print_r($mas);

                    $this->connect->query("UPDATE voices SET 
                                                           goods ='$goods',
                                                           img='$img',
                                                           price='$price',
                                                           oldPrice='$oldPrice',
                                                           name='$name'
                                                           WHERE id='$id' ");
                }

            }


        }
    }


}

$info = new informationInput();

$info->outputLike();
$info->insertMessage();
$info->insertSubscribe();
$info->insertOrder();
$info->insertComment();
$info->insertVoices();
$info->insertUpdate();

