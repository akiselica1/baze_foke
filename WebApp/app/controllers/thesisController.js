'use strict'
kadrovska.controller('thesisCtrl', function ($scope, thesisService) {
    
    $scope.thesis = {};
    
    thesisService.getThesis().then(function (results) {
        $scope.thesis = results.data;
        console.log($scope.thesis);
    }, function (error) {
        alert(error.data.message);
    });

    $scope.proslijediZavrsne = function(zavrsniRadovi){
    	try{
    		thesisService.passThesis(zavrsniRadovi).then(function (results){
    			console.log(results);
    		}, function (error) {
    			console.log(error.data.message);
    		});
    	}
    	catch(e){
    		console.log(e);
    	}
    }

    $scope.potvrdiOdobravanja = function(zavrsniRadovi){
        var formData = document.getElementById("nvforma");
        console.log(formData.potvrdi.value);
        zavrsniRadovi[0].potvrda = formData.potvrdi.value;
        console.log(zavrsniRadovi);
        try{
            thesisService.passThesis(zavrsniRadovi).then(function (results){
                console.log(results);
            }, function (error) {
                console.log(error.data.message);
            });
        }
        catch(e){
            console.log(e);
        }
    }
});