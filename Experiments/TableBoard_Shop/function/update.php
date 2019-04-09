<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드를 POST로 받아온 내용으로 수정하기!

$connect = mysql_connect("localhost", "JK", "2015136066"); // DB 연결
mysql_select_db("jk_db", $connect);                // DB 선택

$sql = "update tableboard_shop set ";
$sql .= "date = '$_POST[date]', order_id = '$_POST[order_id]', name = '$_POST[name]', price = '$_POST[price]', quantity = '$_POST[quantity]' ";
$sql .= "where num = $_GET[num];";

$result = mysql_query($sql, $connect);
$row = mysql_fetch_array($result);

# 참고 : 에러 메시지 출력 방법
if($row) {
    echo "<script> alert('오류가 발생하였습니다.') </script>";
}

mysql_close($connect);
?>

<script>
    location.replace('../index.php');
</script>