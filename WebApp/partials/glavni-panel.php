<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img id="brand-slicica" src="img/korisnici/id.png" alt="slika">
          <?php 
              if(isset($_SESSION['username'])){
                  $prvoPrezimena = substr($_SESSION['prezime'], 0, 1);
                  echo $_SESSION['ime']." ".$prvoPrezimena.".";
              }
          ?>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Profil<span class="sr-only">(current)</span></a></li>
        <li><a href="#">Na čekanju <span class="badge">0</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dokumenti <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Molbe</a></li>
            <li><a href="#">Zahtjevi</a></li>
            <li><a href="#">Potvrde</a></li>
            <li><a href="#/allThesis">Završni rad</a></li>
            <li><a href="#">Odluke</a></li>
            <li><a href="#">Uvjerenja</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Ostali dokumenti</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left hidden-xs" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pretraga">
        </div>
        <button type="submit" class="btn btn-default">Traži</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="hidden-xs"><a href="#"><img id="nav-settings" alt="settings" src="img/korisnici/settings.png"></a></li>
        <li class="dropdown">
          <a href="" class="dropdown-toggle hidden-xs" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dodatno <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Dodatne opcije</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Odjavi se</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="panel-box">
    <div class="panel-obj1">
        <div class="btn-group-vertical" role="group" aria-label="...">
          <button type="button"  id="btn-img-send" class="btn btn-default">Odobri dokument</button>
          <button type="button" id="btn-img-drop" class="btn btn-default">Poništi dokument</button>

          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dodatne opcije
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Dodatna opcija 1</a></li>
              <li><img alt="" src="" class=""><a href="#">Dodatna opcija 2</a></li>
            </ul>
          </div>
        </div>
    </div>
    <div class="panel-obj2">
        <div ng-view=""></div> 
    </div>
</div>
