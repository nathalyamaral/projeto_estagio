angular.module("estagioApp").controller('globalController', ["$scope", 'userModel', function ($scope, userModel) {
    $scope.user = userModel.getUserObject();
    $scope.userAcess = $scope.user.data.acesso_idacesso;
    $scope.templates = {};
    $scope.templates.navUrl = "view/common/navbar.html";
    $scope.templates.alnUrl = "view/common/navbarAluno.html";
    $scope.templates.supUrl = "view/common/navbarSup.html";
    $scope.templates.crdUrl = "view/common/navbarCoord.html";
}]);
angular.module("estagioApp").controller('userController', ['$scope', 'userModel', '$cookies', '$location', function ($scope, userModel, $cookies, $location){

    angular.extend($scope,{
       doLogin: function (loginForm) {
           var userobj = {
               email: $scope.login.email,
               senha: $scope.login.senha
           };
           userModel.doLogin(userobj).then(function (succesresponse) {
               $location.path('dashboard');
           });
       }
    });
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
    angular.extend($scope,{
        doLogout: function () {
            userModel.doUserLogout();
            $location.path('logout');
        }
    });
}]);
angular.module("estagioApp").controller('navController', ['$scope', 'userModel', function ($scope, userModel) {
    angular.extend($scope, {
       user: userModel.getUserObject(),
       navUrl: 'view/common/navbarAluno.html'
    });
}])
//# sourceMappingURL=controller.js.map
