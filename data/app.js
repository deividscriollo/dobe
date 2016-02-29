// create the module and name it scotchApp
    var scotchApp = angular.module('scotchApp', ['ngRoute', 'ngAnimate']);
    // configure our routes
    scotchApp.config(function($routeProvider) {
        $routeProvider

            // route for the home page
            .when('/', {
                templateUrl : 'home/app.html',
                controller  : 'homeController',
            })
            .when('/map', {
                templateUrl : 'map/app.html',
                controller  : 'mapController',
            })
            .when('/sucursales', {
                templateUrl : 'sucursal/app.html',
                controller  : 'sucursalController',
            })
            // route for the contact page
            .when('/perfilempresa', {
                templateUrl : 'empresa/app.html',
                controller  : 'empresaController'
            });
    });

    scotchApp.controller('mainController', function($scope, $rootScope){
      $rootScope.$on('$routeChangeStart', function(event, currRoute, prevRoute){
        // $rootScope.animation = currRoute.animation;
      });
    });
    // scotchApp.controller('mainController', function($scope) {
    //     $scope.pageClass = 'page-about';
    // });
    // scotchApp.controller('mainController', function($scope) {
    //     $scope.pageClass = 'page-contact';
    // });

    