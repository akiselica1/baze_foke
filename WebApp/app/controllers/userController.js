'use strict'
kadrovska.controller('getAllUsersCtrl', function ($scope, userService) {
    $scope.users = [];
    userService.getUsers().then(function (results) {
        $scope.users = results.data;
    }, function (error) {
        alert(error.data.message);
    });
});