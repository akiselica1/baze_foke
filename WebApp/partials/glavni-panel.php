<!DOCTYPE html>
<html ng-app="kadrovska">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-resource.min.js"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-route.min.js"></script>
    	<script src="https://cdn.firebase.com/js/client/2.0.4/firebase.js"></script>
    	<script src="https://cdn.firebase.com/libs/angularfire/0.9.0/angularfire.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
	    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
	    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	    <link rel="stylesheet" href="../css/main.css">
	    <title>ETF - Kadrovska služba</title>
	</head>

<body>
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
              <a class="navbar-brand" href="#"><img id="brand-slicica" src="../img/korisnici/id.png" alt="slika"> Nejra A.</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Profil<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Na čekanju</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dokumenti <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Pretraga">
                </div>
                <button type="submit" class="btn btn-default">Traži</button>
              </form>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><img id="nav-settings" alt="settings" src="../img/korisnici/settings.png"></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dodatno <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    
        <div class="panel-box">
            <div class="panel-obj1">
            </div>
            <div class="panel-obj2">
            </div>
        </div>
	    <script src="../bootstrap/js/bootstrap.js"></script>
</body>