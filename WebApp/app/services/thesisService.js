'use strict';
kadrovska.factory('thesisService', ['$http', 'ngAuthSettings', function ($http, ngAuthSettings) {
    var thesisServiceFactory = {};
    var serviceBase = ngAuthSettings.apiServiceBaseUri;

    var _getThesis = function () {
        return $http.get(serviceBase + 'action_thesis.php?action=pokupi-zavrsne').then(function (results) {
            return results;
        });
    };

    thesisServiceFactory.getThesis = _getThesis;

    return thesisServiceFactory;
}]);