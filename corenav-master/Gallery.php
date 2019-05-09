<?php
session_start();

include "server_connect/connect.php";

$sql="select * from upload where user_id='$_SESSION[id]'";
$result = mysql_query($sql, $connect);
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

		<div class="section">

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