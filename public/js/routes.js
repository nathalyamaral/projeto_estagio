angular.module("estagioApp").config(
    function ($routeProvider, $locationProvider){
        $routeProvider.when('/',{
            templateUrl: 'view/common/home.html',
            controller: 'userController'
        });

        $routeProvider.when('/login',{
            templateUrl: 'view/forms/loginForm.html',
            controller: 'userController'
        });

        $routeProvider.when('/cadastro',{
            templateUrl: 'view/forms/cadastroForm.html',
            controller: 'userController'
        });

        $routeProvider.when('/estagio',{
            templateUrl: 'view/users/estagio.html',
            controller: 'estagioController'
        });

        $routeProvider.when('/vagas',{
            templateUrl: 'view/users/vagas.html',
            controller: 'vagasController',
            authenticated: true,
            resolve: {
                dbVagas : function (usersApi) {
                    return usersApi.getArray();
                }
            }
        });
        
        $routeProvider.when('/solicita',{
            templateUrl:'view/forms/solicitaForm.html',
            controller:'solicitaController'
        });
        $routeProvider.when('/usercad',{
            templateUrl:'view/forms/coordForm.html',
            controller: 'adminController'
        });

        $routeProvider.when('/sobre',{
            templateUrl: 'view/users/sobre.html',
            controller: 'otherController'
        });

        $routeProvider.when('/contato',{
            templateUrl: 'view/users/contato.html',
            controller: 'otherController'
        });

        $routeProvider.when('/conf',{
            templateUrl: 'view/common/configuracoes.html',
            controller: 'adminController',
            authenticated: true
        });

        $routeProvider.when('/dashboard',{
           templateUrl: 'view/users/dashboard.html',
           controller: 'dashboardCtrl',
            authenticated: true
        });

        $routeProvider.when('/logout',{
            templateUrl: 'view/users/logout.html',
            controller: 'userController',
            authenticated: true
        });

        $routeProvider.otherwise({
            redirectTo: "/"
        });
    });
angular.module('estagioApp').run(['$rootScope', '$location', 'userModel',
    function ($rootScope, $location, userModel) {
        $rootScope.$on("$routeChangeStart",
            function (event, next, current) {
                if(next.$$route.authenticated){
                    if(!userModel.getAuthStatus()){
                        $location.path('/');
                    }
                }
               if(next.$$route.originalPath == '/'){
                   if(userModel.getAuthStatus()){
                       $location.path(current.$$route.originalPath);
                   }
               }
            });
    }
]);
//# sourceMappingURL=routes.js.map
