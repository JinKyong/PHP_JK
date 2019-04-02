<!-- 구글 검색 : galley board css => CSS Only Pinterest-like Responsive Board Layout - Boardz.css | CSS ... -->
<!-- 출처 : https://www.cssscript.com/css-pinterest-like-responsive-board-layout-boardz-css/ -->

<?
$connect = mysql_connect("localhost","JK","2015136066"); // DB 연결
mysql_select_db("jk_db", $connect);                // DB 선택

$sql = "Select * from boardz where title like '%$_GET[search]%';";
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8"> 

    <title>Boardz Demo</title>
    <meta name="description" content="Create Pinterest-like boards with pure CSS, in less than 1kB.">
    <meta name="author" content="Burak Karakan">
    <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
    <link rel="stylesheet" href="src/boardz.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wingcss/0.1.8/wing.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="seventyfive-percent  centered-block">
        <!-- Sample code block -->
        <div>    
            <hr class="seperator">

            <!-- Example header and explanation -->
            <div class="text-center">
                <h2>Beautiful <strong>Boardz</strong></h2>
                <div style="display: block; width: 50%; margin-right: auto; margin-left: auto; position: relative;">
                    <form class="example" method='get' action="board.php">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <!--<hr class="seperator fifty-percent">-->

            <!-- Example Boardz element. -->
            <div class="boardz centered-block beautiful">
                <?
                $result = mysql_query($sql, $connect);
                $num = mysql_num_rows($result);     //search된 이미지의 개수

                switch($num){                      //num에 따라 생성할 열 결정
                    case 0:
                        $col = 0; break;
                    case 1:
                        $col = 1; break;
                    case 2:
                        $col = 2; break;
                    default:
                        $col = 3; break;
                }
                $div = $col;                        //나누는 수 (남은 열의 수)

                if($col==0)
                    echo "<h1> 검색 결과가 없습니다 </h1>";
                else
                    for($i=0; $i<$col; $i++){
                        $quot = $num/$div;
                        echo "<ul>";
                        for ($j = 0; $j<$quot; $j++){
                            $row = mysql_fetch_array($result);
                            echo "<li>
                                <h1>$row[title]</h1>
                                $row[contents]
                                <img src=\"$row[image_url]\" alt=\"demo image\"/>
                               </li>";
                            $num--;
                        }
                        echo "</ul>";
                        $div--;
                    }

                mysql_close($connect);
                ?>
            </div>
        </div>

        <hr class="seperator">

    </div>
</body>
</html>