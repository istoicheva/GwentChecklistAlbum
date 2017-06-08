      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo DOMAIN; ?>">Gwent Card Collector</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_SESSION['user'])) : ?>
            <li><a href="<?php echo DOMAIN; ?>admin/">Dashboard</a></li>
            <li><a href="<?php echo DOMAIN; ?>logout.php">Log Out</a></li>
            <?php endif; ?>
            <?php if (!isset($_SESSION['user'])) : ?>
            <li class="input_field">
              <form action="<?php echo DOMAIN; ?>login.php" method="post">
                <li class="navbar-form form-group">
                  <input id="name" name="username" type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
                </li>
                <li class="navbar-form form-group">
                  <input id="password" name="password" class="form-control" placeholder="Pasword" type="password">
                </li>
                <li class="navbar-form form-group">
                  <input name="submit" type="submit" value=" Login " class="btn btn-primary">
                </li>
              </form>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>