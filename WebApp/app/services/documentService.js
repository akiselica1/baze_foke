'use strict';
kadrovska.factory('documentService', ['$http', 'ngAuthSettings', function ($http, ngAuthSettings) {
    var documentServiceFactory = {};
    var serviceBase = ngAuthSettings.apiServiceBaseUri;

    var _getDocuments = function () {
        return $http.get(serviceBase + 'action_documents.php?action=pokupi-dokumente').then(function (results) {
        	
            return results;
        });
    };

    documentServiceFactory.getDocuments = _getDocuments;

    return documentServiceFactory;
}]);