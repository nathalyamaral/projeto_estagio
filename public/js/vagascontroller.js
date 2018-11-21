angular.module("estagioApp").controller('vagasController', ['$scope', '$http', '$cookies','usersApi', function ($scope, $http, $cookies, dbVagas){
    $scope.date = new Date();

    $scope.vagasList = [];
    dbVagas.getVagas().then(function (response) {
       angular.forEach(response.data, function(obj){
           $scope.vagasList.push(obj);
        });
        $scope.vagasList =$scope.vagasList[0];
    });
    angular.extend($scope,{
        insertVaga:function (vaga,user) {
            return dbVagas.insertNewVaga(vaga, user.cpf);
        }
    });
    $scope.msg = "Ola";
}]);
//# sourceMappingURL=vagascontroller.js.map
