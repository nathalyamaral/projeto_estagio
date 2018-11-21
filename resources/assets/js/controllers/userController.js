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
            });
        }
    });
    angular.extend($scope,{
        doCurso: function (form_curso) {
          var userobj = {
            nome: $scope.curso.nome,
            regulamento: $scope.curso.regulamento
          }
        }
    })
}]);

angular.module('estagioApp').controller('otherController', ['$scope', '$http', function ($scope, $http){
    $scope.msg = "Ola Muchacho";
    // language=HTML
    $scope.contato = "Dúvidas, comentários ou elogios, envie um e-mail para:wesley.barbosa@aluno.ufms.br";
    $scope.sobre = "Plataforma de estágio para auxiliar você!";
}]);

angular.module('estagioApp').controller('dashboardCtrl', ['$scope', '$http', '$location', 'userModel', function ($scope, $http, $location, userModel){
    $scope.msg = "Ola Muchacho";
    // language=HTML
    $scope.contato = "Dúvidas, comentários ou elogios, envie um e-mail para:wesley.barbosa@aluno.ufms.br";
    $scope.sobre = "Plataforma de estágio para auxiliar você!";
    $scope.user = userModel.getUserObject();
    $scope.userAcess = userModel.getUserObject().data.acesso_idacesso;

    angular.extend($scope,{
        doLogout: function () {
            userModel.doUserLogout();
            $location.path('logout');
        }
    });
}]);


angular.module("estagioApp").controller('adminController',  ['$scope', 'adminModel', '$location', function ($scope, adminModel, $location){
    angular.extend($scope,{
        doCadCoor: function (CadCoorForm){
            var CadCoorData = $scope.cadastro;
            CadCoorModel.doSolicita(CadCoorData).then(function (succesresponse) {
                $location.path('dashboard');
            }).then(function (error) {
                console.log(error);
            });
       }
    });
}]);