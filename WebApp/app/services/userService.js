'use strict';
kadrovska.factory('userService', ['$http', 'ngAuthSettings', function ($http, ngAuthSettings) {
    var userServiceFactory = {};
    var serviceBase = ngAuthSettings.apiServiceBaseUri;

    var _getUsers = function () {
        return $http.get(serviceBase + 'action_users.php?action=pokupi-korisnike').then(function (results) {
        	//alert("bla");
            return results;
        });
    };

    userServiceFactory.getUsers = _getUsers;

    return userServiceFactory;
}]);