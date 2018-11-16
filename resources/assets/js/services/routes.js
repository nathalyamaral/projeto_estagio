angular.module("estagioApp").config(
    function ($routeProvider, $locationProvider){
        $routeProvider.when('/',{
            templateUrl: 'view/common/home.html',
            controller: 'userController',
            resolve: {
                lista : function (usersApi) {
                    return usersApi.getArray();
                }
            }
        });

        $routeProvider.when('/dashboard',{
            templateUrl: 'view/users/dashboard.html',
            controller: 'userController',
            resolve: {
                lista : function (usersApi) {
                    return usersApi.getArray();
                }
            }
        });

        $routeProvider.when('/vagas',{
            templateUrl: 'view/users/vagas.html',
            controller: 'otherController'
        });

        $routeProvider.when('/sobre',{
            templateUrl: 'view/users/sobre.html',
            controller: 'otherController'
        });

        $routeProvider.when('/contato',{
            templateUrl: 'view/users/contato.html',
            controller: 'otherController'
        });

        $routeProvider.otherwise('/');
    });