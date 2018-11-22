angular.module("estagioApp").controller('globalController', ["$scope", '$location', 'config', 'userModel', function ($scope, $location, config,  userModel) {
    $scope.user = userModel.getUserObject();
    if($scope.user){
    	config.personalConfig = $scope.user.data.conf;
    }
    $scope.templates = {};
    $scope.templates.navUrl = "view/common/navbar.html";
    $scope.templates.admUrl = "view/common/navbarAdmin.html";
    $scope.templates.alnUrl = "view/common/navbarAluno.html";
    $scope.templates.supUrl = "view/common/navbarSup.html";
    $scope.templates.crdUrl = "view/common/navbarCoord.html";
    angular.extend($scope,{
        doLogout: function () {
            userModel.doUserLogout();
            $scope.user = {};
            $scope.userAcess = 0;
            $location.path('logout');
        }
    });
}]);
angular.module("estagioApp").controller('userController', ['$scope', 'userModel', '$cookies', '$location', function ($scope, userModel, $cookies, $location){
    if(userModel.getAuthStatus())
        $location.path('dashboard');
    angular.extend($scope,{
       doLogin: function (loginForm) {
           var userobj = {
               email: $scope.login.email,
               senha: $scope.login.senha
           };
           userModel.doLogin(userobj).then(function (succesresponse) {
               $location.path('dashboard');
           },function (error) {
               console.log(error);
           });
       }
    });
    angular.extend($scope,{
        doCampus: function (form_campus) {
            var userobj = {
                nome: $scope.campus.nome,
                diretor: $scope.campus.diretor,
                email: $scope.campus.emailDirecao,
                site: $scope.campus.site
            };
            userModel.doCampus(userobj).then(function (succesresponse) {
                $location.path('dashboard');
            }, function (error) {
                console.log(error);
            });
        }
    });
    angular.extend($scope,{
        doCurso: function (form_curso) {
            var userobj = {
              nome: $scope.curso.nome,
              regulamento: $scope.curso.regulamento
            };
            userModel.doCurso(userobj).then(function (succesresponse) {
                $location.path('dashboard');
            }, function (error) {
                console.log(error);
            });
        }
    })
}]);

angular.module('estagioApp').controller('otherController', ['$scope', '$http', function ($scope, $http){
    $scope.msg = "Ola Muchacho";
    // language=HTML
    $scope.contato = "Dúvidas, comentários ou elogios, envie um e-mail para:wesley.barbosa@aluno.ufms.br";
    $scope.sobre = "Plataforma de estágio para auxiliar você!";
}]);

angular.module('estagioApp').controller('dashboardCtrl', ['$scope', '$http', '$location', 'userModel', 'gereUserModel', 'config', function ($scope, $http, $location, userModel,gereUserModel, config){
    $scope.user = userModel.getUserObject();
    $scope.userAcess = userModel.getUserObject().data.acesso_idacesso;
    $scope.msg = "Ola Muchacho";
    $scope.myconfig = config.personalConfig;
    $scope.contato = "Dúvidas, comentários ou elogios, envie um e-mail para:wesley.barbosa@aluno.ufms.br";
    $scope.sobre = "Plataforma de estágio para auxiliar você!";
    /*switch ($scope.userAcess) {
        case 1:

            break;
        case 2:
            break;
        case 3:

            break;
        case 4:

            break;
        default:
            $scope.cList = [];
    }*/

    $scope.userData = gereUserModel.doData(userModel.getUserObject().data);
    angular.extend($scope,{
        doLogout: function () {
            userModel.doUserLogout();
            $location.path('logout');
        }
    });
}]);


angular.module("estagioApp").controller('adminController',  ['$scope', '$location', 'userModel', function ($scope, $location, userModel){
/*    
        doCadCoor: function (CadCoorForm){
            var CadCoorData = $scope.cadastro;
            CadCoorModel.doSolicita(CadCoorData).then(function (succesresponse) {
                $location.path('dashboard');
            }).then(function (error) {
                console.log(error);/
            });
       });*/
      angular.extend($scope,{
        doCoordenador: function (coordForm) {
           return userModel.doCoordenador($scope.users);
        }});
} ] ) ;
angular.module("estagioApp").controller('navController', ['$scope', 'userModel', function ($scope, userModel) {
    angular.extend($scope, {
       user: userModel.getUserObject(),
       navUrl: 'view/common/navbarAluno.html'
    });
}])
angular.module("estagioApp").controller('estagioController', ['$scope', '$http', 'userModel', 'usersApi', function ($scope, $http, userModel, usersApi, objestagio){
    $scope.estagio =  usersApi.getEstagioOr404(userModel.getUserObject().data.aluno).then(function (success) {
        $scope.estagio = success.data;
    }, function (error) {
        console.log(error);
    });
            //$scope.estagio = "Olá";
}]);
//# sourceMappingURL=controller.js.map
