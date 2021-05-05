<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>">
      <img src="<?php echo URLROOT; ?>/public/img/logoTransparant.png" width="30" height="30" class="d-inline-block align-top" alt="">
      <?php echo SITENAME; ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/posts">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/profiles">Profiles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.tinyfeet.app">Toolkit</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <br>
        
        <?php if (isset($_SESSION['user_id'])) : ?>
          <!-- if user_id variable is set meaning user is logged in, show logout.  If not set, show register and login -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/profiles/user/<?php echo $_SESSION['user_username'] ?>"> Logged in as <?php echo $_SESSION['user_username']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>