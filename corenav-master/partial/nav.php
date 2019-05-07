<!-- Start Navigation -->
<nav hidden>
    <div class="nav-header">
        <a href="index.php" class="brand">
            <img src="assets/img/brand.png" />
        </a>
        <button class="toggle-bar">
            <span class="fa fa-bars"></span>
        </button>
    </div>
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="About.php">About</a></li>
        <li><a href="Gallery.php">Gallery</a></li>
        <li><a href="#">Service</a></li>
        <li><a href="#">Contact Us</a></li>
        <?php
        if($_SESSION[id]){
            // Login state
            echo '<li><a id="logout" href="function/logout.php">Log-Out</a></li>';
        }else{
            // Logout state
            echo '<li><a id="login" href="#">Log-In</a></li>';
        }
        ?>
    </ul>
</nav>