kadrovska.config(function ($routeProvider) {
    $routeProvider /*If the url name and ctrl name are the same, it will not work, dunno why */
        .when("/allUsers",
        {
            controller: "getAllUsersCtrl",
            templateUrl: "partials/korisnici.html"  
        })
        .when('/allThesis',
        {
            controller: "thesisCtrl",
            templateUrl: "partials/zavrsni.php"
        })
        .otherwise({ redirectTo: "/index.php" });
}).config(function ($httpProvider) {
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
});