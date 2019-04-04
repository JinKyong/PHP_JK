<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, POST로 받아온 내용 입력하기!

# 참고 : 에러 메시지 출력 방법

$connect = mysql_connect("localhost", "JK", "2015136066"); // DB 연결
mysql_select_db("jk_db", $connect);                // DB 선택

$sql = "insert into tableboard_shop (date, order_id, name, price, quantity)";
$sql .= "values ('$_POST[date]', '$_POST[order_id]', '$_POST[name]', '$_POST[price]', '$_POST[quantity]');";
if(!($result = mysql_query($sql, $connect))) {
    echo "<script> alert('잘못 입력하셨습니다.') </script>";
}

mysql_close($connect);
?>

<script>
    location.replace('../index.php');
</script>
