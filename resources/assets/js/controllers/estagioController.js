angular.module("estagioApp").controller('estagioController', ['$scope', '$http', 'userModel', 'usersApi', function ($scope, $http, userModel, usersApi, objestagio){
    $scope.estagio =  usersApi.getEstagioOr404(userModel.getUserObject().data.aluno).then(function (success) {
        $scope.estagio = success.data;
    }, function (error) {
        console.log(error);
    });
            //$scope.estagio = "Olá";
}]);