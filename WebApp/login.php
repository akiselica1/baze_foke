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
	    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
	    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	    <link rel="stylesheet" href="css/main.css">
	    <title>ETF - Kadrovska služba</title>
	</head>

	<body>
        
<div class="container">    
    
        <img id="etf-logo" alt="etf-logo" src="img/logoi/etf-logo.gif">
    
    <div id="loginbox" class="mainbox">                    
        <div class="panel panel-info" >

            <div class="panel-heading">
                <div class="panel-title">Autentifikacija</div>
                <div style="float:right; font-size: 77%; position: relative; top:-10px"><a href="#">Zaboravljena lozinka?</a></div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    
                <form id="loginform" class="form-horizontal" role="form">
                            
                    <div style="margin-bottom: 15px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Korisnik">                                        
                    </div>
                        
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Lozinka">
                    </div>

                        <div style="margin-top:30px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <a id="btn-login" href="index.php" class="btn btn-primary">Prijava </a>
                            </div>
                        </div>
                </form>     
            </div>

        </div>  
    </div>
</div>
        
        	    <!-- LOAD APP MAIN SCRIPT -->
	    <script src="app/app.js"></script>
        <script src="js/main.js"></script>

	    <!-- LOAD ANGULAR SERVICES -->
	    <script src="app/services/userService.js"></script>
	    <script src="app/services/thesisService.js"></script>
	    <script src="app/services/documentService.js"></script>

	    <!-- LOAD ANGULAR CONTROLLERS -->
	    <script src="app/controllers/userController.js"></script>
	    <script src="app/controllers/thesisController.js"></script>
	    <script src="app/controllers/documentController.js"></script>

	    <!-- LOAD ANGULAR ROUTES -->
	    <script src="app/routes.js"></script>


	    <script src="bootstrap/js/bootstrap.js"></script>
	</body>
</html>