var mainApp = angular.module("mainApp", ['ngRoute']);

mainApp.config(['$routeProvider', function($routeProvider) {
   $routeProvider.
   
   when('/catageories', {
      templateUrl: 'catageories.php'
   }).
   
   when('/subcatageories', {
      templateUrl: 'subcatageories.php'
   }).
   
   when('/dataentryform', {
      templateUrl: 'dataentryform.php'
   }).
   
   when('/workadminform', {
      templateUrl: 'workadminform.php'
   }).
   
   when('/employeeform', {
      templateUrl: 'employeeform.php'
   }).
   
   otherwise({
      redirectTo: '/catageories'
   });
	
}]);
	