'use strict'
kadrovska.controller('thesisCtrl', function ($scope, thesisService) {
    
    $scope.thesis = [];
    
    thesisService.getThesis().then(function (results) {
        $scope.thesis = results.data;
    }, function (error) {
        alert(error.data.message);
    });

    $scope.proslijediZavrsne = function(zavrsniRadovi){
    		console.log(zavrsniRadovi);
    }

});