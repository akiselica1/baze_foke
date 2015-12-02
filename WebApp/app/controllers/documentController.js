'use strict'
kadrovska.controller('getAllDocumentsCtrl', function ($scope, documentService) {
    $scope.documents = [];
    documentService.getDocuments().then(function (results) {
        $scope.documents = results.data;
    }, function (error) {
        alert(error.data.message);
    });
});