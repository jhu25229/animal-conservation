<!-- start of navigation bar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/~jhu25229/final_project/homepage.php"><i class="far fa-frown"></i> Keep the Animals Alive Plz <i class="far fa-frown"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/~jhu25229/final_project/homepage.php">Home</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Search
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/~jhu25229/final_project/search/search.php">Search by Species Name</a>
          <a class="dropdown-item" href="/~jhu25229/final_project/search/region.php">Search by Region</a>
        </div>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="/~jhu25229/final_project/discover.php">Discover</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="/~jhu25229/final_project/myFavorites.php">My Favorites</a>
          </li>
        </ul>
        

        <?php if(!isset($_SESSION["logged"]) || !$_SESSION["logged"] ) :?>
          <ul class="navbar-right navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/~jhu25229/final_project/login/signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/~jhu25229/final_project/login/loginPage.php">Login</a>
            </li>
          </ul>
        
      <?php else: ?>
        <ul class="navbar-right navbar-nav">
            <li class="nav-item">
              <span class="navbar-text mr-4">Welcome <?php echo $_SESSION["username"];?>!</span>
            </li>
            <li class="nav-item">
             <a class="btn btn-primary" href="/~jhu25229/final_project/login/logout.php">Logout</a>
          </ul>
      <?php endif; ?>
       
        
    </div>
  </nav>
  <!-- End of navigation bar-->
  