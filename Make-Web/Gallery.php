<?php
session_start();

include "server_connect/connect.php";

$item_per_page=9;

if(isset($_GET[p])){
    $current_page=$_GET[p];
}
else{
    $current_page=0;
}

$num_page_button=5;

$sql="select count(*) as cnt from upload where user_id='$_SESSION[id]'";
$result=mysql_query($sql, $connect);
$row=mysql_fetch_array($result);
$total_item=$row[cnt];

$total_page=ceil($total_item / $item_per_page);

//if($total_page > $current_page + $num_page_button)
//    $display_page=$num_page_button;
//else
//    $display_page=$total_page-$current_page;

$start=$current_page*$item_per_page;
$sql="select * from upload where user_id='$_SESSION[id]' limit $start, $item_per_page";
$result=mysql_query($sql, $connect);
?>

<!doctype html>
<html>
	<head>
        <link rel='stylesheet' href='dist/unitegallery/css/unite-gallery.css' type='text/css' />

        <!-- 웹 페이지의 제목 (탭 부분에 나옴) -->
		<title>coreNavigation - Multi purpose navigation menu for javascript library based on jquery</title>
        <?
        include "partial/meta.php"
        ?>
	</head>

	<body>
		<!-- Start Navigation -->
        <?php
        include "partial/nav.php"
        ?>
		<!-- End Navigation -->

        <style>
            .section-top{
                text-align: center;
                padding: 10px;
            }
            .section-top a{
                text-decoration: none;
                color: #3a3a3a;
            }
            .section-top a:hover{
                color: #e74c3c;
            }

            .section-pagination{
                padding: 20px;
                text-align: center;
            }
            .section-pagination a{
                text-decoration: none;
                background: #3a3a3a;
                color: #ffffff;
                width: 40px;
                margin: 1px;
                padding: 10px;
                display: inline-block;
            }
            .section-pagination a:hover{
                background: #e74c3c;
            }

            .section-pagination .current{
                background: #e74c3c;
            }
        </style>

        <div class="section-top">
            <a id="upload"> Upload to Gallery </a>
            <input type="button" value="Upload" />
        </div>

		<div class="section-middle">
            <div id="gallery" style="display:none;">
                <?php
                while($row = mysql_fetch_array($result, $connect)){
                    echo "<a href=\"http://unitegallery.net\">
                            <img alt=\"$row[title]\"
                            src=\"$row[image_thumbs]\"
                            data-image=\"$row[image_big]\"
                            data-image-mobile=\"$row[image_thumbs]\"
                            data-thumb-mobile=\"$row[image_thumbs]\"
                            data-description=\"$row[description]\"
                            style=\"display:none\">
                          </a>";
                }
                ?>
            </div>
		</div>

        <div class="section-pagination">
            <?php
            if($current_page > 0) {
                $pre = $current_page - 1;
                echo "<a href=\"Gallery.php?p=0\"> << </a>";
                echo "<a href=\"Gallery.php?p=$pre\"> < </a>";
            }

            if($total_page > $num_page_button){
                if($current_page == 0 || $current_page == 1){
                    for($i=0;$i<$num_page_button;$i++) {
                        $num = $i+1;
                        if($i == $current_page){
                            echo "<a class='current' href='Gallery.php?p=$i'> $num </a>";
                        } else{
                            echo "<a href='Gallery.php?p=$i'> $num </a>";
                        }
                    }
                } else if($current_page == $total_page - 2 || $current_page == $total_page - 1){
                    for($i=$total_page-5;$i<$total_page;$i++) {
                        $num = $i+1;
                        if($i == $current_page){
                            echo "<a class='current' href='Gallery.php?p=$i'> $num </a>";
                        } else{
                            echo "<a href='Gallery.php?p=$i'> $num </a>";
                        }
                    }
                } else {
                    for($i=$current_page-2;$i<$current_page+$num_page_button/2;$i++) {
                        $num = $i+1;
                        if($i == $current_page){
                            echo "<a class='current' href='Gallery.php?p=$i'> $num </a>";
                        } else{
                            echo "<a href='Gallery.php?p=$i'> $num </a>";
                        }
                    }
                }
            } else{
                for($i=0;$i<$total_page;$i++) {
                    $num = $i+1;
                    if($i == $current_page){
                        echo "<a class='current' href='Gallery.php?p=$i'> $num </a>";
                    } else{
                        echo "<a href='Gallery.php?p=$i'> $num </a>";
                    }
                }
            }

            if($current_page < $total_page-1) {
                $next = $current_page + 1;
                $final = $total_page - 1;
                echo "<a href=\"Gallery.php?p=$next\"> > </a>";
                echo "<a href=\"Gallery.php?p=$final\"> >> </a>";
            }
            ?>
        </div>

        <?php
        include "partial/popup.php"
        ?>

        <?php
        include "partial/script.php"
        ?>

        <script type='text/javascript' src='dist/unitegallery/js/unitegallery.min.js'></script>
        <script type='text/javascript' src='dist/unitegallery/themes/tiles/ug-theme-tiles.js'></script>

        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery("#gallery").unitegallery();
            });
        </script>

        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result);
                        $('#preview').css('display', 'block');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function() {
                readURL(this);
            });
        </script>

	</body>
</html>