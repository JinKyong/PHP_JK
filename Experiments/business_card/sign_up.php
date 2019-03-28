<meta charset="UTF-8">

<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019-03-28
 * Time: 오후 2:22
 */

$connect = mysql_connect("localhost","JK","2015136066");
mysql_select_db("jk_db");

$sql = "select * from business_card where name = '$_POST[name]'";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);

if($row){
    echo "<script> alert('오류 발생!!'); </script>";
} else {
    $sql = "insert into business_card (name, password, email, company, side, jop, blog_url, facebook_id, twitter_id, github_id)";
    $sql .= " values ('$_POST[name]', $_POST[password], '$_POST[email]', '$_POST[company]', '$_POST[side]', '$_POST[jop]', ";
    $sql .= "'$_POST[blog_url]', '$_POST[facebook_id]', '$_POST[twitter_id]', '$_POST[github_id]');";

    $result = mysql_query($sql);
}

mysql_close($connect);

?>

<script>
    location.href = "login_form.php";
</script>
