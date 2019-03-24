<?php

require 'db.php';


class informationOutput extends db
{

    public function __construct()
    {
        parent::connectionDb();
    }


    public function contentOutputBlog() //Вывод коментариев
    {

        if (isset($_POST['post'])) {

            $post = htmlspecialchars(trim($_POST['post']));

            if ($post == $post) {

                $Db = $this->connect;

                function callComment($row1, $Db)
                {
                    echo '<li>';

                    echo '<div class="blockComment">';

                    echo '<p id=' . $row1["id"] . '></p>';
                    echo '<p id=' . $row1["post"] . '></p>';

                    echo '<p class="nameForm">' . $row1["author"] . '</p>';
                    echo '<p class="dateForm">' . $row1["date"] . '</p>';
                    echo '<p class="textForm">' . $row1["text"] . '</p>';
                    echo '<p class="hiddenAuthor">' . $row1["author"] . '</p>';

                    echo '<button type="submit" class="replyForm" >Reply</button>';
                    echo '</div>  ';


                    $id = $row1["id"];
                    $output = $Db->query("SELECT * FROM commentBlock WHERE parentId = $id  ORDER BY id DESC  ");

                    if (mysqli_num_rows($output) > 0) {

                        echo "<ul>";
                        while ($row = $output->fetch_array()) {
                            callComment($row, $Db);
                        };
                        echo "</ul>";

                    }

                    echo '</li>';

                }


                $result_set = $Db->query("SELECT  * FROM commentBlock WHERE parentId = $post  ORDER BY id DESC  ");
                if (!$result_set) return false;

                while ($row1 = $result_set->fetch_array()) {
                    echo "<ul>";
                    callComment($row1, $Db);
                    echo "</ul>";
                };


            } else {
                echo 'Ошибка!';
            }
        } else {
            echo 'Ошибка приема';
        }
    }
}

$info = new informationOutput();

$info->contentOutputBlog();






