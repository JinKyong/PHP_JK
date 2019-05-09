<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019-05-09
 * Time: 오후 2:16
 */

session_start();

include "../server_connect/connect.php";

// 설정
$uploads_dir = 'images/big';
$uploads_thumbs_dir = 'images/thumbs';
$allowed_ext = array('jpg','jpeg','png','gif');

// 변수 정리
$error = $_FILES['imglnp']['error'];
$name = $_FILES['imglnp']['name'];
$ext = array_pop(explode('.', $name));

// 오류 확인
if( $error != UPLOAD_ERR_OK ) {
    switch( $error ) {
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "파일이 너무 큽니다. ($error)";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "파일이 첨부되지 않았습니다. ($error)";
            break;
        default:
            echo "파일이 제대로 업로드되지 않았습니다. ($error)";
    }
    exit;
}

// 확장자 확인
if( !in_array($ext, $allowed_ext) ) {
    echo "허용되지 않는 확장자입니다.";
    exit;
}

$name = uniqid('img'.'_').".".$ext;

// 파일 복사
copy($_FILES['imglnp']['tmp_name'], "../"."$uploads_thumbs_dir/$name");
// 파일 이동
move_uploaded_file($_FILES['imglnp']['tmp_name'], "../"."$uploads_dir/$name");

// DB 처리
$title = $_POST[title];
$description = $_POST[description];

$sql="insert into upload(user_id, title, description, image_thumbs, image_big) ";
$sql.="values('$_SESSION[id]', '$_POST[title]', '$_POST[description]', '$uploads_thumbs_dir/$name', '$uploads_dir/$name')";
$result = mysql_query($sql, $connect);

if($result){
    //Upload success
    echo "<script> alert('Upload Success')</script>";
}
else{
    //Upload failed
    echo "<script> alert('Upload Failed')</script>";
}

// 파일 정보 출력
//echo "<h2>파일 정보</h2>
//<ul>
//	<li>파일명: $name</li>
//	<li>확장자: $ext</li>
//	<li>파일형식: {$_FILES['imglnp']['type']}</li>
//	<li>파일크기: {$_FILES['imglnp']['size']} 바이트</li>
//</ul>";

echo "<script> location.replace('../index.php')</script>";

?>