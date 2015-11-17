<!DOCTYPE html>
<html ng-app="kadrovska">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-resource.min.js"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-route.min.js"></script>
    	<script src="https://cdn.firebase.com/js/client/2.0.4/firebase.js"></script>
    	<script src="https://cdn.firebase.com/libs/angularfire/0.9.0/angularfire.min.js"></script>
	    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
	    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	    <link rel="stylesheet" href="css/main.css">
	    
	</head>

	<body>
		<?php 
	    	include "partials/glavni-panel.php";
	    ?>
		<h1>Kadrovska služba</h2>
		<h3><a href="#/allUsers">Korisnici</a></h3>
		<h3><a href="#/allThesis">Zavrsni radovi</a></h3>
	    <div ng-view=""></div>
	    
	    <!-- LOAD APP MAIN SCRIPT -->
	    <script src="app/app.js"></script>

	    <!-- LOAD ANGULAR SERVICES -->
	    <script src="app/services/userService.js"></script>
	    <script src="app/services/thesisService.js"></script>

	    <!-- LOAD ANGULAR CONTROLLERS -->
	    <script src="app/controllers/userController.js"></script>
	    <script src="app/controllers/thesisController.js"></script>

	    <!-- LOAD ANGULAR ROUTES -->
	    <script src="app/routes.js"></script>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <!--script src="bootstrap/js/bootstrap.min.js"></script-->
	    <script src="bootstrap/js/bootstrap.js"></script>
	</body>
</html>
