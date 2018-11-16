var app = angular.module("estagioApp",['ngRoute', 'ngCookies']);
app.config(['$routeProvider', '$locationProvider',
    function ($routeProvider, $locationProvider){
        $routeProvider.when('/',{
            templateUrl: 'template/users/login.html',
            controller: 'userController'
        });

        $routeProvider.when('/dashboard',{
            templateUrl: 'template/users/dashboard.html',
            controller: 'userController'
        });

        $routeProvider.when('/logout',{
            templateUrl: 'template/users/logout.html',
            controller: 'userController'
        });

        $routeProvider.otherwise('/');
}]);