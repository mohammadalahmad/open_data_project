<?php
function isActive($page) {
    $current_page = basename($_SERVER['PHP_SELF']);
    return $current_page === $page ? 'active' : '';
}
?>

<nav class="navbar w-100 " style="background-color: #e3f2fd;   position: fixed; left: 0; top: 0; " >
    <div class="nav nav-tabs"  id="navbarNav">
        <li class="nav-item ">
          <a  class="nav-item nav-link link-secondary <?php echo isActive('home.php'); ?>" href="home.php" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link  <?php echo isActive('map.php'); ?>"  href="map.php" >Map</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link <?php echo isActive('Personalities.php'); ?>" href="Personalities.php" >Personalities</a>
        </li>
    </div>
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
