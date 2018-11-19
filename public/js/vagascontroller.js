angular.module("estagioApp").controller('vagasController', ['$scope', '$http', '$cookies','usersApi', function ($scope, $http, $cookies, dbVagas){
    $scope.date = new Date();

    $scope.vagasList = [];
    dbVagas.getVagas().then(function (response) {
       angular.forEach(response.data, function(obj){
           $scope.vagasList.push(obj[0]);
        });
    });
    $scope.msg = "Ola";
}]);
//# sourceMappingURL=vagascontroller.js.map
