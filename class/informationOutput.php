<?php

require 'db.php';


class informationOutput extends db
{

    public function __construct()
    {
        parent::connectionDb();
    }

    public function conclusionNewGoods($number)
    {

        $result = $this->connect->query("SELECT * FROM newGoods LIMIT 8 OFFSET $number ");
        if (!$result) return false;

        while ($row = $result->fetch_array()) {


            printf('              
               
                <div class="newProducts">
                %s
                <p style="margin-left: 250px !important;" class="paragraph">%s</p>
                <p style="margin-left: 250px !important;" class="price">
                    &#36;%s
                    <strike>&#36;487</strike>
                </p> <div style="margin-left: 400px;" class="year">Novelty %s!</div>
                <br>
                <p class="text" style="margin-left: 250px !important;">
                    %s
                </p>
                <br>

                <div class="cart"><img src="img/basket.png" width="30" height="30" alt="">Add to Cart</div>
                <div class="increase">
                    <img src="img/increase.png" title="increase" width="40" height="40" alt=""></div>

                <div class="like">
                    <img src="img/like.png" title="like" width="40" height="40" alt="">
                </div>
                <div class="numberLike" id="%s">%s</div>

            </div>

            <br>
            <br>        
               
               ', $row["image"], $row["name"], $row["price"], $row["year"], $row["text"], $row["id"], $row["numberLike"]
            );
        }
    }


    public function conclusionGoods($number)
    {

        $result = $this->connect->query("SELECT * FROM goods LIMIT 3 OFFSET $number");
        if (!$result) return false;

        while ($row = $result->fetch_array()) {

            printf('      
            
                    <li id="%s">
                    
                        <div class="effectCart">
                            <p>Price with 30&#37; discount!</p>
                            <p>Best new electronic technology only we have!</p>
                            <p>Hurry, the offer is limited!</p>

                        </div>
                        %s
                        <br>
                        <br>
                        <div class="name">%s</div>
                        <br>
                        <div class="price">&#36;%s</div>
                        <div class="year">Novelty %sг!</div>
                        <br>

                        <div class="add">Add card</div>

                    </li>                
               
               ', $row["id"], $row["image"], $row["name"], $row["price"], $row["year"]
            );
        }
    }

    public function conclusionBlog($number)  //Вывод статей блога
    {

        $result = $this->connect->query("SELECT * FROM titleBlog LIMIT 3 OFFSET $number");
        if (!$result) return false;

        while ($row = $result->fetch_array()) {

            printf('      
            
               <div class="section" id="%s">
                %s
                <br>
                <p class="nametext">%s</p>
                <br>
                <p class="text" style="margin: 0 40px 0 0;">%s</p>
                <br>
                <ul class="infoBlog">

                    <li>
                        <img src="img/2.png" alt="">
                        <p>Date:%s</p>
                    </li>
                    <li>
                        <img src="img/5.png" alt=""><p>Views:%s</p>
                    </li>
                    <li>
                        <img src="img/4.png" alt=""><p>Comments:%s</p>
                    </li>
                    <li>
                        <img src="img/1.png" alt=""><p>Author:%s</p>
                    </li>
                </ul>
                <br>
                <br>

                <a href="blogRead.php?post=%s">
                
                <button id="%s" value="%s" class="readMore" name="readBlog" type="submit">READ MORE</button>
                
                </a>
                <br>
            </div>  
              <br>
               
               ', $row["id"], $row["image"], $row["title"], $row["text"], $row["date"], $row["views"], $row["comments"], $row["author"], $row["id"], $row["id"], $row["views"]
            );
        }
    }


    public function contentOutputBlog() //Вывод полной статьй
    {

        if (isset($_GET['post'])) {

            $post = htmlspecialchars(trim($_GET['post']));

            $result = $this->connect->query("SELECT views FROM titleBlog WHERE id='$post'");

            $masiv = $result->fetch_array();

            $resultSum = ++$masiv['views'];

            $this->connect->query("UPDATE titleBlog SET views = '$resultSum' WHERE id = '$post'") or die(mysqli_error($this->connect));

            $result = $this->connect->query("SELECT * FROM titleBlog WHERE id =$post LIMIT 1 ");
            if (!$result) return false;


            while ($row = $result->fetch_array()) {

                printf('      
            
               <div style="margin-top: 15px" class="section" id="%s" xmlns="http://www.w3.org/1999/html">
                %s
                <br>
                <p class="nametext">%s</p>
                <br>
                <p class="text" style="margin: 0 40px 0 0;">%s</p>
                <br>
                <div style="width: 1000px !important;" > <hr></div>
             
                <br>
               </div>  
                <br>
              
              
              <form class="commentForm" method="post" >
              
               <br>                
               <p>Comments</p>
               <br>
              
               &nbsp; <label for="">Your name</label><br>
               <input name="commentName" class="commentName" required type="text"><br><br>
              
               &nbsp; <label for="">Your message</label><br>
               <textarea required name="commentTextarea" class="commentTextarea"  cols="93" rows="5"></textarea> 
              
               <p class="hiddenAuthor">%s</p>
                                            
                           
            </form>
            
            <button type="submit" class="commentButton" name="commentButton">SEND</button> 
              
              
               
               ', $row["id"], $row["image"], $row["title"], $row["text"], $row["id"], $row["id"]
                );
            }


            $numСomment = $this->connect->query("SELECT COUNT(*) FROM commentBlock WHERE post=$post");
            $ro = $numСomment->fetch_array();
            $this->connect->query("UPDATE titleBlog SET comments=$ro[0] WHERE id=$post");

        }
    }


    public function outputVoices()
    {

        $result = $this->connect->query("SELECT * FROM voices");
        if (!$result) return false;

        while ($row = $result->fetch_array()) {


            printf('              
               
         
                    <li >
                        %s
                        <p class="product">%s</p>

                        <p class="price">
                            &#36;%s
                            <strike>&#36;%s</strike>
                        </p>
                        
                        <div class="vote-result">%s голосов</div>

                        <div id="rating_%s">
                            <input type="hidden" class="val" value="0"/>
                        </div>
                        
                        
                    </li> 

               
               ', $row["img"], $row["name"], $row["price"], $row["oldPrice"], $row["goods"], $row["id"]
            );
        }
    }


    public function outputTable()
    {

        if (isset($_POST['nameUser']) && isset($_POST['passwordUser'])) {

            $nameUser = htmlspecialchars(trim($_POST['nameUser']));
            $passwordUser = htmlspecialchars(trim($_POST['passwordUser']));

            $result = $this->connect->query("SELECT * FROM passwords");
            $masiv = $result->fetch_array();


            if ($nameUser == $masiv['login'] && $passwordUser == $masiv['password']) {


                $result = $this->connect->query("SHOW TABLES ");
                if (!$result) return false;


                echo '<ul class="listOfTables">';


                while ($row = $result->fetch_array()) {


                    printf('         
              
                        <li>  
                           <a class="redactor" href="listOfTables.php?alias=%s">%s</a>                                               
                        </li> 
                                                          
                                ', $row['0'], $row['0']
                    );


                }

                echo '</ul>';


            } else {
                echo 'Error output from the database';
            }


        }
    }


    public function outputT()
    {
        if (isset($_GET['alias'])) {

            $alias = htmlspecialchars(trim($_GET['alias']));


            if ($alias == 'titleBlog') { //Вывод titleBlog

                $result = $this->connect->query("SELECT * FROM titleBlog ");

                echo ' <table class="adminStyle">';
                echo ' <tr>
        <td>id</td>
        <td>title</td>
        <td>text</td>
        <td>date</td>
        <td>views</td>
        <td>coments</td>
        <td>author</td>
        <td>image</td>       
        </tr> ';


                while ($row = $result->fetch_assoc()) {

                    printf('
   
    <tr class="insideStyle">
        <td><textarea readonly="false"  name="id"  cols="3" rows="5">%s</textarea></td>
        <td><textarea  name="title"  cols="40" rows="5">%s</textarea></td>
        <td><textarea  name="text"  cols="100" rows="5">%s</textarea></td>
        <td><textarea  name="date"  cols="12" rows="5">%s</textarea></td>
        <td><textarea  name="views"  cols="12" rows="5">%s</textarea></td>
        <td><textarea  name="comments"  cols="12" rows="5">%s</textarea></td>
        <td><textarea  name="author"  cols="12" rows="5">%s</textarea></td>
        <td><textarea  name="image"  cols="30" rows="5">%s</textarea></td>
        
    </tr>      
    
    ', $row['id'], $row['title'], $row['text'], $row['date'], $row['views'], $row['comments'], $row['author'], htmlspecialchars($row['image'])
                    );
                }
                echo ' </table>';
                echo '<button type="submit" class="update">UPDATE</button>';
                echo '<button  class="back">BACK</button>';

            }//Вывод titleBlog конец


            elseif ($alias == 'commentBlock') { //Вывод commentBlock

                $result = $this->connect->query("SELECT * FROM commentBlock ");

                echo ' <table class="adminStyle">';
                echo ' <tr>
        <td>id</td>
        <td>author</td>
        <td>text</td>
        <td>post</td>
        <td>parentId</td>
        <td>date</td>
             
        </tr> ';


                while ($row = $result->fetch_assoc()) {

                    printf('
   
    <tr class="insideStyle">
        <td><textarea readonly="false"  name="id"  cols="3" rows="5">%s</textarea></td>
        <td><textarea  name="author"  cols="60" rows="5">%s</textarea></td>
        <td><textarea  name="text"  cols="122" rows="5">%s</textarea></td>
        <td><textarea  name="post"  cols="5" rows="5">%s</textarea></td>
        <td><textarea  name="parentId"  cols="7" rows="5">%s</textarea></td>
        <td><textarea  name="date"  cols="39" rows="5">%s</textarea></td>
    </tr>      
    
    ', $row['id'], $row['author'], $row['text'], $row['post'], $row['parentId'], $row['date']
                    );
                }
                echo ' </table>';
                echo '<button type="submit" class="update">UPDATE</button>';
                echo '<button  class="back">BACK</button>';

            }//Вывод commentBlock конец

            elseif ($alias == 'goods') {//Вывод goods

                $result = $this->connect->query("SELECT * FROM goods");

                echo ' <table class="adminStyle">';
                echo ' <tr>
        <td>id</td>
        <td>name</td>
        <td>price</td>
        <td>year</td>
        <td>image</td>       
        </tr> ';


                while ($row = $result->fetch_assoc()) {

                    printf('
   
    <tr class="insideStyle">
        <td><textarea readonly="false"  name="id"  cols="3" rows="5">%s</textarea></td>
        <td><textarea  name="name"  cols="12" rows="5">%s</textarea></td>
        <td><textarea  name="price"  cols="12" rows="5">%s</textarea></td>
        <td><textarea  name="year"  cols="12" rows="5">%s</textarea></td>
        <td><textarea  name="image"  cols="80" rows="5">%s</textarea></td>
    </tr>      
    
    ', $row['id'], $row['name'], $row['price'], $row['year'], $row['image']
                    );
                }
                echo ' </table>';
                echo '<button type="submit" class="update">UPDATE</button>';
                echo '<button  class="back">BACK</button>';


            }//Вывод goods конец

            elseif ($alias == 'message') {//Вывод message


                $result = $this->connect->query("SELECT * FROM message");

                echo ' <table class="adminStyle">';
                echo ' <tr>
        <td>id</td>
        <td>name</td>
        <td>email</td>
        <td>text</td>
        </tr> ';


                while ($row = $result->fetch_assoc()) {

                    printf('
   
    <tr class="insideStyle">
        <td><textarea readonly="false"  name="id"  cols="3" rows="5">%s</textarea></td>
        <td><textarea  name="name"  cols="12" rows="5">%s</textarea></td>
        <td><textarea  name="email"  cols="12" rows="5">%s</textarea></td>
        <td><textarea  name="text"  cols="12" rows="5">%s</textarea></td>
    </tr>      
    
    ', $row['id'], $row['name'], $row['email'], $row['text']
                    );
                }
                echo ' </table>';
                echo '<button type="submit" class="update">UPDATE</button>';
                echo '<button  class="back">BACK</button>';


            }//Вывод message конец


            elseif ($alias == 'newGoods') {//Вывод newGoods


                $result = $this->connect->query("SELECT * FROM newGoods");

                echo ' <table class="adminStyle">';
                echo ' <tr>
        <td>id</td>
        <td>name</td>
        <td>image</td>
        <td>text</td>
        <td>price</td>
        <td>year</td>
        <td>numberLike</td>
        </tr> ';


                while ($row = $result->fetch_assoc()) {

                    printf('
   
    <tr class="insideStyle">
        <td><textarea readonly="false"  name="id"  cols="3" rows="5">%s</textarea></td>
        <td><textarea  name="name"  cols="12" rows="5">%s</textarea></td>
        <td><textarea  name="image"  cols="40" rows="5">%s</textarea></td>
        <td><textarea  name="text"  cols="100" rows="5">%s</textarea></td>
        <td><textarea  name="price"  cols="10" rows="5">%s</textarea></td>
        <td><textarea  name="year"  cols="10" rows="5">%s</textarea></td>
        <td><textarea  name="numberLike"  cols="10" rows="5">%s</textarea></td>
    </tr>      
    
    ', $row['id'], $row['name'], $row['image'], $row['text'], $row['price'], $row['year'], $row['numberLike']
                    );
                }
                echo ' </table>';
                echo '<button type="submit" class="update">UPDATE</button>';
                echo '<button  class="back">BACK</button>';

            }//Вывод newGoods конец


            elseif ($alias == 'orders') {//Вывод orders


                $result = $this->connect->query("SELECT * FROM orders");

                echo ' <table class="adminStyle">';
                echo ' <tr>
        <td>id</td>
        <td>name</td>
        <td>surname</td>
        <td>patronymic</td>
        <td>phone</td>
        <td>email</td>
        <td>text</td>
        </tr> ';


                while ($row = $result->fetch_assoc()) {

                    printf('
   
    <tr class="insideStyle">
        <td><textarea readonly="false"  name="id"  cols="3" rows="5">%s</textarea></td>
        <td><textarea  name="name"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="surname"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="patronymic"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="phone"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="email"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="text"  cols="30" rows="5">%s</textarea></td>
    </tr>      
    
    ', $row['id'], $row['name'], $row['surname'], $row['patronymic'], $row['phone'], $row['email'], $row['text']
                    );
                }
                echo ' </table>';
                echo '<button type="submit" class="update">UPDATE</button>';
                echo '<button  class="back">BACK</button>';


            }//Вывод orders конец

            elseif ($alias == 'orderTable') {//Вывод orderTable

                $result = $this->connect->query("SELECT * FROM orderTable");

                echo ' <table class="adminStyle">';
                echo ' <tr>
        <td>id</td>
        <td>img</td>
        <td>product	</td>
        <td>year</td>
        <td>quantity</td>
        <td>total</td>
        <td>idOrder</td>
        </tr> ';


                while ($row = $result->fetch_assoc()) {

                    printf('
   
    <tr class="insideStyle">
        <td><textarea readonly="false"  name="id"  cols="3" rows="5">%s</textarea></td>
        <td><textarea  name="img"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="product"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="year"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="quantity"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="total"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="idOrder"  cols="30" rows="5">%s</textarea></td>
    </tr>      
    
    ', $row['id'], $row['idOrder'], $row['product'], $row['year'], $row['quantity'], $row['total'], $row['idOrder']
                    );
                }
                echo ' </table>';
                echo '<button type="submit" class="update">UPDATE</button>';
                echo '<button  class="back">BACK</button>';


            }//Вывод orderTable конец

            elseif ($alias == 'passwords') {//Вывод passwords

                $result = $this->connect->query("SELECT * FROM passwords");

                echo ' <table class="adminStyle">';
                echo ' <tr>
        <td>id</td>
        <td>login</td>
        <td>password</td>
        </tr> ';


                while ($row = $result->fetch_assoc()) {

                    printf('
   
    <tr class="insideStyle">
        <td><textarea readonly="false"  name="id"  cols="3" rows="5">%s</textarea></td>
        <td><textarea  name="login"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="password"  cols="30" rows="5">%s</textarea></td>
    </tr>      
    
    ', $row['id'], $row['login'], $row['password']
                    );
                }
                echo ' </table>';
                echo '<button type="submit" class="update">UPDATE</button>';
                echo '<button  class="back">BACK</button>';


            }//Вывод passwords конец

            elseif ($alias == 'search') {//Вывод search


                $result = $this->connect->query("SELECT * FROM search");

                echo ' <table class="adminStyle">';
                echo ' <tr>
        <td>id</td>
        <td>image</td>
        <td>name</td>
        <td>year</td>
        <td>price</td>
        </tr> ';


                while ($row = $result->fetch_assoc()) {

                    printf('
   
    <tr class="insideStyle">
        <td><textarea readonly="false"  name="id"  cols="3" rows="5">%s</textarea></td>
        <td><textarea  name="image"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="name"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="year"  cols="30" rows="5">%s</textarea></td>
        <td><textarea  name="price"  cols="30" rows="5">%s</textarea></td>   
    </tr> 
         
        
    
    ', $row['id'], $row['image'], $row['name'], $row['year'], $row['price']
                    );
                }
                echo ' </table>';
                echo '<button type="submit" class="update">UPDATE</button>';
                echo '<button  class="back">BACK</button>';

            }//Вывод search конец

            elseif ($alias == 'subscribe') {//Вывод subscribe

                $result = $this->connect->query("SELECT * FROM subscribe");

                echo ' <table class="adminStyle">';
                echo ' <tr>
        <td>id</td>
        <td>email</td>
        </tr> ';


                while ($row = $result->fetch_assoc()) {

                    printf('
   
    <tr class="insideStyle">
  
        <td><textarea readonly="false"  name="id"  cols="3" rows="5">%s</textarea></td>
        <td><textarea  name="email"  cols="30" rows="5">%s</textarea></td>
       
    </tr>      
 
    ', $row['id'], $row['email']
                    );
                }
                echo ' </table>';
                echo '<button type="submit" class="update">UPDATE</button>';
                echo '<button  class="back">BACK</button>';


            }//Вывод subscribe конец


            elseif ($alias == 'voices') {//Вывод voices

                $result = $this->connect->query("SELECT * FROM voices");

                echo ' <table class="adminStyle">';
                echo ' <tr>
        <td>id</td>
        <td>goods</td>
        <td>img</td>
        <td>price</td>
        <td>oldPrice</td>
        <td>name</td>       
        </tr> ';


                while ($row = $result->fetch_assoc()) {

                    printf('
   
    <tr class="insideStyle">
        <td><textarea aria-readonly="true"  name="id"  cols="3" rows="5">%s</textarea></td>
        <td><textarea  name="goods"  cols="10" rows="5">%s</textarea></td>
        <td><textarea  name="img"  cols="60" rows="5">%s</textarea></td>
        <td><textarea  name="price"  cols="10" rows="5">%s</textarea></td>
        <td><textarea  name="oldPrice"  cols="10" rows="5">%s</textarea></td>
        <td><textarea  name="name"  cols="30" rows="5">%s</textarea></td>
        
    </tr>      
    
    ', $row['id'], $row['goods'], $row['img'], $row['price'], $row['oldPrice'], $row['name']
                    );
                }
                echo '</table>';
                echo '<button type="submit" class="update">UPDATE</button>';
                echo '<button  class="back">BACK</button>';


            }//Вывод voices конец


        }

    }


    public function search()  //Поиск по сайту
    {
        if (isset($_POST['search'])) {

            $search = htmlspecialchars(trim($_POST['search']));


            $name1 = $this->connect->query("SELECT *  FROM goods WHERE name LIKE '%$search%'");
            $row1 = $name1->fetch_array();

            $name2 = $this->connect->query("SELECT *  FROM newGoods WHERE name LIKE '%$search%'");
            $row2 = $name2->fetch_array();


            if ($search == $row1['name'] or $row2['name']) {

                $result = $this->connect->query("SELECT * FROM goods WHERE name LIKE '%$search%'");


                while ($row = $result->fetch_array()) {
                    printf("  <div style='margin: 30px;'>
   <p class='description'>Maecenas ut velit nisi. Donec egestas elementum felis et dictum. Vivamus pulvinar eu turpis in eleifend. Etiam eu egestas velit. Maecenas sagittis tortor id vulputate sollicitudin. Nullam auctor vehicula convallis. Sed cursus fermentum aliquet. Vestibulum finibus enim nec lectus faucibus euismod. Sed sed tellus at nunc aliquam efficitur. Maecenas fringilla consequat augue, a mattis nunc pulvinar et. Vestibulum quis dignissim massa, ullamcorper aliquet massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque fringilla hendrerit tellus, eget consequat purus rhoncus quis. </p>
                                <p>%s</p></br>
                                 <p>%s</p></br>
                                  <p class='price'>price:&#36;%s</p>
                                   <p class='shipping' >year:%s</p>
                                    <div class='addSearch'>Add card</div>
                                     <hr>                                     
                                      </div>", $row["name"], $row["image"], $row["price"], $row["year"]);

                }


                $result2 = $this->connect->query("SELECT * FROM newGoods WHERE name LIKE '%$search%'");


                while ($row2 = $result2->fetch_array()) {
                    printf("  <div style='margin: 30px;'>
  <p class='description'>Maecenas ut velit nisi. Donec egestas elementum felis et dictum. Vivamus pulvinar eu turpis in eleifend. Etiam eu egestas velit. Maecenas sagittis tortor id vulputate sollicitudin. Nullam auctor vehicula convallis. Sed cursus fermentum aliquet. Vestibulum finibus enim nec lectus faucibus euismod. Sed sed tellus at nunc aliquam efficitur. Maecenas fringilla consequat augue, a mattis nunc pulvinar et. Vestibulum quis dignissim massa, ullamcorper aliquet massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque fringilla hendrerit tellus, eget consequat purus rhoncus quis. </p>
                                <p>%s</p></br>
                                 <p>%s</p></br>
                                  <p class='price'>price:&#36;%s</p>
                                   <p class='shipping' >year:%s</p>
                                    <div class='addSearch'>Add card</div>
                                     <hr>
                                      </div>", $row2["name"], $row2["image"], $row2["price"], $row2["year"]);

                }


            } else {
                echo 'At your request, nothing found!';
            }

        }
    }//Поиск по сайту конец


}

$info = new informationOutput();








