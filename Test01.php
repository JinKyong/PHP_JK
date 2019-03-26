<meta charset="UTF-8">
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019-03-12
 * Time: 오후 4:33
 */

//<br> 줄 바꿈
echo "안녕";
echo "반가워 <br>";
echo ("great<br>
        beautiful<br>
        fantastic<br>");

//변수는 앞에 $를 붙여줌
$a = 500;
echo "$a<br>";

$aa = 300;
$bb = 200;
$cc = 100;

// .는 문자열 이어붙여주는 연산자
$sum = $aa."+".$bb."+".$cc;
echo "$sum.인코딩이 안대<br>";

//date() 함수는 현재 일자를 가져오는 함수
$Year = date('y');
$Month = date('m');
$Day = date('d');

echo "$Year<br>";
echo "$Month<br>";
echo "$Day<br>";

/***************************************/


?>