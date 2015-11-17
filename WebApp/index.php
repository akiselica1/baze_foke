<?php
    include 'partials/zaglavlje.html';
?>
	<body>
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


	    <script src="bootstrap/js/bootstrap.min.js"></script>
	    <script src="bootstrap/js/bootstrap.js"></script>
	</body>
</html>
