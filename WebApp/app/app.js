var kadrovska = angular.module('kadrovska', ['ngRoute']);

var serviceBase = 'http://localhost/baze_foke/services/';
kadrovska.constant('ngAuthSettings', {
    apiServiceBaseUri: serviceBase,
    clientId: 'kadrovska'
});

